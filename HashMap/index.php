<?php

include_once "./ArrayHashMap.php";

// Example usage of the ArrayHashMap
$hashMap = new ArrayHashMap(10);
$hashMap->put("name", "John");
$hashMap->put("age", 33);
$hashMap->put("city", "New York");
var_dump($hashMap->getItems());

echo "Name: " . $hashMap->get("name") . "\n";

$hashMap->delete("city");
var_dump($hashMap->getItems());