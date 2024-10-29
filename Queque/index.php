<?php

include_once __DIR__ . "/ArrayQueue.php";

$queue = new ArrayQueue();
$queue->enqueue(10);
$queue->enqueue(11);
$queue->enqueue(12);
$queue->enqueue(13);

echo $queue->display() . "\n";
echo "deleted: {$queue->dequeue()} \n";
echo "deleted: {$queue->dequeue()} \n";
echo $queue->display() . "\n";