<?php

interface IHashMap
{
    public function __construct();
    public function getHashIndex(mixed $key): int;
    public function put(mixed $key, mixed $value): void;
    public function get(mixed $key): mixed;
    public function delete(mixed $key): void;
    public function getItems(): array;
}