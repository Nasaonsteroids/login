<?php

/**
 *
 * @param mysqli
 *
 * @return mixed 
 * @throws Exception 
 */
function check_login($con)
{
    if(isset($_SESSION['user_id']))
    {
        $id = $_SESSION['user_id'];
        
        $stmt = $con->prepare("SELECT * FROM users WHERE user_id = ?");
        if(!$stmt)
        {
            throw new Exception("Unable to prepare query statement.");
        }
        
        $stmt->bind_param("s", $id);
        
        if(!$stmt->execute())
        {
            throw new Exception("Unable to execute query.");
        }
        
        $result = $stmt->get_result();
        if($result && $result->num_rows > 0)
        {
            $user_data = $result->fetch_assoc();
            return $user_data;
        }
    }

    return false;
}

/**
 * 
 *
 * @param int 
 * @param string 
 *
 * @return string 
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
