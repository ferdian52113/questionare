<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_admin extends CI_Model {
	
<<<<<<< HEAD
	public function login($username,$password){

		$query = $this->db->get_where('tb_admin', array('username' => $username,'password' => $password));
		return $query->result();
	}



}
=======
	public function checkAccount($username,$password) {
        $query = "select username from tb_user where username=? and role=1";
        $cek_awal = $this->db->query($query, array($username))->row();
        if($cek_awal){
            $query = "select * from tb_user where username='" . $username . "'";
            $hasil = $this->db->query($query)->result();
            if($hasil){
                $pass = $hasil[0]->password;
                if($pass == md5($password)){
                    return $hasil;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }	

    public function insertData($table, $data) {
        $this->db->insert($table, $data);
    }
    
    public function updateData($param, $value, $table, $data) {
        $this->db->where($param, $value);
        $this->db->update($table, $data);
    }
    
    public function deleteData($param, $value, $table) {
        $this->db->where($param, $value);
        $this->db->delete($table);
    }


}
>>>>>>> 33e580557ab7d64d64fac50038ca123b13276f5b
