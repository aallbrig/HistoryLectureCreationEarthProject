var login = (function(){
	var l$ = $
			,$firstInput = l$("form:not(.filter) :input:visible:enabled:first")
			,$register   = l$("#register")
			,$rModal     = l$("#registerModal").modal("hide");
	l$(document).ready(function(){
		// focus first form element
		$firstInput.focus();
		$register
		.on('click', function(e){
			e.preventDefault();
			$rModal.modal("show");
		})
	});
})();