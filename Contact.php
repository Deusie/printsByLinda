<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>contact</title>
    <link rel="icon" href="assets/Logos/LogosPrints.png">
    <link rel="stylesheet" href="bootstrap-pure/Style.css">
    <link rel="stylesheet" href="bootstrap-pure/bootstrap-icons/bootstrap-icons.css">
    <script src="bootstrap-pure/b1.js"></script>
    <script src="bootstrap-pure/b2.js"></script>
    <script src="bootstrap-pure/b3.js"></script>

    <link rel="stylesheet" href="bootstrap-pure/myStyling.css">

    <style>
        body,html{
            height: 100%;
            background: rgb(83,83,83);
            background: linear-gradient(0deg, rgba(83,83,83,1) 10%, rgba(0,0,0,1) 90%);
        }
    </style>
</head>
<body>
<!-- navbar -->
<?php
include('NavBar.php');
theme_header('contact');
?>

<div class="container">
    <div class="row mt-5 text-center justify-content-center">
        <div class="col-12 mt-5">
            <div class="jumbotron" style="border-radius: 0;">
                <h1 style="font-size:5vw" class="display-4 mb-5">CONTACT US</h1>
                    <p class="mb-4 lead">
                        <i style="font-style: normal" class="bi bi-whatsapp"> 06 31769755</i>
                    </p>

                    <p class="lead">
                        <i style="font-style: normal" class="bi bi-envelope-fill"> Lindamizee@msn.com</i>
                    </p>
            </div>
        </div>
    </div>
</div>

<footer class="container-fluid pt-3 pb-5 fixed-bottom" style="background-color: #535353">
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
    function searchBar() {
        document.getElementById("searchIcon").style.display = "none";
        document.getElementById("heartIcon").style.display = "none";
        document.getElementById("SearchBar").style.display = "block";
        $(document.body).click(function(e){
            var $box = $('#SearchBar');
            var $box2 = $('#searchIcon');
            if(e.target.id !== 'SearchBar' && e.target.id !== 'searchIcon' && !$.contains($box[0], e.target) && !$.contains($box2[0], e.target)){
                console.log("remove searchbar");
                document.getElementById("searchIcon").style.display = "block";
                document.getElementById("heartIcon").style.display = "block";
                document.getElementById("SearchBar").style.display = "none";
            }
        });
    }
</script>
</html>
