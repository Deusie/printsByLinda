<?php
include 'configdbPDO.php';

if ($_POST["itemID"] != null) {

    $totalPrice = 0;
    $num = 0;
   $data = $conn->query("SELECT * FROM product WHERE ID IN (" . $_POST["itemID"] . ") ORDER BY ID ASC")->fetchAll();

   echo'<div id="cartContainer" class="row" >';
   echo'<h2 class="mb-5 ml-1">Winkelwagen</h2>';
    foreach ($data as $row){
        $totalPrice += $row["Price"];
        ?>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-5">
            <div class="card mb-3">
                <div class="row border-bottom">
                    <div class="col-xl-2 col-lg-2 col-md-2 col-5">
                        <a class="mb-4" href="ItemView.php?product= <?=$row["ID"]?>">
                            <img width="100px" height="100px" src="assets/product-images/<?=$row["Front_IMG"]?>" class="mt-4 mb-4" alt="...">
                        </a>
                    </div>
                    <div class="col-xl-10 col-lg-10 col-md-10 col-7">
                        <div class="card-body">
                            <div class="row d-md-none">
                                <div class="col-xl-2 col-lg-2 col-md-2 col-9">
                                    <p class="card-title text-center"><?= $row["ProductName"]?></p>
                                </div>
                                <div class="col-xl-1 col-lg-1 col-md-1 col-2">
                                    <a onclick="addCart(<?=$row["ID"]?>)" id="<?="addCart" . $row["ID"]?>">
                                        <i class="bi bi-x"></i>
                                    </a>
                                    <a onclick="deleteCart(<?=$row["ID"]?>)" id="<?="removeCart" . $row["ID"]?>" style="display: none">
                                        <i class="bi bi-x"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col d-none d-md-block">
                                    <p class="card-title text-center"><?= $row["ProductName"]?></p>
                                </div>
                                <div class="col-xl-1 col-lg-1 col-md-2 col-5">
                                    <div class="dropdown shadow-none">
                                        <button class="btn btn-secondary dropdown-toggle shadow-none" type="button" id="<?="dropdownMenuButton" . $num?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            1
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item sortOption" data-order="<?=$num?>" href="#">1</a>
                                            <a class="dropdown-item sortOption" data-order="<?=$num?>" href="#">2</a>
                                            <a class="dropdown-item sortOption" data-order="<?=$num?>" href="#">3</a>
                                            <a class="dropdown-item sortOption" data-order="<?=$num?>" href="#">4</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-2 col-7">
                                    <p><?=$row["Price"]?> €</p>
                                </div>
                                <div class="col-xl-1 col-lg-1 col-md-1 col-2 d-none d-md-block">
                                    <a onclick="addCart(<?=$row["ID"]?>)" id="<?="addCart" . $row["ID"]?>">
                                        <i class="bi bi-x"></i>
                                    </a>
                                    <a onclick="deleteCart(<?=$row["ID"]?>)" id="<?="removeCart" . $row["ID"]?>" style="display: none">
                                        <i class="bi bi-x"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        $num++;
    }
    echo '</div>';
    ?>

    <div id="bestellenContainer" class="row" style="background-color: #b8b8b8">
        <div class="col-md-12 p-3" >
            <p class="text-right">totaal artikelen <?=$totalPrice?></p>
            <button onclick="showForm()" type="button" class="float-right btn btn-outline-primary">Verder naar bestellen</button>
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

<div id="formContainer" style="display: none">
    <h2 class="mb-5">Bezorgadres</h2>
    <form method="post">
        <div class="form-row">
            <div class="form-group col-lg-4 col-lg-4 col-md-4 col-12">
                <label for="inputVoornaam">Voornaam*</label>
                <input type="text" class="form-control" id="inputVoornaam" name="inputVoornaam">
            </div>
            <div class="form-group col-lg-2 col-lg-2 col-md-2 col-6">
                <label for="inputTussenvoegsel">Tussenvoegsel</label>
                <input type="text" class="form-control" id="inputTussenvoegsel" name="inputTussenvoegsel">
            </div>
            <div class="form-group col-lg-6 col-lg-6 col-md-6 col-6">
                <label for="inputAchternaam">Achternaam*</label>
                <input type="text" class="form-control" id="inputAchternaam" name="inputAchternaam">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-lg-8 col-lg-8 col-md-8 col-12">
                <label for="inputEmail">Email*</label>
                <input type="email" class="form-control" id="inputEmail" name="inputEmail">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-lg-9 col-lg-9 col-md-9 col-8">
                <label for="inputStraatNaam">Straatnaam*</label>
                <input type="text" class="form-control" id="inputStraatNaam" name="inputStraatNaam">
            </div>
            <div class="form-group col-lg-2 col-lg-2 col-md-2 col-4">
                <label for="inputHuisNummer">Huisnummer*</label>
                <input type="text" class="form-control" id="inputHuisNummer" name="inputHuisNummer">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-lg-7 col-lg-7 col-md-7 col-8">
                <label for="inputPlaats">Plaats*</label>
                <input type="text" class="form-control" id="inputPlaats" name="inputPlaats">
            </div>
            <div class="form-group col-lg-3 col-lg-3 col-md-3 col-4">
                <label for="inputPostcode">Postcode*</label>
                <input type="text" class="form-control" id="inputPostcode" name="inputPostcode">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-lg-11 col-lg-11 col-md-11 col-12">
                <label for="inputInstructies">Instructies</label>
                <textarea class="form-control" id="inputInstructies" name="inputInstructies"rows="3"></textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Bestellen</button>
    </form>
</div>


<script>
    Cart = window.sessionStorage;
    const cartAantal = [];
    $(document).on('click', '.sortOption', function(){
        var order = $(this).data("order");

        $( "#dropdownMenuButton" + order ).text($(this).html());
        cartAantal[order]= $(this).html();
    });

    $(document).ready(function(){
        for (var i = 0; i < Cart.length; i++){
            document.getElementById('addCart' + Cart.getItem(sessionStorage.key(i))).style.display = "none";
            document.getElementById('removeCart' + Cart.getItem(sessionStorage.key(i))).style.display = "block";
            cartAantal[i] = 1;
        }

        $("form").on("submit", function(event){
            event.preventDefault();

            var formValues= $(this).serializeArray();


            var ids = "";
            for (var i = 0; i < Cart.length; i++){
                ids += Cart.getItem(Cart.key(i)) + ",";
            }
            ids = ids.substring(0, ids.length - 1);

            $.ajax({
                url:"CartMail.php",
                method:"POST",
                data:{itemID:ids, inputVoornaam:formValues[0].value,
                    inputTussenvoegsel:formValues[1].value,
                    inputAchternaam:formValues[2].value,
                    inputEmail:formValues[3].value,
                    inputStraatNaam:formValues[4].value,
                    inputHuisNummer:formValues[5].value,
                    inputPlaats:formValues[6].value,
                    inputPostcode:formValues[7].value,
                    inputInstructies:formValues[8].value,
                    inputAantal:cartAantal,
                },
                success:function(data)
                {
                    $('#dropCont').html(data);
                }
            })
        });
    });

    function showForm() {
        document.getElementById('cartContainer').style.display = "none";
        document.getElementById('bestellenContainer').style.display = "none";
        document.getElementById('formContainer').style.display = "block";
    }
</script>

