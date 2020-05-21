<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
//Para uso de mail
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;

class RegisteredUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'registered:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envio de correo a usuarios registrados';

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
     * @return mixed
     */
    public function handle()
    {
        // para ver el número de usuarios registrados hoy 
        $totalUsers = \DB::table('users')
            ->whereRaw('Date(created_at) = CURDATE()')
            ->count();
        //Envío de correo
        Mail::to('carlorregod@gmail.com')->send(new SendMailable($totalUsers));
    }
}
