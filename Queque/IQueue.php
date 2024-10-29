<?php

interface IQueque 
{
    public function enqueue(mixed $value): void;
    public function dequeue(): mixed;
    public function isEmpty(): bool;
    public function getLength(): int;
}