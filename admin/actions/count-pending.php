<?php
include "dbcon.php";

$sql = "SELECT * FROM members WHERE status='Pending'";
$query = $conn->query($sql);
echo "$query->num_rows";
?>
