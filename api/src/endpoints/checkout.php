<?php

namespace yourpropertyexpert;

const HTTP_UNPROCESSABLE_ENTITY = 422;
const HTTP_OK = 200;

require_once("../includes/autoloaders.php");
$user = require_once("../includes/checkkey.php");

$return = HTTP_OK; // all good
$data = $user;
$data["success"] = true;

$locationobject = new CheckOut($user["userid"]);
$objectresult = $locationobject->checkout();

foreach (["success", "error"] as $thisone) {
    if (array_key_exists($thisone, $objectresult)) {
        $data[$thisone] = $objectresult[$thisone];
    }
}

new Output($return, $data);
exit();
