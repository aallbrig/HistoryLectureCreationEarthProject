var app = (function(){
	var l$ = $;
	var url;
	var $sidebar       = $('#sidebar');
	var $lessonPresent = $('#sidebar .present');
	var $lessonEdit    = $('#sidebar .editL');
	var $backToLessons = $('#sidebar .bleh');
	var $hotspotView   = $('#sidebar .view');
	var $hotspotEdit   = $('#sidebar .editH');
	console.log('js/app.js: this is an app!');
	// For testing and adding to the class
	var earth = Earth('map3d', function(){
		var lon = 10;
		var lat = 10;
		earth.longitude = lon;
		earth.latitude = lat;
		earth.setRange(1000);  // in miles
		earth.look();
	});
	$lessonPresent
	.css('border', '2px solid yellow')
	.on('click', function(e){
		e.preventDefault();
		url = $(this).parent().attr('action');
		// alert('present!');
		l$.ajax({type:"GET"
						,url: url})
		.done(function(html){
			$sidebar.empty();
			$sidebar.html(html);
		});
	});
	$lessonEdit
	.css('border','2px solid green')
	.on('click', function(e){
		e.preventDefault();
		url = $(this).parent().attr('action');
		alert('edit!');
	});
})();;