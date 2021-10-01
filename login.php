<?php


require_once "HTML.php";
require_once "Form.php";
require_once "XO_setting.php";
require_once "session.php";

$homePageHTML = new HTML();
$css_files = array ("css/form.css",
    "css/jquery-ui.min.css",
    "css/main.css");
$js_files = array("js/jquery-3.6.0.min.js",
    "js/jquery-ui.min.js",
    "js/main.js");
$homePageHTML->title = "MutexXO";
$homePageHTML->author ="Kimseng Houy";
$homePageHTML->emitHeader($css_files, $js_files, "MutexXO HomePage");
$homePageHTML->emitNavigation();
$homePageHTML->emitMain("MutexXO HomePage", 'main');
$homePageHTML->emitAside();
//$homePageHTML->emitFooter();



/////////////////////////////////////////////

function emitUserAuthForm() {
    $form = new Form("AuthenticationProcessor.php");
    $form->startForm();
    $form->emitText("Username:");
    $form->emitInputText("username");
    $form->emitText("Password:");
    $form->emitInputText("password");
    $form->emitSubmitBtn("Login");
    $form->endForm();
}
function emitLogoutForm () {
    $form = new Form("logout.php");
    $form->startForm();
    $form->emitSubmitBtn("Logout");
    $form->endForm();
}

function emitSignUpForm () {
    $form = new Form("sign_up.php");
    $form->startForm();
    $form->emitText("New User?");
    $form->emitSubmitBtn("Sign Up");
    $form->endForm();
}

function main()
{
    $username = null;
    $logged_in = null;


    switch (AUTHENTICATION_MODE) {
        case 0: // cookies
            if (isset($_COOKIE['cookie_username']))
                $username = $_COOKIE['cookie_username'];
            else
                $username = "Player";
            break;
        case 1: // HTTP authentication
            if (isset($_SERVER['PHP_AUTH_USER']) &&
                isset($_SERVER['PHP_AUTH_PW'])) {
                $username = $_SERVER['PHP_AUTH_USER'];
            } else {
                header('WWW-Authenticate: Basic realm="Restricted Section"');
                header('HTTP/1.0 401 Unauthorized');
                die("Please enter your username and password");
            }
            break;
        case 2:
            session_start();
            if (isset($_SESSION['ip']))
                if ($_SESSION['ip'] != $_SERVER['REMOTE_ADDR']) different_user();
            if (isset($_SESSION['username']))
                $username = $_SESSION['username'];
            else
                $username = "Player";

            if (isset($_SESSION['logged_in']))
                $logged_in = $_SESSION['logged_in'];
            else
                $logged_in = false;
            break;
        default:
            break;

    }
    echo "Hello " . $username . "<BR>";

    if (!$logged_in) {
        emitUserAuthForm();
        emitSignUpForm();
    }
    if ($logged_in) {
        emitLogoutForm();
    }
}