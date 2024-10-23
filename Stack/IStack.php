<?php

interface IStack
{
    public function push(mixed $value): void;
    public function pop(): mixed;
    public function peek(): mixed;
    public function isEmpty(): bool;
    public function length(): int;
    public function display(): string;
}