<?php

interface IBinarySeachTreeNode
{
    public function addChild(mixed $value): void;
    public function search(mixed $value): bool;
    public function inOrderTraversal(): array;
}