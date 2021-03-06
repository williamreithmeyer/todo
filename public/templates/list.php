<?php
global $page, $user;

$list = new _List();
$list->set($page->get(0));

$page->head();

echo "<h1>{$list->name}</h1>";

$page->footer();
