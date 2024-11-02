<?php

interface ITreeNode
{
    public function __construct(mixed $value, ?ITreeNode $parent);
    public function addChild(ITreeNode $child): void;
    public function getLevel(): int;
    public function printTree(): void;
}