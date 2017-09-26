<?php

$handler = fopen('test_cases.txt', 'r');

while ($line = fgets($handler)) {

    $lineArray = explode(' ', $line);

    for ($i = 1; $i <= $lineArray[2]; $i++) {

        if ($i % $lineArray[0] == 0 && $i % $lineArray[1] == 0)
            echo 'FB ';
        elseif ($i % $lineArray[0] == 0)
            echo 'F ';
        elseif ($i % $lineArray[1] == 0)
            echo 'B ';
        else
            echo "{$i} ";

    }

    echo "\n";

}
