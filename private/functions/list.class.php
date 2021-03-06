<?php

class _List {

    public $name;
    
    public function set($listID)
    {
        $list = json_decode(file_get_contents(LISTS_FOLDER . $listID . ".json"), true);

        $this->name = $list["name"];
    }

    public function is_list($listID)
    {
        return file_exists(LISTS_FOLDER . $listID . ".json");
    }

    public function user_access()
    {
        // add function later
        return true;
    }

}