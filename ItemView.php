<?php
include 'configdbPDO.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Store</title>
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
theme_header('store');

if (isset($_GET['product'])) {

$id = $_GET['product'];
$data = $conn->query("SELECT * FROM `product` WHERE ID = $id ")->fetchAll();
echo '<div class="container mt-5">';
echo '<div class="row justify-content-center">';

foreach ($data as $row) {
$item = $row["Item"];
$data2 = $conn->query("SELECT * FROM `itemtype` WHERE ID = '$item'")->fetchAll();

foreach ($data2 as $row2) {
    $materials = explode("/", $row2["Materials"]);
    $colors = explode(",", $row2["Colors"]);
    $sizes = explode(",", $row2["Sizes"]);
    $widths = explode("x", $row2["Width"]);
    $lengths = explode("x", $row2["Length"]);
    $sleeves = explode("x", $row2["Sleeve"]);
}

if ($row["Back_IMG"] != null){
?>
<div class="col-xl-1 col-lg-2 col-md-12 col-sm-12 col-1 p-0 pr-1 d-none d-lg-block">
    <a onclick="changeToBack()" style="cursor: pointer">
        <img src="assets/product-images/<?= $row["Front_IMG"] ?>" class="card-img-top" alt="...">
    </a>
    <a onclick="changeToFront()" style="cursor: pointer">
        <img src="assets/product-images/<?= $row["Back_IMG"] ?>" class="card-img-top mt-3" alt="...">
    </a>
</div>
    <?php
}
?>
<div class="col-xl-5 col-lg-5 col-md-11 col-sm-11 col-11 pt-5 pb-4">
    <div class="card h-100">
        <a id="imageContainerFront" href="<?= $row["Web_URL"] ?>">
            <img src="assets/product-images/<?= $row["Front_IMG"] ?>" class="card-img-top mt-5" alt="...">
        </a>
        <a id="imageContainerBack" style="display: none;" href="<?= $row["Web_URL"] ?>">
            <img src="assets/product-images/<?= $row["Back_IMG"] ?>" class="card-img-top mt-5" alt="...">
        </a>
    </div>
</div>
<?php
if ($row["Back_IMG"] != null){

?>
<div class="col-md-12 col-sm-12 col-12 p-0 pr-1 d-lg-none mt-3 mb-3">
    <ul class="list-group list-group-horizontal pr-3 pl-3">
        <li class="list-group-item border-0 p-0" style="width: 75rem"></li>
        <li class="list-group-item border-0 p-0 ml-2">
            <a onclick="changeToBack()" style="cursor: pointer">
                <img src="assets/product-images/<?= $row["Front_IMG"] ?>" class="card-img-top" alt="...">
            </a>
        </li>
        <li class="list-group-item border-0 p-0 ml-2">
            <a onclick="changeToFront()" style="cursor: pointer">
                <img src="assets/product-images/<?= $row["Back_IMG"] ?>" class="card-img-top" alt="...">
            </a>
        </li>
        <li class="list-group-item border-0 p-0 ml-2" style="width: 75rem"></li>
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
    <button onclick="addCart(<?=$row["ID"]?>)"  type="button" class="btn btn-primary btn-lg mr-2 mt-1">
        <svg id="<?="addCart" . $row["ID"]?>" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z"></path>
            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"></path>
        </svg>
        <svg display="none" id="<?="removeCart" . $row["ID"]?>" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-check-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"></path>
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
                    <!-- Footer -->
                    <?php
                    include("Favorite-Modal.php");
                    include("Footer.php");
                    ?>
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
    Cart = window.sessionStorage;

    $(document).ready(function(){
        for (var i = 0; i < localStorage.length; i++){
            console.log('addHeart' + localStorage.getItem(localStorage.key(i)));
            try{
                document.getElementById('addHeart' + localStorage.getItem(localStorage.key(i))).style.display = "none";
            }catch(err) {}
            try{
                document.getElementById('removeHeart' + localStorage.getItem(localStorage.key(i))).style.display = "inline";
            }catch(err) {}
        }
        for (var j = 0; j < sessionStorage.length; j++){
            console.log('addCart' + sessionStorage.getItem(sessionStorage.key(j)));
            try{
                document.getElementById('addCart' + sessionStorage.getItem(sessionStorage.key(j))).style.display = "none";
            }catch(err) {}
            try{
                document.getElementById('removeCart' + sessionStorage.getItem(sessionStorage.key(j))).style.display = "inline";
            }catch(err) {}
        }
    });

    function addFavorite(favoriteId) {
        Favorites.setItem(favoriteId, favoriteId);
        console.log("added favorite" + favoriteId)
        document.getElementById('addHeart' + favoriteId).style.display = "none";
        document.getElementById('removeHeart' + favoriteId).style.display = "inline";
        document.getElementById('favoriteModalText').textContent = "Artikel is toegevoegd aan je verlanglijstje";
    }

    function addCart(cartId) {
        if (Cart.getItem(cartId) == null){
            Cart.setItem(cartId, cartId);
            console.log("added cart" + cartId)
            document.getElementById('addCart' + cartId).style.display = "none";
            document.getElementById('removeCart' + cartId).style.display = "inline";
        }
    }

    function deleteFavorite(favoriteId) {
        Favorites.removeItem(favoriteId);
        console.log("removed favorite")
        document.getElementById('addHeart' + favoriteId).style.display = "inline";
        document.getElementById('removeHeart' + favoriteId).style.display = "none";
    }
</script>
</html>
