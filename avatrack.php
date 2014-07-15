<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        
        <link rel="dns-prefetch" href="//ajax.googleapis.com">
        
        <title>SoA Avatar Track</title>
        
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="css/main.css">
        
    </head>
    <body id="ava-track">
    
    	<div id="avatars">
			<?php
                require "includes/avatarconnect.php";
				//require "../../avatarconnect.php";
				
                if ($stmt = $db -> prepare("SELECT avatar, world, location, warden, dismissed, UNIX_TIMESTAMP(timeupdated) FROM avatar_locations")) {
                    $stmt -> execute();
                    $stmt -> bind_result($avatar, $world, $location, $warden, $dismissed, $timeupdated);
                    
                    while ($row = $stmt -> fetch()) {
                        echo "<div class=\"avatar\"><span class=\"status\">" . $avatar . ": ";
						
						if ($dismissed == true) {
							echo "Dismissed";
						} else {
							if ($world == "Citadel" || $world == "citadel") {
								echo $world . ", " . $location . " with " . $warden;
							} else {
								echo "World " . $world . ", " . $location . " with " . $warden;
							}
						}
						
						echo "</span>";
						
						echo "<span class=\"timestamp\">Updated: " . timeAgo($timeupdated) . "</span>";
						
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
        
		<?php
			function timeAgo($timeStamp) {
   				$periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
   				$lengths = array("60", "60", "24", "7", "4.35", "12", "10");

   				$currentTime = time();

       			$difference = $currentTime - $timeStamp;
      			$tense = "ago";

				for ($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
					$difference /= $lengths[$j];
				}
				
				$difference = round($difference);
				
				if ($difference != 1) {
					$periods[$j].= "s";
				}
				
				return "$difference $periods[$j] ago";
			}
		?>
    </body>
</html>
