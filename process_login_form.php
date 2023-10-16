<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";
$home = "DemiProfess.html";
$conn = new mysqli('localhost', 'root', '', 'users');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_GET["emailId"];
$passcode = $_GET["passcode"];
$sql = "select Email , Passcode from users";
$rows = $conn->query($sql);
if($rows->num_rows > 0){
    while($row = $rows->fetch_assoc()){
        if($row["Email"] == $email){
            if($row["Passcode"] == $passcode){
                echo "Authentication Verification Successfull";
                echo "<br>Redirecting to Home page <a href='$home' >DemiProfess.in</a>";
                header('refresh:1;url=DemiProfess.html');
                exit;
            }
            else{
                echo 'password is invalid';
            }
        }
        else{
            echo "No such Email Id found!";
        }
    }
}

$conn->close();
?>
