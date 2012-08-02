<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Csvload extends CI_Controller {

	public function index()
	{
		if ($_SERVER['REMOTE_ADDR'] != "127.0.0.1" && $_SERVER['REMOTE_ADDR'] != "::1")
		{
			echo "Script is for local use only.";
		}
		else
		{
			$this->load->helper(array('file', 'string'));

			// Load csv file
			$csv_input_file = 'csv/rsvp.csv';
			$csv_output_file = 'csv/rsvp.withcodes.csv';
			$data = read_file($csv_input_file);
			if (!$data)
			{
				echo "rsvp.csv not found";
			}
			else
			{
				// Handle any-style new lines
				$data = preg_split('/\r\n|\r|\n/', $data);

				$first_row = true;
				$names_of_invited_column = NULL;
				$number_invited_column = NULL;
				$code_column = NULL;
				$invitations = array();
				$new_data = array();

				for ($i=0; $i<sizeof($data); $i++)
				{
					$row = str_getcsv($data[$i]);
					if ($i == 0)
					{
						// Find out where in the CSV the important columns are
						for ($j=0; $j<sizeof($row); $j++)
						{
							if ($row[$j] == "Guest Names")
							{
								$names_of_invited_column = $j;
							}
							if ($row[$j] == "Total")
							{
								$number_invited_column = $j;
							}
							if ($row[$j] == "Code")
							{
								$code_column = $j;
							}
						}
					}
					else if (!empty($row[$names_of_invited_column]) && !empty($row[$number_invited_column]) && ctype_digit($row[$number_invited_column]) && empty($row[$code_column]))
					{
						// If we have an entry for the columns we care about, we will give that invite a code and save it
						$code = strtoupper(random_string(5));
						$row[$code_column] = $code;
						$invitations[] = array(
							'code' => $code,
							'names_of_invited' => $row[$names_of_invited_column],
							'number_invited' => $row[$number_invited_column]
						);
					}

					// Escape data and add back with code for saving to a new CSV
					$new_row = array();
					foreach ($row as $value)
					{
						$new_row[] = '"'.$value.'"';
					}
					$new_data[] = implode(',',$new_row);
				}

				// Save CSV updated with codes and update database if this hasn't been done before
				if ($this->db->table_exists('invitations'))
				{
					echo 'Invitations database already created.';
				}
				else
				{
					if (!write_file($csv_output_file, implode("\n",$new_data)))
					{
						echo 'Unable to save new .csv file';
					}
					else
					{
						// On success, populate database with invitations
						$this->db->query("
							CREATE TABLE IF NOT EXISTS `invitations` (
							  `code` varchar(5) NOT NULL,
							  `names_of_invited` varchar(500) NOT NULL,
							  `names_of_attending` varchar(500) NOT NULL,
							  `number_invited` int(1) unsigned NOT NULL,
							  `number_attending` int(1) unsigned NOT NULL,
							  PRIMARY KEY (`code`)
							) ENGINE=InnoDB DEFAULT CHARSET=utf8;"
						);
						foreach ($invitations as $invitation)
						{
							$this->db->query("INSERT into invitations (code, names_of_invited, number_invited) VALUES (".$this->db->escape($invitation['code']).", ".$this->db->escape($invitation['names_of_invited']).", ".$this->db->escape($invitation['number_invited']).")");
						}
						echo 'CSV file written. Database updated.';
					}
				}
			}
		}
	}
}
