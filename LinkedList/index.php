<?php

include_once "libs.php";

$data = [12, 23, 32, 12, 2, 43, 45];

$link = new LinkedList($data);

// add element to linked list
$link->addElement("Last element 8");
$link->addElement("Last element 9");

// print
echo $link->returnAsString() . "\n";
echo $link->getLength() . "\n";

if ($link->removeElementAt(index: 3)) {
    echo "deleted element index by 3 \n";
} else {
    echo "Not deleted element index by 3 \n";
}
echo $link->returnAsString() . "\n";
echo $link->getLength() . "\n";

echo $link->addElementAt(3, "Five");
echo $link->addElementAt(3, "Four");
echo $link->returnAsString() . "\n";
echo $link->getLength() . "\n";