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

// $list = [12, 2, 14, 10, 15, 1, 3];
// $root = buildBinarySearchTree($list);
// var_dump($root);
// var_dump($root->inOrderTraversal());

// var_dump($root->search(44));
// var_dump($root->search(14));

$root = buildBinarySearchTree(["Abdurashid", "Sherzod", "Sardor", "Azizbek", "Aziz", "Abduhakim", "Jasur"]);
echo "Min value: " . $root->findMin();
echo "\n";
echo "In order traversal: " . implode(", ", $root->inOrderTraversal()) . "\n";

