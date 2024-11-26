<?php

/**
 * @task
 * 
 * nyc_weather.csv contains new york city weather for first few days in the month of January. Write a program that can answer following,
 *      1. What was the average temperature in first week of Jan
 *      2. What was the maximum temperature in first 10 days of Jan
 */

 include_once __DIR__."/../ArrayHashMap.php";

function readCsvFile(): ArrayHashMap 
{
    // open file for reading
    $handle = fopen(__DIR__."/nyc_weather.csv", "r");
    if ($handle === false) {
        die("file is not found");
    }

    // collect row
    $hashmap = new ArrayHashMap();
    while(($row = fgetcsv($handle)) !== false) {

        // skip head
        if ($row[0] == "date") {
            continue;
        }
        // put to hashmap
        $hashmap->put($row[0], $row[1]);
    }

    // return data
    fclose($handle);
    return $hashmap;
}

$hashmap = readCsvFile();

$sum = 0;
for ($i=1; $i <= 7; $i++) {
    $sum += $hashmap->get("Jan {$i}") ?? 0;
}
$average = $sum / 7;
echo "Average: {$average}\n";


$max = 0;
for ($i=1; $i <= 10; $i++) {
    $temp = $hashmap->get("Jan {$i}");
    $max = $temp > $max ? $temp : $max;
}
echo "Maximum: {$max}\n";
