<?php
include("class.web.php");
$email = $_POST['email'];

$db = new DbConnection();

$sql = "SELECT COUNT(*) FROM user WHERE email = '$email'";
$result = $db->connection->query($sql);
$data = $result->fetch_column();
if ($data > 0) {
    echo "exist";
    exit;
}
echo "available";
exit;
