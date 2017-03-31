<?php

namespace App\Core\Services;

class CSVParser implements IFileParser
{
    protected $fields;

    public function parse($fileContents)
    {
        $lines = explode(PHP_EOL, $fileContents);
        
        // get column headers
        $columns = str_getcsv($lines[0]);
        // collection of user arrays
        $returnArr = [];

        for($i=1; $i < count($lines)-1; $i++) {
            $line = $lines[$i];
            
            foreach(str_getcsv($line) as $key => $value) {
                $returnArr[$i-1][$columns[$key]] = $value;
            }
        }
        
        return $returnArr;
    }
}
