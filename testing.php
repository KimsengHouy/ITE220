<?php
require_once "HTML.php";
require_once "Form.php";
require_once "XO_setting.php";
require_once "session.php";

$testingPageHTML = new HTML();
$css_files = array ("css/testing.css","css/jquery-ui.min.css",);
$js_files = array("js/jquery-3.6.0.min.js",
    "js/jquery-ui.min.js",
    "js/main.js");
$testingPageHTML->title = "MutexXO";
$testingPageHTML->author ="Kimseng Houy";
$testingPageHTML->emitHeader($css_files, $js_files, "Testing Page");
$testingPageHTML->emitMain("Testing Page", 'main');


function main(){

    echo <<<MYSCRIPT
<canvas id='mycanvas' width='320' height='320'></canvas>


<script>

$(function() {
canvas = O('mycanvas')

	context = canvas.getContext('2d')

	S(canvas).background = 'lightblue'

	context.strokeStyle = 'orange'

	context.fillStyle = 'yellow'

	

	context.beginPath()

	context.fillStyle = 'blue'

	context.rect( 150, 100, 500, 350) // White background

	context.closePath()

	// context.stroke()

	context.clip()

	

	context.beginPath()

	context.moveTo(400, 50)

	context.lineTo(700, 400)

	context.lineTo(100, 400)

	context.closePath()

	context.fill()

</script>

MYSCRIPT;


}


