<?php
    $conn = mysqli_connect("localhost", "", "", "phpChatApp");

    if (!$conn) {
        echo "Database not connected " . mysqli_connect_error();
    } 
    
?>
