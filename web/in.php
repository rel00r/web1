<?php
// Replace these with your actual database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "directions";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define the table name and column representing the order of entries (e.g., timestamp or an auto-incrementing ID)
$tableName = "dir";
$orderColumn = "buttons"; // Replace this with the actual column name

// Query to select the last row from the table
$sql = "SELECT buttons FROM dir ORDER BY id DESC LIMIT 1";

// Execute the query
$result = $conn->query($sql);

// Check if the query was successful
if ($result && $result->num_rows > 0) {
    // Fetch the last row as an associative array
    $lastRow = $result->fetch_assoc();

    // Now you can access the data from the last row
    // For example, if you have a column named 'name', you can access it like this:
    $lastvalue = $lastRow['buttons'];

    // Display or use the data as needed
   
} else {
    echo "No data found in the table.";
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title> Display Page</title>
    
</head>

<body>
    <!-- Display the last inserted value -->
    <p> <?php  print $lastvalue ; ?></p>
</body>
</html>