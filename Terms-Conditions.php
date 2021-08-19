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
    <script src="bootstrap-pure/MyBack.js"></script>

    <link rel="stylesheet" href="bootstrap-pure/myStyling.css">
    <link rel="stylesheet" href="bootstrap-pure/divFlip.css">
    <style>
        .top-right {
            position: absolute;
            top: 8px;
            right: 16px;
        }
    </style>
</head>
<body>
<!-- navbar -->
<?php
include('NavBar.php');
theme_header('');
?>

<div style="min-height: 700px" class="container mt-5">
    <div class="row">
        <div class="col-6">
            <a href="assets/Files/Algemene-Voorwaarden.pdf" download="" type="button" class="btn btn-secondary btn-lg btn-block">Algemende voorwaarden Download</a>
        </div>
        <div class="col-6">
            <a href="assets/Files/Leverings-Voorwaarden.pdf" download="" type="button" class="btn btn-secondary btn-lg btn-block">Leveringstijden Download</a>
        </div>
    </div>
</div>


<!-- Footer -->
<?php
include("Footer.php");
?>
</body>
</html>
