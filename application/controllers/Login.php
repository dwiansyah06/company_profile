<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$data['judul'] = 'Sriwijaya Universal | Admin';
		$this->load->view('admin/login',$data);
	}

	public function loginProcess()
	{
		if ($this->input->post('login')) {
			$this->load->model('M_login');
			$username = htmlspecialchars($this->input->post('username'));
			$password = htmlspecialchars($this->input->post('password'));
			$where = array('username' => $username);

			$result = $this->M_login->queryLogin($where,"admin")->num_rows();
			if ($result == 1) {
				$print = $this->M_login->queryLogin($where,"admin")->result();
				foreach ($print as $value) {
					$sess_data['id_user'] 	= $value->id_user;
					$sess_data['username'] 	= $value->username;
					$sess_data['foto'] 		= $value->foto;
					$pass_db = $value->password;
				}

				if ($password == $pass_db) {
					$this->session->set_userdata($sess_data);
					redirect('admin/');
				} else {
					$this->session->set_flashdata('error', 'Maaf password anda tidak cocok dengan yang di database kami');
					redirect('login/');
				}

			} else {
				$this->session->set_flashdata('error', "Maaf username <strong>$username</strong> tidak ada dalam database kami");
				redirect('login/');
			}
		} else {
			redirect('login/');
		}
	}

}
