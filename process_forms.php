<?php

// We are implementing the Post-Redirect-Get pattern (PRG) here
// https://en.wikipedia.org/wiki/Post/Redirect/Get
//
// It solves the problem of reloading the page (to see the latest messages),
// and not resubitting any forms
// https://stackoverflow.com/questions/8000798/reload-refresh-page-in-browser-without-re-submitting-form


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

CalcDB_Close();



header("HTTP/1.1 303 See Other");
header("Location: calculator.php");

?>
