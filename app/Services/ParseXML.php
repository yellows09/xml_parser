<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ParseXML
{
    public static function makeRequest($file)
    {
        try {
            Http::get(env('APP_URL')."/api?path_to_xml={$file}");
            return 'Парсинг успешно завершен!';
        }catch (\Exception $exception){
            return "Ошибка {$exception->getMessage()}";
        }
    }
}
