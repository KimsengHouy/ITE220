<?php
require_once "HTML.php";
require_once "Form.php";
require_once "XO_setting.php";
require_once "session.php";

$testingPageHTML = new HTML();
$css_files = array("css/testing.css", "css/jquery-ui.min.css",);
$js_files = array("js/jquery-3.6.0.min.js",
    "js/jquery-ui.min.js",
    "js/main.js");
$testingPageHTML->title = "MutexXO";
$testingPageHTML->author = "Kimseng Houy";
$testingPageHTML->emitHeader($css_files, $js_files, "Testing Page");
$testingPageHTML->emitMain("Testing Page", 'main');


function main()
{
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
// S(canvas).background = 'lightblue'
context.strokeStyle = 'black'
context.fillStyle = 'purple'

context.beginPath()
 context.moveTo(75, 40)
context.bezierCurveTo(75, 37, 70, 25, 50, 25)
context.bezierCurveTo(20, 25, 20, 62.5, 20, 62.5)
context.bezierCurveTo(20, 80, 40, 102, 75, 120)
context.bezierCurveTo(110, 102, 130, 80, 130, 62.5)
context.bezierCurveTo(130, 62.5, 130, 25, 100, 25)
context.bezierCurveTo(85, 25, 75, 37, 75, 40)
context.stroke()
context.fill()
context.closePath()
 }
)





</script>

MYSCRIPT;


}


