<?php
session_start();

require dirname(__FILE__) . "/private/loader.php";

$user = new _User();
$page = new _Page();

$page->route();
