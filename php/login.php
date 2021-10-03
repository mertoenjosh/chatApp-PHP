<?php
  session_start();

  if(isset($_SESSION['unique_id'])){ // if user is logged in
    header("location: users.php");
  }
?>

<?php
    session_start();
    include_once "config.php";

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (!empty($email) && !empty($password)) {
        // check users entered email and password matching to the database
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND passwd = '{$password}'");

        if (mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);
            $status = "Active now";

            // Update user status after login
            $sql2 = mysqli_query($conn, "UPDATE users SET u_status = '{$status}' WHERE unique_id = '{$row['unique_id']}'");

            if ($sql2) {
                $_SESSION['unique_id'] = $row['unique_id']; // using this session  we used user unique_id in other php file

                echo "Success";
            }

        } else {
            echo "Email or Password is incorrect!";
        }

    } else {
        echo "All input fields are required";
    }

?>