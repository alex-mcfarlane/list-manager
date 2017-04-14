<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Core\Services\CSVParser;
use App\Core\Services\SFTP;

class CSVParserTest extends TestCase
{
    /**
     * @test
     */
    public function can_parse_csv_file()
    {
        $parser = new CSVParser();
        $sftp = new SFTP();

        $localFile = $sftp->getFileAsLocalFile("Book1.csv", "Local.csv");

        $parsedFile = $parser->parseFile($localFile);
    }

    /**
     * @test
     */
    public function can_parse_csv_string()
    {
        $parser = new CSVParser();
        $sftp = new SFTP();

        $fileString = $sftp->getFileInMemory("Book1.csv", "Local.csv");

        $parsedFile = $parser->parseFileString($fileString);
    }
}
