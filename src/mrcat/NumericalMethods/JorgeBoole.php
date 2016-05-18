<?php
namespace MrCat\NumericalMethods;

class JorgeBoole extends Model
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
        'functionX' => [
            'required',
            'string'
        ]
    ];

    /*
     * formule for calculate delta
     */
    protected $formuleI = "( 2 * delta * sum ) / 45";

    /*
     * logic method
     */
    public function handle()
    {
        $count = count($this->getCalculateFunction()) - 1;

        $var = [];

        for ($i = 0; $i <= $count; $i++) {

            $value = 7;

            if ($i != 0) {

                if ($i % 2 == 0) {
                    $value = 12;
                } else {
                    $value = 32;
                }
            }

            array_push($var, $value);
        }

        //set end array
        $var[$count] = 7;

        return $var;
    }

    /*
     * generate make
     */
    public static function make(array $data = [])
    {
        if (Validator::make($data, static::$rules)) {
            return new static($data['a'], $data['b'], 4, $data['functionX']);
        }
    }

}
