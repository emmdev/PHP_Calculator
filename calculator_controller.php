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
$number1 = 0;
$number2 = 0;
$answer = 0;
$calculation_text = "";

// only process form variables if the form was submitted... avoids errors
if( $form_has_been_submitted ) {
    $number1 = $_POST['number1'];
    $number2 = $_POST['number2'];
    
    // handle non-numeric inputs from our form, avoids errors
    //$number1 = (float)$number1;
    $number2 = (float)$number2;
    
    
    $answer = $number1;
    $calculation_text = $number1;
    
    HistoryOfCalculations_AddLine($calculation_text);
}


$history_of_calculations_array = HistoryOfCalculations_GetAll();


CalcDB_Close();


?>