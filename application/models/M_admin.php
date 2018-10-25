<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

	public function get_data()
	{
		$id_user = $this->session->userdata('id_user');
		$query = $this->db->where('id_user', $id_user)
						  ->get('admin');

		return $query->result();
	}

	public function totalPelatihan()
	{
		return $this->db->get('pelatihan')->num_rows();
	}

	public function totalKursus()
	{
		return $this->db->get('kursus')->num_rows();
	}

	public function totalSiswaPel()
	{
		return $this->db->get('siswa_pelatihan')->num_rows();
	}

	public function totalSiswaKur()
	{
		return $this->db->get('siswa_kursus')->num_rows();
	}

	public function addPelatihan($data,$tabel)
	{
		$this->db->set($data);
		$this->db->insert($tabel);
	}

	public function getPelatihan()
	{
		$data = $this->db->get('pelatihan');
		return $data->result();
	}

	public function updatePel($where, $data, $tabel)
	{
		$this->db->where($where);
		$this->db->update($tabel,$data);
	}

	public function delPel($id)
	{
		$row = $this->db->where('id_pelatihan',$id)->get('pelatihan')->row();
		unlink("./asset/admin/images/pelatihan/$row->icon");

		$this->db->where('id_pelatihan', $id)
				 ->delete('pelatihan');
	}

	public function addSiswaPelatihan($data,$tabel)
	{
		$this->db->set($data);
		$this->db->insert($tabel);
	}

	public function getSiswaPelatihan()
	{
		$data = $this->db->get('siswa_pelatihan');
		return $data->result();
	}

	public function getDataEditSis($id)
	{
		$query = $this->db->where('id_siswa_pelatihan', $id)
						  ->get('siswa_pelatihan');

		return $query->result();
	}

	public function updateSisPel($where, $data, $tabel)
	{
		$this->db->where($where);
		$this->db->update($tabel,$data);
	}

	public function delSisPel($id)
	{
		$row = $this->db->where('id_siswa_pelatihan',$id)->get('siswa_pelatihan')->row();
		unlink("./asset/admin/images/siswa_pelatihan/$row->foto");

		$this->db->where('id_siswa_pelatihan', $id)
				 ->delete('siswa_pelatihan');
	}

	public function addKursus($data,$tabel)
	{
		$this->db->set($data);
		$this->db->insert($tabel);
	}

	public function getKursus()
	{
		$data = $this->db->get('kursus');
		return $data->result();
	}

	public function updateKursus($where, $data, $tabel)
	{
		$this->db->where($where);
		$this->db->update($tabel,$data);
	}

	public function delKursus($id)
	{
		$row = $this->db->where('id_kursus',$id)->get('kursus')->row();
		unlink("./asset/admin/images/kursus/$row->icon");

		$this->db->where('id_kursus', $id)
				 ->delete('kursus');
	}

	public function addSiswaKursus($data,$tabel)
	{
		$this->db->set($data);
		$this->db->insert($tabel);
	}

	public function getSiswaKursus()
	{
		$data = $this->db->get('siswa_kursus');
		return $data->result();
	}

	public function delSisKur($id)
	{
		$row = $this->db->where('id_siswa_kursus',$id)->get('siswa_kursus')->row();
		unlink("./asset/admin/images/siswa_kursus/$row->foto");

		$this->db->where('id_siswa_kursus', $id)
				 ->delete('siswa_kursus');
	}

	public function updSiswaKursus($where, $data, $tabel)
	{
		$this->db->where($where);
		$this->db->update($tabel,$data);
	}

	public function addGaleri($data,$tabel)
	{
		$this->db->set($data);
		$this->db->insert($tabel);
	}

	public function getGaleri($limit, $start)
	{
		$query = $this->db->order_by('id_galeri','DESC')->get('galeri', $limit, $start);
        return $query;
	}

	public function dataGaleri($id)
	{
		$query = $this->db->where('id_user', $id)
						  ->get('admin');

		return $query->result();
	}

	public function delGaleri($id)
	{
		$row = $this->db->where('id_galeri',$id)->get('galeri')->row();
		unlink("./asset/admin/images/galeri/$row->foto");

		$this->db->where('id_galeri', $id)
				 ->delete('galeri');
	}

	public function addBerita($data,$tabel)
	{
		$this->db->set($data);
		$this->db->insert($tabel);
	}

	public function getBerita()
	{
		$data = $this->db->order_by('id_berita','DESC')->get('berita');
		return $data->result();
	}

	public function dataBerita($id)
	{
		$query = $this->db->where('id_user', $id)
						  ->get('admin');

		return $query->result();
	}

	public function getEditBerita($id)
	{
		$query = $this->db->where('id_berita', $id)
						  ->get('berita');

		return $query->result();
	}

	public function updateBrta($where, $data, $tabel)
	{
		$this->db->where($where);
		$this->db->update($tabel,$data);
	}

	public function delBerita($id)
	{
		$row = $this->db->where('id_berita',$id)->get('berita')->row();
		unlink("./asset/admin/images/berita/$row->gambar");

		$this->db->where('id_berita', $id)
				 ->delete('berita');
	}

	function get_testi($siswa, $column){
        $this->db->select($column);
	    $this->db->from('siswa_pelatihan');
	    $this->db->like('nama_siswa', $siswa);
	    return $this->db->get()->result_array();
    }

}

/* End of file M_admin.php */
/* Location: ./application/models/M_admin.php */