<?php

namespace App\Http\Controllers;

use App\Core\Factories\FileParserFactory;
use App\Core\Factories\SecureTransferFactory;
use App\Core\Services\Paginator;
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

    public function all(Request $request)
    {
        $paginator = new Paginator(Subscriber::all());
        $limit = $request->get('limit', 12);
        $page = $request->get('page') ? $request->get('page') : 0;

        $subscribers = $paginator->paginate($limit, $page)->toArray();

        return view('subscribers.all', compact('subscribers'));
    }

    public function store(Request $request)
    {
        $fileName = $request->input('file_name');
        $fileType = $request->input('file_type');
        $transferType = $request->input('transfer_type');
        
        $transferClient = SecureTransferFactory::createTransferClient($transferType);

        $data = $transferClient->getFileInMemory($fileName.".".$fileType);
        
        //parse file contents into array
        $fileParser = FileParserFactory::createParser($fileType);
        $subscribedArr = $fileParser->parseFileString($data);

        foreach($subscribedArr as $subscriber) {
            $subscriberModel = Subscriber::newSubscriber(
                $subscriber['first_name'],
                $subscriber['last_name'],
                $subscriber['email'],
                $subscriber['region']
            );
        }
    }
}
