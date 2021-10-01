<?php
require_once "XO_setting.php";
require_once "session.php";

if (AUTHENTICATION_MODE == 1) { // HTTP Auth
    header("Location: http://logout@" . substr(HOMEPAGE, 7));

} else {
    // session-based
    session_logout();
}
