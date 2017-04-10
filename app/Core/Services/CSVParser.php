<?php

namespace App\Core\Services;

class CSVParser implements IFileParser
{
    protected $fields;

    public function parseFileString($fileContents)
    {
        $lines = explode(PHP_EOL, $fileContents);
        $returnArr = [];

        // get column header
        $header = str_getcsv(array_shift($lines));

        for($i=0; $i < count($lines)-1; $i++) {
            $returnArr[] = array_combine(str_getcsv($lines[$i]), $header);
        }
        
        return $returnArr;
    }

    public function parseFile($file)
    {
        $returnArr = [];

        if($handle = fopen($file, "r")) {
            $header = fgetcsv($handle);

            while($data = fgetcsv($handle)) {
                $returnArr[] = array_combine($header, $data);
            }
        }

        fclose($handle);

        return $returnArr;
    }
}
