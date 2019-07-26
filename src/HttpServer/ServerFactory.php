<?php
/**
 * ServerFactory.php
 *
 * Author: wangyi <chunhei2008@qq.com>
 *
 * Date:   2019-07-26 19:16
 * Copyright: (C) 2014, Guangzhou YIDEJIA Network Technology Co., Ltd.
 */

namespace Chunhei2008\Hyperf\Validation\HttpServer;


use Hyperf\Dispatcher\HttpDispatcher;
use Hyperf\HttpServer\Server;
use Psr\Container\ContainerInterface;

class ServerFactory
{
    protected $coreMiddleware = CoreMiddleware::class;

    public function __invoke(ContainerInterface $container): Server
    {
        return new Server('http', $this->coreMiddleware, $container, $container->get(HttpDispatcher::class));
    }
}