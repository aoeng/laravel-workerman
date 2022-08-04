<?php

namespace Aoeng\Laravel\Workerman\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class WorkermanOnWebSocketConnect
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $clientId;
    public $data;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($clientId, $data)
    {
        $this->clientId = $clientId;
        $this->data = $data;
    }



}
