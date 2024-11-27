<?php

function bubbleSort(&$list, $key)
{
    if (empty($key) || empty($list)) {
        throw new Exception("Required field is invalid", 100);
    }

    $size = count($list) - 1;

    for ($i=0; $i < $size; $i++) {
        $swapped = false; 
        for ($j=0; $j < $size - $i; $j++) { 
            if ($list[$j][$key] > $list[$j+1][$key]) {
                $tmp = $list[$j][$key];
                $list[$j][$key] = $list[$j+1][$key];
                $list[$j+1][$key] = $tmp;
                $swapped = true;
            }
        }
        // if list is sorted, stop loop
        if (!$swapped) {
            break;
        }
    }
}


$list = [
    [ 'name' => 'mona',   'transaction_amount' => 1000, 'device' => 'iphone-10'],
    [ 'name' => 'dhaval', 'transaction_amount' => 400,  'device' => 'google pixel'],
    [ 'name' => 'kathy',  'transaction_amount' => 200,  'device' => 'vivo'],
    [ 'name' => 'aamir',  'transaction_amount' => 800,  'device' => 'iphone-8'],
];
bubbleSort($list, "transaction_amount");
print_r($list);