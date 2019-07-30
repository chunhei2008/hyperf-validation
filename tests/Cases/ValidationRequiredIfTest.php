<?php

namespace Chunhei2008\Hyperf\Validation\Tests\Cases;

use PHPUnit\Framework\TestCase;
use Chunhei2008\Hyperf\Validation\Rules\RequiredIf;

class ValidationRequiredIfTest extends TestCase
{
    public function testItClousureReturnsFormatsAStringVersionOfTheRule()
    {
        $rule = new RequiredIf(function () {
            return true;
        });

        $this->assertEquals('required', (string) $rule);

        $rule = new RequiredIf(function () {
            return false;
        });

        $this->assertEquals('', (string) $rule);

        $rule = new RequiredIf(true);

        $this->assertEquals('required', (string) $rule);

        $rule = new RequiredIf(false);

        $this->assertEquals('', (string) $rule);
    }
}
