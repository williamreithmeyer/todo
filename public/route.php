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

    case "add":
        $page->template("add");
        break;

    default:
        $list = new _List();

        if ($list->is_list($page->get(0)) && $list->user_access($user)) {
            $page->template("list");
            exit;
        }

        $page->template("404");
}
