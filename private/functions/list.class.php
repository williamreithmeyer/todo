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
        echo "<li class=\"list-group-item\"><a href=\"{$this->listID}\">{$this->name}</a></li>";
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
