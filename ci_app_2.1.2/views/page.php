<!DOCTYPE HTML>
<html>
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="description" content="Derek and Hailey start their biggest adventure." />
	<meta name="keywords" content="derek mcburney, hailey pinto, wedding, calgary, alberta, dmcb design" />
	<meta name="robots" content="ALL" />
	<meta name="author" content="Derek McBurney" />

    <title>The Wedding | Derek &amp; Hailey</title>
    
	<script type="text/javascript" src="//use.typekit.net/bup1peb.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

    <style type="text/css">@import "<?php echo base_url();?>assets/styles/style.css";</style>

	<!--[if IE 7]>
		<style type="text/css">@import "<?php echo base_url();?>assets/styles/ie7hacks.css";</style>
	<![endif]-->
	
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

<?php if (isset($splash)) echo $splash; ?>
  
  	<div class="background"></div>

  	<div class="title">
  		<hr/>
  		<div class="wrapper">
			<a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/images/derek_and_hailey.png" alt="Derek &amp; Hailey"/></a>

			<?php
				$uri_segments = explode("/", $_SERVER['REQUEST_URI']);
			?>

			<ul class="menu"><li>
					<a href="<?php echo base_url();?>" <?php if ($uri_segments[sizeof($uri_segments)-1] == "") echo 'class="selected"';?>>
						<span class="title" >The Wedding</span>
						<span class="description">Details on the start of our biggest adventure</span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>wedding-party" <?php if ($uri_segments[sizeof($uri_segments)-1] == "wedding-party") echo 'class="selected"';?>>
						<span class="title">The Wedding Party</span>
						<span class="description">Meet the cast that brought us here</span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>photos" <?php if ($uri_segments[sizeof($uri_segments)-1] == "photos") echo 'class="selected"';?>>
						<span class="title">Photos</span>
						<span class="description">See our story and help us tell it</span>
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
					<img src="<?php echo base_url();?>assets/images/heart.png" alt="" style="position: absolute; top:10px; left:156px;" id="heart" />
					<span class="title">See Derek and Hailey's tweets</span>
					<span class="description">(It's how we met)</span>
				</a>

				<div class="menu">
					<a href="<?php echo base_url();?>">the wedding</a> &bull; <a href="<?php echo base_url();?>wedding-party">the wedding party</a> &bull; <a href="<?php echo base_url();?>photos">photos</a>
					<a class="watermark" href="http://dmcbdesign.com"><img src="<?php echo base_url();?>assets/images/watermark.png" alt="Made with love by dmcb design" /></a>
				</div>
			</div>
		</div>
  	</div>

  	<!-- scripts -->
  	<script type="text/javascript" src="<?php echo base_url();?>library/json2.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>library/jquery.timers-1.1.2.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>library/jquery.scrollorama.js"></script>
    <script type="text/javascript" src="//api.filepicker.io/v1/filepicker.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>library/fancyBox-2.1.4/jquery.fancybox.js?v=2.1.4"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>library/fancyBox-2.1.4/jquery.fancybox.css?v=2.1.4" media="screen" />
	<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/script.js"></script>
  </body>
</html>
