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

<canvas id='myCanvas' width='800' height='600'></canvas>
<script>
function O(i) {
    return typeof i == 'object' ? i : document.getElementById(i)
}

function S(i) {
    return O(i).style
}

$(function () {
var rects = [];

rects.push({

	x: 10,

	y: 10,

	width: 30,

	height: 15,

	fillcolor: "red",

	isFilled: false

});

rects.push({

	x: 10,

	y: 50,

	width: 50,

	height: 30,

	fillcolor: "blue",

	isFilled: false

});



var offsetX

var offsetY

var vW

var cH



$( function() {

	canvas = O('mycanvas')

	context = canvas.getContext('2d')

	context.lineWidth = 1

	S(canvas).background = 'lightblue'

	

	canvas.addEventListener('click', function(event) {

		handleMouseDown(event);

	}, false);

	

	offsetX = canvas.offsetLeft;

	offsetY = canvas.offsetTop;

	cW =   canvas.clientWidth

	cH =   canvas.clientHeight

	console.log("cancas offset ( x , y ) = (", offsetX, ",", offsetY, ")");

	draw(context);

}

)



function draw(context) {

	context.clearRect(0, 0, cW, cH);

	for (let i = 0; i < rects.length; i++) {

		let rect = rects[i];

		if (rect.isFilled) {

			context.fillStyle = rect.fillcolor;

			context.fillRect(rect.x, rect.y, rect.width, rect.height);

		}

		context.strokeStyle = "black";

		context.strokeRect(rect.x, rect.y, rect.width, rect.height);

	}

}



function handleMouseDown(event) {

	event.preventDefault();

	let xVal = event.pageX - offsetX

	let yVal = event.pageY - offsetY           

	console.log(xVal, yVal);

	

	for (let i = 0; i < rects.length; i++) {

		

		if (hit(rects[i], xVal, yVal)) {

			var rect = rects[i]

			rect.isFilled = ! rect.isFilled;

		}

	}

	canvas = O('mycanvas')

	context = canvas.getContext('2d')

	draw(context);

}



function hit(rect, x, y) {

	return (

	x >= rect.x &&

	x <= rect.x + rect.width &&

	y >= rect.y &&

	y <= rect.y + rect.height

	);

}
)







</script>

MYSCRIPT;


}


