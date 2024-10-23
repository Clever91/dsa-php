<?php

include_once "Node.php";

class LinkedList
{
    public ?Node $head = null;

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

    public function addElement(mixed $value): bool
    {
        // if it is first element, so just set a head
        if (is_null($this->head)) {
            $this->addElementToHead($value);
            return true;
        }

        // else we should find last element
        $node = $this->head;
        while ($node->next) {
            $node = $node->next;
        }

        // as a final, we can change last element
        $node->next = new Node($value, null);

        return true;
    }

    public function removeElement(mixed $value): bool
    {
        // throw exception removing value at empty liked link
        if (is_null($this->head)) {
            throw new Exception("Linked Link is empty", 100);
        }

        // if it is empty, return false
        if ($this->head->value == $value) {
            $this->head = $this->head->next;
            return true;
        }

        // find and remove element by value
        $prev = $this->head;
        $node = $this->head->next;
        while($node) {
            if ($node->value == $value) {
                $prev->next = $node->next;
                return true;
            }
            $prev = $node;
            $node = $node->next;
        }

        return false;
    }

    public function removeElementAt(int $index): bool | Exception
    {
        // throw exception invalid index
        if ($index < 0 || $index >= $this->getLength()) {
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
        $counter = 1;
        $node = $this->head;
        while($node) {
            if ($counter == $index) {
                // $ref = &$node;
                // $ref->next = $node->next?->next;
                $node->next = $node->next?->next;
                break;
            }
            $node = $node->next;
            $counter += 1;
        }

        return true;
    }

    public function getElementAt(int $index): mixed
    {
        // throw exception invalid index
        if ($index < 0 || $index >= $this->getLength()) {
            throw new Exception("The index is invalid", 100);
        }

        // throw exception getting value empty liked link
        if (is_null($this->head)) {
            throw new Exception("Linked Link is empty", 100);
        }

        // return head
        if ($index == 0) {
            return $this->head->value;
        }

        // find and return element at index
        $counter = 1;
        $node = $this->head;
        while($node) {
            if ($counter == $index) {
                return $node->next?->value;
            }
            $node = $node->next;
            $counter += 1;
        }

        return null;
    }

    public function addElementAt(int $index, mixed $value): bool | Exception
    {
        // throw exception invalid index
        if ($index < 0 || $index > $this->getLength()) {
            throw new Exception("The index is invalid", 100);
        }

        // checking if it is empty, add element to ehad
        if (is_null($this->head) || $index == 0) {
            $this->addElementToHead($value);
            return true;
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
                    return true;
                }
                $counter += 1;
                $node = $node->next;
            }
        }

        return false;
    }

    public function addElementAfterValue(mixed $afterValue, mixed $value): bool
    {
        // throw exception removing value at empty liked link
        if (is_null($this->head)) {
            throw new Exception("Linked Link is empty", 100);
        }
        
        // find and add element 
        $node = $this->head;
        while($node) {
            if ($node->value == $afterValue) {
                $ref = &$node;
                $ref->next = new Node($value, $node->next);
                return true;
            }
            $node = $node->next;
        }

        return false;
    }

    public function removeElementAfterValue(mixed $afterValue): bool
    {
        // throw exception removing value at empty liked link
        if (is_null($this->head)) {
            throw new Exception("Linked Link is empty", 100);
        }

        // find and remove value
        $node = $this->head;
        while($node) {
            if ($node->value == $afterValue) {
                $ref = &$node;
                $ref->next = $node->next?->next;
                return true;
            }
            $node = $node->next;
        }

        return false;
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
