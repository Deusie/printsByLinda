<?php
include 'configdbPDO.php';

$totalPrice = 0;
if ($_POST["itemID"] != null) {
   $data = $conn->query("SELECT * FROM product WHERE ID IN (" . $_POST["itemID"] . ")")->fetchAll();

   echo'<div class="row" >';
    foreach ($data as $row){
        $totalPrice += $row["Price"];
        ?>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-5">
            <div class="card mb-3">
                <div class="row border-bottom">
                    <div class="col-md-1">
                        <a class="mb-4" href="ItemView.php?product= <?=$row["ID"]?>">
                            <img width="100px" height="100px" src="Images/Clothing/<?=$row["Front_IMG"]?>" class="mt-4 mb-4" alt="...">
                        </a>
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                            <p class="card-title text-center"><?= $row["ProductName"]?></p>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <p><?=$row["Price"]?> €</p>
                    </div>
                    <div class="col-md-1">
                        <a onclick="addCart(<?=$row["ID"]?>)" id="<?="addCart" . $row["ID"]?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                        </a>
                        <a onclick="deleteCart(<?=$row["ID"]?>)" id="<?="removeCart" . $row["ID"]?>" style="display: none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
    </div>
    <div class="row" style="background-color: #b8b8b8">
        <div class="col-md-12 p-3" >
            <p class="text-right">totaal artikelen <?=$totalPrice?></p>
            <a href="mail.php">
                <button type="button" class="float-right btn btn-outline-primary">Verder naar bestellen</button>
            </a>
        </div>
    </div>
    <?php
}else{
    ?>
    <div class="row">
        <div class="col mt-5 text-center">
            <h4>Your cart is empty</h4>
        </div>
    </div>
    <?php
}
?>

<script>
    $(document).ready(function(){
        for (var i = 0; i < sessionStorage.length; i++){
            document.getElementById('addCart' + sessionStorage.getItem(sessionStorage.key(i))).style.display = "none";
            document.getElementById('removeCart' + sessionStorage.getItem(sessionStorage.key(i))).style.display = "block";
        }
    });
</script>

