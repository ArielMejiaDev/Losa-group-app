<?php namespace App\Listeners;

use App\Mail\SyncCompletedNotificationMail;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendSyncCompletedNotificationListener 
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $admins = User::where('role', '=', 'admin')->get()->each(function($admin){
            Mail::to( $admin->email )->queue(new SyncCompletedNotificationMail());
        });
    }
}
