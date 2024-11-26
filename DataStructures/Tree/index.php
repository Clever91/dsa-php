<?php

include_once __DIR__ . "/TreeNode.php";

$root = new TreeNode("Electronics", null);

$laptop = new TreeNode("Laptops", $root);
$laptop->addChild(new TreeNode("Mac", $laptop));
$laptop->addChild(new TreeNode("Tashiba", $laptop));
$laptop->addChild(new TreeNode("HP", $laptop));
$laptop->addChild(new TreeNode("Lenova", $laptop));

$phone = new TreeNode("Phones", $root);
$phone->addChild(new TreeNode("Iphone", $phone));
$phone->addChild(new TreeNode("Android", $phone));

$television = new TreeNode("Televisions", $root);

$root->addChild($laptop);
$root->addChild($phone);
$root->addChild($television);

$root->printTree();