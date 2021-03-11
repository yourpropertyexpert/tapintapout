<?php

/**
 * KeyCheck class
 *
 * @copyright Mark Harrison Ltd 2021, used under licence
 */

namespace yourpropertyexpert;

/**
 * KeyCheck class
 */
class KeyCheck
{
    private $key;

    /**
     * Constructor, sets the key private
     */
    public function __construct($key)
    {
        $this->key = $key;
    }

    public function checkKey()
    {
        if ($this->key == 123) {
            return true;
        }
        return false;
    }
}
