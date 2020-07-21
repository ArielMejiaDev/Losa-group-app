<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class StoreImageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $request;
    public $model;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($request, $model)
    {
        $this->request = $request;
        $this->model = $model;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $image = $this->request->image->store('uploads', 'public');

        $this->model->update([ 'image' => $image ]);

        ResizeImageJob::dispatchNow( $image );
    }
}
