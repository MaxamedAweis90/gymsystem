<?php
// Environment Detection
if ((isset($_SERVER['HTTP_HOST']) && ($_SERVER['HTTP_HOST'] == "localhost" || $_SERVER['HTTP_HOST'] == "127.0.0.1")) || php_sapi_name() == 'cli') {
    $host = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "gymnsb";
} else {
    $host = "sql211.infinityfree.com";
    $dbuser = "if0_40877524";
    $dbpass = "ugaas1234";
    $dbname = "if0_40877524_gymnsb";
}

$con = mysqli_connect($host, $dbuser, $dbpass, $dbname);
$conn = $con;

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
