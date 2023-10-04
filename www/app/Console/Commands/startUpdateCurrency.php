<?php

namespace App\Console\Commands;


use App\Factories\SyncFactory;
use App\Services\IntegrationsService;
use Illuminate\Console\Command;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Queue;

class startUpdateCurrency extends Command
{
    use SerializesModels;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:startUpdateCurrency {service}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Starts update Currrencies';

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
        IntegrationsService::updateCurrency($serviceName);
    }
}
