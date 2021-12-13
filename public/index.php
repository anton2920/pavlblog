<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('error_reporting', E_ALL);

require_once __DIR__ . "../../config/init.php";
require_once '../blog/helper.php';
require_once CONFIG . '/routes.php';

new \Blog\App();

