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

<div class="container-fluid p-0">
<div class="container mt-3 ">
    <div class="row text-center">
        <div class="col-xl-9 col-lg-9 d-none d-md-block">

        </div>
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
            <div class="dropdown shadow-none">
                <button style=" width: 16rem; color: black; background-color: white; border-radius: 20px 20px 20px 20px;-moz-border-radius: 20px 20px 20px 20px;-webkit-border-radius: 20px 20px 20px 20px;border: 1px solid #black;" class="btn btn-secondary dropdown-toggle shadow-none" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

<div class="container mb-5 mt-3">
    <div id="storeContent" class="row">
        <?php
        $data = $conn->query("SELECT * FROM product ORDER BY ID DESC")->fetchAll();

        foreach ($data as $row) {
            include ('storeSortDisplay.php');
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
    $(document).on('click', '.sortOption', function(){

        var column_name = $(this).attr("id");
        var order = $(this).data("order");
        $( "#dropdownMenuButton" ).html($(this).html());
        $.ajax({
            url:"storeSort.php",
            method:"POST",
            data:{column_name:column_name, order:order},
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
