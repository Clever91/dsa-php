<?php

include_once "libs.php";

// ~~~~~~~~~~ Example 1.0 ~~~~~~~~~~
// $data = [1, 2, 3, 4, 5];
// $link = new LinkedList($data);
// echo $link->getLength() . "\n";
// echo $link->returnAsString() . "\n";

// ~~~~~~~~~~ Example 1.1 ~~~~~~~~~~
// $link = new LinkedList([]);
// if ($link->addElement(1)) {
//     echo "Added \n";
// } else {
//     echo "Not added \n";
// }
// $link->addElement(2);
// $link->addElement(3);
// $link->addElement(4);
// echo $link->returnAsString() . "\n";

// ~~~~~~~~~~ Example 1.2 (BUG) ~~~~~~~~~~
// $data = [1, 2, 3, 4, 5];
// $link = new LinkedList($data);
// echo $link->returnAsString() . "\n";
// if ($link->removeElement(3)) {
//     echo "Removed \n";
// } else {
//     echo "Not removed \n";
// }
// echo $link->returnAsString() . "\n";

// ~~~~~~~~~~ Example 1.3 ~~~~~~~~~~
// $data = [1, 2, 3, 4, 5];
// $link = new LinkedList($data);
// echo $link->returnAsString() . "\n";
// if ($link->removeElementAt(2)) {
//     echo "Removed \n";
// } else {
//     echo "Not removed \n";
// }
// echo $link->returnAsString() . "\n";

// ~~~~~~~~~~ Example 1.4 ~~~~~~~~~~
// $data = [1, 2, 3, 4, 5];
// $link = new LinkedList($data);
// echo $link->returnAsString() . "\n";
// if ($link->addElementAt(0, 0)) {
//     echo "Added \n";
// } else {
//     echo "Not added \n";
// }
// echo $link->returnAsString() . "\n";

// ~~~~~~~~~~ Example 1.5 ~~~~~~~~~~
// $data = [1, 2, 4, 5];
// $link = new LinkedList($data);
// echo $link->returnAsString() . "\n";
// if ($link->addElementAfterValue(2, 3)) {
//     echo "Added \n";
// } else {
//     echo "Not added \n";
// }
// echo $link->returnAsString() . "\n";


// ~~~~~~~~~~ Example 1.5 ~~~~~~~~~~
// $data = [1, 2, 10, 3, 4];
// $link = new LinkedList($data);
// echo $link->returnAsString() . "\n";
// if ($link->removeElementAfterValue(afterValue: 2)) {
//     echo "Removed \n";
// } else {
//     echo "Not removed \n";
// }
// echo $link->returnAsString() . "\n";