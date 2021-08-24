<?php
include 'config/configdbPDO.php';
?>

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
theme_header('home');
?>

<div style="min-height: 700px" class="container mt-4">
    <div class="row">
            <?php
            function find_product(PDO $pdo, string $keyword): array
            {
                $pattern = '%' . $keyword . '%';

                $sql = 'SELECT * 
                FROM product 
                WHERE ProductName LIKE :pattern';

                $statement = $pdo->prepare($sql);
                $statement->execute([':pattern' => $pattern]);

                return $statement->fetchAll(PDO::FETCH_ASSOC);
            }

            // find products with the title matches the searchfield
            $data = find_product($conn, $_POST["searchField"]);
            if (empty($data)){
               ?>
            <div class="col">
                <h2 class="text-center">sorry maar we konden geen resultaten vinden</h2>
            </div>
                <?php
            }else{
                foreach ($data as $row) {
                    include('sortDisplay.php');
                }
            }

            ?>
    </div>
</div>



<!-- Modal -->
<!-- Footer -->
<?php
include("Modals.php");
include("Footer.php");
?>
</body>
</html>