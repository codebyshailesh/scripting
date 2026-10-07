<?php
class Web
{
	protected $host = "localhost";
	protected $user = "root";
	protected $password = "";
	protected $db = "sagramatha";
	public $connection = "";

	public function __construct()
	{
		$this->connection = new mysqli(
			$this->host,
			$this->user,
			$this->password,
			$this->db
		);
		if (!($this->connection)) {
			echo "Something is wrong";
		}
		return $this->connection;
	}

	public function register()
	{
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		$gender = $_POST['gender'];

		$sql = "INSERT into user(name,email,password,gender) VALUES('$name','$email','$password','$gender')";
		$result = $this->connection->query($sql);
		if ($result) {
			echo "Registered successfully";
			header('location:login.php');
		} else {
			echo "Cannot register";
		}
	}

	public function login()
	{
		session_start();
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		$sql = "SELECT id,name,email from user where email='$email' and password='$password'";
		$result = $this->connection->query($sql);
		$data = $result->fetch_array(MYSQLI_ASSOC);

		if ($result->num_rows >= 1) {
			$_SESSION['id'] = $data['id'];
			$_SESSION['name'] = $data['name'];
			$_SESSION['loggedin'] = 1;
			header('location:dashboard.php');
		} else {
			echo "Invalid login";
		}
	}

	public function logout()
	{
		session_start();
		session_destroy();
		header('location:login.php');
	}

	public function checkEmail()
	{
		$email = $_POST['email'];
		$sql = "SELECT id from user where email = '$email'";
		$result = $this->connection->query($sql);
		if ($result && $result->num_rows > 0) {
			echo "taken";
		} else {
			echo "available";
		}
	}
}
