<?php

namespace Chunhei2008\Hyperf\Validation\Contracts;

interface ValidatesWhenResolved
{
    /**
     * Validate the given class instance.
     *
     * @return void
     */
    public function validateResolved();
}
