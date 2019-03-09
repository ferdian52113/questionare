<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_questionare extends CI_Model {
	
	public function getDefaultForm(){
        $query = $this->db->query("SELECT * FROM tb_form WHERE isActive=1 LIMIT 1");
        if($query->num_rows() > 0){
            return json_encode(['status'=>true,'data'=>$query->result()]);
        } else{
            return json_encode(['status'=>false]);
        }
	}

    public function cekDataForm($table,$formCode){
        $query = $this->db->query("SELECT * FROM $table WHERE formCode='$formCode' LIMIT 1");

        if($query->num_rows() > 0){
            return true;
        } else{
            return false;
        }
    }

    public function getDataTable($param, $value, $table) {
        $this->db->where($param, $value);
        $query=$this->db->get($table);
        if($query->num_rows() > 0){
            return json_encode(['status'=>true,'data'=>$query->result()]);
        } else{
            return json_encode(['status'=>false]);
        }
    }

    public function getDataTableQuestion($param, $value, $table) {
        $query=$this->db->query("SELECT * FROM $table WHERE $param='$value' ORDER BY formCode,SectionID");
        if($query->num_rows() > 0){
            return json_encode(['status'=>true,'data'=>$query->result()]);
        } else{
            return json_encode(['status'=>false]);
        }
    }

    public function getDataTableQuestionDetail($value) {
        $query=$this->db->query("SELECT * FROM tb_question_detail qd INNER JOIN tb_question q ON qd.questionID=q.questionID WHERE q.formCode='$value'");
        if($query->num_rows() > 0){
            return json_encode(['status'=>true,'data'=>$query->result()]);
        } else{
            return json_encode(['status'=>false]);
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