<?php

session_start();

if(isset($_SESSION['user_id']))
{
    session_destroy();

    if(session_status() == PHP_SESSION_ACTIVE)
    {
        echo "Error: Unable to destroy the session.";
        exit;
    }
}

header("HTTP/1.1 303 See Other");
header("Location: login.php");
exit;

?>
