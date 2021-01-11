<?php

define(     "DEBUG", 1);
define(      "ROOT", dirname(__DIR__));
define(       "WWW", ROOT . "/public");
define(       "APP", ROOT . "/app");
define(      "CORE", ROOT . "/blog/Core");
define(      "LIBS", ROOT . "/blog/Core/libs");
define(      "BASE", ROOT . "/blog/Core/Base");
define(     "CACHE", ROOT . "/tmp/cache");
define(    "CONFIG", ROOT . "/config");
define(    "LAYOUT", 'blog');
define(    "ADMIN_LAYOUT", 'adminblog');
define(    "UPLOAD_DIR" , '/uploads/');
define(    "DEFAULT_IMG", 'default.png');

require_once ROOT . "/vendor/autoload.php";


