<?php

/**
 * Task: Write a function in python that can reverse a string using stack data structure. Use Stack class from the tutorial.
 * @example reverse_string("We will conquere COVID-19") should return "91-DIVOC ereuqnoc lliw eW"
 */

include_once "../ArrayStack.php";
// include_once "../LinkedStack.php";

function reverseString(string $string): string
{
    $stack = new ArrayStack();
    foreach(str_split($string) as $st) {
        $stack->push($st);
    }

    $reverseString = "";
    while(!$stack->isEmpty()) {
        $reverseString .= $stack->pop();
    }

    return $reverseString;
}

echo reverseString("Assalomu aleykuym") . "\n";
echo reverseString("We will conquere COVID-19") . "\n";