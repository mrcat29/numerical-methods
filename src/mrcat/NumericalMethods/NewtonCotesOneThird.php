<?php
namespace MrCat\NumericalMethods;

class NewtonCotesOneThird extends Model
{

    /*
     * params methods static
     */
    static $rules = [
        'a' => [
            'numeric',
        ],
        'b' => [
            'numeric',
        ],
        'functionX' => [
            'required',
        ]
    ];

    /*
     * formule for calculate delta
     */
    protected $formuleI = "( delta * sum ) / 3";

    /*
     * logic method
     */
    public function handle()
    {
        $count = count($this->getCalculateFunction()) - 1;

        $var = [];

        for ($i = 0; $i <= $count; $i++) {

            array_push($var, 4);
        }

        //set current array
        $var[0] = 1;
        //set end array
        $var[$count] = 1;

        return $var;
    }

    /*
    * generate make
    */
    public static function make(array $data = [])
    {
        if (Validator::make($data, static::$rules)) {
            return new static($data['a'], $data['b'], 2, $data['functionX']);
        }
    }
}
