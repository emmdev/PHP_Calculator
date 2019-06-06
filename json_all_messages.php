<?php

include("calculator_model.php");


// controller section

CalcDB_Connect();

$messages_array = HistoryOfCalculations_GetAll();

CalcDB_Close();



// view section

$myJSON = json_encode($messages_array);

echo $myJSON;

?>