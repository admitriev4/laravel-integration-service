<?php

namespace App\Console\Commands;

use App\Services\IntegrationsService;
use Illuminate\Console\Command;


class startSync extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:startSync {service}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Starts sync';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $serviceName = $this->argument('service');
        IntegrationsService::sync($serviceName);
    }
}
