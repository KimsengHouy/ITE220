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
    echo <<<MYSCRIPT

<canvas id='myCanvas' width='150' height='150'>
Your browser does not support the HTML canvas tag.
</canvas>
<script>

// helper functions:
function O(i) { return typeof i == 'object' ? i : document.getElementById(i) }
function S(i) { return O(i).style }
function C(i) { return document.getElementsByClassName(i) }

$( function() {
canvas = O('myCanvas')
context = canvas.getContext('2d')
context.strokeStyle = 'white'
context.fillStyle = 'purple'

context.beginPath()
context.arc(75, 75, 40, 0, Math.PI * 2, true) // Outer circle
context.moveTo(110, 75)
context.arc(75, 75, 20, 0, Math.PI, false) // Mouth (clockwise)
context.moveTo(65, 65)
context.arc(60, 65, 5, 0, Math.PI * 2, true) // Left eye
context.moveTo(95, 65)
context.arc(90, 65, 5, 0, Math.PI * 2, true) // Right eye
context.stroke()

context.closePath()
 }
)
</script>

MYSCRIPT;

}