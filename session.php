<?php

function session_logout () {
    session_start();
    // Unset all of the session variables.
$_SESSION = array();
// Finally, destroy the session.
session_destroy();
echo "Logged out! <a href = \"index.php\"> Home </a>";
}

/**
 * Session logout for different user
 */
function different_user () {
     session_logout();
}
