<?php

namespace App\Core\Services;

use phpseclib\Net\SFTP as Net_SFTP;

/*
 * Wrapper for the PHPSECLIB SFTP class
 */

class SFTP implements ISecureCommunicator
{
    private $sftp;

    public function __construct()
    {
        $this->sftp = new Net_SFTP(env("REMOTE_HOST"));

        if (!$this->sftp->login(env("REMOTE_USERNAME"), env("REMOTE_PASSWORD"))) {
            throw new \Exception("Unable to login to remote server");
        }
    }

    public function getFileInMemory($serverFile)
    {
        return $this->sftp->get($serverFile);
    }

    public function getFileAsLocalFile($serverFile, $localFile)
    {
        $this->sftp->get($serverFile, $localFile);

        return $localFile;
    }
}