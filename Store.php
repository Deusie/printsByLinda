<?php
include 'config/configdbPDO.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store</title>
    <link rel="icon" href="assets/Logos/LogosPrints.png">
    <link rel="stylesheet" href="bootstrap-pure/Style.css">
    <link rel="stylesheet" href="bootstrap-pure/bootstrap-icons/bootstrap-icons.css">
    <script src="bootstrap-pure/b1.js"></script>
    <script src="bootstrap-pure/b2.js"></script>
    <script src="bootstrap-pure/b3.js"></script>
    <script src="bootstrap-pure/Jquery.js"></script>
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
theme_header('store');
?>

<div class="container mt-3" id="sortContainer" style="display: none">
    <div class="row text-center">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-2 col-2">
            <a href="Store.php" style=" width: 16rem; color: black; background-color: white; border-radius: 20px 20px 20px 20px;-moz-border-radius: 20px 20px 20px 20px;-webkit-border-radius: 20px 20px 20px 20px;border: 1px solid black;" class="btn btn-secondary shadow-none d-none d-md-block" type="button" >
                <i class="bi bi-caret-left-fill float-left"></i>
                <p class="p-0 m-0">GO BACK</p>
            </a>
            <a href="Store.php" style="color: black; background-color: white; border-radius: 20px 20px 20px 20px;-moz-border-radius: 20px 20px 20px 20px;-webkit-border-radius: 20px 20px 20px 20px;border: 1px solid black;" class="btn btn-secondary shadow-none d-md-none" type="button" >
                <i class="bi bi-caret-left-fill float-left"></i>
            </a>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
            <div class="dropdown shadow-none">
                <button style=" width: 16rem; color: black; background-color: white; border-radius: 20px 20px 20px 20px;-moz-border-radius: 20px 20px 20px 20px;-webkit-border-radius: 20px 20px 20px 20px;border: 1px solid black;" class="btn btn-secondary dropdown-toggle shadow-none" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Sort by latest
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item sortOption" id="ID" data-order="desc" href="#">Sort by latest</a>
                    <a class="dropdown-item sortOption" id="Price" data-order="asc" href="#">Sort by price low to high</a>
                    <a class="dropdown-item sortOption" id="Price" data-order="desc" href="#">Sort by price high to low</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mb-5 mt-3" style="min-height: 700px"">
    <div id="storeContent" class="row">
        <div class="col-12">
            <p style="font-size: 20px" class="font-weight-bold mb-3">Categorieën</p>
        </div>

        <?php
        //loop through all the categories

        $data = $conn->query("SELECT * FROM categorie ORDER BY ID ASC")->fetchAll();

        foreach ($data as $row) {
            ?>
        <div  class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6">
            <div id="<?=$row["ID"]?>" class="card mb-3 p-3 categorieSort" style="cursor: pointer; max-width: 540px; border: 1px solid rgba(0, 0, 0, .125); border-radius: .25rem; height: 90%">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img class="card-img" src="assets/product-images/<?=$row["CategorieIMG"]?>">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <p class="card-title text-center"><?=$row["CategorieNaam"]?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }
        //loop through all the SUB-categories

        $data1 = $conn->query("SELECT * FROM subcategorie ORDER BY ID ASC")->fetchAll();

        foreach ($data1 as $row) {
            ?>
            <div  class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6">
                <div id="<?=$row["SubCategorieNaam"]?>" class="card mb-3 p-3 subcategorieSort" style="cursor: pointer; max-width: 540px; border: 1px solid rgba(0, 0, 0, .125); border-radius: .25rem; height: 90%">
                    <div class="row no-gutters">
                        <div class="col-md-12">
                            <div class="card-body">
                                <p class="card-title text-center"><?=$row["SubCategorieNaam"]?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
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
<script>

    var categorieID;
    var subcategorieID;
    $(document).on('click', '.categorieSort', function(){

        categorieID = $(this).attr("id");
        $.ajax({
            url:"storeSort.php",
            method:"POST",
            data:{categorieID:categorieID},
            success:function(data)
            {
                $('#sortContainer').show();
                $('#storeContent').html(data);
            }
        })
    });

    $(document).on('click', '.subcategorieSort', function(){

        subcategorieID = $(this).attr("id");
        $.ajax({
            url:"storeSort.php",
            method:"POST",
            data:{subcategorieID:subcategorieID},
            success:function(data)
            {
                $('#sortContainer').show();
                $('#storeContent').html(data);
            }
        })
    });

    $(document).on('click', '.sortOption', function(){

        var column_name = $(this).attr("id");
        var order = $(this).data("order");
        $( "#dropdownMenuButton" ).html($(this).html());
        $.ajax({
            url:"storeSort.php",
            method:"POST",
            data:{column_name:column_name, order:order, categorieID:categorieID},
            success:function(data)
            {
                $('#storeContent').html(data);
            }
        })
    });

    function addFavorite(favoriteId) {
        Favorites.setItem(favoriteId, favoriteId);
        console.log("added favorite" + favoriteId)
        document.getElementById('addHeart' + favoriteId).style.display = "none";
        document.getElementById('removeHeart' + favoriteId).style.display = "block";
    }

    function deleteFavorite(favoriteId) {
        Favorites.removeItem(favoriteId);
        console.log("removed favorite")
        document.getElementById('addHeart' + favoriteId).style.display = "block";
        document.getElementById('removeHeart' + favoriteId).style.display = "none";
    }
</script>
</html>
