<?php

include_once __DIR__ . "/ITreeNode.php";

class TreeNode implements ITreeNode
{
    protected mixed $value;
    protected ?ITreeNode $parent;
    protected array $children;

    public function __construct(mixed $value, ?ITreeNode $parent = null)
    {
        $this->value = $value;
        $this->parent = $parent;
        $this->children = [];

    }

    public function addChild(ITreeNode $child): void
    {
        if (is_null($child->getParent())) {
            $child->parent = $this;
        }
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
        $level = $this->getLevel();
        $spaces = str_repeat("--", $level);
        if ($level != 0) {
            $spaces .= "|_";
        }
        echo "{$spaces}{$this->value}\n";
        if (count($this->children)) {
            foreach($this->children as $child) {
                $child->printTree();
            }
        }
    }

    public function getParent(): ITreeNode | null
    {
        return $this->parent;
    }
}