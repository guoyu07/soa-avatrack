(function() {
	
	$("#message").hide();
	
	$(".update").click(function(e) {
		e.preventDefault();
		$("#update-location").submit();
	});
	
	$("#update-location").submit(function(e) {
		e.preventDefault();
		
		var avatar = $("#avatar").val();
		var world = $("#world").val();
		var location = $("#location").val();
		var warden = $("#warden").val();
		
		//console.log(avatar + world + location + warden);

		$.ajax({
			type: "POST",
			data: {avatar: avatar, world: world, location: location, warden: warden, dismissed: 0},
			url: "update.php",
			beforeSend: function() {
				$("#message").show();
				$("#message").text("Updating avatar status...");
			},
			success: function() {
				$("#message").text("The avatar has been updated.");
			},
			error: function() {
				$("#message").text("Sorry, there was problem updating the avatar. Please try again.");
				console.log(this);
			},
		});
	});
	
	$(".dismiss").click(function(e) {
		e.preventDefault();
		var avatar = $("#avatar").val();
		
		$.ajax({
			type: "POST",
			data: {avatar: avatar, dismissed: 1},
			url: "dismiss.php",
			beforeSend: function() {
				$("#message").show();
				$("#message").text("Dismissing...");
			},
			success: function() {
				$("#message").text("The avatar has been dismissed.");
			},
			error: function() {
				$("#message").text("Sorry, there was problem dismissing the avatar. Please try again.");
				console.log(this);
			},
		});
	});
	
})();