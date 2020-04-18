<?php

namespace App;


use ArrayAccess;
use Countable;
use IteratorAggregate;

class Collection implements ArrayAccess, Countable, IteratorAggregate
{

    use ArrayAccessTrait, ArrayCountTrait, IteratorAggregateTrait;

    private $items;

    public function __construct($items)
    {
        $this->items = $items;
    }
    public static function make($items)
    {
        return new static($items);
    }
    public function map(callable $callable)
    {
        $this->items = array_map($callable, $this->items);
        return $this;
    }
    public function filter(callable $callable)
    {
        $this->items = array_filter($this->items, $callable);
        return $this;
    }
    public function contains($search)
    {
        return in_array($search, $this->items);
    }
    public function pluck($key)
    {
        $this->items =  array_column($this->items, $key);
        return $this;
    }
    public function flatten()
    {
        $result = [];

        foreach ($this->items as $key => $value) {
            if (is_array($value)) {
                foreach ($value as $key => $nestedValue) {
                    array_push($result, $nestedValue);
                }
            } else {
                array_push($result, $value);
            }
        }
        $this->items = $result;
        return $this;
    }
    public function sum()
    {
        return array_sum($this->items);
    }
    public function toArray()
    {
        return $this->items;
    }
}
