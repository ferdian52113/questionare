<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

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
		$this->load->model('model_admin');
	}
	public function index()
	{
			$this->load->view('login');

	}

	public function pegawai()
	{
		$nopeg = $_POST['nopeg'];
		$data = $this->model_users->check_pegawai($nopeg);
		$tahun_aktif = $this->model_admin->skala()->tahun_aktif;
		$periode_aktif = $this->model_admin->skala()->periode_aktif;
		if($data == null){
			echo "<script>
			alert('Nopeg tidak terdaftar');
			window.location.href='".base_url("login")."';
			</script>";
			}
		else{
			//if match
			foreach($data as $d);
				$newdata = array(
			    'nopeg'  		=> $d->NIP,
			    'nama'	 		=> $d->name,
			    'unit'			=> $d->unit,
			    'direktorat'	=> $d->direktorat,
			    'sitacode'		=> $d->sitacode,
			    'profesi'		=> $d->profesi,
			    'pertanyaan'	=> $d->pertanyaan,
			    'tahun_pilih' 	=> $tahun_aktif,
				'tahun' 		=> $tahun_aktif,
				'periode'  	    => $periode_aktif,
				'periode_pilih' => $periode_aktif,
				'level'			=> $d->level
		);
			//print_r($newdata);exit();
			$this->session->set_userdata($newdata);
			redirect('user');
		}
	}
}




/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */