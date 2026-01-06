<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('School');
	}

	//menampikan data kelas
	public function index()
	{
		$result = $this->School->getNamaKelas();
		$data = array(
			'kelas' => $result
		);

		$data['title'] = 'Data Kelas';

		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('dataKelas', $data);
		$this->load->view('layout/footer');
	}

	//hanya redirect ke form tambah kelas
	public function tambah()
	{
		$this->load->view('formKelas');
	}

	//Menambahkan data kelas
	public function tambahKelas()
	{
		$data = array(
			'kelas' => $this->input->post('kelas'),
			'jurusan' => $this->input->post('jurusan'),
		);
		$this->School->tambahKelas($data, 'kelas');
		redirect('DataKelas');
	}

	//membuaty function hapus 
	public function hapus($id)
	{
		$where = array('id_kelas' => $id);
		$this->School->hapusKelas($where, 'kelas');
		redirect('DataKelas');
	}

	public function edit_kelas($id)
	{
		$where = array('id_kelas' => $id);
		$data['kelas'] = $this->School->edit_dataKelas($where, 'kelas')->result();
		$this->load->view('editKelas', $data);
	}

	public function update_kelas()
	{
		$id = $this->input->post('id_kelas');
		$kelas = $this->input->post('kelas');
		$jurusan = $this->input->post('jurusan');

		$data = array(
			'kelas' => $kelas,
			'jurusan' => $jurusan,
		);

		$where = array(
			'id_kelas' => $id
		);

		$this->School->update_dataKelas($where, $data, 'kelas');
		redirect('DataKelas');
	}
}

/* End of file Controllername.php */
