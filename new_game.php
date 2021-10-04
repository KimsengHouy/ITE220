<?php

require_once "HTML.php";
require_once "Form.php";
require_once "XO_setting.php";
require_once "session.php";

$gamePageHTML = new HTML();
$css_files = array("css/form.css",
    "css/jquery-ui.min.css",
    "css/main.css",
    "css/style.css");
$js_files = array("js/jquery-3.6.0.min.js",
    "js/jquery-ui.min.js",
    "js/main.js",
    "js/script.js");
$gamePageHTML->title = "MutexXO Game";
$gamePageHTML->author = "Kimseng Houy";
$gamePageHTML->emitHeader($css_files, $js_files, "MutexXO Game");
$gamePageHTML->emitNavigation();
$gamePageHTML->emitMain("MutexXO Game", 'main');
$gamePageHTML->emitAside();
//$gamePageHTML->emitFooter();


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
    echo "<p><b>Player Name: </b><span id ='name'> $username </span> </p> ";

    if ($logged_in) {
        emitLogoutForm();
    }

    echo "<div id='score_div'>";
    echo "<p><b>Score: </b><span id='score'>0</span></p>";
    echo "<p><b>Speed: </b><span id='speed'>10</span></p>";
    echo "</div>";
    echo "<div id='container'>";
    echo "<div id='bird'></div>";
    echo "<div id='pole_1' class='pole'></div>";
    echo "<div id='pole_2' class='pole'></div>";
    echo "</div>";

    echo "<button id='restart_btn'>Restart</button>";
    
}




























