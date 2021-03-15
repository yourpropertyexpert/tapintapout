<?php

namespace yourpropertyexpert;

const HTTP_UNPROCESSABLE_ENTITY = 422;
const HTTP_OK = 200;

require_once("../includes/autoloaders.php");

$return = HTTP_OK; // all good
$data = [];
$data["success"] = true;

$requiredfields = ['firstname', 'familyname', 'email'];
foreach ($requiredfields as $thisone) {
    if (empty($_REQUEST[$thisone])) {
        $data["error"] = "$thisone not passed";
        $data["success"] = false;
        new Output(HTTP_UNPROCESSABLE_ENTITY, $data);
        exit();
    }
}

$firstname = $_REQUEST["firstname"];
$familyname = $_REQUEST["familyname"];
$email = $_REQUEST["email"];

$newuserobject = new NewUser();
$objectresult = $newuserobject->addUser($firstname, $familyname, $email);

if (!$objectresult["success"]) {
    $data["error"] = $objectresult["error"];
    $data["success"] = false;
    new Output(HTTP_UNPROCESSABLE_ENTITY, $data);
    exit();
}

$data["userid"] = $objectresult["userid"];
new Output($return, $data);
exit();
