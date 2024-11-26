<?php

include_once "IStack.php";
include_once "../LinkedList/LinkedList.php";

class LinkedStack implements IStack
{
    private LinkedList $link;

    public function __construct()
    {
        $this->link = new LinkedList();
    }

    public function push(mixed $value): void
    {
        $this->link->addElement($value);
    }

    public function pop(): mixed
    {
        if ($this->isEmpty()) {
            throw new ValueError("Stack is empty", 100);
        }

        $lastIndex = $this->length() - 1;
        $value = $this->link->getElementAt($lastIndex);
        $this->link->removeElementAt($lastIndex);
        return $value;
    }

    public function peek(): mixed
    {
        if ($this->isEmpty()) {
            return null;
        }

        $lastIndex = $this->length() - 1;
        return $this->link->getElementAt($lastIndex);
    }

    public function isEmpty(): bool
    {
        return $this->length() == 0;
    }

    public function length(): int
    {
        return $this->link->getLength();
    }

    
    public function display(): string
    {
        return $this->link->returnAsString();
    }
}