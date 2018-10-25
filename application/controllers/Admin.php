<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id_user')) {
			redirect('login');
		}
		$this->load->model('M_admin');
		$this->load->library('templateadmin');
	}

	public function index()
	{
		$data['judul'] = 'Company Profile | Admin';
		$data['total_pelatihan'] = $this->M_admin->totalPelatihan();
		$data['total_kursus'] = $this->M_admin->totalKursus();
		$data['total_siswaPel'] = $this->M_admin->totalSiswaPel();
		$data['total_siswaKur'] = $this->M_admin->totalSiswaKur();
		$this->templateadmin->displayadmin('admin/dashboard',$data);
	}

	public function listPelatihan()
	{
		$data['judul'] = 'Company Profile | List Pelatihan';
		$data['pelatihan'] = $this->M_admin->getPelatihan();
		$this->templateadmin->displayadmin('admin/list_pelatihan',$data);
	}

	public function addPelatihan()
	{
		if ($this->input->post('add_pelatihan')) {
			$config['upload_path'] 	   = "./asset/admin/images/pelatihan/";
			$config['allowed_types']   = 'jpg|png';
			$config['max_width']       = 256;
			$config['min_width']	   = 255;
			$config['max_height']      = 256;
			$config['min_height']	   = 255;

			$this->load->library('upload',$config);

			if ($this->upload->do_upload('icon')){
				$gambar = array('upload_data' => $this->upload->data());
				$data = array(
					'judul_pelatihan'	=> $this->input->post('judul_pelatihan'),
					'min_peserta'		=> $this->input->post('min_peserta'),
					'hari_latihan'		=> $this->input->post('hari_latihan'),
					'harga_in_house'	=> $this->input->post('hrg_in_house'),
					'harga_off_house'	=> $this->input->post('hrg_of_house'),
					'icon'				=> $gambar['upload_data']['file_name']
				);
				$this->M_admin->addPelatihan($data,'pelatihan');
				$this->session->set_flashdata('success', 'Pelatihan Berhasil ditambah');
				redirect('admin/listPelatihan/');

			} else {
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('error', $error);
				redirect('admin/listPelatihan/');
			}

		} else {
			redirect('admin/listPelatihan/');
		}
	}

	public function updPelatihan()
	{
		if ($this->input->post('upd_pelatihan')) {
			if (empty($_FILES['icon']['name'])) {
				$data = array(
					'judul_pelatihan'	=> $this->input->post('judul_pelatihan'),
					'min_peserta'		=> $this->input->post('min_peserta'),
					'hari_latihan'		=> $this->input->post('hari_latihan'),
					'harga_in_house'	=> $this->input->post('hrg_in_house'),
					'harga_off_house'	=> $this->input->post('hrg_of_house'),
					'icon'				=> $this->input->post('icon_lama')
				);
				$where = array(
					'id_pelatihan' => $this->input->post('id_pelatihan')
				);

				$this->M_admin->updatePel($where, $data, 'pelatihan');
				$this->session->set_flashdata('success', 'Pelatihan Berhasil Diperbarui');
				redirect('admin/listPelatihan/');
			} else {
				$config['upload_path'] 	   = "./asset/admin/images/pelatihan/";
				$config['allowed_types']   = 'jpg|png';
				$config['max_width']       = 256;
				$config['min_width']	   = 255;
				$config['max_height']      = 256;
				$config['min_height']	   = 255;

				$this->load->library('upload',$config);

				if ($this->upload->do_upload('icon')){
					unlink("./asset/admin/images/pelatihan/".$this->input->post('icon_lama'));
					$gambar = array('upload_data' => $this->upload->data());
					$data = array(
						'judul_pelatihan'	=> $this->input->post('judul_pelatihan'),
						'min_peserta'		=> $this->input->post('min_peserta'),
						'hari_latihan'		=> $this->input->post('hari_latihan'),
						'harga_in_house'	=> $this->input->post('hrg_in_house'),
						'harga_off_house'	=> $this->input->post('hrg_of_house'),
						'icon'				=> $gambar['upload_data']['file_name']
					);
					
					$where = array(
						'id_pelatihan' => $this->input->post('id_pelatihan')
					);

					$this->M_admin->updatePel($where, $data, 'pelatihan');
					$this->session->set_flashdata('success', 'Pelatihan Berhasil Diperbarui');
					redirect('admin/listPelatihan/');

				} else {
					$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('error', $error);
					redirect('admin/listPelatihan/');
				}
			}
		} else {
			redirect('admin/listPelatihan/');
		}
	}

	public function delPel($id)
	{
		$this->M_admin->delPel($id);
		$this->session->set_flashdata('success', 'Pelatihan Berhasil Dihapus');
		redirect('admin/listPelatihan/');
	}

	public function siswaPelatihan()
	{
		$data['judul'] = 'Company Profile | List Siswa Pelatihan';
		$data['pelatihan'] = $this->M_admin->getPelatihan();
		$data['siswa'] = $this->M_admin->getSiswaPelatihan();
		$this->templateadmin->displayadmin('admin/siswa_pelatihan',$data);
	}

	public function addSiswaPelatihan()
	{
		if ($this->input->post('tambah_siswa')) {
			
			$config['upload_path'] 	   = "./asset/admin/images/siswa_pelatihan/";
			$config['allowed_types']   = 'jpg|png';
			$config['max_width']       = 300;
			$config['min_width']	   = 299;
			$config['max_height']      = 400;
			$config['min_height']	   = 399;

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('berkas')) {
				
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

				$this->M_admin->addSiswaPelatihan($data,'siswa_pelatihan');
				$this->session->set_flashdata('success', 'Siswa Pelatihan Berhasil Ditambah');
				redirect('admin/siswaPelatihan');

			} else {
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('error', $error);
				redirect('admin/siswaPelatihan/');
			}

		} else {
			redirect('admin/siswaPelatihan/');
		}
	}

	public function editSiswaPelatihan($id)
	{
		$data['edit_sis_p'] = $this->M_admin->getDataEditSis($id);
		$data['pelatihan'] = $this->M_admin->getPelatihan();
		$data['judul'] = 'Company Profile | Edit Siswa Pelatihan';
		$this->templateadmin->displayadmin('admin/edit-siswa-pelatihan',$data);
	}

	public function updSisPel()
	{
		if ($this->input->post('upd_data')) {
			if ($this->input->post('pelatihan') == null) {
				$pelatihan = $this->input->post('pelatihan_lama');
			} else {
				$pelatihan = $this->input->post('pelatihan');
			}

			if (empty($_FILES['berkas']['name'])) {
				$data = array(
					'nama_siswa'			=> $this->input->post('nama_siswa'),
					'nama_perusahaan'		=> $this->input->post('nama_perusahaan'),
					'alamat_perusahaan'		=> $this->input->post('alamat_perusahaan'),
					'telp_perusahaan'		=> $this->input->post('telp_perusahaan'),
					'email_perusahaan'		=> $this->input->post('email_perusahaan'),
					'alamat_pribadi'		=> $this->input->post('alamat_p'),
					'email_pribadi'			=> $this->input->post('email_p'),
					'telp_pribadi'			=> $this->input->post('telp_p'),
					'tempat_lahir'			=> $this->input->post('tempat_lahir'),
					'tanggal_lahir'			=> date('Y-m-d',strtotime($this->input->post('tanggal_lahir'))),
					'agama'					=> $this->input->post('agama'),
					'alergi'				=> $this->input->post('alergi'),
					'jenis_pelatihan'		=> $pelatihan,
					'nama_sma'				=> $this->input->post('nm_sma'),
					'nama_d3'				=> $this->input->post('nm_univ_d3'),
					'nama_s1'				=> $this->input->post('nm_univ_s1'),
					'nama_s2'				=> $this->input->post('nm_univ_s2'),
					'tahun_masuk'			=> $this->input->post('tahun_masuk'),
					'tahun_keluar'			=> $this->input->post('tahun_selesai'),
					'lama_kerja'			=> $this->input->post('durasi'),
					'jabatan'				=> $this->input->post('jabatan'),
					'divisi'				=> $this->input->post('unit'),
					'tgl_daftar'			=> $this->input->post('tgl_daftar'),
					'foto'					=> $this->input->post('berkas_lama')
				);

				$where = array(
					'id_siswa_pelatihan' => $this->input->post('id_siswa_pelatihan')
				);

				$this->M_admin->updateSisPel($where, $data, 'siswa_pelatihan');
				$this->session->set_flashdata('success', 'Siswa Pelatihan Berhasil Diperbarui');
				redirect('admin/siswaPelatihan/');
			} else {

				$config['upload_path'] 	   = "./asset/admin/images/siswa_pelatihan/";
				$config['allowed_types']   = 'jpg|png';
				$config['max_width']       = 300;
				$config['min_width']	   = 299;
				$config['max_height']      = 400;
				$config['min_height']	   = 399;

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('berkas')) {
					unlink("./asset/admin/images/siswa_pelatihan/".$this->input->post('berkas_lama'));
					$gambar = array('upload_data' => $this->upload->data());
					$data = array(
						'nama_siswa'			=> $this->input->post('nama_siswa'),
						'nama_perusahaan'		=> $this->input->post('nama_perusahaan'),
						'alamat_perusahaan'		=> $this->input->post('alamat_perusahaan'),
						'telp_perusahaan'		=> $this->input->post('telp_perusahaan'),
						'email_perusahaan'		=> $this->input->post('email_perusahaan'),
						'alamat_pribadi'		=> $this->input->post('alamat_p'),
						'email_pribadi'			=> $this->input->post('email_p'),
						'telp_pribadi'			=> $this->input->post('telp_p'),
						'tempat_lahir'			=> $this->input->post('tempat_lahir'),
						'tanggal_lahir'			=> date('Y-m-d',strtotime($this->input->post('tanggal_lahir'))),
						'agama'					=> $this->input->post('agama'),
						'alergi'				=> $this->input->post('alergi'),
						'jenis_pelatihan'		=> $pelatihan,
						'nama_sma'				=> $this->input->post('nm_sma'),
						'nama_d3'				=> $this->input->post('nm_univ_d3'),
						'nama_s1'				=> $this->input->post('nm_univ_s1'),
						'nama_s2'				=> $this->input->post('nm_univ_s2'),
						'tahun_masuk'			=> $this->input->post('tahun_masuk'),
						'tahun_keluar'			=> $this->input->post('tahun_selesai'),
						'lama_kerja'			=> $this->input->post('durasi'),
						'jabatan'				=> $this->input->post('jabatan'),
						'divisi'				=> $this->input->post('unit'),
						'tgl_daftar'			=> $this->input->post('tgl_daftar'),
						'foto'					=> $gambar['upload_data']['file_name']
					);

					$where = array(
						'id_siswa_pelatihan' => $this->input->post('id_siswa_pelatihan')
					);

					$this->M_admin->updateSisPel($where, $data, 'siswa_pelatihan');
					$this->session->set_flashdata('success', 'Siswa Pelatihan Berhasil Diperbarui');
					redirect('admin/siswaPelatihan/');
				} else {
					$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('error', $error);
					redirect('admin/siswaPelatihan/');
				}

			}
		} else {
			redirect('admin/siswaPelatihan/');
		}
	}

	public function delSisPel($id)
	{
		$this->M_admin->delSisPel($id);
		$this->session->set_flashdata('success', 'Siswa Pelatihan Berhasil Dihapus');
		redirect('admin/siswaPelatihan/');
	}

	public function kursus()
	{
		$data['judul'] = 'Company Profile | Kursus';
		$data['kursus'] = $this->M_admin->getKursus();
		$this->templateadmin->displayadmin('admin/kursus',$data);
	}

	public function addKursus()
	{
		if ($this->input->post('tambah_kursus')) {
			$config['upload_path'] 	   = "./asset/admin/images/kursus/";
			$config['allowed_types']   = 'jpg|png';
			$config['max_width']       = 256;
			$config['min_width']	   = 255;
			$config['max_height']      = 256;
			$config['min_height']	   = 255;

			$this->load->library('upload',$config);

			if ($this->upload->do_upload('icon')){
				$gambar = array('upload_data' => $this->upload->data());
				$data = array(
					'judul_kursus'		=> $this->input->post('judul_kursus'),
					'biaya_pendaftaran'	=> $this->input->post('biaya_pend'),
					'biaya_kursus'		=> $this->input->post('biaya_kursus'),
					'pelaksanaan'		=> $this->input->post('pelaksanaan'),
					'icon'				=> $gambar['upload_data']['file_name']
				);

				$this->M_admin->addKursus($data,'kursus');
				$this->session->set_flashdata('success', 'Kursus Berhasil ditambahkan');
				redirect('admin/kursus/');
			} else {
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('error', $error);
				redirect('admin/kursus/');
			}
		} else {
			redirect('admin/kursus/');
		}
	}

	public function updKursus()
	{
		if ($this->input->post('upd_pelatihan')) {
			if (empty($_FILES['icon']['name'])) {
				$data = array(
					'judul_kursus'		=> $this->input->post('judul_kursus'),
					'biaya_pendaftaran'	=> $this->input->post('biaya_pend'),
					'biaya_kursus'		=> $this->input->post('biaya_kursus'),
					'pelaksanaan'		=> $this->input->post('pelaksanaan'),
					'icon'				=> $this->input->post('icon_lama')
				);

				$where = array(
					'id_kursus' => $this->input->post('id_kursus')
				);

				$this->M_admin->updateKursus($where, $data, 'kursus');
				$this->session->set_flashdata('success', 'Kursus Berhasil Diperbarui');
				redirect('admin/kursus/');
			} else {
				$config['upload_path'] 	   = "./asset/admin/images/kursus/";
				$config['allowed_types']   = 'jpg|png';
				$config['max_width']       = 256;
				$config['min_width']	   = 255;
				$config['max_height']      = 256;
				$config['min_height']	   = 255;

				$this->load->library('upload',$config);

				if ($this->upload->do_upload('icon')){
					unlink("./asset/admin/images/kursus/".$this->input->post('icon_lama'));
					$gambar = array('upload_data' => $this->upload->data());
					$data = array(
						'judul_kursus'		=> $this->input->post('judul_kursus'),
						'biaya_pendaftaran'	=> $this->input->post('biaya_pend'),
						'biaya_kursus'		=> $this->input->post('biaya_kursus'),
						'pelaksanaan'		=> $this->input->post('pelaksanaan'),
						'icon'				=> $gambar['upload_data']['file_name']
					);

					$where = array(
						'id_kursus' => $this->input->post('id_kursus')
					);

					$this->M_admin->updateKursus($where, $data, 'kursus');
					$this->session->set_flashdata('success', 'Kursus Berhasil Diperbarui');
					redirect('admin/kursus/');
				} else {
					$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('error', $error);
					redirect('admin/kursus/');
				}
			}
		} else {
			redirect('admin/kursus/');
		}
	}

	public function delKursus($id)
	{
		$this->M_admin->delKursus($id);
		$this->session->set_flashdata('success', 'Kursus Berhasil Dihapus');
		redirect('admin/kursus/');
	}

	public function siswaKursus()
	{
		$data['judul'] = 'Company Profile | Siswa Kursus';
		$data['siswa_kursus'] = $this->M_admin->getSiswaKursus();
		$data['list_kursus'] = $this->M_admin->getKursus();
		$this->templateadmin->displayadmin('admin/siswa_kursus',$data);
	}

	public function addSiswaKursus()
	{
		if ($this->input->post('tambah_sispel')) {
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
					'tempat_lahir'	=> $this->input->post('tmpt_lahir'),
					'tanggal_lahir'	=> date('Y-m-d',strtotime($this->input->post('tgl_lahir'))),
					'jenis_kelamin'	=> $this->input->post('jk'),
					'alamat'		=> $this->input->post('alamat'),
					'nmr_hp'		=> $this->input->post('no_hp'),
					'email'			=> $this->input->post('email'),
					'jenis_kursus'	=> $this->input->post('jenis_kursus'),
					'tanggal_daftar' => date('Y-m-d'),
					'foto'			=> $gambar['upload_data']['file_name']
				);

				$this->M_admin->addSiswaKursus($data,'siswa_kursus');
				$this->session->set_flashdata('success', 'siswa kursus berhasil ditambah');
				redirect('admin/siswaKursus/');
			} else {
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('error', $error);
				redirect('admin/siswaKursus/');
			}
		} else {
			redirect('admin/siswaKursus/');
		}
	}

	public function updSiswaKursus()
	{
		if ($this->input->post('upd_siswa_kursus')) {
			
			if ($this->input->post('jk') == null) {
				$jk = $this->input->post('jk_lama');
			} else {
				$jk = $this->input->post('jk');
			}

			if ($this->input->post('jenis_kursus') == null) {
				$jenis_kursus = $this->input->post('jkur_lama');
			} else {
				$jenis_kursus = $this->input->post('jenis_kursus');
			}

			if (empty($_FILES['foto']['name'])) {
				$data = array(
					'nama'			 => $this->input->post('nama'),
					'tempat_lahir'	 => $this->input->post('tmpt_lahir'),
					'tanggal_lahir'	 => date('Y-m-d',strtotime($this->input->post('tgl_lahir'))),
					'jenis_kelamin'	 => $jk,
					'alamat'		 => $this->input->post('alamat'),
					'nmr_hp'		 => $this->input->post('no_hp'),
					'email'			 => $this->input->post('email'),
					'jenis_kursus'	 => $jenis_kursus,
					'tanggal_daftar' => $this->input->post('tgl_daftar'),
					'foto'			 => $this->input->post('foto_lama')
				);

				$where = array(
					'id_siswa_kursus' => $this->input->post('id_siswa_kursus')
				);

				$this->M_admin->updSiswaKursus($where, $data, 'siswa_kursus');
				$this->session->set_flashdata('success', 'Siswa Kursus Berhasil Diperbarui');
				redirect('admin/siswaKursus/');
			} else {

				$config['upload_path'] 	   = "./asset/admin/images/siswa_kursus/";
				$config['allowed_types']   = 'jpg|png';
				$config['max_width']       = 300;
				$config['min_width']	   = 299;
				$config['max_height']      = 400;
				$config['min_height']	   = 399;

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('foto')) {
					unlink("./asset/admin/images/siswa_kursus/".$this->input->post('foto_lama'));
					$gambar = array('upload_data' => $this->upload->data());
					$data = array(
						'nama'			 => $this->input->post('nama'),
						'tempat_lahir'	 => $this->input->post('tmpt_lahir'),
						'tanggal_lahir'	 => date('Y-m-d',strtotime($this->input->post('tgl_lahir'))),
						'jenis_kelamin'	 => $jk,
						'alamat'		 => $this->input->post('alamat'),
						'nmr_hp'		 => $this->input->post('no_hp'),
						'email'			 => $this->input->post('email'),
						'jenis_kursus'	 => $jenis_kursus,
						'tanggal_daftar' => $this->input->post('tgl_daftar'),
						'foto'			 => $gambar['upload_data']['file_name']
					);

					$where = array(
						'id_siswa_kursus' => $this->input->post('id_siswa_kursus')
					);

					$this->M_admin->updSiswaKursus($where, $data, 'siswa_kursus');
					$this->session->set_flashdata('success', 'Siswa Kursus Berhasil Diperbarui');
					redirect('admin/siswaKursus/');
				} else {
					$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('error', $error);
					redirect('admin/siswaKursus/');
				}

			}
		} else {
			redirect('admin/siswaKursus/');
		}
	}

	public function delSisKur($id)
	{
		$this->M_admin->delSisKur($id);
		$this->session->set_flashdata('success', 'Siswa Kursus Berhasil di hapus');
		redirect('admin/siswaKursus/');
	}

	public function galeri()
	{
		$this->load->library('pagination');
		//konfigurasi pagination
        $config['base_url'] = site_url('admin/galeri/');
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
        $data['galeri'] = $this->M_admin->getGaleri($config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();
		$data['judul'] = 'Company Profile | Galeri';
		foreach ($data['galeri']->result() as $value) {
			$data_galeri = $this->M_admin->dataGaleri($value->id_admin);
			$data['a'][] = $data_galeri;
		}
		$this->templateadmin->displayadmin('admin/galeri',$data);
	}

	public function addGaleri()
	{
		if ($this->input->post('tambah_galeri')) {
			
			$config['upload_path'] 	   = "./asset/admin/images/galeri/";
			$config['allowed_types']   = 'jpg|png';

			$this->load->library('upload',$config);
			if ($this->upload->do_upload('berkas')) {
				$gambar = array('upload_data' => $this->upload->data());
				$data = array(
					'foto'				=> $gambar['upload_data']['file_name'],
					'tanggal_upload'	=> date('Y-m-d'),
					'id_admin'			=> $this->session->userdata('id_user')
				);
				$this->M_admin->addGaleri($data,'galeri');
				$this->session->set_flashdata('success', 'Galeri Berhasil Ditambah');
				redirect('admin/galeri/');
			} else {
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('error', $error);
				redirect('admin/galeri/');
			}

		} else {
			redirect('admin/galeri');
		}
	}

	public function delGaleri($id)
	{
		$this->M_admin->delGaleri($id);
		$this->session->set_flashdata('success', 'Foto berhasil Dihapus');
		redirect('admin/galeri/');
	}

	public function berita()
	{
		$data['judul'] = 'Company Profile | Berita';
		$data['berita'] = $this->M_admin->getBerita();
		foreach ($data['berita'] as $value) {
			$data_berita = $this->M_admin->dataBerita($value->id_admin);
			$data['a'][] = $data_berita;
		}
		$this->templateadmin->displayadmin('admin/berita',$data);
	}

	public function addBerita()
	{
		if ($this->input->post('tambah_berita')) {
			
			$config['upload_path'] 	   = "./asset/admin/images/berita/";
			$config['allowed_types']   = 'jpg|png';

			$this->load->library('upload',$config);
			if ($this->upload->do_upload('berkas')) {
				$gambar = array('upload_data' => $this->upload->data());
				$data = array(
					'judul_berita'	=> $this->input->post('judul_berita'),
					'konten_berita'	=> $this->input->post('konten_berita'),
					'gambar'		=> $gambar['upload_data']['file_name'],
					'tgl_upload'	=> date('Y-m-d'),
					'id_admin'		=> $this->session->userdata('id_user')
				);
				$this->M_admin->addBerita($data,'berita');
				$this->session->set_flashdata('success', 'Berhasil menambahkan berita');
				redirect('admin/berita/');
			} else {
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('error', $error);
				redirect('admin/berita/');
			}
		}
	}

	public function editBerita($id)
	{
		$data['edit_berita'] = $this->M_admin->getEditBerita($id);
		$data['judul'] = 'Company Profile | Edit Berita';
		$this->templateadmin->displayadmin('admin/editBerita',$data);
	}

	public function updBerita()
	{
		if ($this->input->post('update_brta')) {
			if (empty($_FILES['berkas']['name'])) {
				$data = array(
					'judul_berita'	=> $this->input->post('judul_berita'),
					'konten_berita'	=> $this->input->post('konten'),
					'gambar'		=> $this->input->post('berkas_lama')
				);
				$where = array(
					'id_berita' => $this->input->post('id_berita')
				);

				$this->M_admin->updateBrta($where, $data, 'berita');
				$this->session->set_flashdata('success', 'Berita Berhasil Diperbarui');
				redirect('admin/berita');
			} else {
				$config['upload_path'] 	   = "./asset/admin/images/berita/";
				$config['allowed_types']   = 'jpg|png';

				$this->load->library('upload',$config);

				if ($this->upload->do_upload('berkas')) {
					unlink("./asset/admin/images/berita/".$this->input->post('berkas_lama'));
					$gambar = array('upload_data' => $this->upload->data());
					$data = array(
						'judul_berita'	=> $this->input->post('judul_berita'),
						'konten_berita'	=> $this->input->post('konten'),
						'gambar'		=> $gambar['upload_data']['file_name']
					);
					$where = array(
						'id_berita' => $this->input->post('id_berita')
					);

					$this->M_admin->updateBrta($where, $data, 'berita');
					$this->session->set_flashdata('success', 'Berita Berhasil Diperbarui');
					redirect('admin/berita');
				} else {
					$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('error', $error);
					redirect('admin/berita/');
				}

			}
		} else {
			redirect('admin/berita');
		}
	}

	public function delBerita($id)
	{
		$this->M_admin->delBerita($id);
		$this->session->set_flashdata('success', 'Berita Berhasil Dihapus');
		redirect('admin/berita/');
	}

	public function testimoni()
	{
		$data['judul'] = 'Company Profile | Testimoni';
		$this->templateadmin->displayadmin('admin/testimoni',$data);
	}

	public function search()
	{
        // tangkap variabel keyword dari URL
		$keyword = $this->uri->segment(3);

		// cari di database
		$data = $this->db->from('siswa_pelatihan')->like('nama_siswa',$keyword)->get();	

		// format keluaran di dalam array
		foreach($data->result() as $row)
		{
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'value'	=>$row->nama_siswa,
				'id'	=>$row->id_siswa_pelatihan,
				'foto'	=>$row->foto

			);
		}
		// minimal PHP 5.2
		echo json_encode($arr);
    }

    public function searchKursus()
	{
		$keyword = $this->uri->segment(3);
		$data = $this->db->from('siswa_kursus')->like('nama',$keyword)->get();

		foreach($data->result() as $row){
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'value'	=>$row->nama,
				'id'	=>$row->id_siswa_kursus,
				'foto'	=>$row->foto

			);
		}
		echo json_encode($arr);
    }

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login/');
	}

}
