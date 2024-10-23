<?php

interface IStack
{
    public function push(mixed $value): void;
    public function pop(): mixed;
    public function peek(): mixed;
    public function isEmpty(): bool;
    public function length(): int;
    public function display(): string;
}

class Stack implements IStack
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
            throw new Exception("Stack is empty", 100);
        }

        return array_pop($this->data);
    }

    public function peek(): mixed
    {
        return $this->data[0];
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
