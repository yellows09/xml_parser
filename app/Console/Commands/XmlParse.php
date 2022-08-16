<?php

namespace App\Console\Commands;

use App\BodyConfiguration;
use App\Brand;
use App\Car;
use App\Category;
use App\Dealer;
use App\Generation;
use App\Model;
use App\ModelCar;
use App\Modification;
use App\Services\ParseXML;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class XmlParse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'xparse {path=defaultXmlFileForParses.xml}';

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
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if($this->argument('path') == 'defaultXmlFileForParses.xml'){
            echo 'Вы не ввели путь до файла, запарсился xml пример' . PHP_EOL;
            return 1;
        }
        echo ParseXML::makeRequest($this->argument('path'));
    }
}
