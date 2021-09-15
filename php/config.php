<?php
    $conn = mysqli_connect("localhost", "wiz", "kameoDB", "phpChatApp");

    if (!$conn) {
        echo "Database not connected " . mysqli_connect_error();
    } 
    
    
?>