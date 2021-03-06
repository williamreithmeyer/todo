<?php
session_start();
require dirname(__FILE__) . "/private/loader.php";

$user = new _User();

if (!$user->is_logged_in()){
    echo json_encode(array("success" => false));
    exit;
}

$uuid = new _UUID();

$todoFileName = $uuid->v4();

$list = json_decode(file_get_contents(PRIVATE_FOLDER . "todo-list-template.json"), true);

$list["name"] = $_REQUEST["name"];

file_put_contents(LISTS_FOLDER . $todoFileName . ".json", json_encode($list));

echo json_encode(
    array(
        "success" => true,
        "file" => $todoFileName
    )
);

