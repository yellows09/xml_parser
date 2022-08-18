<?php

namespace App\Services;

class ValidatingFile
{
    public static function validatePath(?string $path)
    {
        if ((mime_content_type($path) != 'text/xml') || filesize($path) >= 1048576000) {
            return 1;
        } else {
            return 0;
        }
    }
}
