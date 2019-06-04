<?php

function CalcDB_Connect() {
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
    array_push($_SESSION["HistoryOfCalculations"], $line);
}

function HistoryOfCalculations_GetAll() {
    return $_SESSION["HistoryOfCalculations"];
}

function HistoryOfCalculations_ClearAll() {
    $_SESSION["HistoryOfCalculations"] = array();
}

function CalcDB_Close() {
    $conn->close();
}


// Unit testing of our model functions
//------------------------------------

CalcDB_Connect();

CalcDB_Close();


?>