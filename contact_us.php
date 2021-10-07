<?php

require_once "Form.php";
require_once "XO_setting.php";
require_once "User.php";
require_once "HTML.php";

$contactUsHTML = new HTML();
$css_files = array("css/contact_form.css",
    "css/jquery-ui.min.css",
    "css/main.css");
$js_files = array("js/jquery-3.6.0.min.js",
    "js/jquery-ui.min.js",
    "js/main.js");
$contactUsHTML->title = "MutexXO Contact us";
$contactUsHTML->author = "Kimseng Houy";
$contactUsHTML->emitHeader($css_files, $js_files, "MutexXO - Contact us");
$contactUsHTML->emitNavigation();
$contactUsHTML->emitMain("MutexXO - Contact us", 'main');
$contactUsHTML->emitAside();
$contactUsHTML->emitFooter();


function main()
{
    emitContactUsForm();
    echo "<p id = 'c1'>Our address is: 16, Motorway Road - Km2 Prawet, Bangkok, Thailand. 10250</p>";
    echo "<p id = 'c2'>Stamford International University</p>";
    echo "<div id='map-responsive'>
<iframe src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3875.7243324235683!2d100.65921491541117!
3d13.73513250137872!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311d61a987e00607%3A0xda2e11759cf75777!2sStamford%20International%20University!5e0!3m2!1sen!2sth!4v1633361656365!5m2!1sen!2sth' 
width='600' height='450' style='border:0;' allowfullscreen= 'loading=' 'lazy'></iframe>
</div>";
}

function emitContactUsForm()
{
    $form = new Form("contact_form.php", true);
    $form->startForm("Contact Form", "validate_contact");
    $form->emitText("Your Name:");
    $form->emitInputText("name");
    $form->emitText("Email Address:");
    $form->emitInputText("email");
    $form->emitText("Your Message:");
    $form->emitInputText("message");
    $form->emitSubmitBtn("Submit");

    $form->endForm();
}



