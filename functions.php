<?php

/**
 *
 * @param mysqli $con The database connection object.
 *
 * @return mixed The user data if authenticated, otherwise false.
 * @throws Exception If there was an error querying the database.
 */
function check_login($con)
{
    if(isset($_SESSION['user_id']))
    {
        $id = $_SESSION['user_id'];
        
        // Prepare the query statement
        $stmt = $con->prepare("SELECT * FROM users WHERE user_id = ?");
        if(!$stmt)
        {
            throw new Exception("Unable to prepare query statement.");
        }
        
        // Bind the user_id parameter
        $stmt->bind_param("s", $id);
        
        // Execute the query
        if(!$stmt->execute())
        {
            throw new Exception("Unable to execute query.");
        }
        
        // Get the user data
        $result = $stmt->get_result();
        if($result && $result->num_rows > 0)
        {
            $user_data = $result->fetch_assoc();
            return $user_data;
        }
    }

    // User is not authenticated
    return false;
}

/**
 * Generates a random string of a specified length.
 *
 * @param int $length The length of the string to generate.
 * @param string $chars The characters to include in the string.
 *
 * @return string The random string.
 */
function generate_random_string($length, $chars = '0123456789')
{
    $text = "";
    $char_count = strlen($chars);
    
    for ($i = 0; $i < $length; $i++)
    {
        $text .= $chars[rand(0, $char_count - 1)];
    }

    return $text;
}
