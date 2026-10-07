<?php
session_start();
include('class.web.php');
$w = new Web;


$errors = [];

if (isset($_POST['register'])) {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $gender = $_POST["gender"] ?? "";
    $password = $_POST["password"];

    // Validate Full Name
    if (empty($name)) {
        $errors[] = "Full Name is required.";
    } elseif (strlen($name) < 3) {
        $errors[] = "Full Name must be at least 3 characters.";
    }

    // Validate Email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }

    // Validate Gender
    $allowed_genders = ["M", "F", "O"];

    if (!in_array($gender, $allowed_genders)) {
        $errors[] = "Please select a valid gender.";
    }

    // Validate Password
    if (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters.";
    } elseif (
        !preg_match("/[0-9]/", $password) ||
        !preg_match("/[^a-zA-Z0-9]/", $password)
    ) {
        $errors[] = "Password must contain at least one number and one special character.";
    }

    // If no errors
    if (empty($errors)) {

        // Hash password
        $hashed_password = md5($password);

        // Store data in session
        $_SESSION["user"] = [
            "name" => $name,
            "email" => $email,
            "gender" => $gender,
            "password" => $hashed_password
        ];
        // calling register function
        $w->register();

        exit();
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Signup Form</title>
</head>

<body>

    <h2>Signup Form</h2>

    <?php
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    }
    ?>

    <form method="POST" action="">

        <label>Full Name:</label><br>
        <input type="text" name="name"
            value="<?php echo htmlspecialchars($_POST["name"] ?? ""); ?>">
        <br><br>

        <label>Email:</label><br>
        <input type="email" name="email"
            value="<?php echo htmlspecialchars($_POST["email"] ?? ""); ?>">
        <br> <span id="email-msg"></span>
        <br>

        <label>Gender:</label><br>

        <input type="radio" name="gender" value="M"> Male
        <input type="radio" name="gender" value="F"> Female
        <input type="radio" name="gender" value="O"> Other

        <br><br>

        <label>Password:</label><br>
        <input type="password" name="password">
        <br><br>

        <input type="submit" name="register" value="Sign Up">

    </form>

</body>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $("#email").on("blur", function() {
        var email = $(this).val();
        if (email === "") {
            $("#email-msg").text("");
            return;
        }
        $.ajax({
            url: "checkEmail.php",
            type: "POST",
            data: {
                email: email
            },
            success: function(response) {
                if (response === "taken") {
                    $("#email-msg").text("This email is already registered.").css("color", "#c00");
                } else {
                    $("#email-msg").text("Email is available.").css("color", "green");
                }
            }
        });


    });
</script>

</html>