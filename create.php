<?php
$username = "root";
$pass = "";
$server = "127.0.0.1";
$db = "gaming";


if (isset($_POST['name'])){
    $user = $_POST['name'];
    $password = $_POST['password'];
    $verpass = $_POST['verpass'];
    $sec_ans = $_POST['sec_ans'];
    $sec_quest = $_POST['sec_quest'];
    if ($password === $verpass){
        $conn = new mysqli($server,$username,$pass, $db);
        if($conn->connect_error){
            die("error".$conn->connect_error);
        }
        else{
            echo "connected <br/>";
            $sql = "INSERT INTO users(name, pass, sec_ans, sec_quest)
            VALUES ('$user', '$password', '$sec_ans', '$sec_quest' )";
            if($conn->query($sql)===true){
                echo"Congratulations, you successfully registered.<br>
                <a href='home.php'>Return Home</a>";
            }else{
                echo "error inserting ".$conn->error."<br/>";
            }

        }
    }
    else echo "Please enter matching passwords.<br>";
}
else{
    echo "Please enter a user name.<br>";
}


echo "<div>
        <form action = 'create.php' method = 'post'>
        Choose User Name: <input type = \"text\" name = 'name'><br>
        Set Challenge Question: <input type = \"text\" name = 'sec_quest'><br>
        Set Challenge Answer: <input type = \"text\" name = 'sec_ans'><br>
        Choose Password:  <input type=\"text\" name = 'password'><br>
        Retype Password:  <input type=\"text\" name = 'verpass'><br>
        <input type = \"submit\">

         </form>
    </div>";