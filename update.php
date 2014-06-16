<?php
	require "includes/connect.php";
	
	if (isset($_POST)) {
		
		$avatar = $_POST["avatar"];
		$avatar = $db -> real_escape_string($avatar);
		
		$world = htmlentities($_POST["world"], ENT_QUOTES);
		$world = $db -> real_escape_string($world);
		
		$location = htmlentities($_POST["location"], ENT_QUOTES);
		$location = $db -> real_escape_string($location);
		
		$warden = htmlentities($_POST["warden"], ENT_QUOTES);
		$warden = $db -> real_escape_string($warden);
		
		$dismissed = $_POST["dismissed"];
		
		if ($stmt = $db -> prepare("UPDATE avatar_locations SET world = ?, location = ?, warden = ?, dismissed = ? WHERE avatar = ?")) {
			$stmt -> bind_param("sssis", $world, $location, $warden, $dismissed, $avatar);
			$stmt -> execute();
			$stmt -> close();
		} else {
			echo "Error: " . $db -> error;
			$stmt -> close();
		}
		
		if ($stmt = $db -> prepare("INSERT INTO avatar_history (avatar, world, location, warden, dismissed) VALUES (?, ?, ?, ?, ?)")) {
			$stmt -> bind_param("ssssi", $avatar, $world, $location, $warden, $dismissed);
			$stmt -> execute();
			$stmt -> close();
		} else {
			echo "Error: " . $db -> error;
			$stmt -> close();
		}
		
		$db -> close();
		
	}