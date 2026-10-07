<?php
include("class.web.php");
$db = new DbConnection();
$errors = [];

if (isset($_POST['login'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($email)) {
        $errors[] = "Email is required";
    }
    if (empty($password)) {
        $errors[] = "Password is required";
    }

    if (count($errors) == 0) {
        // call login function in class.web.php
        $db->login($email, $password);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h2>login</h2>
    <div>
        <?php
        foreach ($errors as $e) {
            echo "<p style='color:red;'>" . $e . "</p>";
        }
        ?>
    </div>
    <form method="POST">
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <button type="submit" name="login">Login</button>
        </div>
    </form>

</body>

</html>