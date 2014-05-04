var app = (function(){
	var l$ = $;
	var url, longitude, latitude, altitude
	,$sidebar = $('#sidebar')
	,$lessonPresent
	,$lessonEdit
	,$backToLessons
	,$hotspotView
	,$hotspotEdit;
	function bindLesson(){
		$lessonPresent = $('#sidebar .present');
		$lessonEdit    = $('#sidebar .editL');
	}
	function lessonEvents(){
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
				bindHotspot();
				hotspotEvents();
			});
		});
		$lessonEdit
		.css('border','2px solid green')
		.on('click', function(e){
			e.preventDefault();
			url = $(this).parent().attr('action');
			alert('edit!');
		});
	}
	function bindHotspot(){
		$hotspotView   = $('#sidebar .view');
		$hotspotEdit   = $('#sidebar .editH');
		$backToLessons = $('#sidebar .b2l');
	}
	function hotspotEvents(){
		$hotspotView
		.css('border', '2px solid purple')
		.on('click', function(e){
			e.preventDefault();
			// alert('click!');
			console.log("$(this).data():");
			console.debug($(this).data());
			earth.longitude = parseFloat($(this).data("longitude"));
			earth.latitude  = parseFloat($(this).data("latitude"));
			earth.setRange(   parseFloat($(this).data("altitude"))   );
			// console.log("earth.longitude: ", earth.longitude);
			earth.look();
		});
		$hotspotEdit
		.css('border', '2px solid brown')
		.on('click', function(e){
			e.preventDefault();
			alert('click!');
		});
		$backToLessons
		.css('border', '2px solid green')
		.on('click', function(e){
			e.preventDefault();
			alert('click!');
		});
	}
	var earth = Earth('map3d', function(){
		earth.longitude = 10;
		earth.latitude  = 10;
		earth.setRange(   1000   );  // in miles
		earth.look();
		bindLesson();
		lessonEvents();
	});
})();;