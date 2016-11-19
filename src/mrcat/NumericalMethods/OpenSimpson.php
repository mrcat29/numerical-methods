<?php
namespace MrCat\NumericalMethods;

class OpenSimpson extends Model
{

    /*
     * params methods static
     */
    static $rules = [
        'a' => [
            'numeric',
            'required'
        ],
        'b' => [
            'numeric',
            'required',
        ],
        'n' => [
            'numeric',
            'required',
            'par',
        ],
        'functionX' => [
            'required',
            'string'
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

            $value = 1;

            if ($i != 0) {

                if ($i % 2 == 0) {
                    $value = 2;
                } else {
                    $value = 4;
                }
            }

            array_push($var, $value);
        }

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
            return new static($data['a'], $data['b'], $data['n'], $data['functionX']);
        }
    }
}
