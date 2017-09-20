<?php
//codeeval has a weird case for 2047 so watch out for that

$computedTwo = 3;
$exp = 2;
$mersennePrimes = [];

function checkPrime(int $test)
{
    $srTest = sqrt($test);

    for ($i = 2; $i <= $srTest; $i++) {

        if ($test % $i == 0) {
            
            return false;

        }

    }

    return true;
}

$file = fopen($argv[1], 'r');

while (($num = fgets($file)) !== false) {

    $num=intVal($num);
    
    if ($num <= $computedTwo) {

        $count = 0;

        foreach ($mersennePrimes as $key=>$value) {

            if ($num <= $key) {
                
                echo implode(', ', array_slice($mersennePrimes, 0, $count)) . "\n";
    
                break;
                
            }

            $count++;

        }

        if ($num > $key) {

            echo implode(', ', $mersennePrimes) . "\n";

        }

    } else {

        for ($j = pow(2,$exp); $j <= $num; $j=pow(2,++$exp)) {
            
            if (checkprime($j-1)) {

                $mersennePrimes[$j] = $j-1;

            }

        }
        
        echo implode(', ', $mersennePrimes) . "\n";
        
        $computedTwo = $num;
    }
}

fclose($file);
