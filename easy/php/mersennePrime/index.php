<?php

// codeeval has a weird case for 2047 so watch out for that

// The prime number the code has values for
$computedTo = 3;

$exp = 2;
$mersennePrimes = [];

// Returns a bool after checking if passed number is prime
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
    
    // If number is less than what we have already computed,
    // then no need to calculate primes since their already 
    // stored in an array
    if ($num <= $computedTo) {

        // Used to determine how many array items to splice off
        $count = 0;
        
        // If the num is greater than the biggest mersenne prime
        // calculated, then print out all the mersenne primes
        if ($num > $key) {
           
            echo implode(', ', $mersennePrimes) . "\n";
        
        } else {

            // Loop through and find the mersenne prime that is 
            // less than the passed number, then print out all the
            // mersenne primes less than that number
            foreach ($mersennePrimes as $key=>$value) {

                if ($num <= $key) {
                
                    echo implode(', ', array_slice($mersennePrimes, 0, $count)) . "\n";
            
                    break;
                
                }

                $count++;
            }

        }

    } else {

        // Check the powers of 2 to see if mersenne prime exists
        // one number below it. If so, then add it to the array
        for ($j = pow(2,$exp); $j <= $num; $j=pow(2,++$exp)) {

            if (checkprime($j-1)) {
            
                $mersennePrimes[$j] = $j-1;
            
            }
        }
        
        echo implode(', ', $mersennePrimes) . "\n";

        // Update the computed-to number
        $computedTo = $num;
    }
}

fclose($file);
