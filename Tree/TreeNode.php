<?php

include_once __DIR__ . "/ITreeNode.php";

class TreeNode implements ITreeNode
{
    protected mixed $value;
    protected ?ITreeNode $parent;
    protected array $children;

    public function __construct(mixed $value, ?ITreeNode $parent)
    {
        $this->value = $value;
        $this->parent = $parent;
        $this->children = [];

    }

    public function addChild(ITreeNode $child): void
    {
        array_push($this->children, $child);
    }

    public function getLevel(): int
    {
        $level = 0;

        $parent = $this->parent;
        while($parent) {
            $level += 1;
            $parent = $parent->parent;
        }

        return $level;
    }

    public function printTree(): void
    {
        $spaces = str_repeat("--", $this->getLevel());
        if ($this->getLevel()) {
            $spaces .= "|_";
        }
        echo "{$spaces}{$this->value}\n";
        if (count($this->children)) {
            foreach($this->children as $child) {
                $child->printTree();
            }
        }
    }
}