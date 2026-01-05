<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Layout extends CI_Controller
{

	public function index()
	{
		$this->load->view('Admin/header');
		$this->load->view('Admin/navbar');
		$this->load->view('Admin/main');
		$this->load->view('Admin/sidebar');
		$this->load->view('Admin/footer');
	}
}

/* End of file Controllername.php */
