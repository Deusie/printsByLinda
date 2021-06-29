<?php
include 'configdb.php';


$sql = "SELECT * FROM product ORDER BY ".$_POST["column_name"]." ".$_POST["order"]."";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_assoc($result))
{
    ?>
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 mb-5">
        <div class="card h-100">
            <?php
            if (empty($row["Back_IMG"])) {
                ?>
                <a target="_blank" class="mb-4"href="ItemView.php?product= <?=$row["ID"]?>">
                    <img src="Images/Clothing/<?=$row["Front_IMG"]?>" class="card-img-top mt-4" alt="...">
                </a>
                <div class="card-body" style="background: white">
                    <p class="card-title text-center"><?= $row["ProductName"]?></p>
                    <p class="card-title text-center"><?= $row["Price"]?>€</p>
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
            if (!empty($row["Back_IMG"])){
                ?>
                <div class="cf mb-5">
                    <div class="cardFlip" id="<?="flip" . $row["ID"]?>" onclick="flip()">
                        <div class="front">
                            <a class="mb-4" href="ItemView.php?product= <?=$row["ID"]?>">
                                <img src="Images/Clothing/<?=$row["Front_IMG"]?>" class="card-img-top mt-4" alt="...">
                            </a>
                        </div>
                        <div class="back">
                            <a class="mb-4" href="ItemView.php?product= <?=$row["ID"]?>">
                                <img src="Images/Clothing/<?=$row["Back_IMG"]?>" class="card-img-top mt-4" alt="...">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body mt-5" style="background: white">
                    <p class="card-title text-center"><?= $row["ProductName"]?></p>
                    <p class="card-title text-center"><?= $row["Price"]?>€</p>
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
    </div>
    <?php
}
?>
<script>
    $(document).ready(function(){
        for (var i = 0; i < localStorage.length; i++){
            document.getElementById('addHeart' + localStorage.getItem(localStorage.key(i))).style.display = "none";
            document.getElementById('removeHeart' + localStorage.getItem(localStorage.key(i))).style.display = "block";
        }
    });
</script>
