<?php

/**
 * include file to check for key
 */

namespace yourpropertyexpert;

if (!array_key_exists("userkey", $_REQUEST)) {
    $return = 401; // unauthorised, which in practice means unauthenticated
    $data = ["authenticated" => false, "error" => "userkey not provided"];
    new Output($return, $data);
    exit();
}

$keycheck = new KeyCheck($_REQUEST["userkey"]);
$checkresult = $keycheck->checkKey();

if (!$checkresult["authenticated"]) {
    $return = 403; // forbidden, which is to say the credentials don't match
    $checkresult["userkey"] = $_REQUEST["userkey"];
    $checkresult["error"] = "userkey does not match any users";
    new Output($return, $checkresult);
    exit();
}

return $checkresult;
