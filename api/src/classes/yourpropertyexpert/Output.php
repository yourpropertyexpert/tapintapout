<?php

/**
 * Output class
 *
 * @copyright Mark Harrison Ltd 2021, used under licence
 */

namespace yourpropertyexpert;

/**
 * Output class
 */
class Output
{
    public function __construct($responsecode, $json)
    {
        http_response_code($responsecode);
        header("Content-type: application/json");
        echo json_encode($json);
    }
}
