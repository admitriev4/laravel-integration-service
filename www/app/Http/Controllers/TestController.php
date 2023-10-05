<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Currency;
use Illuminate\Http\Request;
use App\Services\Integrations\integrateCBR;
use App\Services\Integrations\integrateApiLayer;

class TestController extends Controller
{

   /* public function test(integrateApiLayer $integrateApiLayer) {
        //$data = $integrateApiLayer->getCurrencies();
        $data = $integrateApiLayer->getCources();
        var_dump($data);
    }*/
}
