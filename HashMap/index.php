<?php

include_once "libs.php";

// Example usage of the custom HashMap
$hashMap = new HashMap();

$hashMap->put("name", "John");
$hashMap->put("age", 30);
$hashMap->put("city", "New York");

echo "Name: " . $hashMap->get("name") . "\n";  // Outputs: Name: John
echo "Age: " . $hashMap->get("age") . "\n";    // Outputs: Age: 30

$hashMap->put("age", 31);  // Update the value for "age"
echo "Updated Age: " . $hashMap->get("age") . "\n";  // Outputs: Updated Age: 31

$hashMap->remove("city");  // Remove the "city" key-value pair
echo "City after deletion: " . $hashMap->get("city") . "\n";  // Outputs: City after deletion: (null)

$hashMap->display();  // Displays the contents of the HashMap