<?php
class DbConnection
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "sagarmatha";

    public $connection = null;

    public function __construct()
    {
        $this->connection = new mysqli($this->host, $this->user, $this->password, $this->database);
        if ($this->connection->connect_errno != 0) {
            echo "Faile to connect to db" . $this->connection->connect_error;
        }
    }

    // registration function
    public function register(string $name, string $email, string $password, string $gender)
    {
        $sql = "INSERT INTO user (fullName,email,password,gender) VALUES ('$name','$email','$password','$gender')";
        $result = $this->connection->query($sql);
        if ($result) {
            header("location:login.php");
        } else {
            echo "error while register";
        }
    }

    // login function
    public function login(string $email, string $password)
    {
        $sql = "SELECT * FROM user WHERE email = '$email'";
        $result = $this->connection->query($sql);
        $data = $result->fetch_assoc();
        print_r($data);

        $dbpassword = $data['password'];
        if ($password === $dbpassword) {
            session_start();
            $_SESSION['name'] = $data['fullName'];
            $_SESSION['email'] = $data['email'];
            header("location:dashboard.php");
        }
    }

    // logout function
    public function logout()
    {
        session_start();
        session_destroy();
        header('location:login.php');
    }
}
