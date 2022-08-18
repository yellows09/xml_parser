<?php

namespace App\Console\Commands;

use App\Services\ParseXML;
use App\Services\ValidatingFile;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class XmlParse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'xparse {path?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse xml file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return string
     */
    public function getDefaultPath(): string
    {
        return public_path('defaultXmlFileForParses.xml');
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (!$this->argument('path')) {
            echo 'Вы не ввели файл, парсится дефолтный путь' . PHP_EOL;
            return ParseXML::makeRequest($this->getDefaultPath());
        }
        $valid = ValidatingFile::validatePath($this->argument('path'));
        if ($valid == 0) {
            echo 'Идет парсинг...' . PHP_EOL;
            return ParseXML::makeRequest($this->argument('path'));
        } else {
            die('Вы ввели неверный путь либо слишком большой файл!' . PHP_EOL);
        }
    }
}
