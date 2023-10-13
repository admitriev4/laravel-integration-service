<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Currency;
use App\Services\IntegrationsService;
use Carbon\Carbon;
use App\Services\Integrations\integrateCBR;
use App\Services\Integrations\integrateApiLayer;

class TestController extends Controller
{

       public function test() {
           IntegrationsService::sync();
       }
}
