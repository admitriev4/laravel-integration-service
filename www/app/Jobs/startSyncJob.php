<?php

namespace App\Jobs;


use App\Models\Course;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Factories\SyncFactory;


class startSyncJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $service;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($service)
    {
        $this->service = $service;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $serviceObject = SyncFactory::getSyncService($this->service);
        $result = $serviceObject->getCources();
        foreach ($result as $key => $value) {
            /*var_dump($key);
            var_dump($serviceObject->serviceName);
            var_dump($value);
            echo "<br><br><br>";*/
            Course::addOrUpdate($key, $serviceObject->serviceName, $value);
        }
    }
}
