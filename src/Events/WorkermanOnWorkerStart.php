<?php

namespace Aoeng\Laravel\Workerman\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class WorkermanOnWorkerStart
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $businessWorker;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($businessWorker)
    {
        $this->businessWorker = $businessWorker;
    }



}
