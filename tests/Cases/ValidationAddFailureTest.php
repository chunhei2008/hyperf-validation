<?php

namespace Chunhei2008\HyperfTest\Validation\Cases;

use PHPUnit\Framework\TestCase;
use Chunhei2008\Hyperf\Validation\Validator;

class ValidationAddFailureTest extends TestCase
{
    /**
     * Making Validator using ValidationValidatorTest.
     *
     * @return Validator
     */
    public function makeValidator()
    {
        $mainTest = new ValidationValidatorTest;
        $trans = $mainTest->getIlluminateArrayTranslator();

        return new Validator($trans, ['foo' => ['bar' => ['baz' => '']]], ['foo.bar.baz' => 'sometimes|required']);
    }

    public function testAddFailureExists()
    {
        $validator = $this->makeValidator();
        $method_name = 'addFailure';
        $this->assertTrue(method_exists($validator, $method_name));
        $this->assertTrue(is_callable([$validator, $method_name]));
    }

    public function testAddFailureIsFunctional()
    {
        $attribute = 'Eugene';
        $validator = $this->makeValidator();
        $validator->addFailure($attribute, 'not_in');
        $messages = json_decode($validator->messages());
        $this->assertSame($messages->{'foo.bar.baz'}[0], 'validation.required', 'initial data in messages is lost');
        $this->assertSame($messages->{$attribute}[0], 'validation.not_in', 'new data in messages was not added');
    }
}
