<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Layout extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('School');
	}

	public function index()
	{

		$result = $this->School->getNamaKelas();
		$data = array(
			'kelas' => $result
		);

		$data['title'] = 'Data Kelas';

		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('DataKelas', $data);
		$this->load->view('layout/footer');
	}

	public function dashboard()
	{
		$data['title'] = 'Dashboard';

		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('admin/dashboard');
		$this->load->view('layout/footer');
	}
}

/* End of file Controllername.php */
