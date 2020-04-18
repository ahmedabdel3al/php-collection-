<?php

namespace App;

trait ArrayCountTrait
{
    public function count()
    {
        return count($this->items);
    }
}
