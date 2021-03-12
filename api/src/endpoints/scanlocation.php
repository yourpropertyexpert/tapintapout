<?php

namespace yourpropertyexpert;

require_once("../includes/autoloaders.php");
$user = require_once("../includes/checkkey.php");

$return = 200; // all good
$data = $user;
$data["success"] = true;

if (empty($_REQUEST["newlocation"])) {
    $data["error"] = "Location not passed";
    $data["success"] = false;
    new Output(422, $data);
    exit();
}

$newlocation = $_REQUEST["newlocation"];
error_log("Setting location to $newlocation");

$locationobject = new LocationScan($user["userid"]);
$objectresult = $locationobject->scanLocation($newlocation);

foreach (["success", "error", "newlocation"] as $thisone) {
    if (array_key_exists($thisone, $objectresult)) {
        $data[$thisone] = $objectresult[$thisone];
    }
}

new Output($return, $data);
exit();
