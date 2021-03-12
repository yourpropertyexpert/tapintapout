<?php

namespace yourpropertyexpert;

require_once("../includes/autoloaders.php");
$user = require_once("../includes/checkkey.php");

$return = 200; // all good

new Output($return, $user);
exit();
