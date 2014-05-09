var giveSerializeArrayGetJson = function(array) {
	var json = {};
  $.each(array, function() {
    json[this.name] = this.value || '';
  });
  return json;
}
var app = (function(){
	// OH MY GOODNESS WHAT HAVE I CREATED?
	// TODO: refactor for modularity
	var url, longitude, latitude, altitude, index, id
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
	$allSubmits.attr('disabled', 'disabled');
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
		$userEditSubmit   = l$('#userPanel .edit');
		$userDeleteSubmit = l$('#userPanel .delete');
	}
	function userEvents(){
		$userManage
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
		$userEditSubmit
		.off()
		.on('click', function(e){
			e.preventDefault();
			url = $(this).parent().attr('action');
			data = giveSerializeArrayGetJson($(this).parent().serializeArray());
			l$.ajax({type:"POST"
							,url :url
							,data:data})
			.done(function(html){
				console.log("response");
				console.debug(html);
				l$.ajax({type:"GET"
								,url: url
								,success: function(html){
									$userPanel.animate({opacity: 0},400, function(){
										$userPanel.empty();
										$userPanel.html(html);
										$userPanel.animate({opacity:1}, 400);
										bindUser();
										userEvents();
									});
								}});
			});
		});
		$userDeleteSubmit
		.off()
		.on("click", function(e){
			e.preventDefault();
			url = $(this).parent().attr('action');
			if(confirm("You are about to delete your user!  Are you sure?!")){
				if(confirm("ARE YOU SURE?!  This action cannot be undone!")){
					if(confirm("Seriously, you're about to delete all created lesson, all created hotspots!  This action cannot be undone!")){
						if(confirm("Reconsider?  If this isn't the original user: this is quite a mean thing to do!")){
							response = prompt("Alright, Enter your password to continue with delete", "password");
							l$.ajax({type:"DELETE"
							,url:url
							,success: function(){
								window.location = "/login";
							}});
						}
					}
				}
			}
		});
		$userBack
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
		$lessonCreate         = $('#sidebar .createL');
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
			id = $(this).parent().data('id');
			l$.ajax({type:"GET"
							,url:url
							,success: function(html){
								$("#"+id).replaceWith(html);
								bindLesson();
								lessonEvents();
							}});
		});
		$lessonEditSubmit
		.off()
		.on('click', function(e){
			e.preventDefault();
			url = $(this).parent().attr('action');
			data = giveSerializeArrayGetJson($(this).parent().serializeArray());
			id = $(this).parent().data('id');
			l$.ajax({type:"POST"
							,url :url
							,data:data})
			.done(function(html){
				console.log("response");
				console.debug(html);
				l$.ajax({type:"GET"
								,url: url
								,success: function(html){
									$("#"+id).replaceWith(html);
									bindLesson();
									lessonEvents();
								}});
			});
		});
		$lessonEditBack
		.off()
		.on('click', function(e){
			e.preventDefault();
			url = $(this).parent().attr('action');
			id  = $(this).parent().data('id');
			l$.ajax({type:"GET"
							,url:url
							,success: function(html){
								$("#"+id).replaceWith(html);
								bindLesson();
								lessonEvents();
							}});
		});
		$lessonDeleteSubmit
		.off()
		.css('border', '1px solid yellow')
		.on('click', function(e){
			e.preventDefault();
			url = $(this).parent().attr('action');
			id  = $(this).parent().data('id');
			console.log('url ' + url + ' id: ' + id);
			l$.ajax({type:"DELETE"
							,url:url
							,success: function(html){
								$("#"+id).remove();
								bindLesson();
								lessonEvents();
							}});
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
			// data = $(this).parent().serializeArray();
			data = giveSerializeArrayGetJson($(this).parent().serializeArray());
			redirect = $(this).parent().data('index');
			l$.ajax({type:"POST"
							,url :url
							,data:data})
			.done(function(html){
				console.log("response");
				console.debug(html);
				l$.ajax({type:"GET"
								,url: redirect
								,success: function(html){
									$sidebar.animate({opacity:0}, 400, function(){
										$sidebar.empty();
										$sidebar.html(html);
										bindLesson();
										lessonEvents();
										$sidebar.animate({opacity:1}, 400);
									});
								}})
			});
		});
	}
	function bindHotspot(){
		$hotspotView          = $('#sidebar .view');
		$hotspotCreate        = $('#sidebar .createH');
		$hotspotCreateSubmit  = $('#sidebar .create');
		$hotspotEdit          = $('#sidebar .editH');
		$hotspotEditSubmit    = $('#sidebar .edit');
		$hotspotDeleteSubmit  = $('#sidebar .delete');
		$backToLessons        = $('#sidebar .b2l');
		$hotspotCreate = $('#sidebar .createH');
		$hotspotEditBack      = $('#sidebar .back');
	}
	function hotspotEvents(){
		$hotspotView
		.css('border', '2px solid yellow')
		.off()
		.on('click', function(e){
			e.preventDefault();
			earth.longitude = parseFloat($(this).data("longitude"));
			earth.latitude  = parseFloat($(this).data("latitude"));
			earth.setRange(   parseFloat($(this).data("altitude"))   );
			earth.look();
		});
		$hotspotEdit
		.off()
		.on('click', function(e){
			e.preventDefault();
			url = $(this).parent().attr('action');
			id = $(this).parent().data('id');
			console.log(url);
			l$.ajax({type:"GET"
							,url:url
							,success: function(html){
								$("#"+id).replaceWith(html);
								bindHotspot();
								hotspotEvents();
							}});
		});
		$hotspotEditSubmit
		.off()
		.css('border', '2px solid yellow')
		.on('click', function(e){
			e.preventDefault();
			url = $(this).parent().parent().attr('action');
			data = giveSerializeArrayGetJson($(this).parent().parent().serializeArray());
			id = $(this).parent().parent().data('id');
			l$.ajax({type:"POST"
							,url :url
							,data:data})
			.done(function(html){
				l$.ajax({type:"GET"
								,url: url
								,success: function(html){
									$("#"+id).replaceWith(html);
									bindHotspot();
									hotspotEvents();
								}});
			});
		});
		$hotspotDeleteSubmit
		.css('border', '2px solid yellow')
		.on('click', function(e){
			e.preventDefault();
			url = $(this).parent().attr('action');
			id  = $(this).parent().data('id');
			console.log(url);
			console.log(id);
			l$.ajax({type:"DELETE"
							,url:url
							,success: function(html){
								$("#"+id).remove();
								bindLesson();
								lessonEvents();
							}});
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
				bindHotspot();
				hotspotEvents();
			});
		});
		$hotspotCreateSubmit
		.off()
		.css('border', '2px solid green')
		.on('click', function(e){
			e.preventDefault();
			url = $(this).parent().attr('action');
			// data = $(this).parent().serializeArray();
			data = giveSerializeArrayGetJson($(this).parent().serializeArray());
			redirect = $(this).parent().data('index');
			l$.ajax({type:"POST"
							,url :url
							,data:data})
			.done(function(html){
				console.log("response");
				console.debug(html);
				l$.ajax({type:"GET"
								,url: redirect
								,success: function(html){
									$sidebar.animate({opacity:0}, 400, function(){
										$sidebar.empty();
										$sidebar.html(html);
										bindHotspot();
										hotspotEvents();
										$sidebar.animate({opacity:1}, 400);
									});
								}})
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