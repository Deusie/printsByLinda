<?php
include 'configdbPDO.php';
if ($_POST["itemID"] != null) {
    $data = $conn->query("SELECT * FROM product WHERE ID IN (" . $_POST["itemID"] . ") ORDER BY ID ASC")->fetchAll();

    foreach ($data as $row){
        ?>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mb-5">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <a class="mb-4" href="ItemView.php?product= <?=$row["ID"]?>">
                            <img src="Images/Clothing/<?=$row["Front_IMG"]?>" class="card-img-top mt-4 mb-4" alt="...">
                        </a>
                    </div>
                    <div class="col-md-8">
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
                        <div class="card-body">
                            <p class="card-title text-center"><?= $row["ProductName"]?></p>
                            <button style="position:absolute;left:0;bottom:0;" onclick="addCart(<?=$row["ID"]?>)"  type="button" class="btn btn-primary btn-block mb-4">
                                <svg id="<?="addCart" . $row["ID"]?>" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z"></path>
                                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"></path>
                                </svg>
                                <svg display="none" id="<?="removeCart" . $row["ID"]?>" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-check-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"></path>
                                </svg>
                                In winkelwagen
                            </button>
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
        for (var j = 0; j < sessionStorage.length; j++){
            document.getElementById('addCart' + sessionStorage.getItem(sessionStorage.key(j))).style.display = "none";
            document.getElementById('removeCart' + sessionStorage.getItem(sessionStorage.key(j))).style.display = "inline";
        }
    });
</script>
