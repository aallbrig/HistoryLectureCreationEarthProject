var app = (function(){
	var l$ = $;
	var url, longitude, latitude, altitude
	,$sidebar    = $('#sidebar')
	,$topbar     = $('#topcontext')
	,$userPanel  = $('#userPanel')
	,$userManage = $('#userPanel .manage')
	,$lessonPresent
	,$lessonEdit
	,$backToLessons
	,$hotspotView
	,$hotspotEdit;
	function bindUser(){
		$userPanel  = $('#userPanel');
		$userManage = $('#userPanel .manage');
		$userBack   = $('#userPanel #b2u');
	}
	function userEvents(){
		$userManage
		.css("border", "2px solid yellow")
		.on("click", function(e){
			e.preventDefault();
			url = $(this).parent().attr('action');
			l$.ajax({type:"GET"
							,url: url})
			.done(function(html){
				$userPanel.animate({opacity: 0},400, function(){
					$userPanel.empty();
					$userPanel.html(html);
					bindHotspot();
					hotspotEvents();
					$userPanel.animate({opacity:1}, 400);
				});
			});
			alert('click!');
		});
		$userBack
		.css("border", "2px solid yello")
		.on("click", function(e){
			e.preventDefault();
			url = $(this).parent().attr('action');
			l$.ajax({type:"GET"
							,url: url})
			.done(function(html){
				$userPanel.animate({opacity: 0},400, function(){
					$userPanel.empty();
					$userPanel.html(html);
					bindHotspot();
					hotspotEvents();
					$userPanel.animate({opacity:1}, 400);
				});
			});
		})
	}
	function bindLesson(){
		$lessonPresent = $('#sidebar .present');
		$lessonEdit    = $('#sidebar .editL');
	}
	function lessonEvents(){
		$lessonPresent
		.on('click', function(e){
			e.preventDefault();
			url = $(this).parent().attr('action');
			l$.ajax({type:"GET"
							,url: url})
			.done(function(html){
				$sidebar.animate({opacity: 0},400, function(){
					$sidebar.empty();
					$sidebar.html(html);
					bindHotspot();
					hotspotEvents();
					$sidebar.animate({opacity:1}, 400);
				});
			});
			l$.ajax({type:"GET"
							,url: $(this).data("header-url")})
			.done(function(html){
				$topbar.animate({opacity: 0},400, function(){
					$topbar.empty();
					$topbar.html(html);
					bindHotspot();
					hotspotEvents();
					$topbar.animate({opacity:1}, 400);
				});
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
		.on('click', function(e){
			e.preventDefault();
			earth.longitude = parseFloat($(this).data("longitude"));
			earth.latitude  = parseFloat($(this).data("latitude"));
			earth.setRange(   parseFloat($(this).data("altitude"))   );
			earth.look();
		});
		$hotspotEdit
		.css('border', '2px solid brown')
		.on('click', function(e){
			e.preventDefault();
			alert('click!');
		});
		$backToLessons
		.on('click', function(e){
			e.preventDefault();
			url = $(this).parent().attr('action');
			l$.ajax({type:"GET"
							,url: url})
			.done(function(html){
				$topbar.animate({opacity:0}, 400, function(){
					$topbar.empty();
				});
				$sidebar.animate({opacity:0}, 400, function(){
					$sidebar.empty();
					$sidebar.html(html);
					bindLesson();
					lessonEvents();
					$sidebar.animate({opacity:1}, 400);
				});
			});
		});
	}
	var earth = Earth('map3d', function(){
		earth.longitude = 10;
		earth.latitude  = 10;
		earth.setRange(   1000   );  // in miles
		earth.look();
		bindLesson();
		lessonEvents();
		bindUser();
		userEvents();
	});
})();;