<?php
include 'configdb.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Store</title>
    <link rel="icon" href="Logos/PRINTS%20B%20Y%20LINDA.png">
    <link rel="stylesheet" href="Bootstrap pure/Style.css">
    <script src="Bootstrap pure/b1.js"></script>
    <script src="Bootstrap pure/b2.js"></script>
    <script src="Bootstrap pure/b3.js"></script>

    <link rel="stylesheet" href="Bootstrap pure/myStyling.css">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark" style="background-color: black">
    <a class="navbar-brand" href="index.php">
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
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="Store.php">Store <span class="sr-only">(current)</span></a>
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
    <a class="d-none d-md-block ml-3" href="FavoritePage.php">
        <svg style="color: white" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-heart" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
        </svg>
    </a>
</nav>
<?php
if (isset($_GET['product'])) {

$id = $_GET['product'];
$sqlSORT = "SELECT * FROM `product` WHERE ID = $id ";
$resultSORT = mysqli_query($con, $sqlSORT);

echo '<div class="container mt-5">';
echo '<div class="row justify-content-center">';

while ($row = mysqli_fetch_assoc($resultSORT)) {
$item = $row["Item"];
$sqlSORT1 = "SELECT * FROM `itemtype` WHERE ID = '$item'";
$resultSORT1 = mysqli_query($con, $sqlSORT1);

while ($row2 = mysqli_fetch_assoc($resultSORT1)) {
    $materials = explode("/", $row2["Materials"]);
    $colors = explode(",", $row2["Colors"]);
    $sizes = explode(",", $row2["Sizes"]);
    $widths = explode("x", $row2["Width"]);
    $lengths = explode("x", $row2["Length"]);
    $sleeves = explode("x", $row2["Sleeve"]);
}

if ($row["Back_IMG"] != null){
?>
<div class="col-xl-1 col-lg-2 col-md-12 col-sm-12 col-1 p-0 pr-1 d-none d-md-block">
    <a onclick="changeToBack()" style="cursor: pointer">
        <img src="Images/Clothing/<?= $row["Front_IMG"] ?>" class="card-img-top" alt="...">
    </a>
    <a onclick="changeToFront()" style="cursor: pointer">
        <img src="Images/Clothing/<?= $row["Back_IMG"] ?>" class="card-img-top mt-3" alt="...">
    </a>
</div>
    <?php
}
?>
<div class="col-xl-5 col-lg-5 col-md-11 col-sm-11 col-11 pt-5 pb-5">
    <div class="card h-100">
        <a id="imageContainerFront" href="<?= $row["Web_URL"] ?>">
            <img src="Images/Clothing/<?= $row["Front_IMG"] ?>" class="card-img-top mt-5" alt="...">
        </a>
        <a id="imageContainerBack" style="display: none;" href="<?= $row["Web_URL"] ?>">
            <img src="Images/Clothing/<?= $row["Back_IMG"] ?>" class="card-img-top mt-5" alt="...">
        </a>
    </div>
</div>
<?php
if ($row["Back_IMG"] != null){
?>
<div class="col-md-12 col-sm-12 col-12 p-0 pr-1 d-md-none mt-3 mb-3">
    <ul class="list-group list-group-horizontal pr-3 pl-3">
        <li class="list-group-item border-0 p-0" style="width: 30rem"></li>
        <li class="list-group-item border-0 p-0 ml-2">
            <a onclick="changeToBack()" style="cursor: pointer">
                <img src="Images/Clothing/<?= $row["Front_IMG"] ?>" class="card-img-top" alt="...">
            </a>
        </li>
        <li class="list-group-item border-0 p-0 ml-2">
            <a onclick="changeToFront()" style="cursor: pointer">
                <img src="Images/Clothing/<?= $row["Back_IMG"] ?>" class="card-img-top" alt="...">
            </a>
        </li>
        <li class="list-group-item border-0 p-0 ml-2" style="width: 30rem"></li>
    </ul>
</div>
    <?php
}
?>

<div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 text-center">
    <h3><?= $row["ProductName"] ?></h3>
    <hr style="width: 10%; border: 2px solid #e0e0e0; border-radius: 2px;">
    <h2>€<?= $row["Price"] ?></h2>

    <ul class="list-group list-group-horizontal ml-2">
        <p>Colors:</p>
        <?php
        $limitedArray = array_slice($colors, 0, 8, true);
        foreach ($limitedArray as $color) {
            $color = "#" . $color;
            echo '<a class="p-1"><li class="list-group-item open" style="cursor: pointer; background-color:' . $color . '; border-radius: 1px;  padding: 10px;"></li></a>';

        }
        ?>
    </ul>

    <ul class="list-group list-group-horizontal ml-2">
        <p>Sizes:</p>
        <?php
        foreach ($sizes as $size) {
            echo '<a class="p-1"><li class="list-group-item open" style="cursor:pointer; border-radius: 1px;  padding: 0 7px 0 7px">' . $size . '</li></a>';
        }
        ?>
    </ul>

    <hr class="mb-3" style="border: 2px dashed #e0e0e0;">
    <button type="button" class="btn btn-primary btn-lg mr-2 mt-1">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z"></path>
            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"></path>
        </svg>
        In winkelwagen
    </button>
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

<div class="container-fluid mb-5">
    <div class="accordion mt-5" id="accordionExample">
        <div class="card productInfoContainer">
            <div class="card-header" style="background-color: white" id="headingOne">
                <h2 class="mb-0" style="text-decoration: none">
                    <button class="btn btn-link btn-block text-left collapsed productInfo" style="text-decoration: none"
                            type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                            aria-controls="collapseOne">
                        Description
                    </button>
                </h2>
            </div>

            <div id="collapseOne" class="collapse aria-labelledby=" headingOne
            " data-parent="#accordionExample">
            <div class="card-body">
                <p class="text-uppercase"><?= $row["ProductName"]?></p>
                <p class="font-weight-bold mb-1">MATERIALS:</p>
                <ul style="padding-left: 20px;">
                    <?php
                    foreach ($materials as $material) {
                        echo '<li class="text-uppercase">' . $material . '</li>';
                    }
                    ?>
                </ul>
                <p class="mb-0"><strong style="color: #ee2761">Note: </strong>Washing your shirts inside out is better
                    for the print, and keeps you looking fresh for longer.</p>
            </div>
        </div>
    </div>
    <div class="card productInfoContainer">
        <div class="card-header" style="background-color: white" id="headingTwo">
            <h2 class="mb-0" style="text-decoration: none">
                <button class="btn btn-link btn-block text-left collapsed productInfo" style="text-decoration: none"
                        type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                        aria-controls="collapseTwo">
                    Aditional information
                </button>
            </h2>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
                <table class="table table-borderless table-hover">
                    <thead>
                    <tr>
                        <th scope="col" class="text-center"></th>
                        <th scope="col" class="text-center">Length(CM)</th>
                        <th scope="col" class="text-center">Width(CM)</th>
                        <th scope="col" class="text-center">Sleeve(CM)</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $it = new MultipleIterator();
                    $it->attachIterator(new ArrayIterator($sizes));
                    $it->attachIterator(new ArrayIterator($widths));
                    $it->attachIterator(new ArrayIterator($lengths));
                    if (count($sleeves) > 1) {
                        $it->attachIterator(new ArrayIterator($sleeves));
                    }
                    //Add more arrays if needed
                    foreach ($it as $a) {
                        echo '<tr>';
                        echo '<th scope="row" class="text-center">' . $a[0] . '</th>';
                        echo '<td class="text-center">' . $a[1] . '</td>';
                        echo '<td class="text-center">' . $a[2] . '</td>';
                        if (count($sleeves) > 1) {
                            echo '<td class="text-center">' . $a[3] . '</td>';
                        }
                        echo '</tr>';
                    }
                    echo '</tbody>';
                    echo '</table>';
                    echo '</div>';
                    echo '</div>';
                    echo ' </div>';
                    echo ' </div>';
                    echo '</div>';


                    }
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    }
                    ?>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 style="color: #ee2761" class="modal-title" id="exampleModalLabel">Why can't i
                                        order here</h5>
                                </div>
                                <div class="modal-body">
                                    <p>All of our clothing is being printed and manufactured by our partner Teespring
                                        and is currentley only available via our official listings on their site</p>
                                    <p>We're hard at work to make sure that in the future you will be able to order all
                                        our products directly from our site but for now be sure to shop your products
                                        here and order them via Teespring</p>
                                    <p>Learn more about <strong><span><a style="color: #ee2761"
                                                                         href="#">Teespring</a></span></strong>.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a style="background-color: #ee2761; border: #6c0422" href="About us.php"
                                       type="button" class="btn btn-primary">Learn more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    //$sqlRelated = "SELECT * FROM `clothes`";
                    //$resultRelated = mysqli_query($con, $sqlRelated);
                    //
                    //echo '<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">';
                    //echo '<ol class="carousel-indicators">';
                    //echo '<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>';
                    //echo '<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>';
                    //echo '<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>';
                    //echo '</ol>';
                    //echo '<div class="carousel-inner">';
                    //
                    //$counter = 0;
                    //while ($row = mysqli_fetch_assoc($resultRelated)) {
                    //    if ($counter == 0) {
                    //        echo '<div class="carousel-item active">';
                    //            echo '<div class="container mb-5">';
                    //                echo '<div class="row">';
                    //    }
                    //                    echo '<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-6">';
                    //                        echo '<div class="card h-100" style="background: #f5f5f5">';
                    //                            echo '<a href="' . $row["Web_URL"] . '"><img src="../Images/Clothing/' . $row["Img_Path"] . '" class="card-img-top mt-5" alt="..."></a>';
                    //                            echo '<div id="" class="card-body pt-2 p-0" style="background-color: #f5f5f5; color: #f5f5f5; transition: background-color 300ms;">';
                    //                                echo '<h5 class="card-title text-center">SHOP NOW ON TEESPRING</h5>';
                    //                            echo '</div>';
                    //                            echo '<div class="card-body" style="background: white">';
                    //                                echo '<p class="card-title text-center">' . $row["ItemName"] . '</p>';
                    //                            echo '</div>';
                    //                        echo '</div>';
                    //                    echo '</div>';
                    //                    $counter++;
                    //    if ($counter == 4) {
                    //                    echo '</div>';
                    //                echo '</div>';
                    //            echo '</div>';
                    //        $counter = 0;
                    //    }
                    //}
                    //
                    //echo '</div>';
                    //echo '</div>';
                    ?>
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
                                        <li class="list-group-item footerLI"><a href="index.php">Home</a></li>
                                        <li class="list-group-item footerLI"><a href="Store.php">Store</a></li>
                                        <li class="list-group-item footerLI"><a href="Contact.php">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </footer>

