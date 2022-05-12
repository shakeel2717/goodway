<?php

namespace App\Console\Commands;

use App\Models\admin;
use App\Models\plan;
use App\Models\user;
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
        user::create([
            'fname' => 'Shakeel',
            'lname' => 'Ahmad',
            'username' => 'shakeel2717',
            'email' => 'shakeel2717@gmail.com',
            'password' => 'asdfasdf',
        ]);

        $task = new wallet();
        $task->user_id = 1;
        $task->type = "Bank";
        $task->number = "23132124654";
        $task->note = "Shakeel Account";
        $task->whatsapp = '03037702717';
        $task->save();


        user::create([
            'fname' => 'Basharat',
            'lname' => 'Ali',
            'username' => 'basharat604',
            'email' => 'basharat604@gmail.com',
            'refer' => 'shakeel2717',
            'password' => 'asdfasdf',
        ]);

        $task = new wallet();
        $task->user_id = 2;
        $task->type = "Bank";
        $task->number = "23132124654";
        $task->note = "Basharat Account";
        $task->whatsapp = '03006558604';
        $task->save();


        user::create([
            'fname' => 'Ali',
            'lname' => 'Raza',
            'username' => 'ali2717',
            'email' => 'ali2717@gmail.com',
            'refer' => 'shakeel2717',
            'password' => 'asdfasdf',
        ]);


        $task = new wallet();
        $task->user_id = 3;
        $task->type = "Bank";
        $task->number = "23132124654";
        $task->note = "Basharat Account";
        $task->whatsapp = '03006558604';
        $task->save();


        user::create([
            'fname' => 'Raheel',
            'lname' => 'Anwar',
            'username' => 'raheel2717',
            'email' => 'raheel2717@gmail.com',
            'refer' => 'Default',
            'password' => 'asdfasdf',
        ]);

        $task = new wallet();
        $task->user_id = 4;
        $task->type = "Bank";
        $task->number = "23132124654";
        $task->note = "Basharat Account";
        $task->whatsapp = '03006558604';
        $task->save();


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
