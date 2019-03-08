<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_admin');
		$this->load->library('session');
	}
	public function index()
	{
			$this->load->view('login_admin');

	}
	function login()
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		$status=$this->model_admin->checkAccount($username,$password);
		 if ($status == FALSE) {
			$message = "Username atau Password salah";
			echo "<script type='text/javascript'>alert('$message');
			window.location.href='".base_url("admin_login")."';</script>";		
			}
		else{
			//if match
			foreach($status as $d);
			$newdata = array(
			    'userID'	=> $d->userID,
			    'username'  => $d->username,
			    'role'  => $d->role
			);
			$this->session->set_userdata($newdata);
			redirect('admin/index');
			}
		}
	
}
