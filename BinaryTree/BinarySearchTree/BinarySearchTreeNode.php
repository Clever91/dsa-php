<?php

include_once __DIR__ . "/IBinarySeachTreeNode.php";

class BinarySearchTreeNode implements IBinarySeachTreeNode
{
    public mixed $value;
    public ?BinarySearchTreeNode $left; 
    public ?BinarySearchTreeNode $right;

    public function __construct(mixed $value, BinarySearchTreeNode $left = null, BinarySearchTreeNode $right = null) 
    {
        $this->value = $value;
        $this->left = $left;
        $this->right = $right;
    }

    public function addChild(mixed $value): void
    {
        // if incoming value exists, don't add it
        if ($value === $this->value) {
            return;
        }

        // if incoming value is less then current value 
        if ($value < $this->value) {
            if ($this->left !== null) {
                $this->left->addChild($value);
            } 
            // if left node is null, add new node
            else {
                $this->left = new BinarySearchTreeNode($value);
            }
        }

        // if incoming value is more then current value 
        else if ($value > $this->value) {
            if ($this->right !== null) {
                $this->right->addChild($value);
            }
            // if right node is null, add new node
            else {
                $this->right = new BinarySearchTreeNode($value);
            }
        }
    }

    public function search(mixed $value): bool
    {
        // checking this node's value
        if ($value === $this->value) {
            return true;
        }

        
        // if incoming value is less then current value 
        if ($value < $this->value)  {
            // go to left node
            if ($this->left === null) {
                return false;
            } else {
                return $this->left->search($value);
            }
        }
        // if incoming value is more then current value  
        else if ($value > $this->value) {
            // go to right node
            if ($this->right === null) {
                return false;
            } else {
                return $this->right->search($value);
            }
        }

        return false;
    }

    public function inOrderTraversal(): array
    {
        $result = [];

        if ($this->left !== null) {
            $result = array_merge($result, $this->left->inOrderTraversal());
        }

        $result[] = $this->value;

        if ($this->right !== null) {
            $result = array_merge($result, $this->right->inOrderTraversal());
        }

        return $result;
    }

    public function preOrderTraversal(): array
    {
        $result = [];

        $result[] = $this->value;

        if ($this->left !== null) {
            $result = array_merge($result, $this->left->preOrderTraversal());
        }

        if ($this->right !== null) {
            $result = array_merge($result, $this->right->preOrderTraversal());
        }

        return $result;
    }
    
    public function postOrderTraversal(): array
    {
        $result = [];

        if ($this->left !== null) {
            $result = array_merge($result, $this->left->postOrderTraversal());
        }

        if ($this->right !== null) {
            $result = array_merge($result, $this->right->postOrderTraversal());
        }

        $result[] = $this->value;

        return $result;
    }

    public function findMin(): mixed
    {
        if ($this->left === null) {
            return $this->value;
        }

        return $this->left->findMin();
    }

    public function findMax(): mixed
    {
        if ($this->right === null) {
            return $this->value;
        }

        return $this->right->findMax();
    }

    public function calculateSum(): mixed
    {
        $sum = 0;

        if ($this->left !== null) {
            $sum += $this->left->calculateSum();
        }

        $sum += $this->value;

        if ($this->right !== null) {
            $sum += $this->right->calculateSum();
        }

        return $sum;
    }
}