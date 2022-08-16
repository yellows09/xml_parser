<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ParseXML
{
    public static function makeRequest($file)
    {
        try {
            Http::get('http://localhost:8003/xml/parse',[
                'xml_file' => $file
            ]);
            echo 'Парсинг успешно завершен!';
        }catch (\Exception $exception){
            return "Ошибка {$exception->getMessage()}";
        }
    }
}
