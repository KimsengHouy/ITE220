<?php

require_once "Form.php";
require_once "XO_setting.php";
require_once "User.php";
require_once "HTML.php";

$instructionHTML = new HTML();
$css_files = array("css/form.css",
    "css/jquery-ui.min.css",
    "css/main.css");
$js_files = array("js/jquery-3.6.0.min.js",
    "js/jquery-ui.min.js",
    "js/main.js");
$instructionHTML->title = "MutexXO Instruction";
$instructionHTML->author = "Kimseng Houy";
$instructionHTML->emitHeader($css_files, $js_files, "MutexXO - Instruction");
$instructionHTML->emitNavigation();
$instructionHTML->emitMain("MutexXO - Instruction", 'main');
$instructionHTML->emitAside();
//$instructionHTML->emitFooter();

function main()
{
    echo "<p id='t3'> Reminder: DO NOT HIT THE POLE! </p>";
    echo "<p id='t2'> - Fly the object in the middle of the pole !</p>";
    echo "<p id='t2'> - It will go faster and faster with increase speed ! </p>";

}