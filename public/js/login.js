var login = (function(){
	var l$ = $;
	l$(document).ready(function(){
		// focus first form element
		l$("form:not(.filter) :input:visible:enabled:first").focus();
	});
})();