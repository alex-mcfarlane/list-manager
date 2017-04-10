<?php

namespace App\Core\Services;

interface IFileParser
{
    public function parseFileString($fileContents);

    public function parseFile($file);
}
