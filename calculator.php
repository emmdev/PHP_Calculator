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
    <script>
    // Reload the page every 2 seconds, to get any new messages from the server
    setTimeout(function() {
        location.reload(false);
    }, 2000);
    </script>
</head>
<body>

    <h2>Messages</h2>

    <ul>
        <?php
        foreach($history_of_calculations_array as $line) {
            echo "<li>$line</li>";
        }
        ?>
    </ul>
    
    <form action="process_forms.php" method="POST">
        <input type="text" name="message_text" value="">
        
        <input type="submit" name="add" value="+">
        
    </form>
    
    <br />

    <form action="process_forms.php" method="POST">
        <input type="submit" name="clear_history" value="clear">
    </form>
</body>
</html>