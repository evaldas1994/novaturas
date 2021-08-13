<?php

namespace Core;

class Controller
{
    const HEADER = "/app/template/page/header.php";
    const FOOTER = "/app/template/page/footer.php";

    public function render($template, $data)
    {
        include_once PROJECT_ROOT.self::HEADER;
        include_once PROJECT_ROOT."/app/template/". $template .".php";
        include_once PROJECT_ROOT.self::FOOTER;
    }
}