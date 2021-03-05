<?php

class _Page
{

    public $pageTitleExtra;

    public function get($index)
    {
        $url = self::get_full_url();

        $urlPath = preg_replace("/(" . self::site_path() . ")/", '', parse_url($url, PHP_URL_PATH));
        $urlPath = preg_replace('/^(\/+)/', '', $urlPath);
    
        $urlPath = strtolower($urlPath == '' ? '/' : $urlPath);

        $urlParts = explode("/", $urlPath);
        if (isset($index)) {
            if (isset($urlParts[$index])) {
                return $urlParts[$index];
            } else {
                return "";
            }
        }

        return $urlParts;
    }

    public function link($fileName, $cache)
    {
        $fileName = stripcslashes(self::site_path()) . ASSETS_CSS . preg_replace("/(\.css)$/", "", $fileName) . ".css";
        $fileName .= isset($cache) ? "?v={$cache}" : "";
        echo "<link rel=\"stylesheet\" href=\"{$fileName}\">";
    }

    public function script($fileName, $cache)
    {
        $fileName = stripcslashes(self::site_path()) . ASSETS_JS . preg_replace("/(\.js)$/", "", $fileName) . ".js";
        $fileName .= isset($cache) ? "?v={$cache}" : "";
        echo "<script src=\"{$fileName}\"></script>";
    }

    public function route()
    {
        include PUBLIC_FOLDER . "/route.php";
    }

    public function get_full_url()
    {
        return (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    }

    public function template($template)
    {
        $templateFile = TEMPLATES_FOLDER . preg_replace("/(\.php)$/", "", strtolower($template)) . ".php";
        if (file_exists($templateFile)) {
            include $templateFile;
        }
    }

    public function get_title()
    {
        echo SITE_TITLE . " | " . $this->pageTitleExtra;
    }

    public function head()
    {
        self::template("header");
    }

    public function footer()
    {
        self::template("footer");
    }
    
    private function site_path()
    {
        $env = new _Env();
        // local vs host
        return ($env->is_dev() ? "\/todo" : "\/todo");
    }
}
