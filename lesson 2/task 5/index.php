<?php
/*
5. *Собрать страницу с меню и контентом,
зарендерить как минимум 2 подшаблона через renderTemplate.
 */

function renderTemplate($page, $content = "", $menu = "") {
    ob_start();
    $year = 2018;
    include $page . ".php";
    return ob_get_clean();
}

$content = renderTemplate("content");
$menu = renderTemplate('menu');

echo renderTemplate("main", $content, $menu);