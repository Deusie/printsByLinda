<?php
function theme_header($pageShortName) {
    echo '

<nav class="navbar navbar-expand-md navbar-dark" style="background-color: black">
    <a class="navbar-brand" href="index.php" onclick="DeleteALlFavorites()">
        <img src="assets/Logos/Copy%20of%20PRINTS%20B%20Y%20LINDA.svg" width="150em" height="100em"  alt="">
    </a>
    <a id="heartIcon" class="d-md-none ml-auto" href="FavoritePage.php">
        <i style="font-size: 1.3em; color: white" ',(
            $pageShortName=='favorite' ? ' class="bi bi-heart-fill"' : ' class="bi bi-heart"'
            ),' >
        </i>
    </a>
    <a id="cartIcon" class="d-md-none ml-2" href="Cart.php">
        <i style="font-size: 1.3em; color: white" ',(
            $pageShortName=='cart' ? ' class="bi bi-bag-fill"' : ' class="bi bi-bag"'
            ),' >
        </i>
    </a>
   
    <a id="searchIcon" style="cursor:pointer;" onclick="searchBar()" class="d-md-none ml-2 mr-2">
        <i style="font-size: 1.3em; color: white" class="bi bi-search"></i>
    </a>
    <!--  voor mobile   -->
    <form action="SearchSort.php" method="post" id="SearchBar" style="display: none; width: 30%;" class="form-inline my-2 my-lg-0 d-md-none">
        <div class="form-group has-search mb-0">
            <span class="form-control-feedback">
                <i style="font-size: 1.3em; color: white" class="bi bi-search"></i>
            </span>
            <input name="searchField" style="background-color: black; border-radius: 20px 20px 20px 20px;-moz-border-radius: 20px 20px 20px 20px;-webkit-border-radius: 20px 20px 20px 20px;border: 0 solid #000000;" type="text" class="form-control" placeholder="Search">
        </div>
    </form>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
       
	<ul class="navbar-nav">
		<li',(
            $pageShortName=='home' ? ' class="nav-item active"' : ' class="nav-item"'
            ),' >
            <a class="nav-link" href="index.php">Home</a>
		</li>
		<li',(
            $pageShortName=='store' ? ' class="nav-item active"' : ' class="nav-item"'
            ),' >
            <a class="nav-link" href="Store.php">Store</a>
		</li>
		<li',(
            $pageShortName=='contact' ? ' class="nav-item active"' : ' class="nav-item"'
            ),' >
            <a class="nav-link" href="Contact.php">Contact</a>
		</li>
	</ul>
    </div>
<!--  dit is large screens   -->
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
        <i style="font-size: 1.3em; color: white" ',(
            $pageShortName=='favorite' ? ' class="bi bi-heart-fill"' : ' class="bi bi-heart"'
            ),' >
        </i>
    </a>
    <a class="d-none d-md-block ml-4" href="Cart.php">
        <i style="font-size: 1.3em; color: white" ',(
            $pageShortName=='cart' ? ' class="bi bi-bag-fill"' : ' class="bi bi-bag"'
            ),' >
        </i>
    </a>
</nav>
	';
}
?>
