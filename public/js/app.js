var app = (function(){
	// OH MY GOODNESS WHAT HAVE I CREATED?
	// TODO: refactor for modularity
	var url, longitude, latitude, altitude, index
			,l$ = $
			,$sidebar    = l$('#sidebar')
			,$topbar     = l$('#topcontext')
			,$userPanel  = l$('#userPanel')
			,$userManage = l$('#userPanel .manage')
			,$allSubmits = l$('input[type=submit]')
			,$userEditSubmit
			,$userDeleteSubmit
			,$lessonPresent
			,$lessonEdit
			,$lessonCreateSubmit
			,$lessonCreate
			,$hotspotCreate
			,$hotspotCreateSubmit
			,$hotspotView
			,$hotspotEdit
			,$hotspotEditSubmit
			,$hotspotDelete
			,$hotspotDeleteSubmit
			,$backToLessons;
	l$allSubmits.attr('disabled', 'disabled');
	function rebindAll(){
		bindUser();
		bindLesson();
		bindHotspot();
	}
	function allEvents(){
		userEvents();
		lessonEvents();
		hotspotEvents();
	}
	function bindUser(){
		$userPanel        = l$('#userPanel');
		$userManage       = l$('#userPanel .manage');
		$userBack         = l$('#userPanel .b2u');
		$userEditSubmit   = l$('');
		$userDeleteSubmit = l$('');
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
		$lessonEditSubmit     = $('#sidebar .edit')
		$lessonCreate  = $('#sidebar .createL');
		$lessonCreateSubmit   = $('#sidebar .create');
		$lessonDelete         = $('#sidebar .deleteL');
		$lessonDeleteSubmit   = $('#sidebar .delete');
		$lessonEditBack       = $('#sidebar .back');
	}
	function lessonEvents(){
		$lessonPresent
		.off()
		.on('click', function(e){
			e.preventDefault();
			url = $(this).parent().attr('action');
			// sidebar
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
			// topbar
			l$.ajax({type:"GET"
							,url: $(this).data("header-url")})
			.done(function(html){
				$topbar.animate({opacity: 0},400, function(){
					$topbar.empty();
					$topbar.html(html);
					$topbar.animate({opacity:1}, 400);
				});
			});
		});
		$lessonEdit
		.off()
		.on('click', function(e){
			e.preventDefault();
			url = $(this).parent().attr('action');
			index = $(this).parent().data('index');
			l$.ajax({type:"GET"
							,url:url
							,success: function(html){
								$("#"+index).replaceWith(html);
								bindLesson();
								lessonEvents();
							}});
		});
		$lessonEditSubmit
		.off()
		.on('click', function(e){
			e.preventDefault();
			url = $(this).parent().attr('action');
			alert('click! ' + url);
		});
		$lessonDeleteSubmit
		.off()
		.on('click', function(e){
			e.preventDefault();
			url = $(this).parent().attr('action');
			alert('click!' + url);
		});
		$lessonCreate
		.off()
		.on('click', function(e){
			e.preventDefault();
			url = $(this).parent().attr('action');
			l$.ajax({type:"GET"
							,url:url})
			.done(function(html){
				l$('#lessonsContainer').prepend(html);
				bindLesson();
				lessonEvents();
			});
		});
		$lessonCreateSubmit
		.off()
		.on('click', function(e){
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
		$hotspotView          = $('#sidebar .view');
		$hotspotCreate        = $('#sidebar .createH');
		$hotspotCreateSubmit  = $('#sidebar .create');
		$hotspotEdit          = $('#sidebar .editH');
		$hotspotEditSubmit    = $('#sidebar .edit');
		$hotspotDelete        = $('#sidebar .deleteH');
		$hotspotDeleteSubmit  = $('#sidebar .delete');
		$backToLessons        = $('#sidebar .b2l');
		$hotspotCreate = $('#sidebar .createH');
		$hotspotEditBack      = $('#sidebar .back');
	}
	function hotspotEvents(){
		$hotspotView
		.off()
		.on('click', function(e){
			e.preventDefault();
			earth.longitude = parseFloat($(this).data("longitude"));
			earth.latitude  = parseFloat($(this).data("latitude"));
			earth.setRange(   parseFloat($(this).data("altitude"))   );
			earth.look();
		});
		$hotspotCreate
		.off()
		.on('click', function(e){
			e.preventDefault();
			url = $(this).parent().attr('action');
			alert('click! ' + url);
			// url = $(this).parent().attr('action');
			// l$.ajax({type:"GET"
			// 				,url:url})
			// .done(function(html){
			// 	$sidebar.animate({opacity:0}, 400, function(){
			// 		$sidebar.empty();
			// 		$sidebar.html(html);
			// 		bindHotspot();
			// 		hotspotEvents();
			// 		$sidebar.animate({opacity:1}, 400);
			// 	});
			// });
		});
		$hotspotEdit
		.css('border', '2px solid brown')
		.off()
		.on('click', function(e){
			e.preventDefault();
			alert('click!');
		});
		$hotspotCreate
		.off()
		.on('click', function(e){
			e.preventDefault();
			url = $(this).parent().attr('action');
			// alert('create lesson!');
			l$.ajax({type:"GET"
							,url:url})
			.done(function(html){
				l$('#hotspotsContainer').prepend(html);
				bindLesson();
				lessonEvents();
			});
		});
		$backToLessons
		.off()
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
		$allSubmits.removeAttr("disabled");
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