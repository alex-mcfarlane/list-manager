<?php

namespace App\Core\Services;


interface ISecureCommunicator
{
    public function getFileInMemory($serverFile);

    public function getFileAsLocalFile($serverFile, $localFile);
}