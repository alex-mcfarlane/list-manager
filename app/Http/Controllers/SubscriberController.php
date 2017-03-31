<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Core\Services\FTP;
use App\Core\Services\CSVParser;
use App\Subscriber;

class SubscriberController extends Controller
{
    public function bulkImport()
    {
        $ftpClient = new FTP();
        $data = $ftpClient->getFileInMemory("Book1.csv");
        
        //parse file contents into array
        $fileParser = new CSVParser();
        $subscribedArr = $fileParser->parse($data);
        
        foreach($subscribedArr as $subscriber) {
            $subscriberModel = Subscriber::newSubscriber(
                $subscriber['First Name'],
                $subscriber['Last Name'],
                $subscriber['Email'],
                $subscriber['Region']
            );
        }
    }
}
