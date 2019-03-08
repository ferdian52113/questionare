<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_admin extends CI_Model {
	
	public function login($username,$password){

		$query = $this->db->get_where('tb_admin', array('username' => $username,'password' => $password));
		return $query->result();
	}



}