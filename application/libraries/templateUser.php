<?php  

class TemplateUser {
 	// protected $_ci;

    function __construct(){
        $this->CI = & get_instance();
    }

    function displayUser($template, $data=null){
    	$data['_content'] = $this->CI->load->view($template, $data, true);
    	$data['_header'] = $this->CI->load->view('template/user/header', $data, true);
    	$data['_footer'] = $this->CI->load->view('template/user/footer', $data, true);
    	$this->CI->load->view('/templateUser.php', $data);
    }
}

?>