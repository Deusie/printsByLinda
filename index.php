<?php
include 'configdbPDO.php';
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

<div class="container-fluid p-0">
    <div class="container-fluid p-0 d-none d-md-block">
        <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="Carousel/Print.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <a class="btn btn-outline-light" href="Store.php">SHOP NOW</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="Carousel/printss.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <a class="btn btn-outline-light" href="Store.php">SHOP NOW</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="Carousel/Canva%20-%20Silhouette%20of%20Two%20People%20Standing%20on%20Seashore%20During%20Sunset.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <a class="btn btn-outline-light" href="Store.php">SHOP NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid p-0 d-md-none">
        <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="Carousel/couple-690047_1920.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption">
                        <a class="btn btn-outline-light" href="Store.php">SHOP NOW</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="Carousel/couple-690047_1920.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption">
                        <a class="btn btn-outline-light" href="Store.php">SHOP NOW</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="Carousel/couple-690047_1920.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption">
                        <a class="btn btn-outline-light" href="Store.php">SHOP NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- store -->

<?php
$data = $conn->query("SELECT * FROM product")->fetchAll();

echo '<div class="container mb-5 mt-5">';
    echo '<div id="storeContent" class="row">';
        echo '<div class="card-columns">';
            foreach ($data as $row) {?>
                <div class="card">
                    <a id="<?="front" . $row["ID"]?>" href="ItemView.php?product= <?=$row["ID"]?>">
                        <img src="assets/product-images/<?=$row["Front_IMG"]?>" class="card-img-top" alt="...">
                    </a>
                    <a id="<?="back" . $row["ID"]?>" style="display: none;" href="ItemView.php?product= <?=$row["ID"]?>">
                        <img src="assets/product-images/<?=$row["Back_IMG"]?>" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <?php
                        if ($row["Back_IMG"] != "Template-back.png"){
                            ?>
                            <a onclick="changeToBack(<?=$row["ID"]?>)">
                                <img src="assets/product-images/<?=$row["Front_IMG"]?>" alt="..." height="50px" width="50px">
                            </a>
                            <a onclick="changeToFront(<?=$row["ID"]?>)">
                                <img src="assets/product-images/<?=$row["Back_IMG"]?>" alt="..." height="50px" width="50px">
                            </a>
                            <?php
                        }
                        ?>
                        <h5 class="card-title text-center"><?=$row["ProductName"]?></h5>
                        <h5 class="card-title text-center"><?=$row["Price"]?>€</h5>
                    </div>
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
            <?php } ?>
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
    function changeToFront(id) {
        document.getElementById('front' + id).style.display = "none";
        document.getElementById('back' + id).style.display = "block";
    }

    function changeToBack(id){
        document.getElementById('front' + id).style.display = "block";
        document.getElementById('back' + id).style.display = "none";
    }

    function addFavorite(favoriteId) {
        Favorites.setItem(favoriteId, favoriteId);
        console.log("added favorite" + favoriteId)
        document.getElementById('addHeart' + favoriteId).style.display = "none";
        document.getElementById('removeHeart' + favoriteId).style.display = "block";
        document.getElementById('favoriteModalText').textContent = "Artikel is toegevoegd aan je verlanglijstje";
        // var modalBody = document.getElementById('modalBody')
        favoriteModalOpen();
    }

    function deleteFavorite(favoriteId) {
        Favorites.removeItem(favoriteId);
        console.log("removed favorite")
        document.getElementById('addHeart' + favoriteId).style.display = "block";
        document.getElementById('removeHeart' + favoriteId).style.display = "none";
        //document.getElementById('favoriteModalText').textContent = "Artikel is verwijderd van u verlanglijstje";
        // var modalBody = document.getElementById('modalBody')
        // // modalBody.style.backgroundColor = "#f8d7da";
        // // modalBody.style.color = "#721c24";
        // // modalBody.style.borderColor = "#f5c6cb";
        //favoriteModalOpen();
    }

    function DeleteALlFavorites() {
        Favorites.clear();
        console.log("remove all favorites")
    }
</script>
</html>


