<?php

require_once "Form.php";
require_once "XO_setting.php";
require_once "User.php";
require_once "HTML.php";

$tutorialHTML = new HTML();
$css_files = array("css/form.css",
    "css/jquery-ui.min.css",
    "css/main.css");
$js_files = array("js/jquery-3.6.0.min.js",
    "js/jquery-ui.min.js",
    "js/main.js");
$tutorialHTML->title = "MutexXO Tutorial";
$tutorialHTML->author = "Kimseng Houy";
$tutorialHTML->emitHeader($css_files, $js_files, "MutexXO - Tutorial");
$tutorialHTML->emitNavigation();
$tutorialHTML->emitMain("MutexXO - Tutorial", 'main');
$tutorialHTML->emitAside();
//$tutorialHTML->emitFooter();

function main()
{
    echo "<p id='t1'>Use ctrl + space bar on your keyboard to fly !!!</p>";
    echo "<img id='ctrl' src='./images/ctrl-key.png' height='100' width='70'> <img id='space_bar' src='./images/space_bar.png' height='80' width='100'>";


}