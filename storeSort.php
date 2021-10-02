<?php
include 'config/configdbPDO.php';
$columName = "ID";
$order = "DESC";

if (isset($_POST["column_name"])){
     $columName = $_POST["column_name"];
}

if (isset($_POST["order"])){
    $order = $_POST["order"];
}

if (isset($_POST["categorieID"])){
    $data = $conn->query("SELECT * FROM product WHERE Categorie = ".$_POST["categorieID"]." ORDER BY ".$columName." ".$order."")->fetchAll();
}

function find_products(PDO $pdo, string $keyword): array
{
    $pattern = '%' . $keyword . '%';

    $sql = 'SELECT * 
                FROM product 
                WHERE SubCategorie LIKE :pattern';

    $statement = $pdo->prepare($sql);
    $statement->execute([':pattern' => $pattern]);

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

if (isset($_POST["subcategorieID"])){
    $data = find_products($conn, $_POST["subcategorieID"]);
}


if (empty($data)){
    echo "<div class='container-fluid'>";
        echo "<div class='row'>";
            echo "<div class='col'>";
                echo "<p class='text-center'>Geen producten gevonden</p>";
            echo "</div>";
        echo "</div>";
    echo "</div>";
}

foreach ($data as $row) {
    include('sortDisplay.php');
}
?>
<script>
    $(document).ready(function(){
        for (var i = 0; i < localStorage.length; i++){
            document.getElementById('addHeart' + localStorage.getItem(localStorage.key(i))).style.display = "none";
            document.getElementById('removeHeart' + localStorage.getItem(localStorage.key(i))).style.display = "block";
        }
    });
</script>
