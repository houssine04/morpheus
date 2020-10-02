<?php

namespace App\Converter;

class JsonConverter
{
    public static function jsonToArray(string $filepath): array
    {
        $jsonData = file_get_contents($filepath);
        return json_decode($jsonData, true);
    }
}
