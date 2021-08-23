<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Winkelwagen</title>
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
include('NavBar.php');
theme_header('');
?>


<div style="min-height: 700px" class="container mt-4 mb-5" >
    <?php
    echo "bedankt voor u bestelling met ordernummer: ".$_GET["order_id"]
    ?>
</div>
<?php
include("Footer.php");
?>
</body>
</html>
