<?php

namespace yourpropertyexpert;

require_once("../includes/includes.php");

if (!array_key_exists("key", $_REQUEST)) {
    $return = 401; // unauthorised, which in practice means unauthenticated
    $data = ["error" => "Key not provided"];
    new Output($return, $data);
    exit();
}

$keycheck = new KeyCheck($_REQUEST["key"]);

if (!$keycheck->checkKey()) {
    $return = 401; // unauthorised, which in practice means unauthenticated
    $data = ["error" => "Key provided but not recognised"];
    new Output($return, $data);
    exit();
}

$return = 200; // all good
$data = ["message" => "all good"];
new Output($return, $data);
