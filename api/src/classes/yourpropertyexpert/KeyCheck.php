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
    private $conn;

    /**
     * Constructor, sets the key private
     */
    public function __construct($key)
    {
        $this->key = $key;
        $this->conn = new DB();
    }

    public function checkKey()
    {
        $sql = "SELECT * FROM userkeys WHERE userkey = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $this->key);
        $stmt->execute();
        $rawdata = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        $return = ["authenticated" => false];
        if (count($rawdata) > 0) {
            $return = $rawdata[0];
            $return["authenticated"] = true;
        }
        return $return;
    }
}
