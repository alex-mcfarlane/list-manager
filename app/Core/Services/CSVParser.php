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
        $header = $this->convertKeys(str_getcsv(array_shift($lines)));

        for($i=0; $i < count($lines)-1; $i++) {
            $returnArr[] = array_combine($header, str_getcsv($lines[$i]));
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

    private function convertKeys($keys)
    {
        $convertedKeys = [];
        $hash = [
            "customer_id" => ["Customer ID"],
            "first_name" => ["First Name"],
            "last_name" => ["Last Name"],
            "email" => ["Email"],
            "region" => ["Region"],
            "company" => ["Company"],
        ];

        foreach($keys as $key)
        {
            $match = '';

            foreach($hash as $column => $options) {
                if(in_array($key, $options)) {
                    $match = $column;
                    break;
                }
            }

            if(!empty($match)) {
                $convertedKeys[] = $match;
            }
            else{
                $convertedKeys[] = $key;
            }

        }

        return $convertedKeys;
    }
}
