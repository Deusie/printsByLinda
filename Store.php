<?php
include 'configdbPDO.php';
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
    <?php
    $data = $conn->query("SELECT * FROM product")->fetchAll();

    echo '<div class="container mb-5 mt-3">';
    echo '<div id="storeContent" class="row">';

    foreach ($data as $row) {?>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 mb-5">
            <div class="card h-100">
                <?php
                if (empty($row["Back_IMG"])) {
                    ?>
                    <a target="_blank" class="mb-4"href="ItemView.php?product= <?=$row["ID"]?>">
                        <img src="assets/product-images/<?=$row["Front_IMG"]?>" class="card-img-top mt-4" alt="...">
                    </a>
                    <div class="card-body" style="background: white">
                        <p class="card-title text-center"><?= $row["ProductName"]?></p>
                        <p class="card-title text-center"><?= $row["Price"]?>€</p>
                        <div class="text-center">
                            <svg onclick="flip()" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
                                <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/>
                            </svg>
                        </div>
                    </div>
                    <?php
                }
                ?>

                <?php
                if (!empty($row["Back_IMG"])){
                    ?>
                    <div class="cf mb-5">
                        <div class="cardFlip" id="<?="flip" . $row["ID"]?>" onclick="flip()">
                            <div class="front">
                                <a class="mb-4" href="ItemView.php?product= <?=$row["ID"]?>">
                                    <img src="assets/product-images/<?=$row["Front_IMG"]?>" class="card-img-top mt-4" alt="...">
                                </a>
                            </div>
                            <div class="back">
                                <a class="mb-4" href="ItemView.php?product= <?=$row["ID"]?>">
                                    <img src="assets/product-images/<?=$row["Back_IMG"]?>" class="card-img-top mt-4" alt="...">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body mt-5" style="background: white">
                        <p class="card-title text-center"><?= $row["ProductName"]?></p>
                        <p class="card-title text-center"><?= $row["Price"]?>€</p>
                        <div class="text-center">
                            <svg onclick="flip(<?=$row["ID"]?>)" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
                                <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/>
                            </svg>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <div class="top-right">
                    <a onclick="addFavorite(<?=$row["ID"]?>)" id="<?="addHeart" . $row["ID"]?>" data-toggle="modal" data-target="#favoriteModal">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-heart" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                        </svg>
                    </a>
                    <a onclick="deleteFavorite(<?=$row["ID"]?>)" id="<?="removeHeart" . $row["ID"]?>" style="display: none">
                        <svg style="color: #ca1d1d" width="1.1rem" height="1.1rem" viewBox="0 0 16 16" class="bi bi-heart-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>
</div>
</div>
<!-- Modal -->
<!-- Footer -->
<?php
include("Favorite-Modal.php");
include("Footer.php");
?>
</body>
<script>
    $(document).ready(function(){
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
    });

    function addFavorite(favoriteId) {
        Favorites.setItem(favoriteId, favoriteId);
        console.log("added favorite" + favoriteId)
        document.getElementById('addHeart' + favoriteId).style.display = "none";
        document.getElementById('removeHeart' + favoriteId).style.display = "block";
        document.getElementById('favoriteModalText').textContent = "Item added to your favorites";
    }

    function deleteFavorite(favoriteId) {
        Favorites.removeItem(favoriteId);
        console.log("removed favorite")
        document.getElementById('addHeart' + favoriteId).style.display = "block";
        document.getElementById('removeHeart' + favoriteId).style.display = "none";
    }
</script>
</html>
