<?php

namespace App\Services;

class integrateCBR
{
    protected $cources;
    protected $httpClient;

    public function __construct()
    {
        $this->httpClient = new \GuzzleHttp\Client();
        $request = $this->httpClient->get("https://www.cbr-xml-daily.ru/daily_json.js");
        $this->cources = json_decode($request->getBody()->getContents());

    }

    public function getCource($valute = "USD") {
        return $this->cources->Valute->$valute->Value;
    }

}
