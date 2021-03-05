<?php
global $page, $user;

$page->head();

echo "<h1>Welcome back, {$user->name}</h1>";

$page->footer();
