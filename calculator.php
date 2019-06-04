<?php

include("calculator_controller.php");

?>


<!DOCTYPE html>
<html>
<head>
	<style>
    h2 {
        font-family: cursive;
    }
	</style>
</head>
<body>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        <input type="text" name="number1" value="<?= $number1 ?>">
        
        <input type="submit" name="add" value="+">
        <input type="submit" name="sub" value="-">
        <input type="submit" name="mul" value="&times;">
        <input type="submit" name="div" value="&divide;">
        
        <input type="text" name="number2" value="<?= $number2 ?>"><br>
        
    </form>
    
    <p><?= $answer ?></p>
    
    <h2>History of Calculations</h2>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        <input type="submit" name="clear_history" value="clear">
    </form>
    <ul>
        <?php
        foreach(HistoryOfCalculations_GetAll() as $line) {
            echo "<li>$line</li>";
        }
        ?>
    </ul>

</body>
</html>