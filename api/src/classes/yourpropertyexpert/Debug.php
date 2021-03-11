<?php

/**
 * Debug class
 *
 * @copyright Mark Harrison Ltd 2021, used under licence
 */

namespace yourpropertyexpert;

/**
 * DB class to encapsulate access credentials
 */
class Debug
{
    /**
     * Neatly prints the data
     */
    public function __construct($data, $title = "")
    {
        echo "<hr/>";
        if ($title != "") {
            echo "<h3>$title</h3>";
        }
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}
