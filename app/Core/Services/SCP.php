<?php

namespace App\Core\Services;

use phpseclib\Net\SCP as SCPClient;
use phpseclib\Net\SSH2;

class SCP implements ISecureCommunicator
{
    private $scpClient;

    public function __construct()
    {
        $ssh = new SSH2(env("SSH_HOST"));

        if(!$ssh->login(env("SSH_USERNAME"), env("SSH_PASSWORD"))) {
            throw new \Exception("Invalid login credentials");
        }

        $this->scpClient = new SCPClient($ssh);
    }
    
    public function getFileInMemory($serverFile)
    {
        return $this->scpClient->get($serverFile);
    }

    public function getFileAsLocalFile($serverFile, $localFile)
    {
        $this->scpClient->get($serverFile, $localFile);

        return $localFile;
    }
}