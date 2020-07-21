<?php

namespace App\Console\Commands;

use App\Mail\InviteMail;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:invitation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'It sends email admin invitation template just for testing';

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
        $user = User::first();
        Mail::to($user->email)->send(new InviteMail($user));
    }
}
