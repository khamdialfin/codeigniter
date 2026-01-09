<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('School');
		$this->load->library('form_validation');
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
		if ($this->input->is_ajax_request() == true) {
			$this->output->set_content_type('application/json');
			$msg = [
				'sukses' => $this->load->view('kelasModal', [], true)
			];
			echo json_encode($msg);
		}
	}

	//Menambahkan data kelas
	public function tambahKelas()
	{
		// Wajib AJAX
		if (!$this->input->is_ajax_request()) {
			show_404();
		}

		$this->output->set_content_type('application/json');

		// Rules validasi
		$this->form_validation->set_rules('id_kelas', 'ID', 'required', ['required' => 'ID kelas wajib diisi']);
		$this->form_validation->set_rules(
			'kelas',
			'Kelas',
			'required',
			['required' => 'Kelas wajib diisi']
		);
		$this->form_validation->set_rules('jurusan', 'Jurusan',  'required', ['required' => 'Jurusan wajib diisi']);

		if ($this->form_validation->run() == TRUE) {

			$data = [
				'id_kelas' => $this->input->post('id_kelas', true),
				'kelas' => $this->input->post('kelas', true),
				'jurusan' => $this->input->post('jurusan', true),
			];

			$this->School->tambahKelasAksi($data, 'kelas');
			$msg = [
				'sukses' => 'data berhasil ditambahkan'
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
