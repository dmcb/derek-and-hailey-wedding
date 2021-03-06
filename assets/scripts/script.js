$(document).ready(function(){
	// Start fancyBox
	$('.fancybox').fancybox();

	// Flying bird effects
	var scrollorama = $.scrollorama({
		blocks:'.scrollblock'
	});

	if ($('#bird1').length != 0) {
		scrollorama.animate('#bird1',
		{
			delay:400,
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

	// RSVP Naming
	$('#number_attending').on('change', function() {
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

	// Code submission
	$('#enter').on('click', function() {
		$("#load").show();
		$('#enter').hide();
		$.ajax({
			type: 'POST',
			url: "wedding/ajax",
			data: { code: $('#code').val() },
			dataType: 'json',
			success: function(html) {
				$('#rsvp').replaceWith(html);
			},
			error: function() {
				$("#enter").show();
				$('#load').hide();
				alert('Code entry failed. Please try again.');
			}
		});
		return false;
	});

	// RSVP details submission
	$('#submit').on('click', function() {
		$("#load").show();
		$('#submit').hide();
		data = "number_attending=" + $('#number_attending').val()
		for ($i=0; $i<10; $i++) {
			if ($i < $('#number_attending').val()) {
				data = data + '&name_' + $i + '=' + $('#name_' + $i).val();
			}
		}
		$.ajax({
			type: 'POST',
			url: "wedding/ajax",
			data: data,
			dataType: 'json',
			success: function(html) {
				$('#rsvp').replaceWith(html);
			},
			error: function() {
				$("#submit").show();
				$('#load').hide();
				alert('Response entry failed. Please try again.');
			}
		});
		return false;
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
	
	// Entering the site from the 'Thank You' splash
	$('#close').click(function() {
		$('#post_wedding_splash').removeClass('visible');
		if (typeof(Storage) !== "undefined") {
			sessionStorage.setItem('splashed', true);
		}
	});

	// Check if splash has been clicked already
	if (typeof(Storage) !== "undefined") {
		if (sessionStorage.getItem('splashed')) {
			$('#post_wedding_splash').removeClass('visible');
		}
		else {
			$('#post_wedding_splash').addClass('visible');
		}
	} 
	else {
		$('#post_wedding_splash').addClass('visible');
	}
});

function openFilePicker() {
	filepicker.setKey('AXQXEeByyRd2asZZLQzA0z');
	filepicker.pickMultiple({
			mimetypes: ['image/*'],
			container: 'modal',
			services:['COMPUTER', 'FACEBOOK', 'DROPBOX', 'FLICKR', 'INSTAGRAM']
		},
		function(FPFile){
			console.log(JSON.stringify(FPFile));
		},
		function(FPError){
			console.log(FPError.toString());
		}
	);
}

