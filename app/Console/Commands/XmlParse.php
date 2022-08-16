<?php

namespace App\Console\Commands;

use App\Services\ParseXML;
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
        if(!$this->argument('path')){
            return ParseXML::makeRequest($this->getDefaultPath());
        }
        return ParseXML::makeRequest($this->argument('path'));
    }
}
