<?php

namespace App\Core\Services;

use phpseclib\Net\SCP as SCPClient;
use phpseclib\Net\SSH2;

class SCP implements ISecureCommunicator
{
    private $scpClient;

    public function __construct()
    {
        $ssh = new SSH2(env("REMOTE_HOST"));
        $ssh->login(env("REMOTE_USER"), env("REMOTE_PASSWORD"));

        $this->scpClient = new SCPClient($ssh);
    }
    
    public function getFileInMemory($serverFile)
    {
        return $this->scpClient->get($serverFile);
    }
}