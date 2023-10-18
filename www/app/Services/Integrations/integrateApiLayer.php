<?php
namespace App\Services\Integrations;

use Illuminate\Support\Facades\Log;

class integrateApiLayer {
    protected $apiKey = 'PJFgdhicReT7d5Cl10NMmIQSSVEd0V7A';
    protected $httpClient;
    public $serviceName = "ApiLayer";


    public function __construct()
    {
        $this->httpClient = new \GuzzleHttp\Client();
    }
    public function getCurrencies() {
        $request = $this->httpClient->get("https://api.apilayer.com/currency_data/list",array("headers" => array('apikey' => $this->apiKey)));
        Log::log(serialize($request));
        $result = json_decode($request->getBody()->getContents());
        foreach ($result->currencies as $key => $value) {
            $currencies[$key] = $key;
        }

        return $currencies;
    }

    public function getCources() {
        $cources = array();
        $request = $this->httpClient->get("https://api.apilayer.com/currency_data/live?source=RUB",array("headers" => array('apikey' => $this->apiKey)));
        Log::log(serialize($request));
        $result = json_decode($request->getBody()->getContents());
        foreach ($result->quotes as $key => $value) {
            $k = str_replace('RUB', '', $key);
            $cources[$k] = $value;
        }
        return $cources;
    }

}
