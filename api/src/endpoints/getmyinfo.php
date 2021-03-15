<?php

namespace yourpropertyexpert;

const HTTP_UNPROCESSABLE_ENTITY = 422;
const HTTP_OK = 200;

require_once("../includes/autoloaders.php");
$user = require_once("../includes/checkkey.php");

$return = HTTP_OK; // all good
$data = $user;
$data["success"] = true;

$userobject = new UserFromKey($user["userkey"]);
$userinfo = $userobject->getMyInfo();

$data["firstname"] = $userinfo["firstname"];
$data["familyname"] = $userinfo["familyname"];
$data["location"] = $userinfo["location"];



new Output($return, $data);
exit();
