<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        
        <link rel="dns-prefetch" href="//ajax.googleapis.com">
        
        <title>SOA Avatar Track</title>
        
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="css/main.css">
        
        <link rel="shortcut icon" href="favicon.ico">
		<link rel="apple-touch-icon-precomposed" href="apple-touch-icon-precomposed.png">

        <!--[if lt IE 9]>
            <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
            <script>window.html5 || document.write('<script src="js/vendor/html5shiv.js"><\/script>')</script>
        <![endif]-->
        
    </head>
    <body>
    
    	<div id="avatars">
			<?php
                require "includes/connect.php";
				
                if ($stmt = $db -> prepare("SELECT avatar, world, location, warden, dismissed, timeupdated FROM avatar_locations")) {
                    $stmt -> execute();
                    $stmt -> bind_result($avatar, $world, $location, $warden, $dismissed, $timeupdated);
                    
                    while ($row = $stmt -> fetch()) {
                        echo "<div class=\"avatar\"><span class=\"status\">" . $avatar . ": ";
						
						if ($dismissed == true) {
							echo "Dismissed";
						} else {
							echo $world . ", " . $location . " with " . $warden;
						}
						
						echo "</span>";
						
						$timestamp = new DateTime($timeupdated);
						
						echo "<span class=\"timestamp\">Updated: " . $timestamp->format("j F Y, g:ia") . "</span>";
						
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
        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-2.1.1.min.js"><\/script>')</script>
        <script src="js/status.js"></script>
        
        <script>
            var _gaq=[['_setAccount','UA-19776553-1'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
