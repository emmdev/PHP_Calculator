<?php

include("calculator_model.php");




CalcDB_Connect();


$history_of_calculations_array = HistoryOfCalculations_GetAll();


CalcDB_Close();


?>