<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_admin extends CI_Model {

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

    public function form_list() {
		$query = $this->db->query("SELECT * FROM tb_form WHERE isActive='1'");
		if($query->num_rows() > 0){
            return $query->result();
        } else{
            return array();
        }
	}

    public function cekData($table,$link){
        $query = $this->db->query("SELECT * FROM $table WHERE link='$link'");
        if($query->num_rows() > 0){
            return false;
        } else{
            return true;
        }
    }

    public function dataAnswer($formCode) {
        $query = $this->db->query("SELECT responseID,formCode,sectionID,questionID,value FROM `tb_answer` where formCode='$formCode' GROUP BY responseID,formCode,sectionID,questionID");
        if($query->num_rows() > 0){
            return $query->result();
        } else{
            return array();
        }
    }

    public function dataResponden($formCode) {
        $query = $this->db->query("SELECT responseID FROM `tb_response` where formCode='$formCode' and status=1");
        if($query->num_rows() > 0){
            return $query->result();
        } else{
            return array();
        }
    }

    public function dataQuestion($formCode) {
        $query = $this->db->query("SELECT * FROM `tb_question` where formCode='$formCode' and rowStatus=0 limit 4");
        if($query->num_rows() > 0){
            return $query->result();
        } else{
            return array();
        }
    }

}
