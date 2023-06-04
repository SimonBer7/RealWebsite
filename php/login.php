<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "GaiSgULS7";
$dbname = "realwebsite";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Pøipojení se nezdaøilo: " . $conn->connect_error);
}




$loginAttempts = file_get_contents('number.txt');
file_put_contents('number.txt', '');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "SELECT password FROM zakaznici WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $storedPassword = $row["password"];

        if (password_verify($password, $storedPassword)) {
            $_SESSION["email"] = $email;   
            $loginAttempts = 0;
            
            $fileNumber = fopen("number.txt", "a");
            fwrite($fileNumber, $loginAttempts . PHP_EOL);

            header("Location: ../shop.php");
            exit();
        } else {
            $loginAttempts++;
            $fileNumber = fopen("number.txt", "a");
            fwrite($fileNumber, $loginAttempts . PHP_EOL);
            // Kontrola, zda byl pøekroèen maximální poèet pokusù
            if ($loginAttempts >= 3) {
                // Zápis emailu do textového souboru
                $file = fopen("failed_logins.txt", "a");
                fwrite($file, $email . PHP_EOL);
                //echo "Do emailu se snaží nìkdo dostat";
                fclose($file);

                // Resetování poètu pokusù o pøihlášení
                $loginAttempts = 0;
                $fileNumber = fopen("number.txt", "a");
                fwrite($fileNumber, $loginAttempts . PHP_EOL);
                header("Location: ../login.php");
                exit();
            }
        
            header("Location: ../login.php");
        }  
    } else {
        echo "Neplatný email nebo heslo.";
    }
}

$conn->close();
?>
