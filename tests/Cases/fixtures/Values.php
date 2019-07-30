<?php

namespace Chunhei2008\Hyperf\Validation\Tests\Cases\fixtures;

use Hyperf\Utils\Contracts\Arrayable;

class Values implements Arrayable
{
    public function toArray(): array
    {
        return [1, 2, 3, 4];
    }
}
