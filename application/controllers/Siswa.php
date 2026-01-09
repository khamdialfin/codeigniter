<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('School');
		$this->load->library('form_validation');
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
		if ($this->input->is_ajax_request() == true) {
			$msg = [
				'sukses' => $this->load->view('siswaModal', $data, true)
			];
			echo json_encode($msg);
		}
	}

	//Menambahkan data siswa
	public function tambahSiswa_aksi()
	{
		// Wajib AJAX
		if (!$this->input->is_ajax_request()) {
			show_404();
		}

		$this->output->set_content_type('application/json');

		// Rules validasi
		$this->form_validation->set_rules('nama', 'Nama Siswa', 'required', ['required' => 'Nama Siswa wajib diisi']);
		$this->form_validation->set_rules('no_telp', 'No Telepon', 'required', ['required' => 'No Telepon wajib diisi']);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required', ['required' => 'Alamat wajib diisi']);
		$this->form_validation->set_rules('id_kelas', 'Kelas', 'required', ['required' => 'Kelas wajib dipilih']);

		if ($this->form_validation->run() == TRUE) {

			$data = [
				'nama'     => $this->input->post('nama', true),
				'no_telp'  => $this->input->post('no_telp', true),
				'alamat'   => $this->input->post('alamat', true),
				'id_kelas' => $this->input->post('id_kelas', true),
			];

			$this->School->tambahSiswa($data, 'siswa');
			$msg = [
				'sukses' => 'Data siswa berhasil ditambahkan'
			];
		} else {

			$msg = [
				'error' => '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>'
					. validation_errors() .
					'</div>'
			];
		}

		echo json_encode($msg);
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
