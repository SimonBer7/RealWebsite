<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>REAL MADRID</title>
    <link rel="icon" type="image/x-icon" href="./img/favi.png">
    <link rel="stylesheet" href="index.php">
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
                    <li><a href="aboutClub.php" class="nav-link p-3 text-white active">O klubu</a></li>
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



    <div class="container bg-light p-3 mb-5 rounded">

        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h1 class="featurette-heading">Historie, <span class="text-muted">a mnohem více právě zde</span></h1>
                <p class="lead">
                    <br> Klub byl založen v roce 1902, ale právo nosit titul Real (královský) mu bylo uděleno až v roce 1920 králem Alfonsem XIII (v letech 1931-40 slovo Real odebráno z důvodu existence Druhé Španělské republiky). Poslední kosmetická změna názvu přišla v roce 1941, kdy bylo z názvu odstraněno anglické Football Club, které bylo nahrazeno španělským Club de Fútbol. Stalo se tak z důvodu pečlivého frankistického potírání všech anglicismů v zemi. V roce 1920 se název klubu změnil se svolením krále na Real Madrid Club de Fútbol.
                </p>
            </div>
            <div class="col-md-5 order-md-1">
                <img class="featurette-image img-fluid mx-auto rounded" data-src="holder.js/400x400/auto" alt="400x400" src="./img/stadion2.jpg" data-holder-rendered="true" style="width: 400px; height: 400px;">
            </div>
        </div>

        <div class="row featurette">
            <div class="col-md-7">
                <p class="lead">
                    <br> Real hraje na stadionu Santiago Bernabéu v Madridu s kapacitou 81 044 diváků, který byl postaven v roce 1947. Klubovou historii zdobí mnoho titulů. Real vyhrál třináctkrát Ligu mistrů UEFA (dříve Pohár mistrů evropských zemí), tedy vícekrát než kterýkoliv jiný fotbalový klub v celé Evropě. 18. prosince 2000 zvolila FIFA Real Madrid za nejlepší fotbalový klub 20. století.
                </p>
                <br>
            </div>
            <div class="col-md-5 order-md-1">
                <img class="featurette-image img-fluid mx-auto rounded" data-src="holder.js/700x400/auto" alt="700x400" src="./img/stadion.jpg" data-holder-rendered="true" style="width: 700px; height: 400px;">
            </div>
        </div>

        <br>
        <button class="btn" id="trofeje">Seznam trofejí Realu Madrid</button>

        <table class="table" id="table" style="display: none;">
            <thead class="thead-dark">
                <tr>
                    <th>Sezóna</th>
                    <th>Trofej</th>
                </tr>
            </thead>
            <tbody>
                 <tr>
                    <td>1955</td>
                    <td>Latinský pohár</td>
                </tr>
                <tr>
                    <td>1955/1956</td>
                    <td>Pohár mistrů evropských zemí</td>
                </tr>
                <tr>
                    <td>1956/1957</td>
                    <td>Pohár mistrů evropských zemí</td>
                </tr>
                <tr>
                    <td>1957</td>
                    <td>Latinský pohár</td>
                </tr>
                <tr>
                    <td>1957/1958</td>
                    <td>Pohár mistrů evropských zemí</td>
                </tr>
                <tr>
                    <td>1958/1959</td>
                    <td>Pohár mistrů evropských zemí</td>
                </tr>
                <tr>
                    <td>1959/1960</td>
                    <td>Pohár mistrů evropských zemí</td>
                </tr>
                <tr>
                    <td>1960</td>
                    <td>Interkontinentální pohár</td>
                </tr>
                <tr>
                    <td>1965/1966</td>
                    <td>Pohár mistrů evropských zemí</td>
                </tr>
                 <tr>
                    <td>1984/1985</td>
                    <td>Pohár UEFA</td>
                </tr>
                <tr>
                    <td>1985/1986</td>
                    <td>Liga mistrů UEFA</td>
                </tr>
                <tr>
                    <td>1997/1998</td>
                    <td>Liga mistrů UEFA</td>
                </tr>
                 <tr>
                    <td>1998</td>
                    <td>Interkontinentální pohár</td>
                </tr>
                <tr>
                    <td>2001/2002</td>
                    <td>Liga mistrů UEFA</td>
                </tr>
                <tr>
                    <td>2002</td>
                    <td>Superpohár UEFA</td>
                </tr>
                 <tr>
                    <td>2002</td>
                    <td>Interkontinentální pohár</td>
                </tr>
                <tr>
                    <td>2013/2014</td>
                    <td>Liga mistrů UEFA</td>
                </tr>
                <tr>
                    <td>2014</td>
                    <td>Superpohár UEFA</td>
                </tr>
                <tr>
                    <td>2014</td>
                    <td>Mistrovství světa ve fotbale klubů</td>
                </tr>
                <tr>
                    <td>2015/2016</td>
                    <td>Liga mistrů UEFA</td>
                </tr>
                <tr>
                    <td>2016</td>
                    <td>Superpohár UEFA</td>
                </tr>
                <tr>
                    <td>2016</td>
                    <td>Mistrovství světa ve fotbale klubů</td>
                </tr>
                <tr>
                    <td>2016/2017</td>
                    <td>Liga mistrů UEFA</td>
                </tr>
                <tr>
                    <td>2017</td>
                    <td>Superpohár UEFA</td>
                </tr>
                <tr>
                    <td>2017</td>
                    <td>Mistrovství světa ve fotbale klubů</td>
                </tr>
                <tr>
                    <td>2017/2018</td>
                    <td>Liga mistrů UEFA</td>
                </tr>
                <tr>
                    <td>2018</td>
                    <td>Mistrovství světa ve fotbale klubů</td>
                </tr>
                <tr>
                    <td>2021/2022</td>
                    <td>Liga mistrů UEFA</td>
                </tr>
                <tr>
                    <td>2022</td>
                    <td>Superpohár UEFA</td>
                </tr>
            </tbody>
        </table>


    </div>
    <br>

    <div id="footer">
        <footer class="py-3">
            <p class="text-center text-body-secondary"><a href="https://github.com/SimonBer7/RealWebsite">© Šimon Bernard</a></p>
        </footer>
    </div>




    <script>
    $("#trofeje").click(function () {
        $("#table").fadeToggle();  
    });
    </script>

</body>
</html>