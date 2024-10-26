<?php

include_once __DIR__."/IHashMap.php";

class ArrayHashMap implements IHashMap
{
    private array $data;
    private const MAX_SIZE = 10;

    public function __construct()
    {
        $this->data = array_fill(0, self::MAX_SIZE, []);
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
        if (!empty($this->data[$index])) {
            foreach($this->data[$index] as &$pair) {
                if ($pair[0] == $key) {
                    $pair[1] = $value;
                    return;
                }
            }
        }
        $this->data[$index][] = [$key, $value];
    }
    
    public function get(mixed $key): mixed
    {
        $index = $this->getHashIndex($key);
        if (!empty($this->data[$index])) {
            foreach($this->data[$index] as $pair) {
                if ($pair[0] == $key) {
                    return $pair[1];
                }
            }
        }
        return null;
    }

    public function delete(mixed $key): void 
    {
        $index = $this->getHashIndex($key);
        if (!empty($this->data[$index])) {
            foreach($this->data[$index] as $i => $pair) {
                if ($pair[0] == $key) {
                    unset($this->data[$index][$i]);
                    return;
                }
            }
        }
    }

    public function getItems(): array
    {
        return $this->data;
    }
}