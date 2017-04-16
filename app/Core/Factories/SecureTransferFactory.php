<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 2017-04-16
 * Time: 10:46 AM
 */

namespace App\Core\Factories;

use App\Core\Services\SCP;
use App\Core\Services\SFTP;

class SecureTransferFactory
{
    static public function createTransferClient($type)
    {
        switch($type) {
            case 'sftp':
                return new SFTP();
            case 'scp':
                return new SCP();
            default:
                throw new \InvalidArgumentException('Unknown format given');
        }
    }
}