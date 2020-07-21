<?php

namespace App\Providers;

use App\Events\SyncEvent;
use App\Events\UpdateUsersEvent;
use App\Events\UploadImageEvent;
use App\Listeners\CreateOrUpdateUsersByCrmListener;
use App\Listeners\FillGeneralContactsTableListener;
use App\Listeners\ResizeImageListener;
use App\Listeners\SendSyncCompletedNotificationListener;
use App\Listeners\UpdatePendingUsersInCRMListener;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        SyncEvent::class => [
            CreateOrUpdateUsersByCrmListener::class,
            SendSyncCompletedNotificationListener::class
        ],
        UpdateUsersEvent::class => [
            UpdatePendingUsersInCRMListener::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
