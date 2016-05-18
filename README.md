# Methods numerical for PHP

Example
-------
```php
<?php

use MrCat\NumericalMethods\JorgeBoole;
use MrCat\NumericalMethods\Trapezoidal;
use MrCat\NumericalMethods\NewtonCotesThreeEighths;
use MrCat\NumericalMethods\NewtonCotesOneThird;
use MrCat\NumericalMethods\OpenSimpson;

    $joorgeBoole = JorgeBoole::make([
        'a' => 5,
        'b' => 20,
        'functionX' => 'sqrt( (x + 6 ) )'
    ]);

    $trapezoidal = Trapezoidal::make([
        'a' => 2,
        'b' => 10,
        'n' => 5,
        'functionX' => 'sqrt( ( x + 3 ) )'
    ]);

    $newtonCotesThreeEighths = NewtonCotesThreeEighths::make([
        'a' => 3,
        'b' => 10,
        'functionX' => 'sqrt( (x + 5 ) )'
    ]);

    $newtonCotesOneThird = NewtonCotesOneThird::make([
        'a' => 3,
        'b' => 10,
        'functionX' => 'sqrt( (x + 5 ) )'
    ]);

    $openSimpson = OpenSimpson::make([
        'a' => 3,
        'b' => 10,
        'n' => 2,
        'functionX' => 'sqrt( (x + 5 ) )'
    ]);

    //options

    // return object
    var_dump($model->getDelta()->getResult()); // (b-a) / 2  

    // return array
    var_dump($model->getX()); // ( a + delta )

    //return array
    var_dump($model->getCalculateFunction()); // replace f(x) for getX()

    //return array
    var_dump($model->getMethodNumerical()); // f(x) for logic method

    //return int
    var_dump($model->getSum()); // sum (getMethodNumerical)

    //return object
    var_dump($model->getI()); // result final
?>
```
---------
