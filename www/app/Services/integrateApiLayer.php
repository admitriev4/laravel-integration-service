<?php
namespace App\Services;

class integrateApiLayer {
    protected $apiKey = 'PJFgdhicReT7d5Cl10NMmIQSSVEd0V7A';
    protected $httpClient;


    public function __construct()
    {
        $this->httpClient = new \GuzzleHttp\Client();
    }
    public function getCurrencies() {
        $request = $this->httpClient->get("https://api.apilayer.com/currency_data/list",array("headers" => array('apikey' => $this->apiKey)));
        $Currencies = json_decode($request->getBody()->getContents());
        return $Currencies;
    }

    public function getCources($base = 'RUB', $arSymbols = array('USD')) {
        $symbols = implode(',', $arSymbols);
        $request = $this->httpClient->get("https://api.apilayer.com/currency_data/live?base=".$base.'&symbols='.$symbols,array("headers" => array('apikey' => $this->apiKey)));
        $Cources = json_decode($request->getBody()->getContents());
        return $Cources;
    }

}
