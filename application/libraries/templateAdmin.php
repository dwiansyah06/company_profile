<?php  

class TemplateAdmin {
 	// protected $_ci;

    function __construct(){
        $this->CI = & get_instance();
    }

    function displayAdmin($template, $data=null){
    	$this->CI->load->model('M_admin');
    	$response['user'] = $this->CI->M_admin->get_data();

    	$data['_content'] = $this->CI->load->view($template, $data, true);
    	$data['_header'] = $this->CI->load->view('template/admin/header', $response, true);
    	$data['_footer'] = $this->CI->load->view('template/admin/footer', $response, true);
    	$this->CI->load->view('/templateAdmin.php', $data);
    }
}

?>