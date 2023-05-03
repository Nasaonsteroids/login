<?php

session_start();

if(isset($_SESSION['user_id']))
{
    // Destroy all data associated with the current session
    session_destroy();

    // Check if the session was destroyed
    if(session_status() == PHP_SESSION_ACTIVE)
    {
        echo "Error: Unable to destroy the session.";
        exit;
    }
}

// Redirect the client to the login page
header("HTTP/1.1 303 See Other");
header("Location: login.php");
exit;

?>
