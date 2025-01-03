<?php

interface IBinarySeachTreeNode
{
    public function addChild(mixed $value): void;
    public function search(mixed $value): bool;
    public function inOrderTraversal(): array;
    public function preOrderTraversal(): array;
    public function postOrderTraversal(): array;
    public function delete($value);
}