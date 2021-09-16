<?php
    include_once "config.php";

    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);


    if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
        
        // validate email
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) { // check if email is valid

            // Check if email already exists in the database
            $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");

            if (mysqli_num_rows($sql) > 0) { // if email already exists
                echo "$email - This email already exist!";
            } else {
                // check if user upload file or not
                if(isset($_FILES['image'])) { // if file is uploaded
                    $img_name = $_FILES['image']['name']; // getting user upladed image name
                    $img_type = $_FILES['image']['type']; // getting user upladed image type
                    $tmp_name = $_FILES['image']['tmp_name']; // this is a temporary name used to save/move image in our folder

                    // explode image and get its extension
                    $img_explode = explode('.', $img_name);
                    $img_ext = end($img_explode); // this is the extension of theuser uploaded file

                    $extensions = ['png', 'jpeg', 'jpg'];

                    // check if user upladed a file with a valid extension
                    if (in_array($img_ext, $extensions) === true) {

                    } else {
                        echo "Please select a valid image file! - png, jpeg, jpg";
                    }


                } else {
                    echo "Please select an image file!";
                }
            }
        } else {
            echo "$email - Is not a valid email";
        }

    } else {
        echo "All input fields are required";   
    }
?>