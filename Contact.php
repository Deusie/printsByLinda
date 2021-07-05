<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>contact</title>
    <link rel="icon" href="Logos/PRINTS%20B%20Y%20LINDA.png">
    <link rel="stylesheet" href="Bootstrap pure/Style.css">
    <script src="Bootstrap pure/b1.js"></script>
    <script src="Bootstrap pure/b2.js"></script>
    <script src="Bootstrap pure/b3.js"></script>

    <link rel="stylesheet" href="Bootstrap pure/myStyling.css">

    <style>
        body,html{
            height: 100%;
            background: rgb(83,83,83);
            background: linear-gradient(0deg, rgba(83,83,83,1) 10%, rgba(0,0,0,1) 90%);
        }
    </style>
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
            <li class="nav-item">
                <a class="nav-link" href="Store.php">Store</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="Contact.php">Contact<span class="sr-only">(current)</span></a>
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


<div class="container">
    <div class="row mt-5 text-center">
        <div class="col mt-5">
            <div class="jumbotron" style="border-radius: 0;">
                <h1 class="display-4 mb-5">CONTACT US</h1>
                    <p class="mb-4" style="font-size: 30px">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                            <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"></path>
                        </svg>
                        06 32769755
                    </p>

                    <p style="font-size: 30px">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                            <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"></path>
                        </svg>
                        Lindamizee@msn.com
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
