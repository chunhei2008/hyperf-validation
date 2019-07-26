<?php
/**
 * CoreMiddleware.php
 *
 * Author: wangyi <chunhei2008@qq.com>
 *
 * Date:   2019-07-26 19:11
 * Copyright: (C) 2014, Guangzhou YIDEJIA Network Technology Co., Ltd.
 */

namespace Chunhei2008\Hyperf\Validation\HttpServer;


use Hyperf\HttpServer\CoreMiddleware as HttpCoreMiddleware;
use Chunhei2008\Hyperf\Validation\Contracts\Validation\ValidatesWhenResolved;

class CoreMiddleware extends HttpCoreMiddleware
{
    public function parseParameters(string $controller, string $action, array $arguments): array
    {
        $parameters = parent::parseParameters($controller, $action, $arguments);

        foreach ($parameters as $parameter) {
            if ($parameter instanceof ValidatesWhenResolved) {
                $parameter->validateResolved();
            }
        }

        return $parameters;
    }
}