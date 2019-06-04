<?php

function CalcDB_Connect() {
    // start the Session - this allows to use the $_SESSION variable to store our History
    session_start();
    
    // if we have no prior History, initialize History to an empty array
    if( isset($_SESSION["HistoryOfCalculations"]) == FALSE ) {
        $_SESSION["HistoryOfCalculations"] = array();
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
    
}

?>