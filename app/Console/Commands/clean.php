<?php

namespace App\Console\Commands;

use App\Models\admin;
use App\Models\plan;
use App\Models\User;
use App\Models\wallet;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class clean extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:clean';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        Artisan::call('migrate:fresh');


        admin::create([
            'username' => 'test',
            'password' => 'test',
            'refer' => '10',
        ]);

        plan::create([
            'name' => 'Plan',
            'price' => 5000,
            'profit' => 7500,
            'total' => 7500,
            'duration' => 7,
        ]);

        plan::create([
            'name' => 'Plan',
            'price' => 10000,
            'profit' => 15000,
            'total' => 15000,
            'duration' => 7,
        ]);


        plan::create([
            'name' => 'Plan',
            'price' => 20000,
            'profit' => 30000,
            'total' => 30000,
            'duration' => 7,
        ]);

        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        return $this->info('Test Account Setup Successfully');
    }
}
