<?php

class _Lists {

    public $toArray;

    public function __construct()
    {
        $lists = array_diff(scandir(LISTS_FOLDER), array(".", ".."));
        $this->toArray = preg_replace("/(\.json)&/", "", $lists);
    }
}