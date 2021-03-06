<?php

class _List {

    public $name;

    public function set($listID)
    {
        $list = json_decode(file_get_contents(LISTS_FOLDER . $listID . ".json"), true);

        $this->name = $list["name"];

        $this->list = $list["listItems"];

    }

    public function display()
    {
        foreach ($this->list as $list => $item){
            $status = $item["status"] == "checked" ? "checked" : "";
            ?>
            <div class="form-check form-check-inline ">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" <?php echo $status; ?> value="<?php echo $list; ?>">
                <label class="form-check-label" for="inlineCheckbox1"><?php echo $item["info"]; ?></label>
            </div>
        <?php
        }
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
