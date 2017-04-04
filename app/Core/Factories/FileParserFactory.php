<?php

namespace App\Core\Factories;

use App\Core\Services\CSVParser;

class FileParserFactory
{
    static public function createParser($fileType)
    {
        $parser = new CSVParser();

        switch($fileType) {
            case "csv":
                $parser = new CSVParser();
                break;
        }

        return $parser;
    }
}