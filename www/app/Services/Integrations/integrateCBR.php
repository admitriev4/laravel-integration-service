<?php

namespace App\Services\Integrations;

class integrateCBR implements ServicesInterface
{
    protected $cources;
    protected $httpClient;
    public $serviceName = "CBR";

    public function __construct()
    {
        $this->httpClient = new \GuzzleHttp\Client();
        $request = $this->httpClient->get("https://www.cbr-xml-daily.ru/daily_json.js");
        $this->cources = json_decode($request->getBody()->getContents());

    }

    public function getCource($valute = "USD") {
        return $this->cources->Valute->$valute->Value;
    }

    public function getCurrencies() {
        $currencies = array();
        foreach ($this->cources->Valute as $key => $value) {
            if(!key_exists($key, $currencies)) {
                $currencies[$key] = $value->Name;
            }

        }
        return $currencies;
    }

    public function getCources() {
        $cources = array();
        foreach ($this->cources->Valute as $key => $value) {
            if(!key_exists($key,$cources)) {
                $cources[$key] = $value->Value;
            }
        }
        return $cources;
    }

}
