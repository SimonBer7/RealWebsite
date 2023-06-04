<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>REAL MADRID</title>
    <link rel="icon" type="image/x-icon" href="./img/favi.png">
    <link rel="stylesheet" href="aboutClub.php">
    <link rel="stylesheet" href="sestava.php">
    <link rel="stylesheet" href="shop.php">
    <link rel="stylesheet" href="bag.php">
    <link rel="stylesheet" href="style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>

    <header class="p-3 text-bg-secondary sticky-top">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <img src="./img/favi.png" width="50" height="70">
                <span class="fs-2 mx-5 text-white">Real Madrid</span>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="index.php" class="nav-link p-3 text-white">Home</a></li>
                    <li><a href="aboutClub.php" class="nav-link p-3 text-white">O klubu</a></li>
                    <li><a href="sestava.php" class="nav-link p-3 text-white">Sestava</a></li>

                    <?php session_start(); if(isset($_SESSION["email"])){

                    ?>
                    <li><a href="shop.php" class="nav-link p-3 text-white">FanShop</a></li>
                    <li><a href="bag.php" class="nav-link p-3 text-white">Bag</a></li>
                    <?php }?>

                </ul>

                <div class="text-end">
                    
                    <?php if(isset($_SESSION["email"])){
                    ?>
                    <button id="logout" type="button" class="btn btn-secondary text-black border border-white me-2" onclick="window.location.href = './php/logout.php'">Log-Out</button>
                    <?php }else{

                    ?>  
                    <button id="login" type="button" class="btn btn-secondary text-black border border-white me-2" onclick="window.location.href = 'login.php';">Log-In</button>
                    <button id="signup" type="button" class="btn btn-secondary text-black border border-white me-2" onclick="window.location.href = 'signup.php';">Sign-Up</button>
                    <?php
                    }?>
                 </div>
            </div>
        </div>
    </header>
    <br>

    <div class="container bg-white p-5">

        <h2 class="mb-4 text-center">Sign-Up</h2>
        <form action="./php/signup.php" method="POST">
            <div class="mb-3 m-2">
                <label for="username" class="form-label mt-2">Username</label>
                <input type="text" name="username" class="form-control" id="username" require>
            </div>
            <div class="form-group p-3">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group p-3">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group p-3">
                <label for="password2">Password again:</label>
                <input type="password" class="form-control" id="password2" name="password2" required>
            </div>
            <div class="p-3">
                <button type="submit" class="btn btn-primary p-3">Sign-Up</button>
            </div>
        </form>
        <p class="mt-3 p-3">Already have an account? <a href="login.php">Log in</a></p>

    </div>
    <br>



    <div id="footer">
        <footer class="py-3">
            <p class="text-center text-body-secondary"><a href="https://github.com/SimonBer7/RealWebsite">© Šimon Bernard</a></p>
        </footer>
    </div>


</body>
</html>
