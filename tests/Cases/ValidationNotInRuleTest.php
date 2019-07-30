<?php

namespace Chunhei2008\Hyperf\Validation\Tests\Cases;

use Chunhei2008\Hyperf\Validation\Rule;
use PHPUnit\Framework\TestCase;
use Chunhei2008\Hyperf\Validation\Rules\NotIn;

class ValidationNotInRuleTest extends TestCase
{
    public function testItCorrectlyFormatsAStringVersionOfTheRule()
    {
        $rule = new NotIn(['Laravel', 'Framework', 'PHP']);

        $this->assertEquals('not_in:"Laravel","Framework","PHP"', (string) $rule);

        $rule = Rule::notIn([1, 2, 3, 4]);

        $this->assertEquals('not_in:"1","2","3","4"', (string) $rule);

        $rule = Rule::notIn(collect([1, 2, 3, 4]));

        $this->assertEquals('not_in:"1","2","3","4"', (string) $rule);

        $rule = Rule::notIn('1', '2', '3', '4');

        $this->assertEquals('not_in:"1","2","3","4"', (string) $rule);
    }
}
