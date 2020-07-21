<?php

namespace App\Jobs;

use App\GeneralContact;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class FillGeneralContactTableJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        
        // GeneralContact::truncate();
        // $contactsLosa = User::where('contacto_losa', '=', 1)->get();
        // foreach ($contactsLosa as $contactLosa) {
        //     $newContactLosa                 = new GeneralContact;
        //     $newContactLosa->name           = $contactLosa->name;
        //     $newContactLosa->phone          = $contactLosa->phone;
        //     $newContactLosa->email          = $contactLosa->email;
        //     $newContactLosa->save();
        // }
        
    }
}
