<?php
session_start();
include("class.web.php");

$db = new DbConnection();
$name = $_SESSION['name'];
$email = $_SESSION['email'];

if (isset($_POST['logout'])) {
    $db->logout();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <h2>Welcome to Dashboard</h2>
    <p><?php echo $name; ?></p>
    <p><?php echo $email; ?></p>
    <form method="POST">
        <button type="submit" name="logout">Logout</button>
    </form>
</body>

</html>