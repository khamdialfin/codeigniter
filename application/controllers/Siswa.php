<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('School');
	}
	//Menampilkan data siswa 
	public function index()
	{

		$data['siswa'] = $this->School->getNamaSiswa();

		$data['title'] = 'Data Siswa';

		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('dataSiswa', $data);
		$this->load->view('layout/footer');
	}

	//redirect ke form tambah siswa dan load data kelas untuk combobox
	public function tambah_siswa()
	{
		$data['kelas'] = $this->School->getNamaKelas();
		if($this->input->is_ajax_request() == true) {
			$msg = [
				'sukses' => $this->load->view('form-modalSiswa', '', true)
			];
			echo json_encode($msg);
		}
	}

	//Menambahkan data siswa
	public function tambahSiswa_aksi()
	{
		$data = array(
			'nama' => $this->input->post('nama'),
			'no_telp' => $this->input->post('no_telp'),
			'alamat' => $this->input->post('alamat'),
			'id_kelas' => $this->input->post('id_kelas'),
		);
		$this->School->tambahSiswa($data, 'siswa');
		redirect('DataSiswa');
	}

	public function hapus_siswa($id)
	{
		$where = array('id' => $id);
		$this->School->hapus_siswa($where, 'siswa');
		redirect('DataSiswa');
	}

	public function edit_siswa($id)
	{
		$where = array('id' => $id);
		$data['kelas'] = $this->School->getNamaKelas();
		$data['siswa'] = $this->School->edit_datasiswa($where, 'siswa')->result();
		$this->load->view('editSiswa', $data);
	}

	public function update_siswa()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$no_telp = $this->input->post('no_telp');
		$alamat = $this->input->post('alamat');
		$id_kelas = $this->input->post('id_kelas');

		$data = array(
			'nama' => $nama,
			'no_telp' => $no_telp,
			'alamat' => $alamat,
			'id_kelas' => $id_kelas
		);

		$where = array(
			'id' => $id
		);

		$this->School->update_dataSiswa($where, $data, 'siswa');
		redirect('DataSiswa');
	}
}

/* End of file Controllername.php */