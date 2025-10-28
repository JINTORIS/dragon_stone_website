<?php
// phpinfo();
$conn = mysqli_connect("localhost:3307", "root", "mysql", "dragon_store");
// Check the connection:
if (!$conn) {
    die("Couldn't connect to database: " . mysqli_connect_error());
}

echo "Connected successfully!";

$sql = "SELECT * FROM categories";
$result = $conn->query($sql);

echo $result->num_rows;

if ($result->num_rows > 0) {
    // Start the HTML table
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Categories</th>
            </tr>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["name"] . "</td>
              </tr>";
    }

    // Close the table
    echo "</table>";
}

?>
