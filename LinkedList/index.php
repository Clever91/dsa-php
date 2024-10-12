<?php

include_once "libs.php";

$data = [12, 23, 32, 12, 2, 43, 45];

$link = new LinkedList($data);

// add element to linked list
$link->addElementToEnd("Last element 8");
$link->addElementToEnd("Last element 9");

// print
echo $link->returnAsString() . "\n";
echo $link->getLength() . "\n";
var_dump($link->removeByIndex(3));
echo $link->returnAsString() . "\n";
echo $link->getLength() . "\n";