<?php

include_once "./IHashMap.php";

class ArrayHashMap implements IHashMap
{
    private array $data;
    private int $size = 0;

    public function __construct(int $size)
    {
        $this->size = $size;
        $this->data = array_fill(0, $size, null);
    }

    public function getHashIndex(mixed $key): int
    {
        if (empty(trim($key))) {
            throw new UnexpectedValueException("Invalid key", 100);
        }

        return array_sum(array_map(function($char) { return ord($char); }, str_split($key))) % $this->size;
    }

    public function put(mixed $key, mixed $value): void 
    {
        $index = $this->getHashIndex($key);
        $this->data[$index] = $value;
    }
    
    public function get(mixed $key): mixed
    {
        $index = $this->getHashIndex($key);
        return $this->data[$index];
    }

    public function delete(mixed $key): void 
    {
        $index = $this->getHashIndex($key);
        $this->data[$index] = null;
    }

    public function getItems(): array
    {
        return $this->data;
    }
}