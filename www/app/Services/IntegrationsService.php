<?php

namespace App\Services;


use App\Factories\SyncFactory;
use App\Models\Currency;
use Illuminate\Support\Facades\Queue;

class IntegrationsService
{

    public static function sync($service = null)
    {
        if($service != null) {
            $serviceObject = SyncFactory::getSyncService($service);
            if($serviceObject != null) {
                Queue::push(new startSyncJob($serviceObject));
            }
        } else {
            $services = SyncFactory::getAvailableSync();
            foreach ($services as $key => $service) {
                $serviceObject = new $service;
                Queue::push(new startSyncJob($serviceObject));
            }
        }
    }

    public static function updateCurrency($service = null) {
        if($service != null) {
            $serviceObject = SyncFactory::getSyncService($service);
            $data = $serviceObject->getCurrencies();
            foreach ($data as $key=>$value) {
                Currency::add($key, $value);
            }
        } else {
            $services = SyncFactory::getAvailableSync();
            foreach ($services as $key => $service) {
                $serviceObject = new $service;
                $data = $serviceObject->getCurrencies();
                foreach ($data as $key=>$value) {
                    Currency::add($key, $value);
                }
            }
        }

    }

}
