<?php
global $page, $user;

if (!$user->is_logged_in()){
    $page->template("login");
    exit;
}

switch (strtolower($page->get(0))) {

    case "";
        $page->template("home");
        break;

    case "logout":
        unset($_SESSION["logintoken"]);
        header("Location: /todo");
        break;

    default:
        $list = new _List();

        if ($list->is_list($page->get(1)) && $list->user_access($user)) {
            $page->template("list");
        } else {
            $page->template("404");
        }

        $page->template("404");
}
