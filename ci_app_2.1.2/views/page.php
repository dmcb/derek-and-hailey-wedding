<!doctype html>
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="description" content="Derek and Hailey start their biggest adventure." />
	<meta name="keywords" content="derek mcburney, hailey pinto, wedding, calgary, alberta, dmcb design" />
	<meta name="robots" content="ALL" />
	<meta name="author" content="Derek McBurney" />

    <title>The Wedding | Derek &amp; Hailey</title>

    <style type="text/css">@import "assets/styles/style.css";</style>

	<!--[if IE 7]>
		<style type="text/css">@import "assets/styles/ie7hacks.css";</style>
	<![endif]-->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="assets/scripts/jquery.timers-1.1.2.js"></script>
    <script src="assets/scripts/jquery.scrollorama.js"></script>
    <script src="assets/scripts/script.js"></script>

	<!-- Google Analytics -->
	<script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-32129047-1']);
		_gaq.push(['_trackPageview']);

		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>
  </head>

  <body class="scrollblock">
  	<div class="background"></div>

  	<div class="title">
  		<hr/>
  		<div class="wrapper">
			<a href="./"><img src="assets/images/derek_and_hailey.png" alt="Derek &amp; Hailey"/></a>

			<?php
				$uri_segments = explode("/", $_SERVER['REQUEST_URI']);
			?>

			<ul class="menu"><li>
					<a href="./" <?php if ($uri_segments[sizeof($uri_segments)-1] == "") echo 'class="selected"';?>>
						<span class="title" >The Wedding</span>
						<span class="description">Details on the start of our biggest adventure</span>
					</a>
				</li>
				<li>
					<a href="wedding-party" <?php if ($uri_segments[sizeof($uri_segments)-1] == "wedding-party") echo 'class="selected"';?>>
						<span class="title">The Wedding Party</span>
						<span class="description">Meet the cast that brought us here</span>
					</a>
				</li>
				<li>
					<a <?php if ($uri_segments[sizeof($uri_segments)-1] == "photos") echo 'class="selected"';?>>
						<span class="title">Photos + Blog</span>
						<!--<span class="description">See our story and help us tell it</span>-->
						<span class="description">Coming soon...</span>
					</a>
				</li>
			</ul>
		</div>
  	</div>

  <?php if (isset($content)) echo $content; ?>

  	<div class="padding">&nbsp;</div>

  	<div class="footer">
  		<div class="wrapper">

  		</div>

  		<div class="bottom">
			<div class="wrapper">
				<a class="tweets" id="tweets" href="tweets">
					<img src="assets/images/heart.png" alt="" style="position: absolute; top:10px; left:156px;" id="heart" />
					<span class="title">See Derek and Hailey's tweets</span>
					<span class="description">(It's how we met)</span>
				</a>

				<div class="menu">
					<a href="./">the wedding</a> &bull; <a href="wedding-party">the wedding party</a> &bull; <a>photos + blog</a>
					<a class="watermark" href="http://dmcbdesign.com"><img src="assets/images/watermark.png" alt="Made with love by dmcb design" /></a>
				</div>
			</div>
		</div>
  	</div>
  </body>
</html>
