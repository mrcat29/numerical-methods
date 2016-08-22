<?php

namespace MrCat\NumericalMethods;

use FormulaParser\FormulaParser;

class Calculator
{
    public static $PRECISION = 10;

    /*
     * get result
     */
    public static function resolver($expression, $data = null)
    {
        if (!is_null($data)) {
            $expression = static::expression($expression, $data);
        }

        $parser = new FormulaParser($expression, static::$PRECISION);

        return new Result($parser->getFormula(), $parser->getResult()[1]);
    }

    /*
     *  set expression
     */
    public static function expression($expression, $data)
    {
        if (is_numeric($data)) {
            $expression = str_replace('x', $data, $expression);
        }

        if (is_array($data)) {
            $var = array_keys($data);

            $expression = str_replace($var, $data, $expression);
        }

        return $expression;
    }
}
