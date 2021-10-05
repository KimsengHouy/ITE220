<?php

require_once "Form.php";
require_once "XO_setting.php";
require_once "User.php";
require_once "HTML.php";

$shopHTML = new HTML();
$css_files = array("css/contact_form.css",
    "css/jquery-ui.min.css",
    "css/main.css");
$js_files = array("js/jquery-3.6.0.min.js",
    "js/jquery-ui.min.js",
    "js/main.js");
$shopHTML->title = "MutexXO Contact us";
$shopHTML->author = "Kimseng Houy";
$shopHTML->emitHeader($css_files, $js_files, "MutexXO - Shop");
$shopHTML->emitNavigation();
$shopHTML->emitMain("MutexXO - Shop", 'main');
$shopHTML->emitAside();
$shopHTML->emitFooter();

function main()
{
    echo "<p id='t3'>The shop is under construction!!!</p>";

}