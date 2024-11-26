<?php

class DoubleNode
{
    public mixed $prev;
    public mixed $value;
    public mixed $next;

    public function __construct(mixed $prev, mixed $value, mixed $next)
    {
        $this->prev = $prev;
        $this->value = $value;
        $this->next = $next;
    }
}