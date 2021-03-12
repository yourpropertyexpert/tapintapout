<?php

/**
 * include file to check for key
 */

namespace yourpropertyexpert;

const HTTP_UNAUTHORISED = 401;
const HTTP_FORBIDDEN = 403;


if (!array_key_exists("userkey", $_REQUEST)) {
    $return = HTTP_UNAUTHORISED; // unauthorised, which in practice means unauthenticated
    $data = ["authenticated" => false, "success" => false, "error" => "userkey not provided"];
    new Output($return, $data);
    exit();
}

$keycheck = new KeyCheck($_REQUEST["userkey"]);
$checkresult = $keycheck->checkKey();

if (!$checkresult["authenticated"]) {
    $return = HTTP_FORBIDDEN; // forbidden, which is to say the credentials don't match
    $checkresult["userkey"] = $_REQUEST["userkey"];
    $checkresult["error"] = "userkey does not match any users";
    $checkresult["success"] = false;
    new Output($return, $checkresult);
    exit();
}

return $checkresult;
