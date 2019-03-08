<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_users');
	}
	public function index()
	{
			$this->load->view('login_admin');

	}
	function login()
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		//print_r($username);
		$data= $this->model_users->login($username,$password);
		print_r($data);
		if($data == null){
			$message = "Username atau Password salah";
			echo "<script type='text/javascript'>alert('$message');
			window.location.href='".base_url("admin_login")."';</script>";		
			}
		else{
			//if match
			foreach($data as $d);
			$newdata = array(
			    'id_admin'	=> $d->id_admin,
			    'username'  => $d->username
			);
			$this->session->set_userdata($newdata);
			redirect('admin/index');
			//print_r("ada");	
			}
		}
	
}




/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */