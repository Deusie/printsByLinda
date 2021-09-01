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
$orderID = $_GET['order_id'];
?>


<div style="min-height: 700px" class="container mt-4 mb-5" >
    <div class="row">
        <div class="col text-center">
            <h1 class="text-center">Bedankt voor u bestelling!!</h1>
            <?php
            if (isset($_GET['order_id'])){
                ?>
            <h3 style="font-weight: normal" class="text-center mb-5">Met ordernummer: <?= $orderID ?></h3>
            <?php
            }
            ?>
            <h3 style="font-weight: normal" class="text-center">We gaan direct voor je aan de slag</h3>
            <a href="Store.php" type="button" class="btn btn-secondary btn-lg mt-4">Verder winkelen</a>
        </div>
    </div>
</div>
<?php
include("Footer.php");
?>
</body>
</html>
