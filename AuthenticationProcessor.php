<?php
require_once "utils.php";
require_once "XO_setting.php";

extract($_POST, EXTR_PREFIX_ALL, 'post_params');


if (isset($post_params_username))
    $post_params_username = sanitizeString($post_params_username);
else
    $post_params_username = "";

if (isset($post_params_password))
    $post_params_password = sanitizeString($post_params_password);
else
    $post_params_password = "";

echo "Welcome Players ! <BR>";


switch (AUTHENTICATION_MODE) {
    case 0:
        $cookie_options = array(
            "expires" => "0",
            "path" => ROOT_PATH,
            "domain" => "",
            "secure" => false,
            "httponly" => false,
            "samesite" => "Lax"
        );
        setcookie(
            "cookie_username",
            $post_params_username,
            $cookie_options
        );
        header("Location: " . HOMEPAGE);

        break;

    case 2:
        if ($post_params_username && $post_params_password) {
            // user is authenticated
            ini_set('session.gc_maxlifetime', 60 * 60);
            session_start();
            $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
            // One_hour session

            $_SESSION['username'] = $post_params_username;
            $_SESSION['logged_in'] = true;
            echo "Hello, " . $post_params_username . "! Welcome back to Game.";
            echo "<a href= \"index.php\"> Home </a>";
        } else
            echo "Sorry! We could not recognize you!";
        break;
}
