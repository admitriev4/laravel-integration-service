<?php
namespace App\Services\Integrations;

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
        $result = json_decode($request->getBody()->getContents());
        foreach ($result->quotes as $key => $value) {
            $currencies[$key] = $key;
        }
        return $currencies;
    }

    public function getCources($base = 'RUB', $arSymbols = array('USD')) {
        $cources = array();
        $symbols = implode(',', $arSymbols);
        $request = $this->httpClient->get("https://api.apilayer.com/currency_data/live?base=".$base,array("headers" => array('apikey' => $this->apiKey)));
        $result = json_decode($request->getBody()->getContents());
        foreach ($result->quotes as $key => $value) {
            $cources[$key] = $value;
        }
        return $cources;
    }

}
