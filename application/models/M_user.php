<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	public function getPelatihan()
	{
		$data = $this->db->get('pelatihan');
		return $data->result();
	}

	public function addSiswaPelatihan($data,$tabel)
	{
		$this->db->set($data);
		$this->db->insert($tabel);
		return true;
	}

	public function getDataCetakPel($nama)
	{
		$query = $this->db->where('nama_siswa', $nama)
						  ->get('siswa_pelatihan');

		return $query->result();
	}

	public function getKursus()
	{
		$data = $this->db->get('kursus');
		return $data->result();
	}

	public function addSiswaKursus($data,$tabel)
	{
		$this->db->set($data);
		$this->db->insert($tabel);
		return true;
	}

	public function getDataCetak($nama)
	{
		$query = $this->db->where('nama', $nama)
						  ->get('siswa_kursus');

		return $query->result();
	}

	public function getGaleriIndex()
	{
		$data = $this->db->order_by('id_galeri','DESC')->limit(6)->get('galeri');
		return $data->result();
	}

	public function getGaleri($limit, $start)
	{
		$query = $this->db->order_by('id_galeri','DESC')->get('galeri', $limit, $start);
        return $query;
	}

	public function getBeritaIndex()
	{
		$data = $this->db->order_by('id_berita','DESC')->limit(4)->get('berita');
		return $data->result();
	}

	public function getBerita($limit, $start)
	{
		$query = $this->db->order_by('id_berita','DESC')->get('berita', $limit, $start);
        return $query;
	}

	public function getEditBerita($id)
	{
		$query = $this->db->where('id_berita', $id)
						  ->get('berita');

		return $query->result();
	}

	public function dataBerita($id)
	{
		$query = $this->db->where('id_user', $id)
						  ->get('admin');

		return $query->result();
	}

}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */