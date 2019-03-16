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
        $query = $this->db->query("SELECT * FROM `tb_question` where formCode='$formCode' and rowStatus=0");
        if($query->num_rows() > 0){
            return $query->result();
        } else{
            return array();
        }
    }

    public function dashboard_answerChoice($formCode) {
        $query = $this->db->query("SELECT ans.formCode,ans.sectionID,ans.questionID,count(ans.value) as total,ans.value 
					FROM tb_answer ans LEFT JOIN tb_question qst ON ans.questionID = qst.questionID
					where ans.formCode='$formCode' AND qst.questionType='Multiple Choice'
					GROUP BY ans.formCode,ans.sectionID,ans.questionID,ans.value");
        if($query->num_rows() > 0){
            return $query->result();
        } else{
            return array();
        }
    }

    public function dashboard_answerScale($formCode) {
        $query = $this->db->query("SELECT ans.formCode,ans.sectionID,ans.questionID,FORMAT(AVG(ans.value),2) as average 
					FROM tb_answer ans LEFT JOIN tb_question qst ON ans.questionID = qst.questionID
					where ans.formCode='$formCode' AND qst.questionType='Skala'
					GROUP BY ans.formCode,ans.sectionID,ans.questionID");
        if($query->num_rows() > 0){
            return $query->result();
        } else{
            return array();
        }
    }

    public function dashboard_answerInput($formCode) {
        $query = $this->db->query("SELECT ans.formCode,ans.responseID,ans.sectionID,ans.questionID,TRIM(ans.value) as value 
					FROM tb_answer ans LEFT JOIN tb_question qst ON ans.questionID = qst.questionID
					where ans.formCode='$formCode' AND qst.questionType='Input'
					GROUP BY ans.formCode,ans.responseID,ans.sectionID,ans.questionID");
        if($query->num_rows() > 0){
            return $query->result();
        } else{
            return array();
        }
    }

}
