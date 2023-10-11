<?php
    $conn = mysqli_connect("localhost","root","","web_food");
    if(!$conn) {
        die("Failed to connect".mysqli_connect_error());
    }
    else {
        echo "Connection established";
    }
?>



