<?php
defined('BASEPATH') or exit('No direct script access allowed');

class School extends CI_Model
{

	//Fungsi untuk mengambil data kelas dari database
	public function getNamaKelas()
	{

		$this->db->select('id_kelas,kelas,jurusan');
		$this->db->from('kelas');
		$this->db->order_by('id_kelas', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	//Fungsi untuk menambah data kelas
	public function tambahKelas($data, $kelas)
	{
		$this->db->insert($kelas, $data);
	}

	public function getNamaSiswa()
	{
		$this->db->select('siswa.*, kelas.kelas, kelas.jurusan');
		$this->db->from('siswa');
		$this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas', 'INNER');
		$this->db->order_by('id', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	public function tambahSiswa($data, $siswa)
	{
		$this->db->insert($siswa, $data);
	}
}

/* End of file ModelName.php */
