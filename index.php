<?php
include 'configdbPDO.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Prints by Linda</title>
    <link rel="icon" href="Logos/LogosPrints.png">
    <link rel="stylesheet" href="Bootstrap%20pure/Style.css">
    <script src="Bootstrap%20pure/b1.js"></script>
    <script src="Bootstrap%20pure/b2.js"></script>
    <script src="Bootstrap%20pure/b3.js"></script>
    <script src="Bootstrap%20pure/MyBack.js"></script>

    <link rel="stylesheet" href="Bootstrap%20pure/myStyling.css">
    <link rel="stylesheet" href="Bootstrap%20pure/divFlip.css">
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

<nav class="navbar navbar-expand-md navbar-dark" style="background-color: black">
    <a class="navbar-brand" href="index.php" onclick="DeleteALlFavorites()">
        <img src="Logos/Copy%20of%20PRINTS%20B%20Y%20LINDA.svg" width="150em" height="100em"  alt="">
    </a>
    <a id="heartIcon" class="d-md-none ml-auto" href="FavoritePage.php">
        <svg style="color: white" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-heart" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
        </svg>
    </a>
    <a id="searchIcon" style="cursor:pointer;" onclick="searchBar()" class="d-md-none ml-3">
        <svg style="color: white" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
            <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
        </svg>
    </a>
    <form action="SearchSort.php" method="post" id="SearchBar" style="display: none; width: 50%" class="form-inline my-2 my-lg-0 d-md-none">
        <div class="form-group has-search">
            <span class="form-control-feedback">
                <svg style="color: white" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                    <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                </svg>
            </span>
            <input name="searchField" style="background-color: black; border-radius: 20px 20px 20px 20px;-moz-border-radius: 20px 20px 20px 20px;-webkit-border-radius: 20px 20px 20px 20px;border: 0 solid #000000;" type="text" class="form-control" placeholder="Search">
        </div>
    </form>
    <button class="navbar-toggler ml-3" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Store.php">Store</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Contact.php">Contact</a>
            </li>
        </ul>
    </div>
    <form action="SearchSort.php" method="post" id="SearchBar" class="form-inline my-2 my-lg-0 d-none d-md-block">
        <div class="form-group has-search">
            <span class="form-control-feedback">
                <svg style="color: white" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                    <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                </svg>
            </span>
            <input name="searchField" style="background-color: black; border-radius: 20px 20px 20px 20px;-moz-border-radius: 20px 20px 20px 20px;-webkit-border-radius: 20px 20px 20px 20px;border: 0px solid #000000;" type="text" class="form-control" placeholder="Search">
        </div>
    </form>
    <a href="FavoritePage.php" class="d-none d-md-block">
        <svg style="color: white" width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-heart" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
        </svg>
    </a>
    <a class="d-none d-md-block ml-4" href="Cart.php">
        <svg style="color: white" xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
        </svg>
    </a>
</nav>
<div class="container-fluid p-0">
    <div class="container-fluid p-0 d-none d-md-block">
        <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="Banner/Print.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <a class="btn btn-outline-light" href="Store.php">SHOP NOW</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="Banner/printss.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <a class="btn btn-outline-light" href="Store.php">SHOP NOW</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="Banner/Canva%20-%20Silhouette%20of%20Two%20People%20Standing%20on%20Seashore%20During%20Sunset.jpg" class="d-block w-100" alt="...">
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
                    <img src="Banner/couple-690047_1920.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption">
                        <a class="btn btn-outline-light" href="Store.php">SHOP NOW</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="Banner/couple-690047_1920.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption">
                        <a class="btn btn-outline-light" href="Store.php">SHOP NOW</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="Banner/couple-690047_1920.jpg" class="d-block w-100" alt="...">
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
                        <img src="Images/Clothing/<?=$row["Front_IMG"]?>" class="card-img-top" alt="...">
                    </a>
                    <a id="<?="back" . $row["ID"]?>" style="display: none;" href="ItemView.php?product= <?=$row["ID"]?>">
                        <img src="Images/Clothing/<?=$row["Back_IMG"]?>" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <?php
                        if ($row["Back_IMG"] != "Template-back.png"){
                            ?>
                            <a onclick="changeToBack(<?=$row["ID"]?>)">
                                <img src="Images/Clothing/<?=$row["Front_IMG"]?>" alt="..." height="50px" width="50px">
                            </a>
                            <a onclick="changeToFront(<?=$row["ID"]?>)">
                                <img src="Images/Clothing/<?=$row["Back_IMG"]?>" alt="..." height="50px" width="50px">
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
<div class="modal fade" id="favoriteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div id="modalBody" class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <p class="p-0 m-0 text-center mb-4 mt-1" id="favoriteModalText"></p>

                <a type="button" style="background-color: #5aa8fc; color: white" class="float-left page-link ml-5" href="#" data-dismiss="modal">> Verder winkelen</a>
                <a type="button" class="float-right page-link mr-5" href="FavoritePage.php">Bekijk verlanglijstje</a>
            </div>
        </div>
    </div>
</div>

<footer class="container-fluid pt-3 pb-5" style="background-color: #535353">
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
<script>
    //weg halen uiteindelijk
    Cart = window.sessionStorage;
    //weg halen uiteindelijk


    function favoriteModalOpen(){
        $('#favoriteModal').modal('toggle');
    }

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
        Cart.clear();
        console.log("remove all favorites")
        console.log("remove all carts")
    }
</script>
</html>


