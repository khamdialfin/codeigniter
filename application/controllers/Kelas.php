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
		redirect('DataKelas');
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
		redirect('DataSiswa');
	}

	//membuaty function hapus 
	public function hapus($id)
	{
		$where = array('id_kelas' => $id);
		$this->School->hapusKelas($where, 'kelas');
		redirect('DataKelas');
	}

	public function hapus_siswa($id)
	{
		$where = array('id' => $id);
		$this->School->hapus_siswa($where, 'siswa');
		redirect('DataSiswa');
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
