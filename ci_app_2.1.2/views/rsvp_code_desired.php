			<div class="section" id="rsvp">
				<h3><img src="<?php echo base_url();?>assets/images/rsvp.png" alt="RSVP" /></h3>
				<form method="post" accept-charset="utf-8" action="<?php current_url();?>#rsvp">
				<p>To respond to your wedding invitation, please enter the code found on your invitation.</p>
				<span>Code</span>
				<input type="text" name="code" id="code" maxlength="5" class="text large"/>
				<?php echo validation_errors(); ?>
				<img src="<?php echo base_url();?>assets/images/load.gif" alt="Loading..." id="load" style="display: none;"/>
				<input type="submit" name="enter" id="enter" value="Enter code" class="button"/>
				</form>
			</div>