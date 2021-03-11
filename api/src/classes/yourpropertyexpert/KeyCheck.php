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
    private const DUMMYKEY = 123;

    /**
     * Constructor, sets the key private
     */
    public function __construct($key)
    {
        $this->key = $key;
    }

    public function checkKey()
    {
        if ($this->key == self::DUMMYKEY) {
            return true;
        }
        return false;
    }
}
