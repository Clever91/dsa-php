<?php

class Node
{
    public mixed $value;
    public mixed $next;

    public function __construct(mixed $value, mixed $next)
    {
        $this->value = $value;
        $this->next = $next;
    }
}