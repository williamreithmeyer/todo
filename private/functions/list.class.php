<?php

class _List {

    public $name;
    public $listID;

    public function __construct($listID = null)
    {
        if (isset($listID)){
            $this->set($listID);
        }
    }

    public function set($listID)
    {
        $listID = preg_replace("/(\.json)$/", "", $listID);
        $list = json_decode(file_get_contents(LISTS_FOLDER . $listID . ".json"), true);

        $this->listID = $listID;

        $this->name = $list["name"];

        $this->list = $list["listItems"];

    }

    public function display_short()
    {
        // TODO add links
        echo "<a class=\"list-group-item list-group-item-action\" href=\"{$this->listID}\">{$this->name}</a>";
    }

    public function display()
    {
        foreach ($this->list as $list => $item){
            $status = $item["status"] == "checked" ? "checked" : "";
            ?>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input id="list-item-checkbox-<?php echo $list; ?>" type="checkbox" value="<?php echo $list; ?>" <?php echo $status; ?>>
                    </div>
                </div>
                <input type="text" id="list-item-input-<?php echo $list; ?>" class="form-control" value="<?php echo $item["info"]; ?>">
            </div>
        <?php
        }
    }

    public function save_part($key, $value)
    {
        $list = json_decode(file_get_contents(LISTS_FOLDER . $this->listID . ".json"), true);

        if (isset($list[$key])) {
            $list[$key] = $value;
            file_put_contents(LISTS_FOLDER . $this->listID . ".json", json_encode($list));
            return true;
        }

        return false;
    }

    public function is_list($listID = null)
    {
        if ($listID == null) {
            return file_exists(LISTS_FOLDER . $this->listID . ".json");
        }
        return file_exists(LISTS_FOLDER . $listID . ".json");
    }

    public function user_access()
    {
        // add function later
        return true;
    }

}
