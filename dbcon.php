<?php
/**
 * Gym Management System - Database Connection
 * Class: BIT29
 * Purpose: This file establishes a secure connection to the MySQL database
 * using the mysqli driver. It is included in every page that requires DB access.
 */

// Environment Detection
if ((isset($_SERVER['HTTP_HOST']) && ($_SERVER['HTTP_HOST'] == "localhost" || $_SERVER['HTTP_HOST'] == "127.0.0.1")) || php_sapi_name() == 'cli') {
    // LOCAL XAMPP SETTINGS
    $host = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "gymnsb";
} else {
    // INFINITYFREE PRODUCTION SETTINGS
    // IMPORTANT: Replace these placeholders with your actual details from InfinityFree Control Panel
    $host = "sql211.infinityfree.com"; // Change this to your InfinityFree Host
    $dbuser = "if0_40877524";         // Change this to your InfinityFree Username
    $dbpass = "ugaas1234";             // Change this to your InfinityFree Password
    $dbname = "if0_40877524_gymnsb";  // Change this to your InfinityFree Database Name
}

// Create connection
$con = mysqli_connect($host, $dbuser, $dbpass, $dbname);
$conn = $con; // Added for compatibility with some files using $conn

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
