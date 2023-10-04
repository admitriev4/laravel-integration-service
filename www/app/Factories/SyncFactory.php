<?php

namespace App\Factories;


use App\Services\Integrations\integrateApiLayer;
use App\Services\Integrations\integrateCBR;

class SyncFactory
{

    /**
     * @var string[]
     */
    protected static $availableSync = [
        'CBR' => integrateCBR::class,
        'ApiLayer' => integrateApiLayer::class,
    ];

    /**
     * @param string $service
     * @return mixed|null
     */
    public static function getSyncService(string $service)
    {
        if (!array_key_exists($service, self::$availableSync)) {
            return null;
        }
        $serviceObject = self::$availableSync[$service];
        return (new $serviceObject());
    }

    public static function getAvailableSync() {
        return self::$availableSync;
    }
}
