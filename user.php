<?php

$username = "root";
$pass = "";
$server = "127.0.0.1";
$db = "gaming";
$user = $_POST['name'];
$password = $_POST['password'];
$verpass = $_POST['verpass'];
$sec_ans = $_POST['sec_ans'];
$sec_quest = $_POST['sec_quest'];


    $conn = new mysqli($server,$username,$pass, $db);
    if($conn->connect_error){
        die("error".$conn->connect_error);
    }
    else{
        echo "connected <br/>";

    }
if ($password === $verpass) {
    $sql = "INSERT INTO users(name, pass, sec_ans, sec_quest)
VALUES ('$user', '$password', '$sec_ans', '$sec_quest' )";
    if($conn->query($sql)===true){
        echo"inserted <br/>";
    }else{
        echo "error inserting ".$conn->error."<br/>";
    }

}
else{
    echo "Please make sure your passwords match.";
}
?>


