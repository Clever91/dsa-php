<?php

include_once "ArrayStack.php";

$stack = new ArrayStack();
$stack->push(12);
echo "push 12 value \n";
$stack->push(13);
echo "push 13 value \n";
$stack->push(14);
echo "push 14 value \n";
echo $stack->display() . "\n";
echo "pop last value: " . $stack->pop() . "\n";
echo $stack->display() . "\n";
echo "peek last value: " . $stack->peek() . "\n";
echo $stack->display() . "\n";
$stack->push(15);
echo "push 15 value \n";
echo $stack->display() . "\n";