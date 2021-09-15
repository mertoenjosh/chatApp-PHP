<?php
    include_once "config.php";

    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);


    if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
        
        // validate email
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {

        } else {
            echo "$email - Is not a valid email";
        }

    } else {
        echo "All input fields are required";   
    }
?>