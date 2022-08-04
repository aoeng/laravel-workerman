<?php

namespace Aoeng\Laravel\Workerman\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class WorkermanOnConnect
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $clientId;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($clientId)
    {
        $this->clientId = $clientId;
    }



}
