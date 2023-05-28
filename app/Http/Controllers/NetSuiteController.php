<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use NetSuite\NetSuiteService;
use NetSuite\Classes\GetRequest;
use NetSuite\Classes\RecordRef;
use NetSuite\Classes\CustomerSearchBasic;
use NetSuite\Classes\SearchRequest;
use NetSuite\Classes\SearchResponse;

class NetSuiteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function lookupCustomer(Request $request)
    {
        $config = config('netsuite');
        $service = new NetSuiteService($config);
        $request = new GetRequest();
        $request->baseRef = new RecordRef();
        $request->baseRef->type = RecordType::customer;
        $request->baseRef->internalId = "2265";
        $response = $service->get($request);
        return json_encode($response);
    }

    public function getAllCustomer()
    {
        $config = config('netsuite');

        $service = new NetSuiteService($config);

        // Create a new CustomerSearchBasic object
        $search = new CustomerSearchBasic();

        // Create a new SearchRequest
        $request = new SearchRequest();
        $request->searchRecord = $search;

        // Make the search request
        $searchResponse = $service->search($request);
        dd($searchResponse);

        if (!$searchResponse->searchResult->status->isSuccess) {
            echo "SEARCH ERROR";
        } else {
            echo "SEARCH SUCCESS, records found: " . $searchResponse->searchResult->totalRecords . "\n";

            $pages = $searchResponse->searchResult->totalPages;
            for ($i = 1; $i <= $pages; $i++) {
                $records = $searchResponse->searchResult->recordList->record;

                foreach ($records as $record) {
                    echo $record->internalId . "\n";
                }

                if ($i < $pages) {
                    $searchResponse = $service->searchMoreWithId($searchResponse->searchResult->searchId, $i + 1);
                }
            }
        }
    }
}
