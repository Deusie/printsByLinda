<?php
include 'configdbPDO.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verlanglijstje</title>
    <link rel="icon" href="assets/Logos/LogosPrints.png">
    <link rel="stylesheet" href="bootstrap-pure/Style.css">
    <link rel="stylesheet" href="bootstrap-pure/bootstrap-icons/bootstrap-icons.css">
    <script src="bootstrap-pure/b1.js"></script>
    <script src="bootstrap-pure/b2.js"></script>
    <script src="bootstrap-pure/b3.js"></script>
    <script src="bootstrap-pure/Jquery.js"></script>

    <link rel="stylesheet" href="bootstrap-pure/myStyling.css">
</head>
<body>

<!-- navbar -->
<?php
include('NavBar.php');
theme_header('favorite');
?>


<div style="min-height: 700px" class="container mt-4 mb-5 mx-auto" >
    <div class="row" id="dropCont">

    </div>
</div>

<?php
include("Footer.php");
?>
</body>
<script>
    Favorites = window.localStorage;
    Cart = window.sessionStorage;

    $(document).ready(function(){
        runQuery();
    });

    function runQuery(){
        var ids = "";
        for (var i = 0; i < Favorites.length; i++){
            ids += Favorites.getItem(Favorites.key(i)) + ",";
        }
        console.log(ids);
        ids = ids.substring(0, ids.length - 1);

        $.ajax({
            url:"FavoriteDisplay.php",
            method:"POST",
            data:{itemID:ids},
            success:function(data)
            {
                $('#dropCont').html(data);
            }
        })
    }

    function deleteFavorite(favoriteId) {
        Favorites.removeItem(favoriteId);
        console.log("removed favorite")
        document.getElementById('addHeart' + favoriteId).style.display = "block";
        document.getElementById('removeHeart' + favoriteId).style.display = "none";
        runQuery();
    }

    function addCart(cartId) {
        if (Cart.getItem(cartId) == null){
            Cart.setItem(cartId, cartId);
            console.log("added cart" + cartId)
            document.getElementById('addCart' + cartId).style.display = "none";
            document.getElementById('removeCart' + cartId).style.display = "inline";
        }
    }
</script>
</html>

