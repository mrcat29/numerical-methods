<?php

namespace MrCat\NumericalMethods;

class Trapezoidal extends Model
{
    /*
     * params methods static
     */
    public static $rules = [
        'a' => [
            'numeric',
            'required',
        ],
        'b' => [
            'numeric',
            'required',
        ],
        'n' => [
            'numeric',
            'required',
        ],
        'functionX' => [
            'required',
            'string',
        ],
    ];

    /*
     * formule for calculate delta
     */
    protected $formuleI = '(delta * sum ) / 2';

    public function handle()
    {
        $count = count($this->getCalculateFunction()) - 1;

        $var = [];

        for ($i = 0; $i <= $count; $i++) {
            array_push($var, 2);
        }

        //set current array
        $var[0] = 1;
        //set end array
        $var[$count] = 1;

        return $var;
    }
}
