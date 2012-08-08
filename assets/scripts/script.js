$(document).ready(function(){
	// Flying bird effects
	var scrollorama = $.scrollorama({
		blocks:'.scrollblock'
	});

	if ($('#bird1').length != 0) {
		scrollorama.animate('#bird1',
		{
			delay:50,
			duration:1200,
			property:'background-position-x',
			start:-129,
			end:$(window).width()
		});
		scrollorama.animate('#bird1',
		{
			delay:640,
			duration:500,
			property:'background-position-y',
			start:0,
			end:240,
			easing:'easeInOutQuad'
		});
	}

	if ($('#bird2').length != 0) {
		scrollorama.animate('#bird2',
		{
			delay:970,
			duration:650,
			property:'background-position-x',
			start:$(window).width(),
			end:$(window).width()/2+200,
			easing:'easeOutSine'
		});
		scrollorama.animate('#bird2',
		{
			delay:970,
			duration:650,
			property:'background-position-y',
			start:300,
			end:40,
			easing:'easeInOutBack'
		});
	}

	// Twitter heart effect
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

	// Wedding party mad lib selection
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

	// RSVP Naming
	$('#number_attending').change(function() {
		$guests = $(this).val();
		if ($guests > 0) {
			$('#names_of_attending').show();
		}
		else {
			$('#names_of_attending').hide();
		}
		for ($i=0; $i<10; $i++) {
			if ($i < $guests) {
				$('#name_' + $i).show();
			}
			else {
				$('#name_' + $i).hide();
			}
		}
	});
});

