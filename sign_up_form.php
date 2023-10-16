<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";
$login = "loginDemiProfess.html";
$conn = new mysqli('localhost', 'root', '', 'users');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["emailId"];
    $passcode = $_POST["passcode"];
    $verify = "select Email , UserId from users ";
    $IdsNemails = $conn->query($verify);
    $NewUserId = 0;
    if($IdsNemails->num_rows > 0){
        while($eml = $IdsNemails->fetch_assoc()){
            if($eml["Email"] == $email){
                echo "Email is already registered there !";
                exit;
            }
            $NewUserId += 1;
        }
    }
    $NewUserId+=1;
    $sql = "INSERT INTO users VALUES ('$NewUserId','$name', '$email', '$passcode')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Message sent successfully!";
        echo "<br>Redirecting to login page <a href='$login' >login</a>";
                header('refresh:1;url=loginDemiProfess.html');
                exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

