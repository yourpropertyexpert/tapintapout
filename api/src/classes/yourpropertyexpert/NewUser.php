<?php

/**
 * NewUser class
 *
 * @copyright Mark Harrison Ltd 2021, used under licence
 */

namespace yourpropertyexpert;

/**
 * NewUser class
 */
class NewUser
{
    private $conn;

    /**
     * Constructor, sets the key private
     */
    public function __construct()
    {
        $this->conn = new DB();
    }

    /**
     * Set up a new user
     * status will always be "UNCONFIRMED" (set by DB Table definition)
     */
    public function addUser($firstname, $familyname, $email, $pw = "dummy")
    {
        $sql = "INSERT INTO users (firstname, familyname, email, password) VALUES(?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssss", $firstname, $familyname, $email, $pw);
        $stmt->execute();
        if ($stmt->error) {
            $error = "Error inserting default location: " . $stmt->errno . " - " . $stmt->error;
            return [
                "success" => false,
                "error" => $error,
            ];
        }
        return $this->addStartLocation($stmt->insert_id);
    }

    private function addStartLocation($userid)
    {
        $sql = "INSERT INTO currentlocation (userid, location) VALUES(?, 'untracked')";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $userid);
        $stmt->execute();
        if ($stmt->error) {
            $error = "Error inserting default location: " . $stmt->errno . " - " . $stmt->error;
            return [
                "success" => false,
                "error" => $error
            ];
        }
        return ["success" => true, "userid" => $userid];
    }
}
