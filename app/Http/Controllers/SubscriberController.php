<?php

namespace App\Http\Controllers;

use App\Subscriber;
use Illuminate\Http\Request;
use App\Core\Services\FTP;

class SubscriberController extends Controller
{
    public function bulkImport()
    {
        $ftpClient = new FTP();
        $data = $ftpClient->getFileInMemory("Book1.csv");
        
        //parse file contents into array
    }
}
