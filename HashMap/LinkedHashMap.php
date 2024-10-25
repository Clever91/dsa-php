<?php

include_once "./IHashMap.php";
include_once "./HashMapNode.php";

class LinkedHashMap implements IHashMap
{
    private array $data;
    private const MAX_SIZE = 10;

    public function __construct()
    {
        $this->data = array_fill(0, self::MAX_SIZE, null);
    }

    public function getHashIndex(mixed $key): int
    {
        if (empty(trim($key))) {
            throw new UnexpectedValueException("Invalid key", 100);
        }

        return array_sum(array_map(function($char) { return ord($char); }, str_split($key))) % self::MAX_SIZE;
    }

    public function put(mixed $key, mixed $value): void 
    {
        $index = $this->getHashIndex($key);
        $node = $this->data[$index];

        // if it is empty
        if (is_null($node)) {
            $this->data[$index] = new HashMapNode($key, $value, null); 
        } else {
            // find last node or set value to equal for key
            while($node) {
                // change value in equal key
                if ($node->key == $key) {
                    $node->value = $value;
                    return;
                }
                // finding last node
                if (is_null($node->next)) {
                    break;
                }
                $node = $node->next;
            }

            // set next node
            $node->next = new HashMapNode($key,$value, null);
        }
    }
    
    public function get(mixed $key): mixed
    {
        $index = $this->getHashIndex($key);
        $node = $this->data[$index];

        // if it is empty
        if (is_null($node)) {
            return null;
        }

        // finding equal node for key
        while($node) {
            if ($node->key == $key) {
                return $node->value;
            }
            $node = $node->next;
        }

        return null;
    }

    public function delete(mixed $key): void 
    {
        $index = $this->getHashIndex($key);
        $node = $this->data[$index];
        $refNode = &$this->data[$index];

        // if it is empty
        if (is_null($node)) {
            return;
        }

        // checking head and delete it
        if ($node->key == $key) {
            $refNode = $node->next;
            return;
        }

        // finding node and delete it
        while($node->next) {
            $next = $node->next;
            if ($next->key == $key) {
                $node->next = $next->next;
                return;
            }
            $node = $node->next;
        }
    }

    public function getItems(): array
    {
        return $this->data;
    }
}