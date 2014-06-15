/*(function() {
	getStatus().done(handleData);
	
	function getStatus() {
		return $.ajax({
			url: "get.php",
			beforeSend: function() {
				console.log("getting offers");
				
			},
			success: function() {
				
			},
			error: function() {
				
				console.log("failed to get offers");
			},
		});
	};
	
	function handleData(data) {
		objects = JSON.parse(data);
		
		$.each(objects, function(i, item) {
			
			console.log(item);
			
			if (item.dismissed === 1) {
				$(".avatar").append("Dismissed");
			}
			
			//$("#avatars").append("<div class=\"avatar\">" + item.avatar + "</div>");
			
		});
	};
})();*/