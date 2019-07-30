<?php

namespace Chunhei2008\Hyperf\Validation\Tests\Cases;

use PHPUnit\Framework\TestCase;
use Chunhei2008\Hyperf\Validation\Rule;
use Chunhei2008\Hyperf\Validation\Rules\In;
use Chunhei2008\Hyperf\Validation\Tests\Cases\fixtures\Values;



class ValidationInRuleTest extends TestCase
{
    public function testItCorrectlyFormatsAStringVersionOfTheRule()
    {
        $rule = new In(['Laravel', 'Framework', 'PHP']);

        $this->assertEquals('in:"Laravel","Framework","PHP"', (string) $rule);

        $rule = new In(['Life, the Universe and Everything', 'this is a "quote"']);

        $this->assertEquals('in:"Life, the Universe and Everything","this is a ""quote"""', (string) $rule);

        $rule = new In(["a,b\nc,d"]);

        $this->assertEquals("in:\"a,b\nc,d\"", (string) $rule);

        $rule = Rule::in([1, 2, 3, 4]);

        $this->assertEquals('in:"1","2","3","4"', (string) $rule);

        $rule = Rule::in(collect([1, 2, 3, 4]));

        $this->assertEquals('in:"1","2","3","4"', (string) $rule);

        $rule = Rule::in(new Values);

        $this->assertEquals('in:"1","2","3","4"', (string) $rule);

        $rule = Rule::in('1', '2', '3', '4');

        $this->assertEquals('in:"1","2","3","4"', (string) $rule);
    }
}
