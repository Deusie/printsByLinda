<?php
include 'configdb.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Official Ved webstore</title>
    <link rel="icon" href="Logos/VEDfavicon.png">
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
    <a class="navbar-brand" href="index.php">
        <img src="Logos/VedderNavLogo.svg" width="75em" height="75em"  alt="">
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
    <a class="d-none d-md-block ml-3" href="FavoritePage.php">
        <svg style="color: white" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-heart" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
        </svg>
    </a>
</nav>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $postString = $_POST["searchField"];
    $searchString = "%$postString%"; // prepare the $name variable
    $sql = "SELECT * FROM clothes WHERE ItemName LIKE ?"; // SQL with parameters
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $searchString);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_all(MYSQLI_ASSOC);

}
?>

<?php if ($data): ?>
<div class="container mb-5 mt-5">
    <div class="row">
        <?php foreach($data as $row): ?>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 mb-5">
                <div class="card h-100" style="background: #f5f5f5">
                    <?php
                    if (empty($row["Img_Path_Back"])) {
                        ?>
                        <a target="_blank" onmouseover="changeContent(<?=$row["ID"]?>)" onmouseleave="changeContentBack(<?=$row["ID"]?>)" class="mb-4" href="<?= $row["Web_URL"] ?>">
                            <img src="Images/Clothing/<?=$row["Img_Path_Front"]?>" class="card-img-top mt-4" alt="...">
                        </a>
                        <div id="<?=$row["ID"]?>" class="card-body pt-2 p-0 d-none d-md-block" style="background-color: #f5f5f5; color: #f5f5f5; transition: background-color 300ms;">
                            <h5 class="card-title text-center">SHOP NOW ON TEESPRING</h5>
                        </div>
                        <div class="card-body" style="background: white">
                            <p class="card-title text-center"><?= $row["ItemName"]?></p>
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
                    if (!empty($row["Img_Path_Back"])){
                        ?>
                        <div class="cf mb-5">
                            <div class="cardFlip" id="<?="flip" . $row["ID"]?>" onclick="flip()">
                                <div class="front">
                                    <a target="_blank" onmouseover="changeContent(<?=$row["ID"]?>)" onmouseleave="changeContentBack(<?=$row["ID"]?>)" class="mb-4" href="<?= $row["Web_URL"] ?>">
                                        <img src="Images/Clothing/<?=$row["Img_Path_Front"]?>" class="card-img-top mt-4" alt="...">
                                    </a>
                                </div>
                                <div class="back">
                                    <a target="_blank" onmouseover="changeContent(<?=$row["ID"]?>)" onmouseleave="changeContentBack(<?=$row["ID"]?>)" class="mb-4" href="<?= $row["Web_URL"] ?>">
                                        <img src="Images/Clothing/<?=$row["Img_Path_Back"]?>" class="card-img-top mt-4" alt="...">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div id="<?=$row["ID"]?>" class="card-body pt-2 p-0 d-none d-md-block" style="background-color: #f5f5f5; color: #f5f5f5; transition: background-color 300ms;">
                            <h5 class="card-title text-center">SHOP NOW ON TEESPRING</h5>
                        </div>
                        <div class="card-body" style="background: white">
                            <p class="card-title text-center"><?= $row["ItemName"]?></p>
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
                        <a onclick="addFavorite(<?=$row["ID"]?>)" id="<?="addHeart" . $row["ID"]?>">
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
        <?php endforeach ?>
    </div>
</div>
<?php else: ?>
    No data found
<?php endif ?>



<!-- Modal -->
<div class="modal fade" id="favoriteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div id="modalBody" class="modal-content">
            <div class="modal-body">
                <p class="p-0 m-0 text-center" id="favoriteModalText"></p>
            </div>
        </div>
    </div>
</div>

<footer class="container-fluid pt-3 pb-5 fixed-bottom" style="background-color: #535353;">
    <div class="container">
        <div class="row">
            <div class="col">
                <ul class="list-group list-group-horizontal justify-content-center">
                    <li class="list-group-item footerLI"><a  href="index.php">Home</a></li>
                    <li class="list-group-item footerLI"><a  href="Store.php">Shop</a></li>
                    <li class="list-group-item footerLI"><a  href="Contact.php">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
</body>
<script>
    function favoriteModalOpen(){
        $('#favoriteModal').modal('toggle');
    }

    function addFavorite(favoriteId) {
        Favorites.setItem(favoriteId, favoriteId);
        console.log("added favorite" + favoriteId)
        document.getElementById('addHeart' + favoriteId).style.display = "none";
        document.getElementById('removeHeart' + favoriteId).style.display = "block";
        document.getElementById('favoriteModalText').textContent = "Item added to your favorites";
        var modalBody = document.getElementById('modalBody')
        modalBody.style.backgroundColor = "#d4edda";
        modalBody.style.color = "#155724";
        modalBody.style.borderColor = "#c3e6cb";
        favoriteModalOpen();
    }

    function deleteFavorite(favoriteId) {
        Favorites.removeItem(favoriteId);
        console.log("removed favorite")
        document.getElementById('addHeart' + favoriteId).style.display = "block";
        document.getElementById('removeHeart' + favoriteId).style.display = "none";
        document.getElementById('favoriteModalText').textContent = "Item removed from your favorites";
        var modalBody = document.getElementById('modalBody')
        modalBody.style.backgroundColor = "#f8d7da";
        modalBody.style.color = "#721c24";
        modalBody.style.borderColor = "#f5c6cb";
        favoriteModalOpen();
    }
</script>
</html>