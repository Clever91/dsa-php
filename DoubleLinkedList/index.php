<?php

include_once "libs.php";

// ~~~~~~~~~ Example 1.0 ~~~~~~~~~
$link = new DoubleLinkList();
$link->addNodeAtEnd(10);
echo $link->printForward() . "\n";
$link->addNodeAtEnd(11);
$link->addNodeAtEnd(12);
echo $link->printForward() . "\n";
var_dump($link->getLastNode());
echo $link->printBackward() . "\n";