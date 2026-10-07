<?php
$conn = new mysqli("localhost", "root", "", "user");
if ($conn->connect_error) {
    echo "failed to connect database";
}

$sql = "SELECT * from users where email = '$email'";
