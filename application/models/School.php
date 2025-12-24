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

	//Fungsi untuk mengambil data siswa dan join dengan data kelas dari database
	public function getNamaSiswa()
	{
		$this->db->select('siswa.*, kelas.kelas, kelas.jurusan');
		$this->db->from('siswa');
		$this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas', 'INNER');
		$this->db->order_by('id', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	//Fungsi untuk menambah data siswa
	public function tambahSiswa($data, $siswa)
	{
		$this->db->insert($siswa, $data);
	}

	//fungsi untuk hapus data kelas
	public function hapusKelas($where, $kelas)
	{
		$this->db->where($where);
		$this->db->delete($kelas);
	}

	public function hapus_siswa($where, $siswa)
	{
		$this->db->where($where);
		$this->db->delete($siswa);
	}

	public function edit_dataKelas($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function update_dataKelas($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function edit_dataSiswa($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function update_dataSiswa($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
}

/* End of file ModelName.php */
