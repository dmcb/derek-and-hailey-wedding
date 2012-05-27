$(document).ready(function(){
	$("#tweets").hover(
	function(){
		if (!$("#heart").is(":animated")) {
			$("#heart").everyTime(2, function() {
				$("#heart").animate({top:"10px"}, 0).animate({opacity:1}, 200).animate({top:"-80px", opacity: 0}, 1000, 'linear').delay(400);
			});
		}
	},
	function() {
		$("#heart").stopTime();
		$("#heart").clearQueue();
	});

	$('.person').click(function() {
		var selected = false;
		if ($(this).hasClass('selected')) {
			selected = true;
		}
		$('.person').removeClass('selected');
		$('.overlay').removeClass('selected');
		if (!selected) {
			var id = $(this).attr('id');
			$(this).addClass('selected');
			$('.overlay#' + id + '_overlay').addClass('selected');
		}
	});
});

