<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        
        <link rel="dns-prefetch" href="//ajax.googleapis.com">
        
        <title>SoA Avatar Update</title>
        
        <link rel="stylesheet" href="css/main.css">
        
    </head>
    <body>
    
    	<form id="update-location">
			<h1>SoA <span>Ava</span>Track Update</h1>
            
            <label for="avatar">Avatar:</label>
            <select id="avatar" name="avatar">
                <option value="blaze">Blaze</option>
                <option value="periwinkle">Periwinkle</option>
                <option value="squirtle">Squirtle</option>
            </select>
            
            <label for="world">World:</label>
            <input type="text" id="world" name="world" autocorrect="off" placeholder="Number or Citadel">
            
            <label for="location">Location:</label>
            <input type="text" id="location" name="location" autocorrect="off" placeholder="Enter location">
            
            <label for="warden">Warden:</label>
            <input type="text" id="warden" name="warden" autocorrect="off" placeholder="Enter your name">
            
            <button class="action dismiss">Dismiss</button>
            <button class="action update">Update</button>
            
            <p id="message"></p>
        	
        </form>
        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-2.1.1.min.js"><\/script>')</script>
        <script src="js/update.js"></script>
        
        <script>
            var _gaq=[['_setAccount','UA-19776553-1'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
