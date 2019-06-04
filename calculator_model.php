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
    return $_SESSION["HistoryOfCalculations"];
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

HistoryOfCalculations_AddLine("5 x 2 = 10");

CalcDB_Close();


?>