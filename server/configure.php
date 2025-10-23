<?php
// Attempt to connect to the database
$conn = mysqli_connect("localhost", "root", "", "dragon_stone_website");

// Check the connection
if (!$conn) {
    die("Couldn't connect to database: " . mysqli_connect_error());
}

echo "Connected successfully!";

// Close the connection (optional but recommended)
mysqli_close($conn);
?>
