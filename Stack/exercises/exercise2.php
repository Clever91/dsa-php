<?php

/**
 * Task: Write a function in python that checks if paranthesis in the string are balanced or not. Possible parantheses are "{}',"()" or "[]". 
 * Use Stack class from the tutorial.
 * @example
 * is_balanced("({a+b})")     --> True
 * is_balanced("))((a+b}{")   --> False
 * is_balanced("((a+b))")     --> True
 * is_balanced("))")          --> False
 * is_balanced("[a+b]*(x+2y)*{gg+kk}") --> True
 */

include_once "../ArrayStack.php";
// include_once "../LinkedStack.php";

function returnOpenParanthese($closeParanthese):string
{
    switch ($closeParanthese) {
        case ')':
            return "(";
        case ']':
            return "[";
        case '}':
            return "{";
    }

    return "";
}

function is_balanced(string $value): bool
{
    $openParantheses = ["{", "(", "["];
    $closeParantheses = ["}", ")", "]"];

    // to collect only parantheses
    $stack = new ArrayStack();
    foreach(str_split($value) as $str) {
        if (in_array($str, $openParantheses)) {
            $stack->push($str);
        } else if (in_array($str, $closeParantheses)) {
            if ($stack->isEmpty()) {
                return false;
            } else if ($stack->pop() != returnOpenParanthese($str)) {
                return false;
            }
        }
    }

    return $stack->isEmpty() ? true : false;
}

var_dump(is_balanced("({a+b})")) . "\n";
var_dump(is_balanced("))((a+b}{")) . "\n";
var_dump(is_balanced("((a+b))")) . "\n";
var_dump(is_balanced("))")) . "\n";
var_dump(is_balanced("]][[")) . "\n";
var_dump(is_balanced("([{}]){()}[]")) . "\n";
var_dump(is_balanced("([{}]))({()}[]")) . "\n";
var_dump(is_balanced("[a+b]*(x+2y)*{gg+kk}")) . "\n";