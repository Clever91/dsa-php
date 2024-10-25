<?php

include_once "./DoubleNode.php";

class DoubleLinkedList
{
    private ?DoubleNode $head = null;

    public function addNodeAtBegin($value): bool
    {
        $this->head = new DoubleNode(null, $value, $this->head);
        return true;
    }

    public function addNodeAtEnd($value): bool
    {
        // added to head if it is empty
        if (is_null($this->head)) {
            return $this->addNodeAtBegin($value);
        }

        // find last node
        $node = $this->head;
        while($node->next) {
            $node = $node->next;
        }

        // add new node 
        $node->next = new DoubleNode($node, $value, null);

        return true;
    }

    public function getLastNode(): ?DoubleNode
    {
        // if it is empty, return null
        if (is_null($this->head)) {
            return null;
        }

        // find last node
        $node = $this->head;
        while($node->next) {
            $node = $node->next;
        }

        return $node;
    }

    public function printForward(): void
    {
        // return empty string if it is empty
        if (is_null($this->head)) {
            echo "";
            return;
        }
        
        // join value of node
        $res = "";
        $node = $this->head;
        while($node) {
            $res .= "{$node->value}->";
            $node = $node->next;
        }

        echo $res;
        return;
    }

    public function printBackward(): void
    {
        // return empty string if it is empty
        if (is_null($this->head)) {
            echo "";
            return;
        }

        // collect node element
        $res = "";
        $node = $this->getLastNode();
        while($node) {
            $res .= "{$node->value}->";
            $node = $node->prev;
        }

        echo $res;
        return;
    }
}
