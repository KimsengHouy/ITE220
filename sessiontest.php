<?php

session_start();
echo "session ID = " . session_id() . "<BR>";

if (!isset($_SESSION['initiated'])) {
    session_regenerate_id();
    $_SESSION['initiated'] = 1;
}

if (!isset($_SESSION['count']))
    $_SESSION['count'] = 0;
else
    ++$_SESSION['count'];
echo "counter = " . $_SESSION['count'];

