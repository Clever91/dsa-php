<?php

include_once "IStack.php";

class ArrayStack implements IStack
{
    private array $data;

    public function __construct()
    {
        $this->data = [];
    }

    public function push(mixed $value): void
    {
        array_push($this->data, $value);
    }

    public function pop(): mixed
    {
        if ($this->isEmpty()) {
            throw new ValueError("Stack is empty", 100);
        }

        return array_pop($this->data);
    }

    public function peek(): mixed
    {
        if ($this->isEmpty()) {
            return null;
        }

        return $this->data[$this->length() - 1];
    }

    public function isEmpty(): bool
    {
        return $this->length() == 0;
    }

    public function length(): int
    {
        return count($this->data);
    }

    
    public function display(): string
    {
        $result = "";
        foreach($this->data as $value) {
            $result .= "{$value} -> ";
        }
        return $result;
    }
}