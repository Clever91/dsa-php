<?php

include_once __DIR__ . "/../TreeNode.php";

class Employee
{
    public function __construct(public string $name, public string $position) {}
}

class EmployeeTree extends TreeNode
{

    public function __construct(mixed $employee, ITreeNode|null $parent)
    {
        if (!$employee instanceof Employee) {
            throw new InvalidArgumentException("<employee> must be object of Employee");
        }
        parent::__construct($employee, $parent);
    }

    public function printTree($property = "all"): void
    {
        $level = $this->getLevel();
        $spaces = str_repeat("  ", $level);
        if ($level != 0) {
            $spaces .= "|_";
        }
        if ($property == "all") {
            echo "{$spaces}{$this->value->name} ({$this->value->position})\n";
        } else {
            echo "{$spaces}{$this->value->{$property}}\n";
        }
        if (count($this->children)) {
            foreach($this->children as $child) {
                $child->printTree($property);
            }
        }
    }
}

$ceo = new EmployeeTree(new Employee("Otabek", "CEO"), null);

$ahmad = new EmployeeTree(new Employee("Ahmadjon", "General Manager"), $ceo);
$ceo->addChild($ahmad);

$otabek = new EmployeeTree(new Employee("Otabek", "Team leader"), $ahmad);
$ikrom = new EmployeeTree(new Employee("Ikrom", "Team leader"), $ahmad);
$elyor = new EmployeeTree(new Employee("Elyor", "Team leader"), $ahmad);
$ahmad->addChild($ikrom);
$ahmad->addChild($otabek);
$ahmad->addChild($elyor);

// developers
$sherzod = new EmployeeTree(new Employee("Sherozd", "Backend Developer"), $ikrom);
$inomjon = new EmployeeTree(new Employee("Inomjon", "Mobile Developer"), $ikrom);
$ikrom->addChild($sherzod);
$ikrom->addChild($inomjon);

$ceo->printTree();
// $ceo->printTree("name");