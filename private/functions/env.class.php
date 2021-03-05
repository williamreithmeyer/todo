<?php

class _Env
{
    public function is_dev()
    {
        return file_exists(dirname(__DIR__, 2) . "/.dev");
    }
}