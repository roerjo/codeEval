<?php

$file = fopen($argv[1], 'r');

while (($line = fgets($file)) !== false) {

    // Break up the 'virus' and 'anti-virus' into an array
    $splitLine = explode("|", $line);

    $hexArray = explode(" ", trim($splitLine[0]));

    $binArray = explode(" ", trim($splitLine[1]));

    // Initialize the sums (codeEval didn't like when I tried
    // to set the binary sum = 0b0 for some reason
    $sumHex = 0x0;

    $sumBin = bindec(0);

    foreach ($hexArray as $hex) {

        $sumHex += hexdec($hex);

    }

    foreach ($binArray as $bin) {

        $sumBin += bindec($bin);

    }

    if ($sumBin >= $sumHex)
        echo "True\n";
    else
        echo "False\n";

} 

fclose($file);
