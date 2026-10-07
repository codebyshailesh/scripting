<?php
include("class.web.php");
$db = new DbConnection();
$errors = [];
$name = "";
$email = "";
$password = "";
$gender = "";

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'] ?? "";

    if (empty($name)) {
        $errors[] = "Name is required";
    }

    if (empty($email)) {
        $errors[] = "Email is required";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email must be valid";
    }

    if (empty($password)) {
        $errors[] = "Password is required";
    } else if (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 digit";
    }

    if (empty($gender)) {
        $errors[] = "Gender is required";
    }

    if (count($errors) == 0) {
        // echo "Register successful";
        $db->register($name, $email, $password, $gender);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
</head>

<body>
    <h2>Register</h2>
    <div>
        <?php
        foreach ($errors as $e) {
            echo "<p style='color:red;'>" . $e . "</p>";
        }
        ?>
    </div>
    <form method="POST">
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>">
            <span id="email-status" style="color:red;"></span>
        </div>
        <div>
            <label for="gender">Gender:</label>
            Male: <input type="radio" name="gender" value="male" <?php if ($gender == "male") echo "checked"; ?>>
            Female: <input type="radio" name="gender" value="female" <?php if ($gender == "female") echo "checked"; ?>>
            Others: <input type="radio" name="gender" value="others" <?php if ($gender == "others") echo "checked"; ?>>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <button type="submit" name="register">Register</button>
        </div>
    </form>

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $("#email").on("blur", function() {
        let email = $(this).val().trim();
        let emailStatus = $("#email-status");
        emailStatus.text("");

        if (!email) {
            return;
        }

        $.ajax({
            url: "check_email.php",
            type: "POST",
            data: {
                email: email
            },
            success: function(response) {
                if ($("#email").val().trim() !== email) {
                    return;
                }

                if (response === "exist") {
                    emailStatus.text("Email already exists");
                }
            },
            error: function() {
                if ($("#email").val().trim() === email) {
                    emailStatus.text("Unable to check email. Please try again.");
                }
            }
        });
    })
</script>

</html>