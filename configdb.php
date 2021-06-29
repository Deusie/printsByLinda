<?php //bestand met databasegegevens
//$conf["Username"]= 'jessegc469_jesse';
//$conf["Password"]= 'MT0JOextj';
//$conf["Host"]= 'localhost';
//$conf["Database"]= 'jessegc469_Prints';

$conf["Username"]= 'root';
$conf["Password"]= '';
$conf["Host"]= 'localhost';
$conf["Database"]= 'printsbylinda';

$con = mysqli_connect($conf["Host"], $conf["Username"],
    $conf["Password"], $conf["Database"]);


if($con == false){ // Verbinding is mislukt!
    echo "Kan geen verbinding maken met de database";
}
?>
