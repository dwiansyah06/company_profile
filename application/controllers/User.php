<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_user');
		$this->load->library('templateuser');
		$this->load->library('pagination');
	}

	public function index()
	{
		$data['judul'] = "Company Profile";
		$data['pelatihan'] = $this->M_user->getPelatihan();
		$data['kursus'] = $this->M_user->getKursus();
		$data['galeri'] = $this->M_user->getGaleriIndex();
		$data['berita'] = $this->M_user->getBeritaIndex();
		foreach ($data['berita'] as $value) {
			$data_berita = $this->M_user->dataBerita($value->id_admin);
			$data['a'][] = $data_berita;
		}
		$this->load->view('user/index',$data);
	}

	public function profile()
	{
		$data['judul'] = "Company Profile | Profile";
		$this->templateuser->displayuser('user/profile',$data);
	}

	public function pelatihan()
	{
		$data['judul'] = "Company Profile | Form Pelatihan";
		$data['pelatihan'] = $this->M_user->getPelatihan();
		$this->templateuser->displayuser('user/registrasi_pelatihan',$data);
	}

	public function daftarpelatihan()
	{
		if ($this->input->post('daftar')) {
			$config['upload_path'] 	   = "./asset/admin/images/siswa_pelatihan/";
			$config['allowed_types']   = 'jpg|png';
			$config['max_width']       = 300;
			$config['min_width']	   = 299;
			$config['max_height']      = 400;
			$config['min_height']	   = 399;
		 
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('berkas')) {
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('error', $error);
				redirect('user/pelatihan/');
			} else {
				$gambar = array('upload_data' => $this->upload->data());
				if ($this->input->post('prshn') == null) {
					$nm_prshn = 'Tidak ada';
				}else{$nm_prshn = $this->input->post('prshn');}

				if ($this->input->post('alamat_p') == null) {
					$alamat_prshn = 'Tidak ada';
				}else{$alamat_prshn = $this->input->post('alamat_p');}

				if ($this->input->post('telp_p') == null) {
					$telp_prshn = 'Tidak ada';
				}else{$telp_prshn = $this->input->post('telp_p');}

				if ($this->input->post('email_p') == null) {
					$email_prshn = 'Tidak ada';
				}else{$email_prshn = $this->input->post('email_p');}

				if ($this->input->post('alergi') == null) {
					$alergi = 'Tidak ada';
				}else{$alergi = $this->input->post('alergi');}

				if ($this->input->post('nm_sma') == null) {
					$nm_sma = 'Tidak Pernah SMA';
				}else{$nm_sma = $this->input->post('nm_sma');}

				if ($this->input->post('nm_univ_d3') == null) {
					$nm_d3 = 'Tidak Pernah Kuliah D3';
				}else{$nm_d3 = $this->input->post('nm_univ_d3');}

				if ($this->input->post('nm_univ_s1') == null) {
					$nm_s1 = 'Tidak Pernah Kuliah S1';
				}else{$nm_s1 = $this->input->post('nm_univ_s1');}

				if ($this->input->post('nm_univ_s2') == null) {
					$nm_s2 = 'Tidak Pernah Kuliah S2';
				}else{$nm_s2 = $this->input->post('nm_univ_s2');}

				if ($this->input->post('tahun_masuk') == null) {
					$thn_masuk = 'Tidak Ada';
				}else{$thn_masuk = $this->input->post('tahun_masuk');}

				if ($this->input->post('tahun_selesai') == null) {
					$thn_selesai = 'Tidak Ada';
				}else{$thn_selesai = $this->input->post('tahun_selesai');}

				if ($this->input->post('durasi') == null) {
					$durasi = 'Tidak Ada';
				}else{$durasi = $this->input->post('durasi');}

				if ($this->input->post('jabatan') == null) {
					$jbtn = 'Tidak Ada';
				}else{$jbtn = $this->input->post('jabatan');}

				if ($this->input->post('unit') == null) {
					$unit = 'Tidak Ada';
				}else{$unit = $this->input->post('unit');}

				$tgl_lahir = date('Y-m-d', strtotime($this->input->post('tgl')));
				$data = array(
					'nama_siswa'			=> $this->input->post('nama'),
					'nama_perusahaan'		=> $nm_prshn,
					'alamat_perusahaan'		=> $alamat_prshn,
					'telp_perusahaan'		=> $telp_prshn,
					'email_perusahaan'		=> $email_prshn,
					'alamat_pribadi'		=> $this->input->post('alamat_pri'),
					'email_pribadi'			=> $this->input->post('email_pri'),
					'telp_pribadi'			=> $this->input->post('telp_pri'),
					'tempat_lahir'			=> $this->input->post('tmpt_lahir'),
					'tanggal_lahir'			=> $tgl_lahir,
					'agama'					=> $this->input->post('agama'),
					'alergi'				=> $alergi,
					'jenis_pelatihan'		=> $this->input->post('pelatihan'),
					'nama_sma'				=> $nm_sma,
					'nama_d3'				=> $nm_d3,
					'nama_s1'				=> $nm_s1,
					'nama_s2'				=> $nm_s2,
					'tahun_masuk'			=> $thn_masuk,
					'tahun_keluar'			=> $thn_selesai,
					'lama_kerja'			=> $durasi,
					'jabatan'				=> $jbtn,
					'divisi'				=> $unit,
					'tgl_daftar'			=> date('Y-m-d'),
					'foto'					=> $gambar['upload_data']['file_name']
				);

				$kirim = $this->M_user->addSiswaPelatihan($data,'siswa_pelatihan');
				if ($kirim) {
					$fill['data_siswa_pel'] = $this->M_user->getDataCetakPel($this->input->post('nama'));
					$this->load->view('user/cetak2',$fill);
				}
			}
		} else {
			redirect('user/pelatihan/');
		}
	}

	public function kursus()
	{
		$data['judul'] = "Company Profile | Form Kursus";
		$data['kursus'] = $this->M_user->getKursus();
		$this->templateuser->displayuser('user/registrasi_kursus',$data);
	}

	public function daftarkursus()
	{
		if ($this->input->post('daftar')) {
			$config['upload_path'] 	   = "./asset/admin/images/siswa_kursus/";
			$config['allowed_types']   = 'jpg|png';
			$config['max_width']       = 300;
			$config['min_width']	   = 299;
			$config['max_height']      = 400;
			$config['min_height']	   = 399;

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('foto')) {
				$gambar = array('upload_data' => $this->upload->data());
				$data = array(
					'nama'			=> $this->input->post('nama'),
					'tempat_lahir'	=> $this->input->post('tempat_lahir'),
					'tanggal_lahir'	=> date('Y-m-d',strtotime($this->input->post('tanggal_lahir'))),
					'jenis_kelamin'	=> $this->input->post('jk'),
					'alamat'		=> $this->input->post('alamat'),
					'nmr_hp'		=> $this->input->post('no_hp'),
					'email'			=> $this->input->post('email'),
					'jenis_kursus'	=> $this->input->post('jenis_kursus'),
					'tanggal_daftar' => date('Y-m-d'),
					'foto'			=> $gambar['upload_data']['file_name']
				);

				$kirim = $this->M_user->addSiswaKursus($data,'siswa_kursus');
				if ($kirim) {
					$fill['data_siswa_kursus'] = $this->M_user->getDataCetak($this->input->post('nama'));
					$this->load->view('user/cetak',$fill);
				}
			} else {
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('error', $error);
				redirect('user/kursus/');
			}
		} else {
			redirect('user/kursus/');
		}
	}

	public function galeri()
	{
		//konfigurasi pagination
        $config['base_url'] = site_url('user/galeri/');
        $config['total_rows'] = $this->db->count_all('galeri');
        $config['per_page'] = 6;
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
      	$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; 
        $data['galeri'] = $this->M_user->getGaleri($config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();
        $data['judul'] = "Company Profile | Galeri";
        $this->templateuser->displayuser('user/galeri',$data);
	}

	public function berita()
	{
		//konfigurasi pagination
        $config['base_url'] = site_url('user/berita/');
        $config['total_rows'] = $this->db->count_all('berita');
        $config['per_page'] = 6;
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
      	$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; 
        $data['berita'] = $this->M_user->getBerita($config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();
		$data['judul'] = "Company Profile | Berita";
		foreach ($data['berita']->result() as $value) {
			$data_berita = $this->M_user->dataBerita($value->id_admin);
			$data['a'][] = $data_berita;
		}
		$this->templateuser->displayuser('user/berita',$data);
	}

	public function detailBerita($id)
	{
		$data['judul'] = "Company Profile | Detail Berita";
		$data['berita_terbaru'] = $this->M_user->getBeritaIndex();
		$data['berita'] = $this->M_user->getEditBerita($id);
		foreach ($data['berita'] as $value) {
			$data_berita = $this->M_user->dataBerita($value->id_admin);
			$data['a'][] = $data_berita;
		}
		$this->templateuser->displayuser('user/detailBerita',$data);
	}

	public function cetak()
	{
		$this->load->view('user/cetak2');
	}

}
