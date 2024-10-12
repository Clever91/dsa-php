<?php

class Node
{
    public mixed $value;
    public mixed $next;

    public function __construct(mixed $value, mixed $next)
    {
        $this->value = $value;
        $this->next = $next;
    }
}

class LinkedList
{
    public mixed $head = null;

    public function __construct(array $data = [])
    {
        foreach($data as $value) {
            $this->addElement($value);
        }
    }

    public function addElementToHead(mixed $value): void
    {
        $this->head = new Node($value, $this->head);
    }

    public function addElement(mixed $value): void
    {
        // if it is first element, so just set a head
        if (is_null($this->head)) {
            $this->addElementToHead($value);
            return;
        }

        // else we should find last element
        $node = $this->head;
        while ($node->next) {
            $node = $node->next;
        }

        // as a final, we can change last element
        $node->next = new Node($value, null);
    }

    public function removeElementAt(int $index): bool | Exception
    {
        // throw exception invalid index
        if ($index < 0 || $index > $this->getLength()) {
            throw new Exception("The index is invalid", 100);
        }

        // throw exception adding value empty liked link
        if (is_null($this->head)) {
            throw new Exception("Linked Link is empty", 100);
        }

        // remove head
        if ($index == 0) {
            $this->head = $this->head->next;
            return true;
        }

        // find and remove element at index
        $counter = 0;
        $node = $this->head;
        while($node) {
            $counter += 1;
            if ($counter == $index) {
                $ref = &$node;
                $ref->next = $node->next->next;
                break;
            }
            $node = $node->next;
        }

        return true;
    }

    public function addElementAt(int $index, mixed $value): void
    {
        // throw exception invalid index
        if ($index < 0 || $index > $this->getLength()) {
            throw new Exception("The index is invalid", 100);
        }

        // checking if it is empty, add element to ehad
        if (is_null($this->head) || $index == 0) {
            $this->addElementToHead($value);
        }
        // else find and add element at given index 
        else {
            $counter = 1;
            $node = $this->head;
            while($node) {
                if ($counter == $index) {
                    $ref = &$node;
                    $new  = new Node($value, $node->next);
                    $ref->next = $new;
                    break;
                }
                $counter += 1;
                $node = $node->next;
            }
        }

    }

    public function getLength(): int
    {
        $counter = 0;

        // calculate langth
        $node = $this->head;
        while ($node) {
            $counter += 1;
            $node = $node->next;
        }

        return $counter;
    }

    public function returnAsString(): string
    {
        if (is_null($this->head)) {
            return "";
        }

        $node = $this->head;
        $result = "{$node->value}";
        while ($node->next) {
            $node = $node->next;
            $result .= "-> {$node->value}";
        }

        return $result;
    }
}
