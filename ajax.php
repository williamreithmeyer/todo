<?php
session_start();
require dirname(__FILE__) . "/private/loader.php";

$user = new _User();

if (!$user->is_logged_in()){
    echo json_encode(array("success" => false));
    exit;
}

switch ($_REQUEST["action"]) {
    case "createList":
        $uuid = new _UUID();
        
        $todoFileName = $uuid->v4();

        $list = json_decode(file_get_contents(PRIVATE_FOLDER . "todo-list-template.json"), true);
        
        $list["name"] = $_REQUEST["name"];
        
        $list["dateCreated"] = $list["dateMod"] = date("Y-m-d H:i:s");
        $list["author"] = $user->name;
        
        file_put_contents(LISTS_FOLDER . $todoFileName . ".json", json_encode($list));

        $response = array("success" => true, "file" => $todoFileName);
        break;

    case "updateList":
        $list = new _List($_REQUEST["listID"]);
        if (!$list->is_list()) {
            echo json_encode(array("success" => false));
            exit;
        }

        $nameChanged = $list->save_part("name", $_REQUEST["name"]);

        $response = array("success" => $nameChanged);

        break;

    case "deleteList":
        $list = new _List($_REQUEST["listID"]);

        if (!$list->is_list()){
            echo json_encode(array("success" => false));
            exit;
        }

        $deleted = $list->delete();

        $response = array("success" => $deleted);

        break;
}

echo json_encode( $response );

