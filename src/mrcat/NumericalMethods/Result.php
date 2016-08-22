<?php

namespace MrCat\NumericalMethods;

class Result
{
    protected $equation;

    protected $result;

    public function __construct($equation, $result)
    {
        $this->equation = $equation;
        $this->result = $result;
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @return mixed
     */
    public function getEquation()
    {
        return $this->equation;
    }
}
