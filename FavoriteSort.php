<?php
include 'configdb.php';
if ($_POST["itemID"] != null) {
    $sqlSort = "SELECT * FROM product WHERE ID IN (" . $_POST["itemID"] . ")";

    $resultSort = mysqli_query($con,$sqlSort);

    while($row = mysqli_fetch_assoc($resultSort))
    {
        ?>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-5">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <a target="_blank" class="mb-4" href="ItemView.php?product= <?=$row["ID"]?>">
                            <img src="Images/Clothing/<?=$row["Front_IMG"]?>" class="card-img-top mt-4 mb-4" alt="...">
                        </a>
                    </div>
                    <div class="col-md-8" style="background: #f5f5f5">
                            <div class="top-right">
                                <a onclick="addFavorite(<?=$row["ID"]?>)" id="<?="addHeart" . $row["ID"]?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </a>
                                <a onclick="deleteFavorite(<?=$row["ID"]?>)" id="<?="removeHeart" . $row["ID"]?>" style="display: none">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </a>
                            </div>
                        <div class="card-body" style="background: #f5f5f5">
                            <p class="card-title text-center"><?= $row["ProductName"]?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}else{
    ?>
    <div class="col mt-5 text-center">
        <h4>You don't have any favorites yet</h4>
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
