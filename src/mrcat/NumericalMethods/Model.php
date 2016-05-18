<?php

namespace MrCat\NumericalMethods;

abstract class Model
{

    /*
     * var init for calculate delta
     */
    protected $a;

    /*
     * var end for calculate delta
     */
    protected $b;

    /*
     * var control for calculate delta
     */
    protected $n;

    /*
     * equation
     */
    protected $equation;

    /*
     * data for calculate delta
     */
    protected $data = [];

    /*
     * formule for calculate delta
     */
    static $FORMULE_DELTA = "( b - a ) / n";

    /*
     * formule for calculate delta
     */
    protected $formuleI;

    /*
     *  multiply for equation
     */
    abstract public function handle();

    public function __construct($a = 0, $b = 0, $n = 0, $equation = 0)
    {
        $this->a = $a;
        $this->b = $b;
        $this->n = $n;
        $this->equation = $equation;
    }

    /**
     * var for calculate delta
     * @return array
     */
    protected function data()
    {
        return [
            'a' => $this->a,
            'b' => $this->b,
            'n' => $this->n,
        ];
    }

    /*
     * params methods static
     */
    static $rules = [];

    /**
     * calculate delta
     * @return mixed
     */
    public function getDelta()
    {
        return Calculator::resolver(self::$FORMULE_DELTA, $this->data());
    }


    /**
     * calculate x
     * @return array
     */
    public function getX()
    {
        $calculate = $this->a;

        $x = [];

        $i = 0;

        while ($calculate <= $this->b) {

            $delta = $this->getDelta()->getResult();

            if ($i == 0) {
                $delta = 0;
            }

            if ($calculate == $this->b or (round($calculate, 0, PHP_ROUND_HALF_UP)) == $this->b) {
                break;
            }

            $equation = "{$calculate} + {$delta}";

            $calculate += $delta;

            $x[$i] = [
                'equation' => $equation,
                'result' => $calculate
            ];

            $i++;
        }

        return $x;
    }

    /**
     * solved equation
     * @return array
     */
    public function getCalculateFunction()
    {
        $solvedEquation = [];

        foreach ($this->getX() as $key => $value) {

            $solved = Calculator::resolver($this->equation, $value["result"]);

            $solvedEquation[$key] = [
                'equation' => $solved->getEquation(),
                'result' => $solved->getResult()
            ];

        }

        return $solvedEquation;
    }

    /**
     * multiply array dependency method
     *
     * @return array
     */
    public function getMethodNumerical()
    {
        $multiplyArray = [];

        $i = 0;

        foreach ($this->getCalculateFunction() as $key => $value) {

            $parserArrayMultiply = $this->handle()[$key];

            $equation = "{$value["result"]} * {$parserArrayMultiply}";

            $solved = Calculator::resolver($equation);

            $multiplyArray[$key] = [
                'equation' => $solved->getEquation(),
                'result' => $solved->getResult()
            ];

        }

        return $multiplyArray;
    }

    /*
     * sum all
     */
    public function getSum()
    {
        $result = [];

        foreach ($this->getMethodNumerical() as $key) {
            array_push($result, $key["result"]);
        }

        return array_sum($result);
    }

    /*
     * calculate i
     */
    public function getI()
    {
        $data = [
            'delta' => $this->getDelta()->getResult(),
            'sum' => $this->getSum()
        ];

        return Calculator::resolver($this->formuleI, $data);
    }

    /*
     * generate make
     */
    public static function make(array $data = [])
    {
        if (Validator::make($data, static::$rules)) {
            return new static($data['a'], $data['b'], $data['n'], $data['functionX']);
        }
    }
}
