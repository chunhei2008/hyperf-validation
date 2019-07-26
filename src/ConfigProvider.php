<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */

namespace Chunhei2008\Hyperf\Validation;


use Chunhei2008\Hyperf\Validation\HttpServer\ServerFactory;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => [
                \Chunhei2008\Hyperf\Validation\Contracts\Validation\Validator::class => \Chunhei2008\Hyperf\Validation\ValidatorFactory::class,
                \Chunhei2008\Hyperf\Validation\PresenceVerifierInterface::class      => \Chunhei2008\Hyperf\Validation\DatabasePresenceVerifierFactory::class,
                \Chunhei2008\Hyperf\Validation\Contracts\Validation\Factory::class   => \Chunhei2008\Hyperf\Validation\ValidatorFactory::class,
                \Hyperf\HttpServer\Server::class                                     => ServerFactory::class,
            ],
            'scan'         => [
                'paths' => [
                    __DIR__,
                ],
            ],
        ];
    }
}
