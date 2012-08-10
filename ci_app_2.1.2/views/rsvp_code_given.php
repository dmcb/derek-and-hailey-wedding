  			<div class="section" id="rsvp">
  				<h3><img src="<?php echo base_url();?>assets/images/rsvp.png" alt="RSVP" /></h3>
				<h4 class="one"><?php
				for ($i=0; $i<sizeof($invitation['names_of_invited']); $i++)
				{
					if ($i == sizeof($invitation['names_of_invited'])-1 && $i != 0)
					{
						echo ' and ';
					}
					else if ($i != 0)
					{
						echo ', ';
					}
					echo $invitation['names_of_invited'][$i];
				}
				?></h4>
				<p>It's great to hear from you! Thanks for taking a few moments to stop in. Now, let us know if we can expect to see you or if we can rely on your well-wishes from afar.</p>

				<form method="post" accept-charset="utf-8" action="<?php current_url();?>">
					<span>Number attending</span>
					<select name="number_attending" id="number_attending">
					<option value="0">0 (celebrating in spirit)</option>
					<?php
					for ($i=1; $i<=$invitation['number_invited']; $i++)
					{
						$number_attending = set_value('number_attending');
						echo '<option value="'.$i.'" ';
						if ($i == $invitation['number_invited'] && empty($number_attending))
						{
							echo 'selected="selected"';
						}
						else if ($i == $number_attending && !empty($number_attending))
						{
							echo 'selected="selected"';
						}
						echo '>'.$i.'</option>';
					}
					?>
					</select>

					<?php
					if ($invitation['number_invited'] > 1)
					{
						echo '<br/><br/><br/><span id="names_of_attending">Names of those attending</span>';
						$number_attending = set_value('number_attending');
						for ($i=0; $i<10; $i++)
						{
							if ($i < sizeof($invitation['names_of_invited']) && (empty($number_attending) || $i < $number_attending))
							{
								echo '<input type="text" name="name_'.$i.'" id="name_'.$i.'" value="'.set_value('name_'.$i, $invitation['names_of_invited'][$i]).'" maxlength="49" class="text"/>';
							}
							else if ($i < $invitation['number_invited'] && (empty($number_attending) || $i < $number_attending))
							{
								echo '<input type="text" name="name_'.$i.'" id="name_'.$i.'" value="'.set_value('name_'.$i).'" maxlength="49" class="text"/>';
							}
							else
							{
								echo '<input type="text" name="name_'.$i.'" id="name_'.$i.'" value="" maxlength="49" class="text" style="display: none;"/>';
							}
							echo form_error('name_'.$i);
						}
					}
					?>
					<img src="<?php echo base_url();?>assets/images/load.gif" alt="Loading..." id="load" style="display: none;"/>
					<input type="submit" name="submit" id="submit" value="Submit response" class="button"/>
				</form>
			</div>
