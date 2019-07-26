<?php

namespace Chunhei2008\Hyperf\Validation\Contracts\Validation;


use Chunhei2008\Hyperf\Validation\Contracts\Support\MessageProvider;
use Chunhei2008\Hyperf\Validation\Support\MessageBag;

interface Validator extends MessageProvider
{
    /**
     * Run the validator's rules against its data.
     *
     * @return array
     */
    public function validate();

    /**
     * Get the attributes and values that were validated.
     *
     * @return array
     */
    public function validated();

    /**
     * Determine if the data fails the validation rules.
     *
     * @return bool
     */
    public function fails();

    /**
     * Get the failed validation rules.
     *
     * @return array
     */
    public function failed();

    /**
     * Add conditions to a given field based on a Closure.
     *
     * @param  string|array  $attribute
     * @param  string|array  $rules
     * @param  callable  $callback
     * @return $this
     */
    public function sometimes($attribute, $rules, callable $callback);

    /**
     * Add an after validation callback.
     *
     * @param  callable|string  $callback
     * @return $this
     */
    public function after($callback);

    /**
     * Get all of the validation error messages.
     *
     * @return MessageBag
     */
    public function errors();
}
