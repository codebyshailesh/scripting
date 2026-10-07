<?php
include('class.web.php');
$w = new Web();
session_start();
$name = $_SESSION['name'];
$loggedin = $_SESSION['loggedin'];
if ($loggedin != 1) {
    header('location:login.php');
}

if (isset($_POST['logout'])) {
    $w->logout();
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>

<body>
    <h1>Welcome to the dashboard | <?php echo $name; ?></h1>
    <form method="post">
        <input type="submit" name="logout" value="logout">
    </form>
</body>

</html>



?>