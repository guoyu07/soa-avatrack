(function() {
	$("#message").hide();
	
	if (window.localStorage) {
		var savedInfo = localStorage.getItem("avtInfo");
		obj = JSON.parse(savedInfo);
		
		if (savedInfo) {
			$("#avatar option[value=\"" + obj.avatar + "\"]").attr("selected", "selected");
			$("#world").val(obj.world);
			$("#location").val(obj.location);
			$("#warden").val(obj.warden);
		};
	};
	
	function updateAvatar() {
		var avatar = $("#avatar").val();
		var world = $("#world").val();
		var location = $("#location").val();
		var warden = $("#warden").val();
		
		if (avatar == "" || world == "" || location == "" || warden == "") {
			$("#message").show();
			$("#message").text("All fields are required.");
			return false;
		} else {
			
			var infoStore = {};
				infoStore.avatar = avatar;
				infoStore.world = world;
				infoStore.location = location;
				infoStore.warden = warden;
			
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
					
					if (window.localStorage) {
						localStorage.setItem("avtInfo", JSON.stringify(infoStore));
					}
					
				},
				error: function() {
					$("#message").text("Sorry, there was problem updating the avatar. Please try again.");
					console.log(this);
				},
			});
		};
	};
	
	function dismissAvatar() {
		var avatar = $("#avatar").val();
		var world = $("#world").val();
		var location = $("#location").val();
		var warden = $("#warden").val();
		
		if (avatar == "" || world == "" || location == "" || warden == "") {
			$("#message").show();
			$("#message").text("All fields are required.");
			return false;
		}
		
		$.ajax({
			type: "POST",
			data: {avatar: avatar, world: world, location: location, warden: warden, dismissed: 1},
			url: "dismiss.php",
			beforeSend: function() {
				$("#message").show();
				$("#message").text("Dismissing...");
			},
			success: function() {
				$("#message").text("The avatar has been dismissed.");
				if (window.localStorage) {
					localStorage.removeItem("avtInfo");
				};
			},
			error: function() {
				$("#message").text("Sorry, there was problem dismissing the avatar. Please try again.");
				console.log(this);
			},
		});
	};
	
	$(".update").click(function(e) {
		e.preventDefault();
		updateAvatar();
	});
	
	$(".dismiss").click(function(e) {
		e.preventDefault();
		dismissAvatar();	
	});
})();