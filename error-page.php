<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Prints by Linda</title>
    <link rel="icon" href="assets/Logos/LogosPrints.png">
    <link rel="stylesheet" href="bootstrap-pure/Style.css">
    <link rel="stylesheet" href="bootstrap-pure/bootstrap-icons/bootstrap-icons.css">
    <script src="bootstrap-pure/b1.js"></script>
    <script src="bootstrap-pure/b2.js"></script>
    <script src="bootstrap-pure/b3.js"></script>

    <link rel="stylesheet" href="bootstrap-pure/myStyling.css">
</head>
<body>
<!-- navbar -->
<?php

include_once('NavBar.php');
theme_header('');
?>

<div class="container">
    <div class="row mt-5 text-center justify-content-center">
        <div class="col-12 mt-5">
            <div class="jumbotron" style="background-color: #923434">
                <h1 style="font-size:5vw" class="display-4 mb-1">ONZE WEBSITE</h1>
                <h3 style="font-size:3vw" class="display-4 mb-3">heeft even rust nodig</h3>
                <p class="mb-4 lead">
                    probeert u het later nog is
                </p>
            </div>
        </div>
    </div>
</div>

<footer class="container-fluid pt-3 pb-5 fixed-bottom" style="background-color: #535353">
    <div class="container">
        <div class="row">
            <div class="col">
                <ul class="list-group list-group-horizontal justify-content-center">
                    <li class="list-group-item footerLI"><a  href="index.php">Home</a></li>
                    <li class="list-group-item footerLI"><a  href="Store.php">Store</a></li>
                    <li class="list-group-item footerLI"><a  href="Contact.php">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
