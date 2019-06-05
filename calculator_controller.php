<?php

include("calculator_model.php");




CalcDB_Connect();


// if the user clicks the "Clear" input
if( isset($_POST['clear_history']) ) {
    HistoryOfCalculations_ClearAll();
}



// the following it TRUE if form has been submitted, else FALSE
$form_has_been_submitted = isset($_POST['message_text']);

// defaults, in case the form has not been submitted
$message_text = "";

// only process form variables if the form was submitted... avoids errors
if( $form_has_been_submitted ) {
    $message_text = $_POST['message_text'];
    
    HistoryOfCalculations_AddLine($message_text);
}


$history_of_calculations_array = HistoryOfCalculations_GetAll();


CalcDB_Close();


?>