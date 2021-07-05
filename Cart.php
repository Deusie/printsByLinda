<?php
include 'configdb.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favorites</title>
    <link rel="icon" href="Logos/PRINTS%20B%20Y%20LINDA.png">
    <link rel="stylesheet" href="Bootstrap%20pure/Style.css">
    <script src="Bootstrap%20pure/b1.js"></script>
    <script src="Bootstrap%20pure/b2.js"></script>
    <script src="Bootstrap%20pure/b3.js"></script>
    <script src="Bootstrap%20pure/Jquery.js"></script>

    <link rel="stylesheet" href="Bootstrap%20pure/myStyling.css">
    <style>
        .top-right {
            position: absolute;
            top: 8px;
            right: 16px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark" style="background-color: black">
    <a class="navbar-brand" href="index.php">
        <img src="Logos/Copy%20of%20PRINTS%20B%20Y%20LINDA.svg" width="150em" height="100em"  alt="">
    </a>
    <a href="FavoritePage.php" class="d-md-none ml-auto">
        <svg style="color: white" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
        </svg>
    </a>
    <a href="#" class="d-md-none ml-3">
        <svg style="color: white" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
            <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
        </svg>
    </a>
    <button class="navbar-toggler ml-3" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Store.php">Store</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Contact.php">Contact</a>
            </li>
        </ul>
    </div>
    <form class="form-inline my-2 my-lg-0 d-none d-md-block">
        <div class="form-group has-search">
            <span class="form-control-feedback">
                <svg style="color: white" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                    <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                </svg>
            </span>
            <input style="background-color: black; border-radius: 20px 20px 20px 20px;-moz-border-radius: 20px 20px 20px 20px;-webkit-border-radius: 20px 20px 20px 20px;border: 0px solid #000000;" type="text" class="form-control" placeholder="Search">
        </div>
    </form>
    <a href="FavoritePage.php" class="d-none d-md-block">
        <svg style="color: white" width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-heart" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
        </svg>
    </a>
    <a class="d-none d-md-block ml-4" href="Cart.php">
        <svg style="color: white" xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em" fill="currentColor" class="bi bi-bag-fill" viewBox="0 0 16 16">
            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z"/>
        </svg>
    </a>
</nav>


<div class="container mt-4 mb-5 mx-auto" >
    <div class="row" id="dropCont">

    </div>
</div>

<footer class="container-fluid pt-3 pb-5 fixed-bottom" style="background-color: #535353;">
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
    Cart = window.sessionStorage;

    $(document).ready(function(){
        runQuery();
    });

    function runQuery(){
        var ids = "";
        for (var i = 0; i < Cart.length; i++){
            ids += Cart.getItem(Cart.key(i)) + ",";
        }
        console.log(ids);
        ids = ids.substring(0, ids.length - 1);

        $.ajax({
            url:"CartSort.php",
            method:"POST",
            data:{itemID:ids},
            success:function(data)
            {
                $('#dropCont').html(data);
            }
        })
    }

    function deleteCart(cartId) {
        Cart.removeItem(cartId);
        console.log("removed Cart");
        runQuery();
    }
</script>
</html>


