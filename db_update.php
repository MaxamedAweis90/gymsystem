<?php
/**
 * BIT29 Database Update Utility
 * Adds required academic fields without splitting the existing name structure.
 */
include "dbcon.php";

echo "<h2>Academic Database Update Utility</h2>";

$queries = [
    "ALTER TABLE members ADD COLUMN email VARCHAR(100) AFTER contact",
    "ALTER TABLE members ADD COLUMN profile_pic VARCHAR(255) AFTER email",
    "ALTER TABLE members ADD COLUMN user_type VARCHAR(20) DEFAULT 'Customer' AFTER profile_pic"
];

foreach ($queries as $sql) {
    if (mysqli_query($con, $sql)) {
        echo "<p style='color:green;'>Success: $sql</p>";
    } else {
        echo "<p style='color:red;'>Error: " . mysqli_error($con) . " (Query: $sql)</p>";
    }
}

echo "<p><b>Database update complete for BIT29 requirements.</b></p>";
?>
