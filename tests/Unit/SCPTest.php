<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Core\Services\SCP;

class SCPTest extends TestCase
{
    /**
     * @test
     */
    public function can_get_a_remote_file()
    {
        $scp = new SCP();

        $csvFile = $scp->getFileInMemory("Book1.csv");
    }

    /**
     * @test
     */
    public function can_get_a_remote_file_as_local_file()
    {
        $scp = new SCP();

        $csvFile = $scp->getFileAsLocalFile("Book1.csv", "Local.csv");
    }
}