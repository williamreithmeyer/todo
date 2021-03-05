<?php
date_default_timezone_set('America/New_York');

define ("SITE_TITLE", "Todo App");
define ("CLASSES", dirname(__FILE__) . "/functions/");
define ("PRIVATE_FOLDER", dirname(__FILE__, 2) . "/private/");
define ("PUBLIC_FOLDER", dirname(__FILE__, 2) . "/public/");
define ("TEMPLATES_FOLDER", PUBLIC_FOLDER . "templates/");

define ("ASSETS", "/public/assets/");
define ("ASSETS_CSS", ASSETS . "css/");
define ("ASSETS_JS", ASSETS . "js/");
