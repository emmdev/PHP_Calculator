<?php

function CalcDB_Connect() {
    global $conn;
    
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
}

function HistoryOfCalculations_AddLine($line) {
    global $conn;
    
    $sql = "INSERT INTO history_of_calculations (calculation_text)
    VALUES ('$line')";

    if ($conn->query($sql) === FALSE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function HistoryOfCalculations_GetAll() {
    global $conn;
    
    $sql = "SELECT id, calculation_text FROM history_of_calculations";
    $result = $conn->query($sql);

    $final_array = array();
    
    while($row = $result->fetch_assoc()) {
        array_push($final_array, $row["calculation_text"]);
    }
    
    return $final_array;
}

function HistoryOfCalculations_ClearAll() {
    $_SESSION["HistoryOfCalculations"] = array();
}

function CalcDB_Close() {
    global $conn;
    
    $conn->close();
}


// Unit testing of our model functions
//------------------------------------

CalcDB_Connect();

//HistoryOfCalculations_AddLine("5 x 2 = 10");

echo "<pre>";
print_r(HistoryOfCalculations_GetAll());
echo "</pre>";

CalcDB_Close();


?>