<?php

namespace Aoeng\Laravel\Workerman;

use GatewayWorker\BusinessWorker;
use GatewayWorker\Gateway;
use GatewayWorker\Register;
use Illuminate\Console\Command;
use Workerman\Worker;

class WorkermanCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'workerman {action?} {--d}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start a Workerman server.';

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
     */
    public function handle()
    {
        global $argv;
        $action = $this->argument('action');

        $argv[0] = 'wk';
        $argv[1] = $action ?? 'start';
        $argv[2] = $this->option('d') ? '-d' : '';

        $this->start();
    }

    private function start()
    {
        $this->startGateWay();
        $this->startBusinessWorker();
        $this->startRegister();
        Worker::runAll();
    }


    private function startGateWay()
    {
        $gateway = new Gateway(config('workerman.gateway.protocol') . '://' . config('workerman.gateway.ip') . ':' . config('workerman.gateway.port'), config('workerman.gateway.content'));
        $gateway->name = config('workerman.gateway.name');
        $gateway->count = config('workerman.gateway.count');
        $gateway->lanIp = config('workerman.gateway.lanIp');
        $gateway->startPort = config('workerman.gateway.startPort');
        $gateway->pingInterval = 50;
        $gateway->pingNotResponseLimit = 1;
        $gateway->pingData = '';
        $gateway->registerAddress = config('workerman.gateway.registerAddress');

        config('workerman.gateway.ssl', false) && $gateway->transport = 'ssl';
    }

    private function startBusinessWorker()
    {
        $worker = new BusinessWorker();
        $worker->name = config('workerman.worker.name');
        $worker->count = config('workerman.worker.count');
        $worker->registerAddress = config('workerman.worker.registerAddress');
        $worker->eventHandler = WorkermanEvent::class;
    }

    private function startRegister()
    {
        new Register('text://' . config('workerman.register.ip') . ':' . config('workerman.register.port'));
    }

}
