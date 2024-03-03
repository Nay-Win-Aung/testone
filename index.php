<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testone";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data into the database
$insertSql = "INSERT INTO users (name, email) VALUES ('win', 'win43@gmail.com')";
if ($conn->query($insertSql) === TRUE) {
    echo "Record inserted successfully<br>";
} else {
    echo "Error inserting record: " . $conn->error . "<br>";
}

// Update data in the database
$updateSql = "UPDATE users SET email='nayslls@gmail.com' WHERE name='John Doe'";
if ($conn->query($updateSql) === TRUE) {
    echo "Record updated successfully<br>";
} else {
    echo "Error updating record: " . $conn->error . "<br>";
}

// Retrieve data from the database
$selectSql = "SELECT * FROM users";
$result = $conn->query($selectSql);

if ($result->num_rows > 0) {
    echo "<h2>Users:</h2>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>Name: " . $row["name"] . " - Email: " . $row["email"] . "</li>";
    }
    echo "</ul>";
} else {
    echo "No records found<br>";
}

// Close the connection
$conn->close();
?>
