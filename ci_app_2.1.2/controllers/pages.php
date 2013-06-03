<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function index()
	{
		$data = array();
		
		// Set page to view
		$page = "wedding";
		if ($this->uri->segment(1))
		{
			$page = $this->uri->segment(1);
		}
		
		// Add splash if it's a first visit to a page other than the photos page
		if ($page == "photos" || ($this->session->flashdata('splashed') && $this->session->flashdata('splashed') > time()-600))
		{
			$this->session->set_flashdata('splashed', time());
		}
		else
		{
			$data['splash'] = $this->load->view('splash', NULL, TRUE);
			$this->session->set_flashdata('splashed', time());
		}

		if ($page == "wedding")
		{
			if (!$this->session->userdata('code'))
			{
				$this->db->query("
					CREATE TABLE IF NOT EXISTS `failed_codes` (
						`ip` varchar(45) NOT NULL,
						`count` int(8) unsigned NOT NULL,
						`last_attempt` datetime NOT NULL,
						PRIMARY KEY (`ip`)
					) ENGINE=InnoDB DEFAULT CHARSET=utf8;"
				);

				$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
				$this->form_validation->set_rules('code', 'RSVP code', 'xss_clean|required|callback_ban_check|exact_length[5]|alpha_numeric|callback_code_check');
				if ($this->form_validation->run())
				{
					// User has submitted a correct code, start a session
					$this->session->set_userdata(array('code' => set_value('code')));

					if ($this->uri->segment(2) == "ajax")
					{
						// Get invitation information
						$query = $this->db->query("SELECT * FROM invitations WHERE code = ".$this->db->escape($this->session->userdata('code')));
						$invitation = $query->row_array();
						$invitation['names_of_invited'] = explode(',', $invitation['names_of_invited']);

						$data['rsvp'] = $this->load->view('rsvp_code_given', array('invitation' => $invitation), TRUE);
					}
					else
					{
						redirect(base_url().'#rsvp');
					}
				}
				else
				{
					$data['rsvp'] = $this->load->view('rsvp_code_desired', NULL, TRUE);
				}
			}
			else
			{
				// Get invitation information
				$query = $this->db->query("SELECT * FROM invitations WHERE code = ".$this->db->escape($this->session->userdata('code')));
				$invitation = $query->row_array();
				$invitation['names_of_invited'] = explode(',', $invitation['names_of_invited']);

				$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
				$this->form_validation->set_rules('number_attending', 'number attending', 'xss_clean|required|exact_length[1]|integer');

				for ($i=0; $i<10; $i++)
				{
					$this->form_validation->set_rules('name_'.$i, 'guest name', 'xss_clean|min_length[2]|max_length[49]|alpha|callback_names_check['.$i.']');
				}

				if ($this->form_validation->run())
				{
					$names_of_attending = "";
					if ($invitation['number_invited'] == 1)
					{
						$names_of_attending = $invitation['names_of_invited'][0];
					}
					else
					{
						for ($i=0; $i<set_value('number_attending'); $i++)
						{
							if ($i != 0)
							{
								$names_of_attending .= ',';
							}
							$names_of_attending .= set_value('name_'.$i);
						}
					}

					$this->db->query("UPDATE invitations SET names_of_attending = ".$this->db->escape($names_of_attending).", number_attending = ".$this->db->escape(set_value('number_attending')).", responded = NOW() WHERE code = ".$this->db->escape($this->session->userdata('code')));
					$this->session->sess_destroy();
					$number_attending = set_value('number_attending');
					if ($number_attending)
					{
						$data['rsvp'] = $this->load->view('rsvp_accepted', NULL, TRUE);
					}
					else
					{
						$data['rsvp'] = $this->load->view('rsvp_declined', NULL, TRUE);
					}
				}
				else
				{
					$data['rsvp'] = $this->load->view('rsvp_code_given', array('invitation' => $invitation), TRUE);
				}
			}
		}
		
		if ($page == "photos")
		{
			$photos = array();
		
			# Create json metadata file & thumbnail cache of photos if none exists
			if (!file_exists("assets/photos/photos.json"))
			{
				$this->load->helper('image_resize');
				$files = scandir('assets/photos/');
				foreach($files as $file)
				{
					$photo = array();
					
					if (is_file('assets/photos/'.$file))
					{
						$photo['file'] = $file;
					
						$size = getimagesize('assets/photos/'.$file, $info);
						$photo['width'] = $size[0];
						$photo['height'] = $size[1];
						
						# File is a JPEG, let's store its metadata and create a thumbnail
						if($size[2] == IMAGETYPE_JPEG)
						{
							if(!is_dir('assets/photos/thumbnails')) 
							{
								mkdir('assets/photos/thumbnails');
							}
							
							image_resize('assets/photos/'.$file, 'assets/photos/thumbnails/'.$file, 130, 130);
						
							if(isset($info['APP13']))
							{
							    $iptc = iptcparse($info['APP13']);
							    if (isset($iptc["2#116"]) && isset($iptc["2#116"][0])) {
									$photo['copyright'] = $iptc["2#116"][0];
							    }
							}
							
							$photos[] = $photo;
						}
					}
				}
				
				function natorder($a,$b) 
				{ 
					return strnatcmp ( $a['file'], $b['file'] ); 
				}
				uasort($photos, 'natorder');
				$photos_json = json_encode($photos);
				file_put_contents('assets/photos/photos.json', $photos_json);
			}
			
			$photos_json = file_get_contents('assets/photos/photos.json');
			$photos = json_decode($photos_json, true);
			$data['photos'] = $photos;
		}

		if ($this->uri->segment(2) == "ajax")
		{
			echo json_encode($data['rsvp']);
		}
		else
		{
			$this->load->view('page', array('content' => $this->load->view($page, $data, TRUE)));
		}
	}

	public function ban_check($str)
	{
		$query = $this->db->query("SELECT last_attempt FROM failed_codes WHERE ip = ".$this->db->escape($_SERVER['REMOTE_ADDR'])." AND count >= '5' AND last_attempt > DATE_SUB(NOW(), INTERVAL 1 hour)");
		if ($query->num_rows())
		{
			$row = $query->row_array();
			$minutes_remaining = 60-floor((time()-strtotime($row['last_attempt'])) / 60);
			if ($minutes_remaining == 1)
			{
				$this->form_validation->set_message('ban_check', 'You have entered an invalid code too many times, please try again in 1 minute.');
			}
			else
			{
				$this->form_validation->set_message('ban_check', 'You have entered an invalid code too many times, please try again in '.$minutes_remaining.' minutes.');
			}
			return FALSE;
		}
		else
		{
			$this->db->query("UPDATE failed_codes SET count = '0' WHERE ip = ".$this->db->escape($_SERVER['REMOTE_ADDR'])." AND last_attempt < DATE_SUB(NOW(), INTERVAL 1 hour)");
			return TRUE;
		}
	}

	public function code_check($str)
	{
		$query = $this->db->query("SELECT * FROM invitations WHERE code = ".$this->db->escape($str));
		if (!$query->num_rows())
		{
			$this->db->query("INSERT into failed_codes (ip, count, last_attempt) VALUES (".$this->db->escape($_SERVER['REMOTE_ADDR']).", '1', NOW()) ON DUPLICATE KEY UPDATE count = count+1, last_attempt = NOW();");
			$this->form_validation->set_message('code_check', 'Please enter a valid code.');
			return FALSE;
		}
		else
		{
			$this->db->query("UPDATE failed_codes SET count = '0' WHERE ip = ".$this->db->escape($_SERVER['REMOTE_ADDR']));
			return TRUE;
		}
	}

	public function names_check($str, $name_number)
	{
		$number_attending = set_value('number_attending');
		$name = set_value('name_'.$name_number);
		if ($name_number < $number_attending && empty($name))
		{
			$this->form_validation->set_message('names_check', 'Please enter the name of the guest.');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
}
