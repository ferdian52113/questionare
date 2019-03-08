<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('model_users');
		$this->load->model('model_admin');

		if ($this->session->userdata('role')!=1) {
            redirect('admin_login');
        }
	}
	public function index()
	{		
		$this->load->view('admin/list-question');
	}

	
	
	function logout()
	{
		$this->session->sess_destroy();
		redirect('admin_login');
	}
}