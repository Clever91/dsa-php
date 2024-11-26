<?php

include_once __DIR__ . "/../TreeNode.php";

class LocationTree extends TreeNode
{
    public function printTree($ilevel = null): void
    {
        $level = $this->getLevel();
        $spaces = str_repeat("  ", $level);
        if ($level != 0) {
            $spaces .= "|_";
        }

        // checking imput level and stop
        if (is_null($ilevel) || $ilevel >= $level) {
            echo "{$spaces}{$this->value}\n";
            if (count($this->children)) {
                foreach($this->children as $child) {
                    $child->printTree($ilevel);
                }
            }
        }
    }
}

$root = new LocationTree("Global", null);
// country
$india = new LocationTree("India", $root);
$usa = new LocationTree("USA", $root);
$uzb = new LocationTree("Uzbekistan", $root);
$root->addChild($india);
$root->addChild($usa);
$root->addChild($uzb);
// city
$nam = new LocationTree("Namangan", $uzb);
$tash = new LocationTree("Toshkent", $uzb);
$fer = new LocationTree("Fergana", $uzb);
$uzb->addChild($nam);
$uzb->addChild($tash);
$uzb->addChild($fer);
// region
$uychi = new LocationTree("Uychi");
$pop = new LocationTree("Pop");
$chor = new LocationTree("Chortoq");
$kos = new LocationTree("Kosonsoy");
$nam->addChild($uychi);
$nam->addChild($pop);
$nam->addChild($chor);
$nam->addChild($kos);
$yun = new LocationTree("Yunisabot", $tash);
$yash = new LocationTree("Yashnabot", $tash);
$tash->addChild($yun);
$tash->addChild($yash);

$root->printTree(2);