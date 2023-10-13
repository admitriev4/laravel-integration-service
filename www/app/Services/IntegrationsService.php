<?php

namespace App\Services;


use App\Factories\SyncFactory;
use App\Models\Currency;
use App\Jobs\startSyncJob;
use Illuminate\Support\Facades\Queue;

class IntegrationsService
{

    public static function sync($service = null)
    {
        if($service != null) {
                Queue::push(new startSyncJob($service));
        } else {
            $services = SyncFactory::getAvailableSync();
            foreach ($services as $key => $service) {
                Queue::push(new startSyncJob($key));
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
