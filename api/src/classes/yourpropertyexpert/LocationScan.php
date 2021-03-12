<?php

/**
 * LocationScan class
 *
 * @copyright Mark Harrison Ltd 2021, used under licence
 */

namespace yourpropertyexpert;

/**
 * LocationScan class
 */
class LocationScan
{
    private $key;
    private $conn;

    /**
     * Constructor, sets the key private
     */
    public function __construct($userid)
    {
        $this->userid = $userid;
        $this->conn = new DB();
    }

    public function scanLocation($location)
    {

        $sql = "UPDATE currentlocation SET location = ? WHERE user = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $location, $this->userid);
        $stmt->execute();
        if ($this->conn->affected_rows != 1) {
            return ["success" => false, "error" => "Scanned twice at same location?"];
        }
        return ["success" => true, "newlocation" => $location];
    }
}
