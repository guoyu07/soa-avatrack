<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        
        <link rel="dns-prefetch" href="//ajax.googleapis.com">
        
        <title>SoA Avatar Update</title>
        
        <link rel="stylesheet" href="css/main.css">
        
    </head>
    <body id="warden-update">
    
    	<form id="update-location" method="post">
			<h1 class="avatrack-heading">SoA <span>Ava</span>Track Update</h1>
            
            <label for="avatar">Avatar:</label>
            <select id="avatar" name="avatar">
                <option value="Blaze">Blaze</option>
                <option value="Periwinkle">Periwinkle</option>
                <option value="Squirtle">Squirtle</option>
            </select>
            
            <label for="world">World:</label>
            <input type="text" id="world" name="world" autocorrect="off" placeholder="Number or Citadel">
            
            <label for="location">Location:</label>
            <input type="text" id="location" name="location" autocorrect="off" placeholder="Location">
            
            <label for="warden">Warden:</label>
            <input type="text" id="warden" name="warden" autocorrect="off" placeholder="Your name" maxlength="13">
            
            <button class="action dismiss">Dismiss</button>
            <button class="action update">Update</button>
            
            <p id="message"></p>
        	
        </form>
        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-2.1.1.min.js"><\/script>')</script>
        <script src="js/update.js"></script>
    </body>
</html>
