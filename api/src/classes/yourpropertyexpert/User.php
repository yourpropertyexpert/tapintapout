<?php

/**
 * NewUser class
 *
 * @copyright Mark Harrison Ltd 2021, used under licence
 */

namespace yourpropertyexpert;

/**
 * User class
 */
class User
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

    /**
     * Set up a new user
     * status will always be "UNCONFIRMED" (set by DB Table definition)
     */
    public function getMyInfo()
    {
        $sql = "SELECT
            	userkeys.userkey as userkey,
            	userkeys.userid as userid,
            	users.firstname as firstname,
            	users.familyname as familyname,
                currentlocation.location as location
            FROM userkeys
            INNER JOIN users
            ON userkeys.userid = users.userid
            INNER JOIN currentlocation
            ON userkeys.userid = currentlocation.userid
            WHERE userkey = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $this->key);
        $stmt->execute();
        $rawdata = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        if (count($rawdata) > 0) {
            $return = $rawdata[0];
        }
        return $return;
    }
}
