  			<div class="section" id="rsvp">
  				<h3><img src="assets/images/rsvp.png" alt="RSVP" /></h3>
				<p>Dear
				<?php
				for ($i=0; $i<sizeof($invitation['names_of_invited']); $i++)
				{
					if ($i == sizeof($invitation['names_of_invited'])-1)
					{
						echo ' and ';
					}
					else if ($i != 0)
					{
						echo ', ';
					}
					echo $invitation['names_of_invited'][$i];
				}
				?>, we request the pleasure of your company for our wedding. Please let us know how many will be in attendance and their names.</p>

				<form method="post" accept-charset="utf-8" action="<?php current_url();?>">
					<span>Number attending</span>
					<select name="number_attending" id="number_attending">
					<option value="0">0 (celebrating in spirit)</option>
					<?php
					for ($i=1; $i<=$invitation['number_invited']; $i++)
					{
						echo '<option value="'.$i.'" ';
						if ($i == $invitation['number_invited'])
						{
							echo 'selected = "selected"';
						}
						echo '>'.$i.'</option>';
					}
					?>
					</select>

					<?php
					if (sizeof($invitation['names_of_invited']) > 1)
					{
						echo '<br/><br/><br/><span id="names_of_attending">Names of those attending</span>';
						for ($i=0; $i<10; $i++)
						{
							if ($i < sizeof($invitation['names_of_invited']))
							{
								echo '<input type="text" name="name_'.$i.'" id="name_'.$i.'" value="'.$invitation['names_of_invited'][$i].'" maxlength="49" class="text"/>';
							}
							else
							{
								echo '<input type="text" name="name_'.$i.'" id="name_'.$i.'" value="" maxlength="49" class="text" style="display: none;"/>';
							}
						}
					}
					?>
					<?php echo validation_errors(); ?>
					<input type="submit" name="rsvp" id="rsvp" value="RSVP" class="button"/>
				</form>
			</div>
