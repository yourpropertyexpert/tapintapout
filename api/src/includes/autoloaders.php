<?php

/**
 * include file containing autoloaders
 *
 * Common include file for the WerAreWe APIs
 * The includes needed by the emailing functions and classes
 * copyright WerAreWe Ltd 2018-2019, used by Ghobi under licence
 */

require '/var/www/vendor/autoload.php';

// Set up an autoloader for classes
spl_autoload_register(function ($className) {
    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    include_once $_SERVER['DOCUMENT_ROOT'] . '/classes/' . $className . '.php';
});
