<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error extends CI_Controller {

	public function index()
	{
		$this->load->view('error');
	}

}

/* End of file error.php */
/* Location: ./application/controllers/error.php */