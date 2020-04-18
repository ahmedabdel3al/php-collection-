<?php

namespace app;

use ArrayIterator;

trait IteratorAggregateTrait
{
    public function getIterator()
    {
        return new ArrayIterator($this->items);
    }
}
