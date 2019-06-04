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
    $number1 = (float)$number1;
    $number2 = (float)$number2;
    
    // check which submit was clicked
    if( isset($_POST['add']) ) {
        // add was clicked
        
        $answer = $number1 + $number2;
        
        $calculation_text = "$number1 + $number2 = $answer";
        
    } else if( isset($_POST['sub']) ) {
        // sub was clicked
        
        $answer = $number1 - $number2;
        
        $calculation_text = "$number1 - $number2 = $answer";
        
    } else if( isset($_POST['mul']) ) {
        // mul was clicked
        
        $answer = $number1 * $number2;
        
        $calculation_text = "$number1 &times $number2 = $answer";
        
    } else if( isset($_POST['div']) ) {
        // div was clicked
        
        if( $number2 == 0 ) {
            // dividing by 0 is mathematically undefined!
            $answer = "Not defined!";
            
            $calculation_text = "Not defined!";
        } else {
            $answer = $number1 / $number2;
            
            $calculation_text = "$number1 &divide $number2 = $answer";
        }
        
    }
    
    
    HistoryOfCalculations_AddLine($calculation_text);
}


$history_of_calculations_array = HistoryOfCalculations_GetAll();


CalcDB_Close();


?>