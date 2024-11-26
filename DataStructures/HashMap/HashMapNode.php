<?php

class HashMapNode
{
    public mixed $key;
    public mixed $value;
    public mixed $next;

    public function __construct(mixed $key, mixed $value, mixed $next = null)
    {
        $this->key = $key; 
        $this->value = $value; 
        $this->next = $next; 
    }
}