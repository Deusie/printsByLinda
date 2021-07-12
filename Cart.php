<?php
include 'configdbPDO.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Winkelwagen</title>
    <link rel="icon" href="assets/Logos/LogosPrints.png">
    <link rel="stylesheet" href="bootstrap-pure/Style.css">
    <link rel="stylesheet" href="bootstrap-pure/bootstrap-icons/bootstrap-icons.css">
    <script src="bootstrap-pure/b1.js"></script>
    <script src="bootstrap-pure/b2.js"></script>
    <script src="bootstrap-pure/b3.js"></script>
    <script src="bootstrap-pure/Jquery.js"></script>

    <link rel="stylesheet" href="bootstrap-pure/myStyling.css">
</head>
<body>

<!-- navbar -->
<?php
include('NavBar.php');
theme_header('cart');
?>


<div style="min-height: 700px" id="dropCont" class="container mt-4 mb-5" >

</div>
<?php
include("Footer.php");
?>
</body>
<script>
    Cart = window.sessionStorage;

    $(document).ready(function(){
        runQuery();
    });

    function runQuery(){
        var ids = "";
        for (var i = 0; i < Cart.length; i++){
            ids += Cart.getItem(Cart.key(i)) + ",";
        }
        console.log(ids);
        ids = ids.substring(0, ids.length - 1);

        $.ajax({
            url:"CartDisplay.php",
            method:"POST",
            data:{itemID:ids},
            success:function(data)
            {
                $('#dropCont').html(data);
            }
        })
    }

    function deleteCart(cartId) {
        Cart.removeItem(cartId);
        console.log("removed Cart");
        runQuery();
    }

</script>
</html>


