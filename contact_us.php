<?php

require_once "Form.php";
require_once "XO_setting.php";
require_once "User.php";
require_once "HTML.php";

$contactUsHTML = new HTML();
$css_files = array ("css/form.css",
    "css/jquery-ui.min.css",
    "css/main.css");
$js_files = array("js/jquery-3.6.0.min.js",
    "js/jquery-ui.min.js",
    "js/main.js");
$contactUsHTML->title = "MutexXO Contact us";
$contactUsHTML->author ="Kimseng Houy";
$contactUsHTML->emitHeader($css_files, $js_files, "MutexXO - Contact us");
$contactUsHTML->emitNavigation();
$contactUsHTML->emitMain("MutexXO - Contact us", 'main');
$contactUsHTML->emitAside();
$contactUsHTML->emitFooter();



function main(){
    echo "<p>Our address is: 16, Motorway Road - Km2 Prawet, Bangkok, Thailand. 10250</p>";
    emitContactUsForm();
    echo "<p>Stamford International University</p>";


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



