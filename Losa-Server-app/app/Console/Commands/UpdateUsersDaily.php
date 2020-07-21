<?php

namespace App\Console\Commands;

use App\Events\UpdateUsersEvent;
use App\User;
use Illuminate\Console\Command;

class UpdateUsersDaily extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'It Updates any user with the column crm_status as pending';

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
        if ($this->existsPendingUsers()) {
            event( new UpdateUsersEvent() );
            return $this->info('Users Updated Successfully!');
        }
        return $this->info('All Users are updated');
    }

    public function existsPendingUsers()
    {
        return User::withTrashed()->where('crm_status', 'pending')->count() > 0;
    }
}
