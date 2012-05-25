<!doctype html>
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="description" content="Derek and Hailey start their biggest adventure." />
	<meta name="keywords" content="derek mcburney, hailey pinto, wedding, calgary, alberta, dmcb design" />
	<meta name="robots" content="ALL" />
	<meta name="author" content="Derek McBurney" />

    <title>The Wedding | Derek &amp; Hailey</title>

    <style type="text/css">@import "styles/style.css";</style>

	<!--[if IE 7]>
		<style type="text/css">@import "styles/ie7hacks.css";</style>
	<![endif]-->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="scripts/jquery.timers-1.1.2.js"></script>
    <script src="scripts/jquery.scrollorama.js"></script>

	<!-- Heart effect -->
	<script type="text/javascript">
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
		});
	</script>

  </head>

  <body class="scrollblock">
  	<div class="background"></div>

  	<div class="title">
  		<hr/>
  		<div class="wrapper">
			<a href="./"><img src="images/derek_and_hailey.png" alt="Derek &amp; Hailey"/></a>

			<ul class="menu"><li>
					<a href="./" class="selected">
						<span class="title">The Wedding</span>
						<span class="description">Details on the start of our biggest adventure</span>
					</a>
				</li>
				<li>
					<a>
						<span class="title">The Wedding Party</span>
						<!--<span class="description">Meet the cast that brought us here</span>-->
						<span class="description">Coming soon...</span>
					</a>
				</li>
				<li>
					<a>
						<span class="title">Photos + Blog</span>
						<!--<span class="description">See our story and help us tell it</span>-->
						<span class="description">Coming soon...</span>
					</a>
				</li>
			</ul>
		</div>
  	</div>
