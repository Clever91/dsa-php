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
            $this->addElementToEnd($value);
        }
    }

    public function addElementToEnd(mixed $value): void
    {
        // if it is first element, so just set a head
        if (is_null($this->head)) {
            $this->head = new Node($value, null);
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

    public function removeByIndex(int $index): bool | Exception
    {
        if ($index < 0 || $index > $this->getLength()) {
            throw new Exception("The index is invalid", 100);
        }

        if (is_null($this->head)) {
            throw new Exception("Linked Link is empty", 100);
        }

        if ($index == 0) {
            $this->head = $this->head->next;
            return true;
        }

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

    public function getLength(): int
    {
        $counter = 0;

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
            $result .= ",{$node->value}";
        }

        return $result;
    }
}
