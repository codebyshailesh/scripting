<?php
session_start();
echo "Welcome, <b>" . $_SESSION['name'] . "</b> to dashboard" . " <br> Email: " . $_SESSION['email'] . "<br> Gender: " . $_SESSION['gender'] . "<br> Hash Password: " . $_SESSION['Hash_Password'];
