<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function index()
	{
		$page = "wedding";
		if ($this->uri->segment(1))
		{
			$page = $this->uri->segment(1);
		}

		$this->load->view('header');
		$this->load->view($page);
		$this->load->view('footer');
	}
}
