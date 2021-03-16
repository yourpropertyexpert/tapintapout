<?php

namespace yourpropertyexpert;

const HTTP_UNPROCESSABLE_ENTITY = 422;
const HTTP_OK = 200;

require_once("../includes/autoloaders.php");

$return = HTTP_OK; // all good
$data = [];
$data["success"] = true;

$requiredfields = ['email', 'password'];
foreach ($requiredfields as $thisone) {
    if (empty($_REQUEST[$thisone])) {
        $data["error"] = "$thisone not passed";
        $data["success"] = false;
        new Output(HTTP_UNPROCESSABLE_ENTITY, $data);
        exit();
    }
}

$email = $_REQUEST["email"];
$password = $_REQUEST["password"];

$keygen = new KeyGenerator();
$newkey = $keygen->generateKeyFromUNPW($email, $password);

if (!$newkey["success"]) {
    new Output(HTTP_UNPROCESSABLE_ENTITY, $newkey);
    exit();
}

new Output($return, $newkey);
exit();
