<?php
include('class.web.php');
$w = new Web();
if (isset($_POST['login'])) {
	$w->login();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Form</title>

	<style>
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			font-family: Arial, sans-serif;
		}

		body {
			min-height: 100vh;
			display: flex;
			justify-content: center;
			align-items: center;
			background: linear-gradient(135deg, #667eea, #764ba2);
		}

		.login-box {
			width: 350px;
			padding: 40px;
			background: white;
			border-radius: 15px;
			box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
		}

		.login-box h2 {
			text-align: center;
			margin-bottom: 30px;
			color: #333;
		}

		.input-box {
			margin-bottom: 20px;
		}

		.input-box label {
			display: block;
			margin-bottom: 7px;
			color: #555;
			font-size: 14px;
		}

		.input-box input {
			width: 100%;
			padding: 12px;
			border: 1px solid #ddd;
			border-radius: 8px;
			outline: none;
			font-size: 15px;
			transition: 0.3s;
		}

		.input-box input:focus {
			border-color: #667eea;
			box-shadow: 0 0 5px rgba(102, 126, 234, 0.3);
		}

		.login-btn {
			width: 100%;
			padding: 12px;
			border: none;
			border-radius: 8px;
			background: #667eea;
			color: white;
			font-size: 16px;
			cursor: pointer;
			transition: 0.3s;
		}

		.login-btn:hover {
			background: #5568d9;
		}

		.forgot {
			text-align: right;
			margin: 10px 0 20px;
		}

		.forgot a {
			color: #667eea;
			text-decoration: none;
			font-size: 14px;
		}

		.signup {
			text-align: center;
			margin-top: 20px;
			color: #666;
			font-size: 14px;
		}

		.signup a {
			color: #667eea;
			text-decoration: none;
			font-weight: bold;
		}
	</style>
</head>

<body>

	<div class="login-box">
		<h2>Welcome Back</h2>

		<form method="post">
			<div class="input-box">
				<label>Email</label>
				<input type="email" placeholder="Enter your email" name="email" required>
			</div>

			<div class="input-box">
				<label>Password</label>
				<input type="password" placeholder="Enter your password" name="password" required>
			</div>

			<div class="forgot">
				<a href="#">Forgot Password?</a>
			</div>

			<button type="submit" class="login-btn" name="login">Login</button>

			<div class="signup">
				Don't have an account?
				<a href="#">Sign Up</a>
			</div>
		</form>
	</div>

</body>

</html>