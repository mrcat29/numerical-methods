<?php

namespace MrCat\NumericalMethods;

class Validator
{
    protected $value;

    protected $isNumeric = false;

    protected $isString = false;

    protected $isPar = false;

    public function __construct($value)
    {
        $this->value = $value;
    }

    /*
     * is required
     */
    public function required()
    {
        if (!isset($this->value) or is_null($this->value)) {
            throw new \Exception('the value required');
        }

        if ($this->isNumeric && $this->value == 0) {
            throw new \Exception('the value has to be different from 0');
        }

        if ($this->isString && $this->value == '') {
            throw new \Exception('the value is required');
        }

        return $this;
    }

    /*
     * is numeric
     */
    public function numeric()
    {
        if ($this->isString) {
            throw new \Exception('can not be of type string');
        }

        if (!is_numeric($this->value)) {
            throw new \Exception('no numerical type was found');
        }

        $this->isNumeric = true;

        return $this;
    }

    /*
     * is string
     */
    public function string()
    {
        if ($this->isNumeric) {
            throw new \Exception('can not be of type numeric');
        }

        if (!is_string($this->value)) {
            throw new \Exception('no string type was found');
        }

        $this->isString = true;

        return $this;
    }

    /*
    * is par
    */
    public function par()
    {
        if ($this->isNumeric) {
            if ($this->value % 2 != 0) {
                throw new \Exception('the number must be even');
            }
        } else {
            throw new \Exception('no numerical type was found');
        }

        $this->isPar = true;

        return $this;
    }

    /*
     * generate validator
     */
    public static function get($value)
    {
        return new static($value);
    }

    /*
     *  execute validator
     */
    public static function make($data, $rules)
    {
        foreach ($rules as $value => $key) {
            if (!array_key_exists($value, $data)) {
                throw new \Exception("Failed to find the variable '{$value}'");
            }

            $validator = self::get($data[$value]);

            foreach ($key as $rule) {
                $validator->{$rule}();
            }
        }

        return true;
    }
}
