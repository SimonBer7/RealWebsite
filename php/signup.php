<?php

$servername = "localhost";
$username = "root";
$password = "GaiSgULS7";
$dbname = "realwebsite";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];
    

    if($password === $password2){
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "SELECT * FROM zakaznici WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "This email is already registered. Please use a different email.";
        } else {
            $sql = "INSERT INTO zakaznici (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";
        
            if ($conn->query($sql) === TRUE) {
                header("Location: ../signup.php");
            } else {
                echo "Error: " . $conn->error;
            }
        }
    }   
}

$conn->close();
?>