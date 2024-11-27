<?php

function measureExecutionTime(callable $functionName, ...$args)
{
    $startTime = microtime(true);
    $result = $functionName(...$args);
    $endTime = microtime(true);
    $diffTime = ($endTime - $startTime) * 1000;

    echo "Result is {$result} and {$functionName}'s execution time is {$diffTime} s.\n";
}