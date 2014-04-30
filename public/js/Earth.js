	function Earth (target, callback) {
		// dependencies
		var local$ = $;
		// return object
		var earth = {};
		// properties
		var placemarkIds = [];
		var points = [];
		var validEvents = ["click"
											,"dblclick"
											,"mouseover"
											,"mousedown"
											,"mouseup"
											,"mouseout"
											,"mousemove"];
		var ge, longitude, latitude, altitude;
		if(!target){
			target = "body";
		}
		google.load("earth", "1", {"other_params":"sensor=true_or_false"});
		// Helper functions for adding/removing events
		earth.addEvent = function(target, eventType, callback){
			if(checkForValidEvent(eventType) && checkForValidPlacemark(target)){
				google.earth.addEventListener(ge.getElementById(target), eventType, callback);
			} else {
				console.error("invalid event type or placemark");
			}
		}
		earth.removeEvent = function(target, eventType, callback){
			if(checkForValidEvent(eventType) && checkForValidPlacemark(target)){
				google.earth.removeEventListener(target, eventType, callback);
			} else {
				console.error("invalid event type or placemark");
			}
		}
		function checkForValidEvent(eventType){
			return inArray(eventType, validEvents);
		}
		function checkForValidPlacemark(placemarkId){
			return inArray(placemarkId, placemarkIds)
		}
		function inArray(target, array){
			// returns -1 if it can't find it, but returns index if it can
			index = local$.inArray(target, array);
			if(index == -1){
				return false;
			}
			return true;	
		}
		// end helper functions for adding/removing events
		function init() {
			google.earth.createInstance(target, initCB, failureCB);
			// checkForValidEvent("mousemove");
		}
		function initCB(instance) {
			// If earth could load
			ge = instance;
			ge.getWindow().setVisibility(true);
			ge.getOptions().setUnitsFeetMiles(true);
			var lookAt = ge.getView().copyAsLookAt(ge.ALTITUDE_RELATIVE_TO_GROUND);
			earth.latitude = lookAt.getLatitude();
			earth.longitude = lookAt.getLongitude();
			earth.altitude = lookAt.getRange();
			if(callback && typeof(callback) === "function") {
				callback()
			}
		}
		function failureCB(errorCode) {
			// If earth couldn't load
		}
		google.setOnLoadCallback(init);
		earth.look = function () {
			var lookAt = ge.getView().copyAsLookAt(ge.ALTITUDE_RELATIVE_TO_GROUND);
			lookAt.setLatitude(this.latitude);
			lookAt.setLongitude(this.longitude);
			lookAt.setRange(this.altitude);
			ge.getView().setAbstractView(lookAt);
		}
		earth.setSpeed = function(speed) {
			speed = speed % 6;
			ge.getOptions().setFlyToSpeed(speed);
		}
		earth.getSpeed = function () {
			return ge.getOptions().getFlyToSpeed();
		}
		earth.setRange = function(miles) {
			// convert default meters to miles.
			this.altitude = miles * 1609.34;
		}
		earth.getRange = function () {
			return parseFloat(ge.getView().copyAsLookAt(ge.ALTITUDE_RELATIVE_TO_GROUND).getRange()) / 1609.34;
		}
		earth.placePlacemarker = function(id, lon, lat) {
			// Create the placemark.
			var placemark = ge.createPlacemark(id);
			// placemark.setName('satellite');
			// Define a custom icon.
			var icon = ge.createIcon('');
			icon.setHref('http://www.clker.com/cliparts/M/x/X/J/H/d/satellite-download-th.png');
			var style = ge.createStyle('');
			style.getIconStyle().setIcon(icon);
			style.getIconStyle().setScale(5.0);
			placemark.setStyleSelector(style);
			// Set the placemark's location.  
			var point = ge.createPoint('');
			point.setLongitude(lon);
			point.setLatitude(lat);
			placemark.setGeometry(point);
			ge.getFeatures().appendChild(placemark);
			placemarkIds.push(id);
			points.push(point);
		}
		return earth;
	}