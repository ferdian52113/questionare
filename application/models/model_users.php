<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_users extends CI_Model {
	
	public function login($username,$password){

		$query = $this->db->get_where('tb_admin', array('username' => $username,'password' => $password));
		return $query->result();
	}

	public function cek_unit($unit){

		$query = $this->db->query("SELECT * FROM tb_pegawai WHERE sitacode='$unit' AND level!='STAFF'");
		return $query->result();
	}

	public function cek_pegawai($email){

		$query = $this->db->query("SELECT * FROM tb_pegawai WHERE email='$email'");
		return $query->result();
	}

	public function pendaftaran($daftar){
		//Quert insert into
		$this->db->insert('tb_pegawai', $daftar);
	}

	function plot_adkar($mine) {
		$this->db->query("SET SQL_BIG_SELECTS=1");
 		$query = $this->db->query("SELECT ROUND(AVG((nilai/jumlah)*100)) AS score, nama_kategori FROM tb_penilaian a LEFT JOIN child_question b ON a.id_question = b.id_child LEFT JOIN survey_kategori c ON b.kategori = c.id_kategori LEFT JOIN form d ON b.id_form = d.id_form LEFT JOIN survey_type e ON d.form_type = e.id_survey LEFT JOIN tb_pegawai f ON a.responden = f.nopeg WHERE f.nopeg = $mine AND e.id_survey=2 GROUP BY nama_kategori");
		if($query->num_rows() > 0) {
			return $query->result();
		}
		else{
			return array();
		}
 	}

 	function avg_adkar($mine) {
 		$query = $this->db->query("SELECT AVG(f.score) AS avg_score FROM (SELECT ROUND(AVG((nilai/jumlah)*100)) AS score, nama_kategori FROM tb_penilaian a LEFT JOIN child_question b ON a.id_question = b.id_child LEFT JOIN survey_kategori c ON b.kategori = c.id_kategori LEFT JOIN form d ON b.id_form = d.id_form LEFT JOIN survey_type e ON d.form_type = e.id_survey LEFT JOIN tb_pegawai f ON a.responden = f.nopeg WHERE f.nopeg = $mine AND e.id_survey=2 GROUP BY nama_kategori) f ");
		if($query->num_rows() > 0) {
			return $query->result();
		}
		else{
			return array();
		}
 	}

 	function ketercapaian_360($mine) {
 		$query1 = $this->db->query("SELECT ROUND(AVG((nilai/jumlah)*100)) AS myscore1 FROM tb_penilaian a LEFT JOIN child_question b ON a.id_question = b.id_child LEFT JOIN survey_kategori c ON b.kategori = c.id_kategori LEFT JOIN form d ON b.id_form = d.id_form LEFT JOIN survey_type e ON d.form_type = e.id_survey LEFT JOIN tb_pegawai f ON a.responden = f.nopeg WHERE f.nopeg = $mine AND e.id_survey=3 AND input=1");
 		if($query1->num_rows() > 0) {
			$q1=$query1->result();
		}
		else{
			$q1=0;
		}
 		
 		$query2 = $this->db->query("SELECT ROUND(AVG((nilai/jumlah)*100)) AS myscore2 FROM tb_penilaian a LEFT JOIN child_question b ON a.id_question = b.id_child LEFT JOIN survey_kategori c ON b.kategori = c.id_kategori LEFT JOIN form d ON b.id_form = d.id_form LEFT JOIN survey_type e ON d.form_type = e.id_survey LEFT JOIN tb_pegawai f ON a.responden = f.nopeg WHERE f.nopeg = $mine AND e.id_survey=3 AND input=2");
 		if($query2->num_rows() > 0) {
			$q2=$query2->result();
		}
		else{
			$q2=0;
		}
 		
 		$hasil1=$q1[0]->myscore1;
 		$hasil2=$q2[0]->myscore2;
 		$total=($hasil1*0.4)+($hasil2*0.6);
		return $total;
 	}

 	function engagement_score($mine) {
 		$query = $this->db->query("SELECT ROUND(AVG((nilai/jumlah)*100)) AS myscore FROM tb_penilaian a LEFT JOIN child_question b ON a.id_question = b.id_child LEFT JOIN survey_kategori c ON b.kategori = c.id_kategori LEFT JOIN form d ON b.id_form = d.id_form LEFT JOIN survey_type e ON d.form_type = e.id_survey LEFT JOIN tb_pegawai f ON a.responden = f.nopeg WHERE f.nopeg=$mine AND e.id_survey=1");
		if($query->num_rows() > 0) {
			return $query->result();
		}
		else{
			return array();
		}
 	}

 	function engagement_dimensi($mine) {
 		$query = $this->db->query("SELECT AVG((nilai/jumlah)*100) AS score, c.nama_kategori FROM tb_penilaian a LEFT JOIN child_question b ON a.id_question = b.id_child LEFT JOIN survey_kategori c ON b.kategori = c.id_kategori LEFT JOIN form d ON b.id_form = d.id_form LEFT JOIN survey_type e ON d.form_type = e.id_survey LEFT JOIN tb_pegawai f ON a.responden = f.nopeg WHERE f.nopeg=$mine AND e.id_survey=1 GROUP BY b.kategori");
		if($query->num_rows() > 0) {
			return $query->result();
		}
		else{
			return array();
		}
 	}

 	function gauge_akselerasi($mine) {
 		$query = $this->db->query("SELECT AVG(progres) AS progres from data_akselerasi WHERE nopeg=$mine");
		if($query->num_rows() > 0) {
			return $query->result();
		}
		else{
			return array();
		}
 	}

 	function data_akselerasi($mine) {
 		$query = $this->db->query("SELECT * from data_akselerasi WHERE nopeg=$mine");
		if($query->num_rows() > 0) {
			return $query->result();
		}
		else{
			return array();
		}
 	}

 	// -----------------------------------------------------------------------------------------------------------------------

	public function list_survey_type(){
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT * FROM survey_type");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}

	public function list_kategori(){
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT * FROM survey_kategori");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}

	public function list_pertanyaan(){
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT * FROM child_question a LEFT JOIN parent_question b ON a.parent_id = b.id_parent");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}

	public function list_construct(){
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT * FROM parent_question");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}

	public function list_multiple_choice(){
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT * FROM multiple_choice");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}

	public function list_forced_choice(){
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT * FROM forced_choice");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}

	public function ambil_pertanyaan(){
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT * FROM child_question a ORDER BY a.id_child DESC LIMIT 1");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}

	public function data_form(){
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT * FROM form a LEFT JOIN survey_type b on a.form_type = b.id_survey");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return $a=0;
		}
	}

	public function form_360(){
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT * FROM form a LEFT JOIN survey_type b on a.form_type = b.id_survey WHERE a.form_type=3 ORDER BY id_form DESC LIMIT 1");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return $a=0;
		}
	}

	public function list_parent($id_form){
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT * FROM parent_question where id_form=$id_form");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}

	public function list_question($id_form){
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT * FROM child_question a LEFT JOIN parent_question b ON a.parent_id = b.id_parent where a.id_form=$id_form");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}

	public function reset_data() {
		//Query delete ... where id=...
		$this->db->query("TRUNCATE TABLE tb_penilaian");
	}

	public function tambah_forced($data_forced){
		//Quert insert into
		$this->db->insert('forced_choice', $data_forced);
	}

	public function tambah_survey($data_aksi){
		//Quert insert into
		$this->db->insert('tb_penilaian', $data_aksi);
	}

	public function tambah_penilaian_forced($data_aksi){
		//Quert insert into
		$this->db->insert('tb_penilaian_forced', $data_aksi);
	}

	public function tambah_pertanyaan($data_pertanyaan){
		//Quert insert into
		$this->db->insert('child_question', $data_pertanyaan);
	}

	public function tambah_construct($data_pertanyaan){
		//Quert insert into
		$this->db->insert('parent_question', $data_pertanyaan);
	}

	public function add_form($data_form){
		//Quert insert into
		$this->db->insert('form', $data_form);
	}

	public function tambah_pilihan($data_pilihan){
		//Quert insert into
		$this->db->insert('multiple_choice', $data_pilihan);
	}

	public function edit_pilihan($data_pilihan, $id_child){
		//Quert insert into
		$this->db->where('id_question', $id_child)
				 ->update('multiple_choice', $data_pilihan);
	}

	public function edit_pertanyaan($data_pertanyaan, $id_child){
		//Quert insert into
		$this->db->where('id_child', $id_child)
				 ->update('child_question', $data_pertanyaan);
	}

	public function edit_construct($data_pertanyaan, $id_parent){
		//Quert insert into
		$this->db->where('id_parent', $id_parent)
				 ->update('parent_question', $data_pertanyaan);
	}

	public function edit_form($data_form, $id_form){
		//Quert insert into
		$this->db->where('id_form', $id_form)
				 ->update('form', $data_form);
	}

	public function delete($id_child) {
		//Query delete ... where id=...
		$this->db->where('id_child', $id_child)
				 ->delete('child_question');
	}

	public function delete_construct($id_parent) {
		//Query delete ... where id=...
		$this->db->where('id_parent', $id_parent)
				 ->delete('parent_question');
	}

	public function hapus_pilihan($qc) {
		//Query delete ... where id=...
		$this->db->where('question', $qc)
				 ->delete('multiple_choice');
	}

	public function judul($id_form){
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT * FROM form where id_form = $id_form LIMIT 1");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}

	public function delete_akselerasi($mine){
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("DELETE FROM data_akselerasi WHERE nopeg = $mine");
	}

 	public function upload_akselerasi($rowData,$mine){
            $data = array(
                'id_akselerasi' => $rowData['0'][0],
                'nopeg'		 	=> $mine,
                'pelaksana' 	=> $rowData['0'][1],
                'mission' 		=> $rowData['0'][2],
                'progres' 		=> $rowData['0'][3]
            );
		//Query insert into
		$this->db->replace('data_akselerasi', $data);
	}


}