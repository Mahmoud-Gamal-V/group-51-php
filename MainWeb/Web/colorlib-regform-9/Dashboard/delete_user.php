<?php

if (isset($_POST['delete_user'])) {
    // Get the user email from the hidden input field
    $user_email = $_POST['user_email'];
    
    // Connect to the database
    $con = mysqli_connect ('localhost', 'root', '', 'web-database', 3306);
    
    // Check if the connection was successful
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    // Delete the user from the database
    $sql = "DELETE FROM users WHERE email = '$user_email'";
    
    if (mysqli_query($con, $sql)) {
  
    } else {
        echo "Error deleting user: " . mysqli_error($con);
    }
    
    // Close the database connection
    mysqli_close($con);
}

?>