<?php

/**
 * CheckOut class
 *
 * @copyright Mark Harrison Ltd 2021, used under licence
 */

namespace yourpropertyexpert;

/**
 * CheckOut class
 */
class CheckOut
{
    private $userid;
    private $conn;

    /**
     * Constructor, sets the key private
     */
    public function __construct($userid)
    {
        $this->userid = $userid;
        $this->conn = new DB();
    }

    public function checkout()
    {
        $sql = "UPDATE currentlocation SET location = 'untracked' WHERE userid = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $this->userid);
        $stmt->execute();
        if ($this->conn->affected_rows != 1) {
            return [
                "success" => false,
                "error" => "Something went wrong - already untracked?"
            ];
        }
        return ["success" => true];
    }
}
