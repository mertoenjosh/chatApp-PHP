<?php
    session_start();
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
                        $time = time(); // returns current time
                                        // we will rename all images with current time
                                        // this makes us have a unique name all the time


                        // lets move the user uploaded img to our particulr folder
                        $new_img_name = $time.$img_name;

                        if (move_uploaded_file($tmp_name, "images/".$new_img_name)) {
                            $status = "Active now"; // once the user signed up then his status willbe active now
                            $random_id = rand(time(), 10000000);

                            // lets insert all user data in table
                            $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, passwd, img, u_status)
                                                VALUES ('{$random_id}', '{$fname}', '{$lname}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");

                            if ($sql2) {
                                $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' ");

                                if (mysqli_num_rows($sql3) > 0) {
                                    $row = mysqli_fetch_assoc($sql3);
                                    $_SESSION['unique_id'] = $row['unique_id']; // using this session  we used user unique_id in other php file

                                    echo "Success";
                                }
                            } else {
                                echo "Something went wrong";
                            }
                        }
                        


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