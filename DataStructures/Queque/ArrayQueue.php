<?php

include_once __DIR__."/IQueue.php";

class ArrayQueue implements IQueque
{
    private ?array $buffer;

    public function __construct()
    {
        $this->buffer = [];
    }

    public function enqueue(mixed $value): void
    {
        array_unshift($this->buffer, $value);
    }

    public function dequeue(): mixed
    {
        return array_pop($this->buffer);
    }

    public function isEmpty(): bool
    {
        return $this->getLength() == 0;
    }

    public function getLength(): int
    {
        return count($this->buffer);
    }

    public function display(): string
    {
        $str = "";
        foreach($this->buffer as $val) {
            $str .= "{$val} -> ";
        }
        return $str;
    }
}