</body>
<script>
    function changeToFront() {
        document.getElementById("imageContainerFront").style.display = "none";
        document.getElementById("imageContainerBack").style.display = "block";
    }

    function changeToBack(){
        document.getElementById("imageContainerFront").style.display = "block";
        document.getElementById("imageContainerBack").style.display = "none";
    }
    Favorites = window.localStorage;

    $(document).ready(function(){
        for (var i = 0; i < localStorage.length; i++){
            console.log('addHeart' + localStorage.getItem(localStorage.key(i)));
            try{
                document.getElementById('addHeart' + localStorage.getItem(localStorage.key(i))).style.display = "none";
            }catch(err) {}
            try{
                document.getElementById('removeHeart' + localStorage.getItem(localStorage.key(i))).style.display = "block";
            }catch(err) {}
        }
    });

    function addFavorite(favoriteId) {
        Favorites.setItem(favoriteId, favoriteId);
        console.log("added favorite" + favoriteId)
        document.getElementById('addHeart' + favoriteId).style.display = "none";
        document.getElementById('removeHeart' + favoriteId).style.display = "block";
        document.getElementById('favoriteModalText').textContent = "Artikel is toegevoegd aan je verlanglijstje";
        // var modalBody = document.getElementById('modalBody')
        //favoriteModalOpen();
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
</script>
</html>
