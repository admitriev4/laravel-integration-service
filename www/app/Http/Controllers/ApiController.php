<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Currency;

class ApiController extends Controller
{
    public function test() {
        echo "Попытка достучаться до api прошла успешно";
    }

    public function getCurrencies() {
        $currencies = Currency::getList();
        $currencies = json_encode($currencies);
        return $currencies;
    }

    public function getCource($service, $date = null) {
        $cources = Course::getListService($service, $date);
        $cources = json_encode($cources);
        return $cources;
    }

    public function getCources() {
        $cources = Course::getList();
        $cources = json_encode($cources);
        return $cources;
    }
}
