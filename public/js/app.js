var app = (function(){
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
	
})();;