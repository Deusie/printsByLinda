<?php
include 'config/configdbPDO.php';

if ($_POST["itemID"] != null) {

    $num = 0;
    $num2 = 0;
   $data = $conn->query("SELECT * FROM product WHERE ID IN (" . $_POST["itemID"] . ") ORDER BY ID ASC")->fetchAll();

   ?>
    <div id="cartContainer" class="row" style="display: block">
        <nav class="mb-5" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Winkelwagen</a></li>
            </ol>
        </nav>
    <?php
    foreach ($data as $row){
        $item = $row["Item"];
        $data2 = $conn->query("SELECT * FROM `itemtype` WHERE ID = '$item'")->fetchAll();

        foreach ($data2 as $row2) {
            $colors = explode(",", $row2["Colors"]);
            $sizes = explode(",", $row2["Sizes"]);
        }
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
                                    <a onclick="deleteCart(<?=$row["ID"]?>)" id="<?="removeCart" . $row["ID"]?>">
                                        <i class="bi bi-x"></i>
                                    </a>
                                    <a onclick="addCart(<?=$row["ID"]?>)" id="<?="addCart" . $row["ID"]?>" style="display: none">
                                        <i class="bi bi-x"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col d-none d-md-block">
                                    <p class="card-title text-center"><?= $row["ProductName"]?></p>
                                </div>
                                <div class="col-xl-1 col-lg-1 col-md-2 col-5">
                                    <div class="btn-group">
                                        <button id="<?="dropdownMenuAantal" . $num?>" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                                            1
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                            <button class="dropdown-item aantal" data-order="<?=$num?>" type="button">1</button>
                                            <button class="dropdown-item aantal" data-order="<?=$num?>" type="button">2</button>
                                            <button class="dropdown-item aantal" data-order="<?=$num?>" type="button">3</button>
                                            <button class="dropdown-item aantal" data-order="<?=$num?>" type="button">4</button>
                                            <button class="dropdown-item aantal" data-order="<?=$num?>" type="button">5</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-1 col-lg-1 col-md-2 col-5 mb-2">
                                    <div class="btn-group">
                                        <button id="<?="dropdownMenuSizes" . $num?>" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                                            L
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                            <?php
                                            foreach ($sizes as $size) {
                                                ?>
                                                <button class="dropdown-item size" data-order="<?=$num?>" type="button"><?=$size?></button>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-1 col-lg-1 col-md-2 col-5">
                                    <div class="btn-group">
                                        <button id="<?="dropdownMenuColors" . $num?>" type="button" class="btn btn-secondary dropdown-toggle my-dropdown-toggle" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                                            <div style="background: #<?=$row['Default_Color']?>;border-radius: 50%;width: 1.5em;height: 1.5em;"></div>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                            <?php
                                            foreach ($colors as $color) {
                                                ?>
                                                <button class="my-dropdown-item color" data-order="<?=$num?>" type="button">
                                                    <div style="background: #<?=$color?>; border: solid black 1px;border-radius: 50%;width: 1.5em;height: 1.5em;"></div>
                                                </button>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-2 col-6 text-center mt-2">
                                    <p id="<?="priceText" . $num?>"><?=$row["Price"]?> €</p>
                                </div>
                                <div class="col-xl-1 col-lg-1 col-md-1 col-2 d-none d-md-block">
                                    <a onclick="deleteCart(<?=$row["ID"]?>)" id="<?="removeCart" . $row["ID"]?>">
                                        <i class="bi bi-x"></i>
                                    </a>
                                    <a onclick="addCart(<?=$row["ID"]?>)" id="<?="addCart" . $row["ID"]?>" style="display: none">
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

    <div id="bestellenContainer" class="row p-3" style="background-color: #b8b8b8; min-height: 110px">
        <div class="col-md-12" >
            <p id="totalPriceText" class="text-right">totaal artikelen </p>
            <button onclick="showStep('none','block','none','none')" type="button" class="float-right btn btn-outline-primary">Verder naar bestellen</button>
        </div>
    </div>
    <?php
}else{
    ?>
    <div class="row">
        <div class="col mt-5 text-center">
            <h4>Je winkelwagen is leeg</h4>
        </div>
    </div>
    <?php
}
?>

<div id="formContainer" class="row p-3" style="display: none">
    <nav class="mb-5" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li onclick="showStep('block','none','none','none')" class="breadcrumb-item"><a href="#">Winkelwagen</a></li>
            <li class="breadcrumb-item active" aria-current="page">Bezorgadres</li>
        </ol>
    </nav>
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
                <textarea class="form-control" id="inputInstructies" name="inputInstructies" rows="3"></textarea>
            </div>
        </div>
        <div style="display: none" id="errorForm" class="alert alert-danger mb-3" role="alert">
            Vul alle velden in!
        </div>
        <button type="submit" class="btn btn-primary">Volgende</button>
    </form>
</div>

<div id="infoCheckContainer" class="row" style="display: none">
    <nav class="mb-5" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li onclick="showStep('block', 'none', 'none', 'none')" class="breadcrumb-item"><a href="#">Winkelwagen</a></li>
            <li onclick="showStep('none','block','none', 'none')" class="breadcrumb-item"><a href="#">Bezorgadres</a></li>
            <li class="breadcrumb-item active" aria-current="page">Gegevens controleren</li>
        </ol>
    </nav>
    <div class="jumbotron text-center">
        <h2 class="display-4 mb-5">Controlleer uw gegevens</h2>
        <p class="lead" id="nameDisplay">voor en achternaam</p>
        <p class="lead" id="mailDisplay">emailadres</p>
        <p class="lead" id="straatNrDisplay">straatnaam en huisnummer</p>
        <p class="lead" id="plaatsCodeDisplay">plaatsnaam en postcode</p>
        <a style="text-decoration: none" onclick="showStep('none','block','none', 'none')" href="#" class="lead mb-3">Gegevens aanpassen</a>
        <?php
        foreach ($data as $row){
        ?>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-0 p-0">
            <div class="card mb-0 border-bottom">
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-2 col-5 p-0">
                        <div class="mb-4">
                            <img width="100px" height="100px" src="assets/product-images/<?=$row["Front_IMG"]?>" class="mt-4 mb-4" alt="...">
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-10 col-md-10 col-7">
                        <div class="card-body">
                            <div class="row d-md-none">
                                <div class="col-xl-2 col-lg-2 col-md-2 col-9">
                                    <p class="card-title text-center"><?= $row["ProductName"]?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col d-none d-md-block">
                                    <p class="card-title text-center"><?= $row["ProductName"]?></p>
                                </div>
                                <div class="col-xl-1 col-lg-1 col-md-2 col-5">
                                    <div class="dropdown shadow-none">
                                        <p id="<?="dropdownMenuAantalCheck" . $num2?>">1</p>
                                    </div>
                                </div>
                                <div class="col-xl-1 col-lg-1 col-md-2 col-5">
                                    <div class="dropdown shadow-none">
                                        <p id="<?="dropdownMenuSizesCheck" . $num2?>">L</p>
                                    </div>
                                </div>
                                <div class="col-xl-1 col-lg-1 col-md-2 col-5">
                                    <div class="dropdown shadow-none">
                                        <div id="<?="dropdownMenuColorsCheck" . $num2?>">
                                            <div style="background: #<?=$row['Default_Color']?>; border: solid black 1px; border-radius: 50%;width: 1.5em;height: 1.5em;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-2 col-6 text-center">
                                    <p id="<?="priceText2" . $num2?>"><?=$row["Price"]?> €</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        $num2++;
    }
    ?>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-5 bg-white p-3">
            <p class="text-center float-left">Totaal: </p>
            <p id="totalPriceText2" class="text-right">0.00€</p>
        </div>
        <button onclick="showStep('none','none','none','block')" class="btn btn-primary btn-lg">Door naar betalen</button>
    </div>
</div>

<div id="paymentContainer" class="row" style="display: none">
    <nav class="mb-5" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li onclick="showStep('block', 'none', 'none', 'none')" class="breadcrumb-item"><a href="#">Winkelwagen</a></li>
            <li onclick="showStep('none','block','none', 'none')" class="breadcrumb-item"><a href="#">Bezorgadres</a></li>
            <li onclick="showStep('none','none','block', 'none')" class="breadcrumb-item"><a href="#">Gegevens controleren</a></li>
            <li class="breadcrumb-item active" aria-current="page">Betalen</li>
        </ol>
    </nav>
    <div class="col" id="paymentMethodContainer">
        <div class="row">
            <div class="col-sm-6">
                <div class="card" style="border: 1px solid rgba(0, 0, 0, .125);border-radius: .25rem">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Betalen met:</h5>
                        <ul class="list-group list-group-flush mb-4">
                            <?php
                            /*
                             * How to get the currently activated payment methods for the Payments API.
                             */

                            try {
                                /*
                                 * Initialize the Mollie API library with your API key.
                                 *
                                 * See: https://www.mollie.com/dashboard/developers/api-keys
                                 */
                                require "config/initialize.php";
                                /*
                                 * Get all the activated methods for this API key.
                                 * By default we are using the resource "payments".
                                 * See the orders folder for an example with the Orders API.
                                 */
                                $methods = $mollie->methods->allActive();
                                foreach ($methods as $method) {
                                    echo '<li class="list-group-item">';
                                    echo '<img src="' . htmlspecialchars($method->image->size1x) . '" srcset="' . htmlspecialchars($method->image->size2x) . ' 2x"> ';
                                    echo htmlspecialchars($method->description);
                                    echo '</li>';
                                }
                            } catch (\Mollie\Api\Exceptions\ApiException $e) {
                                echo "API call failed: " . htmlspecialchars($e->getMessage());
                            }
                            ?>
                        </ul>
                        <button class="createGlobalPayment btn btn-primary">Betalen</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card" style="border: 1px solid rgba(0, 0, 0, .125);border-radius: .25rem">
                    <div class="card-body">
                        <h5 class="card-title">Betalen met factuur</h5>
                        <ul class="list-group list-group-flush mb-4">
                            <li class="list-group-item">Volg de stappen in uw mail</li>
                            <li class="list-group-item">En maak het geld handmatig over</li>
                        </ul>
                        <button class="factuurBetaling btn btn-primary">Stuur factuur</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--    <button class="testje">knoppie</button>-->
</div>

<script>
    Cart = window.sessionStorage;

    $(document).ready(function(){
        fillArrays();
        prices.forEach(calcTotalPrice);
        $("form").on("submit", function(event){
            event.preventDefault();

            formValues = $(this).serializeArray();
            if (formValues[0].value !== "") {
                if (formValues[2].value !== "") {
                    if (formValues[3].value !== "") {
                        if (formValues[4].value !== "") {
                            if (formValues[5].value !== "") {
                                if (formValues[6].value !== "") {
                                    if (formValues[7].value !== "") {
                                        document.getElementById("errorForm").style.display = "none";
                                        showStep("none", "none", "block", "none")
                                        document.getElementById('nameDisplay').innerText = formValues[0].value+" "+formValues[1].value+" "+formValues[2].value;
                                        document.getElementById('mailDisplay').innerText = formValues[3].value;
                                        document.getElementById('straatNrDisplay').innerText = formValues[4].value+" "+formValues[5].value;
                                        document.getElementById('plaatsCodeDisplay').innerText = formValues[6].value+" "+formValues[7].value;
                                    }else{
                                        document.getElementById("errorForm").innerText = "Vul een postcode in";
                                        document.getElementById("errorForm").style.display = "block";
                                    }
                                }else{
                                    document.getElementById("errorForm").innerText = "Vul een plaats in";
                                    document.getElementById("errorForm").style.display = "block";
                                }
                            }else{
                                document.getElementById("errorForm").innerText = "Vul een huisnummer in";
                                document.getElementById("errorForm").style.display = "block";
                            }
                        }else{
                            document.getElementById("errorForm").innerText = "Vul een Straatnaam in";
                            document.getElementById("errorForm").style.display = "block";
                        }
                    }else{
                        document.getElementById("errorForm").innerText = "Vul een geldig e-mail adres in";
                        document.getElementById("errorForm").style.display = "block";
                    }
                }else{
                    document.getElementById("errorForm").innerText = "Vul een achternaam in";
                    document.getElementById("errorForm").style.display = "block";
                }
            }else{
                document.getElementById("errorForm").innerText = "Vul een voornaam in";
                document.getElementById("errorForm").style.display = "block";
            }
        });
    });

    $(document).on('click', '.aantal', function(){
        var cartID = $(this).data("order");

        $( "#dropdownMenuAantal" + cartID ).text($(this).html());
        $( "#dropdownMenuAantalCheck" + cartID ).text("x" + $(this).html());
        cartAantal[cartID]= $(this).html();
        totalPrice = 0;
        prices.forEach(calcTotalPrice);
    });

    $(document).on('click', '.size', function(){
        var cartID = $(this).data("order");

        $( "#dropdownMenuSizes" + cartID ).text($(this).html());
        $( "#dropdownMenuSizesCheck" + cartID ).text($(this).html());
        cartSizes[cartID]= $(this).html();
    });

    $(document).on('click', '.color', function(){
        var cartID = $(this).data("order");

        $( "#dropdownMenuColors" + cartID ).children("div").css("background-color", $(this).children("div").css("background-color"))
        $( "#dropdownMenuColorsCheck" + cartID ).children("div").css("background-color", $(this).children("div").css("background-color"))
        cartColors[cartID]= $(this).children("div").css("background-color");
    });

    $(document).on('click', '.createGlobalPayment', function(){
        $(this).attr("disabled", true);
        $(this).attr("disabled", true);
        var ids = "";
        for (var i = 0; i < Cart.length; i++){
            ids += Cart.getItem(Cart.key(i)) + ",";
        }
        ids = ids.substring(0, ids.length - 1);
        $.post('CreateGlobalPayment.php', {
                itemID:ids,
                TotalPrice: totalPrice,
                inputVoornaam:formValues[0].value,
                inputTussenvoegsel:formValues[1].value,
                inputAchternaam:formValues[2].value,
                inputEmail:formValues[3].value,
                inputStraatNaam:formValues[4].value,
                inputHuisNummer:formValues[5].value,
                inputPlaats:formValues[6].value,
                inputPostcode:formValues[7].value,
                inputInstructies:formValues[8].value,
                inputAantal:cartAantal,
                inputSizes:cartSizes,
                inputColors:cartColors,
            },
            function(returnedData){
                $('#paymentMethodContainer').html(returnedData);
            });
    });

    $(document).on('click', '.factuurBetaling', function(){
        $(this).attr("disabled", true);
        var ids = "";
        for (var i = 0; i < Cart.length; i++){
            ids += Cart.getItem(Cart.key(i)) + ",";
        }
        ids = ids.substring(0, ids.length - 1);
        $.post('CartMail.php', {
                itemID:ids,
                inputVoornaam:formValues[0].value,
                inputTussenvoegsel:formValues[1].value,
                inputAchternaam:formValues[2].value,
                inputEmail:formValues[3].value,
                inputStraatNaam:formValues[4].value,
                inputHuisNummer:formValues[5].value,
                inputPlaats:formValues[6].value,
                inputPostcode:formValues[7].value,
                inputInstructies:formValues[8].value,
                inputAantal:cartAantal,
                inputSizes:cartSizes,
                inputColors:cartColors,
                TotalPrice:totalPrice,
            },

            function(returnedData){
                $('#dropCont').html(returnedData);
            });
    });

    function fillArrays(){
        for (var i = 0; i < Cart.length; i++){
            document.getElementById('addCart' + Cart.getItem(sessionStorage.key(i))).style.display = "none";
            document.getElementById('removeCart' + Cart.getItem(sessionStorage.key(i))).style.display = "block";
            cartAantal[i] = 1;
            cartSizes[i] = 'L';
            cartColors[i] = $( "#dropdownMenuColorsCheck" + i ).children("div").css("background-color");
            prices[i] = document.getElementById('priceText'+i).innerText;
        }
    }

    function deleteCart(cartId) {
        Cart.removeItem(cartId);
        console.log("removed Cart");
        cartAantal.length = 0;
        cartSizes.length = 0;
        prices.length = 0;
        totalPrice = 0;
        pricePerCartId = 0
        fillArrays();
        runQuery();

    }

    function calcTotalPrice(value, index) {
        pricePerCartId = parseFloat(value) * cartAantal[index];
        totalPrice += pricePerCartId;
        document.getElementById('priceText'+index).innerText = (Math.round((pricePerCartId + Number.EPSILON) * 100) / 100).toString() + "€";
        document.getElementById('priceText2'+index).innerText = (Math.round((pricePerCartId + Number.EPSILON) * 100) / 100).toString() + "€";
        document.getElementById('totalPriceText').innerHTML = (Math.round((totalPrice + Number.EPSILON) * 100) / 100).toString() + "€";
        document.getElementById('totalPriceText2').innerHTML = (Math.round((totalPrice + Number.EPSILON) * 100) / 100).toString() + "€";
    }

    function selectMethod(paymentMethod){
        if (paymentMethod === "ideal"){
            document.getElementById('idealContainer').style.display = "block";
            document.getElementById('paymentMethodContainer').style.display = "none";
        }
    }

    function showStep(cart, form, info, pay){
        document.getElementById('cartContainer').style.display = cart;
        document.getElementById('bestellenContainer').style.display = cart;
        document.getElementById('formContainer').style.display = form;
        document.getElementById('infoCheckContainer').style.display = info;
        document.getElementById('paymentContainer').style.display = pay;
    }
</script>

