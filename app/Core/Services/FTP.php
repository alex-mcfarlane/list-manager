<?php

namespace App\Core\Services;

class FTP {
    private $connId;
    private $username;
    private $password;
    
    public function __construct()
    {
        $this->connId = ftp_connect(env("FTP_HOST"));
        $this->username = env("FTP_USERNAME");
        $this->password = env("FTP_PASSWORD");
        
        $this->login();
    }
    
    private function login()
    {
        ftp_login($this->connId, $this->username, $this->password);
        ftp_pasv($this->connId, true);
    }
    public function getFileInMemory($serverFile)
    {
        ob_start();
        $result = $this->getFile("php://output", $serverFile);
        $data = ob_get_contents();
        ob_end_clean();
        
        return $data;
    }
    
    public function getFileAsLocalFile($serverFile)
    {
        
    }
    
    private function getFile($localDest, $serverFile)
    {
        return ftp_get($this->connId, $localDest, $serverFile, FTP_BINARY);
    }
}
