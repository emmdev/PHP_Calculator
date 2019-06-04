<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//----------------------------
echo "<hr />";


// Create database
$sql = "CREATE DATABASE calc_db";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

//----------------------------
echo "<hr />";


$conn->close();

?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "calc_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//----------------------------
echo "<hr />";


// sql to create table
$sql = "CREATE TABLE history_of_calculations (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    calculation_text VARCHAR(30) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table history_of_calculations created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

//----------------------------
echo "<hr />";


$conn->close();
?>