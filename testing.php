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

<canvas id='myCanvas' width='535' height='360' style='border:1px solid #000000;'>
Your browser does not support the HTML canvas tag.
</canvas>
<script>

// helper functions:
function O(i) { return typeof i == 'object' ? i : document.getElementById(i) }
function S(i) { return O(i).style }
function C(i) { return document.getElementsByClassName(i) }




$( function() {
const canvas = O('myCanvas');
const context = canvas.getContext('2d')
S(canvas).background = 'lightblue'
context.fillStyle = 'red'
context.font = 'bold 13pt Courier'
context.strokeStyle = 'blue'
context.textBaseline = 'top'
context.textAlign = 'center'
context.lineWidth = 20
const caps = ['butt', 'round', 'square']
const joins = ['round', 'bevel', 'miter']
for (let j = 0 ; j < 3 ; ++j) {
 for (let k = 0 ; k < 3 ; ++k) {
context.lineCap = caps[j]
context.lineJoin = joins[k]
context.fillText(' cap:' + caps[j], 88 + j * 180, 45 + k * 120)
context.fillText('join:' + joins[k], 88 + j * 180, 65 + k * 120)
context.beginPath()
context.moveTo( 20 + j * 180, 100 + k * 120)
context.lineTo( 20 + j * 180, 20 + k * 120)
context.lineTo(155 + j * 180, 20 + k * 120)
context.lineTo(155 + j * 180, 100 + k * 120)
context.stroke()
context.closePath()
 }
}
})





</script>

MYSCRIPT;


}


