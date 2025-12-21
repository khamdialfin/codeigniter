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
		$this->load->view('dataKelas', $data);
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
		redirect('kelas/index');
	}

	//Menampilkan data siswa 
	public function tampil_siswa()
	{
		$data['siswa'] = $this->School->getNamaSiswa();
		$this->load->view('dataSiswa', $data);
	}

	//redirect ke form tambah siswa dan load data kelas untuk combobox
	public function tambah_siswa()
	{
		$data['kelas'] = $this->School->getNamaKelas();
		$this->load->view('formSiswa', $data);
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
		redirect('Kelas/tampil_siswa');
	}

	//membuaty function hapus 
	public function hapus($id)
	{
		$where = array('id_kelas' => $id);
		$this->School->hapusKelas($where, 'kelas');
		redirect('Kelas/index');
	}

	public function hapus_siswa($id)
	{
		$where = array('id' => $id);
		$this->School->hapus_siswa($where, 'siswa');
		redirect('Kelas/tampil_siswa');
	}
}

/* End of file Controllername.php */
