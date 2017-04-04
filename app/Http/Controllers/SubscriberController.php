<?php

namespace App\Http\Controllers;

use App\Core\Factories\FileParserFactory;
use Illuminate\Http\Request;
use App\Core\Services\FTP;
use App\Core\Services\CSVParser;
use App\Subscriber;

class SubscriberController extends Controller
{
    public function importSubscribers()
    {
        return view('subscribers.import');
    }

    public function store(Request $request)
    {
        $fileName = $request->input('file_name');
        $fileType = $request->input('file_type');

        $ftpClient = new FTP();
        $data = $ftpClient->getFileInMemory($fileName.".".$fileType);
        
        //parse file contents into array
        $fileParser = FileParserFactory::createParser($fileType);
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
