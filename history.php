<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        
        <link rel="dns-prefetch" href="//ajax.googleapis.com">
        
        <title>SoA Avatar History</title>
        
        <link rel="stylesheet" href="css/main.css">
        
    </head>
    <body id="ava-history">
    	
        <div id="history">
        	<h1 class="avatrack-heading">SoA <span>Ava</span>Track History</h1>
        	<?php
                require "includes/connect.php";
				
                if ($stmt = $db -> prepare("SELECT *, DATE_FORMAT(timestamp, '%e %M %Y %H:%i') AS date FROM avatar_history ORDER BY timestamp DESC")) {
                    $stmt -> execute();
                    $stmt -> bind_result($id, $avatar, $world, $location, $warden, $dismissed, $timestamp, $date);
                    
                    while ($row = $stmt -> fetch()) {
                        echo "<div class=\"history-entry\">";
						
						if ($dismissed == true) {
							echo "<p><span class=\"detail\">" . $warden . "</span> dismissed an avatar.</p>";
							echo "<p class=\"date\">" . $date . "</p>";
						} else {
							echo "<p><span class=\"detail\">" . $warden . "</span> summoned an avatar to <span class=\"detail\">" . $location . "</span>, World <span class=\"detail\">" . $world . "</span></p>";
							echo "<p class=\"date\">" . $date . "</p>";
						}
						
						echo "</div>";
                    }
                    
                    $stmt -> close();
                
                } else {
                    echo "Error: " . $db -> error;
                    $stmt -> close();
                }
                
                $db -> close();
            ?>
        </div>
    </body>
</html>
