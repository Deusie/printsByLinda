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
                            <img src="assets/product-images/<?=$row["Front_IMG"]?>" class="card-img-top mt-4 mb-4" alt="...">
                        </a>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <div class="row text-center mb-3">
                                <div class="col">
                                    <p class="card-title"><?= $row["ProductName"]?></p>
                                </div>
                            </div>
                            <div class="row no-gutters text-center justify-content-center">
                                <div class="col-xl-7 col-lg-8 col-md-11 col-6">
                                    <button onclick="addCart(<?=$row["ID"]?>)"  type="button" class="btn btn-primary">
                                        <i id="<?="addCart" . $row["ID"]?>" class="bi bi-bag-plus"></i>
                                        <i style="display: none" id="<?="removeCart" . $row["ID"]?>" class="bi bi-bag-check-fill"></i>
                                        <p class="d-none d-md-block p-0 m-0 float-right">&nbsp;In winkelwagen</p>
                                    </button>
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-1 col-6">
                                    <button type="button" class="btn btn-danger" onclick="addFavorite(<?=$row["ID"]?>)" id="<?="addHeart" . $row["ID"]?>">
                                        <i class="bi bi-trash2-fill"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger" onclick="deleteFavorite(<?=$row["ID"]?>)" id="<?="removeHeart" . $row["ID"]?>" style="display: none">
                                        <i class="bi bi-trash2-fill"></i>
                                    </button>
                                </div>
                            </div>
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
