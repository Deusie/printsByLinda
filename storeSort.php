<?php
include 'config/configdbPDO.php';


$data = $conn->query("SELECT * FROM product ORDER BY ".$_POST["column_name"]." ".$_POST["order"]."")->fetchAll();

foreach ($data as $row) {
    include('sortDisplay.php');
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
