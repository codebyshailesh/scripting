<?php
$errors = [];
$name = $email = $gender = $password = "";
if (isset($_POST['submit'])) {
    $name = $_POST['fullName'];
    $email = $_POST['email'];
    $gender = $_POST['gender'] ?? "";
    $password = $_POST['password'];
    if (empty($name)) {
        $errors[] = "Name is required";
    } elseif (strlen($name) < 3) {
        $errors[] = "Name must be atleast 3 characters";
    }

    if (empty($email)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email must be valid";
    }

    if (empty($gender)) {
        $errors[] = "Gender is required";
    }


    $pattern = '/^(?=.*\d)(?=.*[!@#$%^&*()_\-+=\[\]{};:\'",.<>?\/\\|]).{8,}$/';
    if (empty($password)) {
        $errors[] = "Password is required";
    } elseif (!preg_match($pattern, $password)) {
        $errors[] = "Password must be at least 8 characters long and contain at least one letter and one number.";
    }
    if (empty($errors)) {
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);
        session_start();
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['gender'] = $gender;
        $_SESSION['Hash_Password'] = $password_hashed;
        header("location:dashboard.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Signup form</h1>
    <div style="color:red;">
        <?php
        foreach ($errors as $e) {
            echo "<p>" . $e . "</p>";
        }
        ?>
    </div>
    <form method="POST">
        <div>
            <label for="fullName">Full Name:</label>
            <input type="text" name="fullName" value="<?php echo $name; ?>">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo $email; ?>">
        </div>
        <div>
            <label for=" gender">Gender:</label>
            Male:<input type="radio" name="gender" value="male" <?php if ($gender == 'male') echo "checked"; ?>>
            Female:<input type="radio" name="gender" value="female" <?php if ($gender == 'female') echo "checked"; ?>>
            Others:<input type="radio" name="gender" value="others" <?php if ($gender == 'others') echo "checked"; ?>>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" value="<?php echo $password; ?>">
        </div>
        <div>
            <button type="submit" name="submit">Submit</button>
        </div>
    </form>
</body>

</html>