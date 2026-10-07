<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['submit'])) {
    $email = trim($_POST['email'] ?? '');
    header('Content-Type: application/json');
    echo json_encode(['valid' => filter_var($email, FILTER_VALIDATE_EMAIL) !== false]);
    exit;
}

if (isset($_POST['submit'])) {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');

    if (empty($name) || empty($email)) {
        echo 'Name and Email are required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Invalid email format';
    } else {
        echo 'Form submitted successfully';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body>
    <form method="POST" action="">
        Name: <input type="text" name="name" id="name" required>
        Email: <input type="email" name="email" id="email" required>
        Password: <input type="password" name="password" id="password">
        <button type="submit" name="submit">Submit</button>
    </form>

    <script>
        $('#email').on('blur', function () {
            const email = $(this).val();
            if (!email) return;

            $.ajax({
                url: '',
                type: 'POST',
                data: { email: email },
                dataType: 'json',
                success: function (response) {
                    console.log(response);
                },
                error: function (xhr, status, error) {
                    console.log(status, error);
                }
            });
        });
    </script>
</body>

</html>