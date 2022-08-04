<?php

namespace Aoeng\Laravel\Workerman;

use Aoeng\Laravel\Workerman\Events\WorkermanOnClose;
use Aoeng\Laravel\Workerman\Events\WorkermanOnConnect;
use Aoeng\Laravel\Workerman\Events\WorkermanOnMessage;
use Aoeng\Laravel\Workerman\Events\WorkermanOnWebSocketConnect;
use Aoeng\Laravel\Workerman\Events\WorkermanOnWorkerStart;
use Aoeng\Laravel\Workerman\Events\WorkermanOnWorkerStop;

class WorkermanEvent
{
    public static function onWorkerStart($businessWorker)
    {
        config('workerman.debug', true) && info('【Workerman】 onWorkerStart');

        event(new WorkermanOnWorkerStart($businessWorker));
    }

    public static function onConnect($client_id)
    {
        config('workerman.debug', true) && info('【Workerman】 onConnect:' . $client_id);

        event(new WorkermanOnConnect($client_id));
    }

    public static function onWebSocketConnect($client_id, $data)
    {
        config('workerman.debug', true) && info('【Workerman】 onWebSocketConnect:' . $client_id, [$data]);

        event(new WorkermanOnWebSocketConnect($client_id, $data));
    }

    public static function onMessage($client_id, $message)
    {
        config('workerman.debug', true) && info('【Workerman】 onMessage:' . $client_id, [$message]);

        event(new WorkermanOnMessage($client_id, $message));
    }

    public static function onClose($client_id)
    {
        config('workerman.debug', true) && info('【Workerman】 onClose:' . $client_id);

        event(new WorkermanOnClose($client_id));
    }

    public static function onWorkerStop($businessWorker)
    {
        config('workerman.debug', true) && info('【Workerman】 onWorkerStop');

        event(new WorkermanOnWorkerStop($businessWorker));
    }
}
