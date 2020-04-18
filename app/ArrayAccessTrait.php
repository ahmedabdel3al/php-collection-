<?php

namespace App;


trait ArrayAccessTrait
{
    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->items);
    }
    public function offsetGet($offset)
    {
        return isset($this->items[$offset]) ? $this->items[$offset] : null;
    }
    public function offsetSet($offset = null, $value)
    {
        if (is_null($offset)) {
            $this->items[] = $value;
        } else {
            $this->items[$offset] = $value;
        }
    }
    public function offSetUnset($offset)
    {
        unset($this->items[$offset]);
    }
}
