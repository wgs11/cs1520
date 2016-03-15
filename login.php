<?php
$username = "root";
$pass = "";
$server = "127.0.0.1";
$db = "gaming";


if (isset($_POST['name'])) {
    $user = $_POST['name'];
    $password = $_POST['password'];
    $conn = new mysqli($server,$username,$pass, $db);
    if($conn->connect_error){
        die("error".$conn->connect_error);
    }
    else{
        $sql = "SELECT * FROM users WHERE name = '$user'";
    }
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if($password == $row['pass']){
        echo "You logged in successfully <br>";
    }
    else{
        echo "Sorry, you're either not in the system or got your password wrong.
              Please trying again or create an account.<br>
        <a href='home.php'>Go Back</a>";
    }
}
else{}

?>