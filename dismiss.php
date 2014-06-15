<?php
	require "includes/connect.php";
	
	if (isset($_POST)) {
		
		$avatar = $_POST["avatar"];
		$avatar = $db -> real_escape_string($avatar);
		
		$dismissed = $_POST["dismissed"];
		
		if ($stmt = $db -> prepare("UPDATE avatar_locations SET dismissed = ? WHERE avatar = ?")) {
			$stmt -> bind_param("is", $dismissed, $avatar);
			$stmt -> execute();
			$stmt -> close();
		} else {
			echo "Error: " . $db -> error;
			$stmt -> close();
		}
		
		$db -> close();
		
	}