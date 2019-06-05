<?php

include("calculator_model.php");




CalcDB_Connect();


// if the user clicks the "Clear" input
if( isset($_POST['clear_history']) ) {
    HistoryOfCalculations_ClearAll();
}



// the following it TRUE if form has been submitted, else FALSE
$form_has_been_submitted = isset($_POST['number1']);

// defaults, in case the form has not been submitted
$number1 = "";
$answer = 0;
$calculation_text = "";

// only process form variables if the form was submitted... avoids errors
if( $form_has_been_submitted ) {
    $number1 = $_POST['number1'];
    
    $answer = $number1;
    $calculation_text = $number1;
    
    HistoryOfCalculations_AddLine($calculation_text);
}


$history_of_calculations_array = HistoryOfCalculations_GetAll();


CalcDB_Close();


?>