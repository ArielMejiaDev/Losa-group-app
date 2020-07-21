<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SetAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'set:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates an admin user for the app';

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
        $username = $this->ask('Please write a username for your admin account');
        $email = $this->ask('Please write an email for your admin account');
        $password = $this->ask('Please write a password for your admin account');

        if ($this->confirm("Are you sure to set your admin account with username: $username email: $email")) {

            $this->validateFields($username, $email, $password);

            User::create([
                'name'      => $username,
                'email'     => $email, 
                'password'  => bcrypt($password),
                'role'      => 'admin'
            ]);

            return $this->info("Your account is ready please login with your credentials in: " . config('app.url') );
        }
        return $this->error('Admin account cannot be set!');
    }

    public function validateFields($username, $email, $password)
    {
        $this->validateNoAdminExists();
        $this->validateFieldsRequired($username, $email, $password);
        $this->validateEmail($email);
        $this->validatePasswordLength($password);
        $this->validateUniqueUser($email);
    }

    public function validateNoAdminExists()
    {
        if (User::whereRole('admin')->exists()) {
            $this->error('Admin users already exists');
            die();
        }
    }

    public function validateFieldsRequired ($username, $email, $password)
    {
        if ( empty($username) || empty($email) || empty($password)) {
            $this->error('all fields are required');
            die();
        }
    }

    public function validateEmail($email)
    {
        if (! Str::contains($email, '@')) {
            $this->error('Invalid email format!');
            die();
        }
    }

    public function validatePasswordLength($password)
    {
        if (strlen($password) < 8) {
            $this->error('Password length must be 8+');
            die();
        }
    }

    public function validateUniqueUser($email)
    {
        if (DB::table('users')->whereEmail($email)->exists()) {
            $this->error('User already exists!');
            die();
        }
    }
}
