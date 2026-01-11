<?php
/**
 * Gym Management System - Database Connection
 * Class: BIT29
 * Purpose: This file establishes a secure connection to the MySQL database
 * using the mysqli driver. It is included in every page that requires DB access.
 */

$host = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "gymnsb";

// Create connection
$con = mysqli_connect($host, $dbuser, $dbpass, $dbname);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
<!-- Visit codeastro.com for more projects -->
