<?php
//$servername = "localhost";
//$username = "jessegc469_jesse";
//$password = "MT0JOextj";
//$database = "jessegc469_Prints";

$servername = "localhost";
$username = "root";
$password = "";
$database = "printsbylinda";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
//    echo "little problem";
    header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . "/error-page.php");
}
?>
