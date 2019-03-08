<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_users1 extends CI_Model {
	
	public function check_credential($username,$password){

		$query = $this->db->get_where('user', array('username' => $username,'password' => $password));
		return $query->result();
	}

	public function check_pegawai($nopeg){

		$query = $this->db->get_where('tb_pegawai', array('NIP' => $nopeg));
		return $query->result();
	}

	public function daftar($mine){
		//Query mencari record berdasarkan ID
		$hasil = $this->db->where ('kode_unit', $mine)
						  ->get('question');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}

	public function skala(){
		//Query mencari record berdasarkan ID
		$hasil = $this->db->get('setting');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}

	public function assign($mine){
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("select c.target,c.name,c.penilai,d.status from (SELECT DISTINCT a.target,b.name,a.penilai1 as penilai FROM `setup_assessment` a join tb_pegawai b ON a.target=b.NIP WHERE a.penilai1='$mine' UNION 
SELECT DISTINCT a.target,b.name,a.penilai2 as penilai FROM setup_assessment a join tb_pegawai b ON a.target=b.NIP WHERE a.penilai2='$mine' UNION 
SELECT DISTINCT a.target,b.name,a.penilai3 as penilai FROM setup_assessment a join tb_pegawai b ON a.target=b.NIP WHERE a.penilai3='$mine' UNION 
SELECT DISTINCT a.target,b.name,a.penilai4 as penilai FROM setup_assessment a join tb_pegawai b ON a.target=b.NIP WHERE a.penilai4='$mine') c LEFT JOIN assessment d on c.target=d.target AND c.penilai=d.asesor");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function score($mine){
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT SUM(rata) as jumlah_nilai FROM `assessment` where target='$mine'");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}

	public function jumlah_penilaian($mine){
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT COUNT(target) as jumlah_penilai FROM `assessment` where target='$mine'");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	
 	function cek_bottomunit($unit) {
 		$query = $this->db->query("SELECT * FROM tb_aksiunit WHERE tb_aksiunit.unit = '$unit' AND tb_aksiunit.status='bottom'");
		if($query->num_rows() > 0) {
			return $query->result();
		}
		else{
			return $a=0;
		}
 	}
 	function cek_bottomsm($sitacode) {
 		$query = $this->db->query("SELECT * FROM tb_aksism WHERE tb_aksism.sitacode = '$sitacode' AND tb_aksism.status='bottom'");
		if($query->num_rows() > 0) {
			return $query->result();
		}
		else{
			return $a=0;
		}
 	}

 	
 	function cek_topunit($nopeg) {
 		$query = $this->db->query("SELECT * FROM tb_aksiunit WHERE tb_aksiunit.unit = '$nopeg' AND tb_aksiunit.status='top'");
		if($query->num_rows() > 0) {
			return $query->result();
		}
		else{
			return $a=0;
		}
 	}
 	function cek_topsm($nopeg) {
 		$query = $this->db->query("SELECT * FROM tb_aksism WHERE tb_aksism.sitacode = '$nopeg' AND tb_aksism.status='top'");
		if($query->num_rows() > 0) {
			return $query->result();
		}
		else{
			return $a=0;
		}
 	}
 	
 	function progres_aksiunit($nip) {
 		$query = $this->db->query("SELECT * FROM `tb_aksiunit` WHERE penanggung_jawab='$nip'");
		if($query->num_rows() > 0) {
			return $query->result();
		}
		else{
			return "kosong";
		}
 	}
 	function progres_aksism($nip) {
 		$query = $this->db->query("SELECT * FROM `tb_aksism` WHERE penanggung_jawab='$nip'");
		if($query->num_rows() > 0) {
			return $query->result();
		}
		else{
			return "kosong";
		}
 	}


	public function update_progressm($id_aksi, $data_progres) {
		//Query update from ... where id = ...
		$nilai=$data_progres['progres'];
		$ket=$data_progres['keterangan'];
		$this->db->query("update tb_aksism set progress=$nilai, keterangan='$ket' where id_aksi=$id_aksi");
	}
	public function update_progresunit($id_aksi, $data_progres) {
		//Query update from ... where id = ...
		$nilai=$data_progres['progres'];
		$ket=$data_progres['keterangan'];
		$this->db->query("update tb_aksiunit set progress=$nilai, keterangan='$ket' where id_aksi=$id_aksi");
	}

	public function find($nopeg) {
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT * FROM tb_pegawai a JOIN setup_assessment b ON a.NIP = b.target where a.NIP=$nopeg");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}

	public function tambah_hasilpenilaianatasan($data_penilaian2){
		//Quert insert into
		$score = (($data_penilaian2['hasilq1']+$data_penilaian2['hasilq2']+$data_penilaian2['hasilq3']+$data_penilaian2['hasilq4']+$data_penilaian2['hasilq5']+$data_penilaian2['hasilq6']+$data_penilaian2['hasilq7']+$data_penilaian2['hasilq8']+$data_penilaian2['hasilq9']+$data_penilaian2['hasilq10'])/10*0.4);
		$insertData = array($data_penilaian2['target'],$data_penilaian2['asesor'],$data_penilaian2['hasilq1']*100/$data_penilaian2['skala'],$data_penilaian2['hasilq2']*100/$data_penilaian2['skala'],$data_penilaian2['hasilq3']*100/$data_penilaian2['skala'],$data_penilaian2['hasilq4']*100/$data_penilaian2['skala'],$data_penilaian2['hasilq5']*100/$data_penilaian2['skala'],$data_penilaian2['hasilq6']*100/$data_penilaian2['skala'],$data_penilaian2['hasilq7']*100/$data_penilaian2['skala'],$data_penilaian2['hasilq8']*100/$data_penilaian2['skala'],$data_penilaian2['hasilq9']*100/$data_penilaian2['skala'],$data_penilaian2['hasilq10']*100/$data_penilaian2['skala'],$score*100/$data_penilaian2['skala']);
		$this->db->query("insert into assessment (target,asesor,hasilq1,hasilq2,hasilq3,hasilq4,hasilq5,hasilq6,hasilq7,hasilq8,hasilq9,hasilq10,rata) values (?,?,?,?,?,?,?,?,?,?,?,?,?)", $insertData);
/*		$this->db->insert('tb_penilaian2', $data_penilaian2,"",$rata);*/
	}
	public function tambah_hasilpenilaianpeers($data_penilaian2){
		//Quert insert into
		$score = (($data_penilaian2['hasilq1']+$data_penilaian2['hasilq2']+$data_penilaian2['hasilq3']+$data_penilaian2['hasilq4']+$data_penilaian2['hasilq5']+$data_penilaian2['hasilq6']+$data_penilaian2['hasilq7']+$data_penilaian2['hasilq8']+$data_penilaian2['hasilq9']+$data_penilaian2['hasilq10'])/10*0.2);
		$insertData = array($data_penilaian2['target'],$data_penilaian2['asesor'],$data_penilaian2['hasilq1']*100/$data_penilaian2['skala'],$data_penilaian2['hasilq2']*100/$data_penilaian2['skala'],$data_penilaian2['hasilq3']*100/$data_penilaian2['skala'],$data_penilaian2['hasilq4']*100/$data_penilaian2['skala'],$data_penilaian2['hasilq5']*100/$data_penilaian2['skala'],$data_penilaian2['hasilq6']*100/$data_penilaian2['skala'],$data_penilaian2['hasilq7']*100/$data_penilaian2['skala'],$data_penilaian2['hasilq8']*100/$data_penilaian2['skala'],$data_penilaian2['hasilq9']*100/$data_penilaian2['skala'],$data_penilaian2['hasilq10']*100/$data_penilaian2['skala'],$score*100/$data_penilaian2['skala']);
		$this->db->query("insert into assessment (target,asesor,hasilq1,hasilq2,hasilq3,hasilq4,hasilq5,hasilq6,hasilq7,hasilq8,hasilq9,hasilq10,rata) values (?,?,?,?,?,?,?,?,?,?,?,?,?)", $insertData);
/*		$this->db->insert('tb_penilaian2', $data_penilaian2,"",$rata);*/
	}
	public function tambah_aksi($data_aksi){
		//Quert insert into
		$this->db->insert('tb_aksiunit', $data_aksi);
	}
	
	public function tambah_aksism($data_aksi){
		//Quert insert into
		$this->db->insert('tb_aksism', $data_aksi);
	}
	public function edit_aksi_bottom($id, $data_aksi) {
		//Query update from ... where id = ...
		$this->db->where('id_aksi', $id)
				 ->update('tb_aksi', $data_aksi);
	}
	public function edit_aksi_bottomsm($id, $data_aksi) {
		//Query update from ... where id = ...
		$this->db->where('id_aksi', $id)
				 ->update('tb_aksism', $data_aksi);
	}
	public function edit_aksi_bottomunit($id, $data_aksi) {
		//Query update from ... where id = ...
		$this->db->where('id_aksi', $id)
				 ->update('tb_aksiunit', $data_aksi);
	}
	public function edit_aksi_top($id, $data_aksi) {
		//Query update from ... where id = ...
		$this->db->where('id_aksi', $id)
				 ->update('tb_aksi', $data_aksi);
	}
	public function edit_aksi_topsm($id, $data_aksi) {
		//Query update from ... where id = ...
		$this->db->where('id_aksi', $id)
				 ->update('tb_aksism', $data_aksi);
	}
	public function edit_aksi_topunit($id, $data_aksi) {
		//Query update from ... where id = ...
		$this->db->where('id_aksi', $id)
				 ->update('tb_aksiunit', $data_aksi);
	}
	public function tampil_aksi($id) {
		//Query update from ... where id = ...
		$hasil = $this->db->query("select * from tb_aksi a join rekomendasi b on a.id_rekomendasi=b.id_rekomendasi where a.id_nip='$id' AND status='top'");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return "kosong";
		}
	}
	public function tampil_aksiunit($id) {
		//Query update from ... where id = ...
		$hasil = $this->db->query("select * from tb_aksiunit a join rekomendasi b on a.id_rekomendasi=b.id_rekomendasi where a.unit='$id' AND status='top'");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return "kosong";
		}
	}
	public function tampil_aksism($id) {
		//Query update from ... where id = ...
		$hasil = $this->db->query("select * from tb_aksism a join rekomendasi b on a.id_rekomendasi=b.id_rekomendasi where a.sitacode='$id' AND status='top'");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return "kosong";
		}
	}
	public function tampil_aksi_bottom($id) {
		//Query update from ... where id = ...
		$hasil = $this->db->query("select * from tb_aksi a join rekomendasi b on a.id_rekomendasi=b.id_rekomendasi where a.id_nip='$id' AND status='bottom'");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return "kosong";
		}
	}
	public function tampil_aksi_bottomunit($id) {
		//Query update from ... where id = ...
		$hasil = $this->db->query("select * from tb_aksiunit a join rekomendasi b on a.id_rekomendasi=b.id_rekomendasi where a.unit='$id' AND status='bottom'");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return "kosong";
		}
	}
	public function tampil_aksi_bottomsm($id) {
		//Query update from ... where id = ...
		$hasil = $this->db->query("select * from tb_aksism a join rekomendasi b on a.id_rekomendasi=b.id_rekomendasi where a.sitacode='$id' AND status='bottom'");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return "kosong";
		}
	}
	

	public function bobot($id_bobot){
		//query semua record di table inovasi
		$hasil = $this->db->where('id', $id_bobot)
						  ->get('bobot');
		if($hasil->num_rows() > 0){
			return $hasil->row();
		}
		else {
			return array();
		}
	}

	public function find3($nip){
		$hasil = $this->db->query("SELECT * FROM tb_pegawai where NIP='$nip'");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
	public function listaksi($nip){
		$hasil = $this->db->query("SELECT * FROM tb_aksi a WHERE a.id_nip='$nip'");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
	public function sumaksi($nip){
		$hasil = $this->db->query("SELECT a.status_progres, COUNT(*) as jumlah FROM tb_aksi a WHERE a.id_nip ='$nip' GROUP BY a.status_progres");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
	public function listaksism($sitacode){
		$hasil = $this->db->query("SELECT * FROM tb_aksism a WHERE sitacode='$sitacode'");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
	public function sumaksism($sitacode){
		$hasil = $this->db->query("SELECT a.status_progres, COUNT(*) as jumlah FROM tb_aksism a WHERE a.sitacode='$sitacode' GROUP BY a.status_progres");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}

	
}
