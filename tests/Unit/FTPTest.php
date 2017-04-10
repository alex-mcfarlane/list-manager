<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Core\Services\SFTP;

class FTPTest extends TestCase
{
    /**
     * @test
     */
    public function save_remote_file_to_local()
    {
        $sftp = new SFTP();

        $localFile = $sftp->getFileAsLocalFile("Book1.csv", "Local.csv");

        // TODO: Assert
    }

    /**
     * @test
     */
    public function get_remote_file_in_memory()
    {
        $sftp = new SFTP();

        $localFile = $sftp->getFileInMemory("Book1.csv");

        // TODO: Assert
    }
}
