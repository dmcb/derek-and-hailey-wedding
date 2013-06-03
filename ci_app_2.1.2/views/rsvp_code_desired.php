			<div class="section" id="rsvp">
				<h3>r.s.v.p.</h3>
				<form method="post" accept-charset="utf-8" action="<?php current_url();?>#rsvp">
				<p>Please enter the personalized code you received to tell us you're over-the-moon-excited to share our day with us (or that you're heartbroken you can't be there).</p>
				<span>Code</span>
				<input type="text" name="code" id="code" maxlength="5" class="text large"/>
				<?php echo validation_errors(); ?>
				<img src="<?php echo base_url();?>assets/images/load.gif" alt="Loading..." id="load" style="display: none;"/>
				<input type="submit" name="enter" id="enter" value="Enter code" class="button"/>
				</form>
			</div>