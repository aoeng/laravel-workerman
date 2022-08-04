<?php

namespace Aoeng\Laravel\Workerman\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class WorkermanOnMessage
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $clientId;
    public $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($clientId, $message)
    {
        $this->clientId = $clientId;
        $this->message = $message;
    }


}
