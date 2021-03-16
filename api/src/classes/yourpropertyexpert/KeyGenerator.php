<?php

/**
 * KeyGenerator class
 *
 * @copyright Mark Harrison Ltd 2021, used under licence
 */

namespace yourpropertyexpert;

/**
 * KeyGenerator class
 */
class KeyGenerator
{
    private const HIGHEST_DIGIT = 9; // required to stop magic number error
    private const CONFIRMATION_CODE_LENGTH = 32;

    private $conn;

    /**
     * Constructor, sets the key private
     */
    public function __construct()
    {
        $this->conn = new DB();
    }

    public function generateKeyFromUNPW($email, $pw)
    {

        $sql = "SELECT userid FROM users WHERE email=? AND password = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $email, $pw);
        $stmt->execute();
        $rawdata = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        $return = ["authenticated" => false, "success" => false, "error" => "Not found"];
        if (count($rawdata) > 0) {
            $userid = $rawdata[0]["userid"];
            return $this->setNewKey($userid);
        }
        return $return;
    }

    public function generateKey($length = self::CONFIRMATION_CODE_LENGTH)
    {
        $validationcode="";
        // Set up alphanumeric string set
        $ValidCharacters = '';
        foreach (range(0, self::HIGHEST_DIGIT) as $number) {
            $ValidCharacters .= $number;
        }
        foreach (range('a', 'z') as $char) {
            $ValidCharacters .= $char;
        }
        foreach (range('A', 'Z') as $char) {
            $ValidCharacters .= $char;
        }
        $max = strlen($ValidCharacters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $validationcode .= $ValidCharacters[mt_rand(0, $max)];
        }

        return $validationcode;
    }

    private function setNewKey($userid)
    {
        $newkey = $this->generateKey();
        return $this->storeKey($userid, $newkey);
    }

    private function storeKey($userid, $newkey)
    {
        $sql = "INSERT INTO userkeys (userkey, userid) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("si", $newkey, $userid);
        $stmt->execute();
        return [
            "success" => true,
            "authenticated" => true,
            "userid" => $userid,
            "key" => $newkey,
        ];
    }
}
