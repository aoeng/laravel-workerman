## Workerman 的Laravel 扩展

### 安装

```bash 
composer require aoeng/laravel-workerman

php artisan vendor:publish --tag=workerman
```


### 使用

- 本扩展是以事件的形式处理Workerman的各种消息 具体可查看 [laravel事件系统](https://learnku.com/docs/laravel/9.x/events)

- 配置文件：`config/workerman.php`

- 可用事件
```php
Aoeng\Laravel\Workerman\Events\WorkermanOnWorkerStart::class
Aoeng\Laravel\Workerman\Events\WorkermanOnConnect::class
Aoeng\Laravel\Workerman\Events\WorkermanOnWebSocketConnect::class
Aoeng\Laravel\Workerman\Events\WorkermanOnMessage::class
Aoeng\Laravel\Workerman\Events\WorkermanOnClose::class
Aoeng\Laravel\Workerman\Events\WorkermanOnWorkerStop::class
```

- 监听器参考
```php 
namespace App\Listeners;

use Aoeng\Laravel\Workerman\Events\WorkermanOnMessage;
use Aoeng\Laravel\Workerman\Facades\Gateway;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class HandleSocketMessage
{
    /**
     * Handle the event.
     *
     * @param WorkermanOnMessage $event
     * @return void
     */
    public function handle(WorkermanOnMessage $event)
    {
        info('测试', [$event->message]);
        Gateway::sendToCurrentClient('你说的对');
    }
}


```
- 注意 laravel事件默认禁用自动发现可通过以下方式开启或者进行手动绑定
```php
// Providers/EventServiceProvider.php
public function shouldDiscoverEvents()
{
    return true;
} 

```

- 注意每次修改完成后请重启workerman服务

- 启动服务
```bash
php artisan workerman start|stop|restart|reload|status [--d]
```

- `Gateway`laravel Facade 具体可查看 [Workerman官方文档](https://www.workerman.net/doc/gateway-worker/lib-gateway-functions.html)
```php 
//例如 
 Aoeng\Laravel\Workerman\Facades\Gateway::isUidOnline($uid);
```

- 前端链接请每30s发送一个心跳包

 
