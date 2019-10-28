$(document).ready(function () {
	$(".jury .btn.more").click(function (event) {
		event.preventDefault();
		$(this).parents(".jury").addClass("expanded");
		$(this).parent(".container").hide();
	});
});
