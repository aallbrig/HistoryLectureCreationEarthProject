var app = (function(){
	// OH MY GOODNESS WHAT HAVE I CREATED?
	var l$ = $;
	var url, longitude, latitude, altitude
	,$sidebar    = $('#sidebar')
	,$topbar     = $('#topcontext')
	,$userPanel  = $('#userPanel')
	,$userManage = $('#userPanel .manage')
	,$lessonPresent
	,$lessonEdit
	,$lessonCreate
	,$createNewLessonForm
	,$createNewHotspotForm
	,$backToLessons
	,$hotspotView
	,$hotspotEdit;
	function rebindAll(){
		// AHHHHHHHHHHHHHHHH....
		bindUser();
		bindLesson();
		bindHotspot();
	}
	function allEvents(){
		// ....HHHHHHHHHHHHHHHHHHH...
		userEvents();
		lessonEvents();
		hotspotEvents();
	}
	function bindUser(){
		$userPanel  = $('#userPanel');
		$userManage = $('#userPanel .manage');
		$userBack   = $('#userPanel .b2u');
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
					$userPanel.animate({opacity:1}, 400);
					bindUser();
					userEvents();
				});
			});
		});
		$userBack
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
					$userPanel.animate({opacity:1}, 400);
					bindUser();
					userEvents();
				});
			});
		})
	}
	function bindLesson(){
		$lessonPresent        = $('#sidebar .present');
		$lessonEdit           = $('#sidebar .editL');
		$lessonCreate         = $('#sidebar .create');
		$createNewLessonForm  = $('#sidebar .createL');
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
		$createNewLessonForm
		.on('click', function(e){
			e.preventDefault();
			url = $(this).parent().attr('action');
			// alert('create lesson!');
			l$.ajax({type:"GET"
							,url:url})
			.done(function(html){
				l$('#lessonsContainer').prepend(html);
				bindLesson();
				lessonEvents();
			});
		});
		$lessonCreate
		.on('click', function(e){
			alert('click!');
			e.preventDefault();
			url = $(this).parent().attr('action');
			l$.ajax({type:"GET"
							,url:url})
			.done(function(html){
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
	function bindHotspot(){
		$hotspotView   = $('#sidebar .view');
		$hotspotEdit   = $('#sidebar .editH');
		$backToLessons = $('#sidebar .b2l');
		$createNewHotspotForm = $('#sidebar .createH')
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
		$createNewHotspotForm
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
		bindUser();
		userEvents();
	});
})();;