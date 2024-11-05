<?php

include_once __DIR__ . "/BinarySearchTreeNode.php";

function buildBinarySearchTree(array $list): BinarySearchTreeNode
{
    if (empty($list)) {
        throw new ErrorException("List must not be empty");
    }

    $root = new BinarySearchTreeNode($list[0]);

    foreach($list as $value) {
        $root->addChild($value);
    }

    return $root;
}

$list = [10, 9, 12, 14];
$root = buildBinarySearchTree($list);
var_dump($root);

