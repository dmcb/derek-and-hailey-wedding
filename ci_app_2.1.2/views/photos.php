  	<div class="navigation">
  		<div class="wrapper">
  			<div class="box">
				<h2>Photos</h2>
				<span><a href="#share_photos">Share Your Photos</a></span>
				<span><a href="#wedding_photos">The Wedding</a> &bull; <a href="#us_photos">Us</a></span>
			</div>
			<img src="<?php echo base_url();?>assets/images/photo_3.jpg" alt="" class="rotate" />
  		</div>
  	</div>

  	<div class="page">
  		<div class="wrapper">
  			<div class="section" id="share_photos">
	  			<h3><img src="<?php echo base_url();?>assets/images/photos.png" alt="Photos" /></h3>
	  			
	  			<button class="button" id="filepicker" onclick="openFilePicker()" style="margin-left: 192px; margin-bottom: 64px">Share your photos</button>
  			</div>
  		</div>
  	</div>
  	
	<div class="section" id="wedding_photos">
		<h3><img src="<?php echo base_url();?>assets/images/wedding.png" alt="The Wedding" /></h3>
		
		<div>
			<?php foreach ($photos as $photo) 
			{
				echo '<a class="fancybox" href="assets/photos/'.$photo['file'].'" data-fancybox-group="gallery" title="'.$photo['copyright'].'"><img src="assets/photos/thumbnails/'.$photo['file'].'" alt="" class="scale"></a>';
			}
			?>
		</div>
	</div>
  			
  	<div class="page">
  		<div class="wrapper">
  			<div class="section" id="us_photos">
	  			<h3><img src="<?php echo base_url();?>assets/images/us.png" alt="Us" /></h3>
	  			
	  			<div>
		  			<img src="<?php echo base_url();?>assets/images/engagement_1.jpg" alt="" style="width: 234px; height: 465px; left: 118px;" class="scale" id="engagement_1"/>
		  			<img src="<?php echo base_url();?>assets/images/engagement_2.jpg" alt="" style="width: 544px; height: 361px; left: 384px; top: 104px;" class="scale" id="engagement_2"/>
		  			<img src="<?php echo base_url();?>assets/images/engagement_3.jpg" alt="" style="width: 544px; height: 408px; top: 497px;" class="scale" id="engagement_3"/>
		  			<img src="<?php echo base_url();?>assets/images/engagement_4.jpg" alt="" style="width: 352px; height: 530px; left: 576px; top: 659px;" class="scale" id="engagement_4"/>
		  			<img src="<?php echo base_url();?>assets/images/engagement_5.jpg" alt="" style="width: 544px; height: 408px; top: 935px;" class="scale" id="engagement_5"/>
		  			<img src="<?php echo base_url();?>assets/images/engagement_6.jpg" alt="" style="width: 352px; height: 276px; top: 1373px;" class="scale" id="engagement_6"/>
		  			<img src="<?php echo base_url();?>assets/images/engagement_7.jpg" alt="" style="width: 544px; height: 816px; left: 384px; top: 1423px;" class="scale" id="engagement_7"/>
		  			<img src="<?php echo base_url();?>assets/images/engagement_8.jpg" alt="" style="width: 261px; height: 393px; left: 91px; top: 1679px" class="scale" id="engagement_8"/>
	  			</div>
  			</div>
  		</div>
  	</div>
