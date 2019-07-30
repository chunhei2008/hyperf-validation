<?php

namespace Chunhei2008\Hyperf\Validation\Tests\fixtures;

use Hyperf\Utils\Contracts\Arrayable;

class Values implements Arrayable
{
    public function toArray()
    {
        return [1, 2, 3, 4];
    }
}
