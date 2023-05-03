<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'login_sample_db');

$con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$con) {
    die('Failed to connect to the database: ' . mysqli_connect_error());
}

mysqli_set_charset($con, 'utf8mb4');

// Set additional options for the database connection
mysqli_options($con, MYSQLI_OPT_CONNECT_TIMEOUT, 10); // Set connection timeout to 10 seconds

// Use the $con variable for database operations
