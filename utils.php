<?php

/**
 * Use sanitizeString() for sanitizing form input values to prevent hacking injection technique.
 *
 * @param string $var on string to be sanitized.
 * @return string sanitized string
 */
function sanitizeString($var) {
    $var = stripslashes($var);
    $var = strip_tags($var);
    $var = htmlentities($var);
    return $var;

}

/**
 * Use sanitizeMySQL to sanitize input value destined for MySQL server.
 *
 * @param string $connection SQL connection
 * @param string $var to be sanitized string
 * @return string sanitize string
 */

function sanitizeMySQL($connection, $var){
    $var = $connection->real_escape_string($var);
    return sanitizeString($var);
}