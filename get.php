<?php
	require "includes/connect.php";
		
	if ($stmt = $db -> prepare("SELECT id, avatar, world, location, warden, dismissed, timeupdated FROM avatar_locations WHERE dismissed = FALSE")) {
		$stmt -> execute();
		$stmt -> bind_result($id, $avatar, $world, $location, $warden, $dismissed, $timeupdated);
		
		$records = array();
		
		while ($row = $stmt -> fetch()) {
			$records[] = (array("id" => $id, "avatar" => $avatar, "world" => $world, "location" => $location, "warden" => $warden, "dismissed" => $dismissed, "timeupdated" => $timeupdated));
		}
		
		$stmt -> close();
	
	} else {
		echo "Error: " . $db -> error;
		$stmt -> close();
	}
	
	$db -> close();
	
	echo json_encode($records);