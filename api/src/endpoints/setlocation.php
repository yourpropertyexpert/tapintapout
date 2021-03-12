<?php

namespace yourpropertyexpert;

require_once("../includes/autoloaders.php");
require_once("../includes/checkkey.php"); // sets up array called $checkresult if check passes, exits page otherwise

$return = 200; // all good

$data = [];
$data = ["user" => $checkresult["user"]];

new Output($return, $data);


exit();
