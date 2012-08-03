<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rsvp extends CI_Controller {

	function Rsvp()
	{
		parent::__construct();

		$this->load->library('form_validation');
	}

	function index()
	{
		$this->form_validation->set_rules('code', 'RSVP Code', 'xss_clean|required|exact_length[5]|alpha_numeric');
		if ($this->form_validation->run())
		{
			// User has submitted a correct code, start a session
			$this->session->set_userdata(array('code' => set_value('code')));
		}
		else
		{
			// Please enter your code again
		}
	}

	function respond()
	{
		$this->form_validation->set_rules('names_of_attending', 'Names of attending', 'xss_clean|required|min_length[2]|max_length[500]|alpha');
		$this->form_validation->set_rules('number_attending', 'Number attending', 'xss_clean|required|exact_length[1]|integer');
		if ($this->form_validation->run())
		{
			if (!$this->CI->session->userdata('code'))
			{
				// Please enter your code again
			}
			else
			{
				// Update values
			}
		}
		else
		{
			// Show RSVP page
		}
	}
}
