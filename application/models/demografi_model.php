<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class demografi_model extends CI_Model {
	


	public	function direktorat(){
		$query = $this->db->query("SELECT tb_pegawai.direktorat, COUNT(*) as Jumlah FROM tb_pegawai JOIN tb_inovasi on tb_inovasi.nip1 = tb_pegawai.NOPEG or tb_inovasi.nip2 = tb_pegawai.NOPEG or tb_inovasi.nip3 = tb_pegawai.NOPEG or tb_inovasi.nip4 = tb_pegawai.NOPEG WHERE tb_pegawai.perusahaan='PT Gapura Angkasa' GROUP BY tb_pegawai.direktorat");

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}
	public	function gender(){
		$query = $this->db->query("SELECT tb_pegawai.GENDER, COUNT(*) as Jumlah FROM tb_pegawai JOIN tb_inovasi on tb_inovasi.nip1 = tb_pegawai.NOPEG or tb_inovasi.nip2 = tb_pegawai.NOPEG or tb_inovasi.nip3 = tb_pegawai.NOPEG or tb_inovasi.nip4 = tb_pegawai.NOPEG GROUP BY tb_pegawai.GENDER");

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}
	public	function pendidikan(){
		$query = $this->db->query("SELECT tb_pegawai.PENDIDIKAN, COUNT(*) as Jumlah FROM tb_pegawai JOIN tb_inovasi on tb_inovasi.nip1 = tb_pegawai.NOPEG or tb_inovasi.nip2 = tb_pegawai.NOPEG or tb_inovasi.nip3 = tb_pegawai.NOPEG or tb_inovasi.nip4 = tb_pegawai.NOPEG GROUP BY tb_pegawai.PENDIDIKAN");

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	public function lokasi (){
		$query = $this->db->query("SELECT tb_pegawai.LOKASI, COUNT(*) as Jumlah FROM tb_pegawai JOIN tb_inovasi on tb_inovasi.nip1 = tb_pegawai.NOPEG or tb_inovasi.nip2 = tb_pegawai.NOPEG or tb_inovasi.nip3 = tb_pegawai.NOPEG or tb_inovasi.nip4 = tb_pegawai.NOPEG GROUP BY tb_pegawai.LOKASI");
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	public function posisi(){
		$query = $this->db->query("SELECT tb_pegawai.POSISI, COUNT(*) as Jumlah FROM tb_pegawai JOIN tb_inovasi on tb_inovasi.nip1 = tb_pegawai.NOPEG or tb_inovasi.nip2 = tb_pegawai.NOPEG or tb_inovasi.nip3 = tb_pegawai.NOPEG or tb_inovasi.nip4 = tb_pegawai.NOPEG GROUP BY tb_pegawai.POSISI");
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	public function profesi(){
		$query = $this->db->query("SELECT tb_pegawai.PROFESI, COUNT(*) as Jumlah FROM tb_pegawai JOIN tb_inovasi on tb_inovasi.nip1 = tb_pegawai.NOPEG or tb_inovasi.nip2 = tb_pegawai.NOPEG or tb_inovasi.nip3 = tb_pegawai.NOPEG or tb_inovasi.nip4 = tb_pegawai.NOPEG GROUP BY tb_pegawai.PROFESI");
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	public function usia(){
		$query = $this->db->query("select count(*) AS Jumlah FROM (select nama,age from (SELECT tb_pegawai.nama, YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) AS age FROM tb_pegawai) a where age BETWEEN 18 and 30) a UNION select count(*) AS Jumlah FROM (select nama,age from (SELECT tb_pegawai.nama, YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) AS age FROM tb_pegawai) a where age BETWEEN 31 and 40) b UNION select count(*) AS Jumlah FROM (select nama,age from (SELECT tb_pegawai.nama, YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) AS age FROM tb_pegawai) a where age BETWEEN 41 and 50) c UNION select count(*) AS Jumlah FROM (select nama,age from (SELECT tb_pegawai.nama, YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) AS age FROM tb_pegawai) a where age BETWEEN 51 and 58) d UNION select count(*) AS Jumlah FROM (select nama,age from (SELECT tb_pegawai.nama, YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) AS age FROM tb_pegawai) a where age > 58) e");
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}

	public function generasi(){
		$query = $this->db->query("select count(*) AS Jumlah FROM (select nama,age from (SELECT tb_pegawai.nama, YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) AS age FROM tb_pegawai) a where age BETWEEN 53 and 72) a
			UNION
			select count(*) AS Jumlah FROM (select nama,age from (SELECT tb_pegawai.nama, YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) AS age FROM tb_pegawai) a where age BETWEEN 37 and 54) a
			UNION
			select count(*) AS Jumlah FROM (select nama,age from (SELECT tb_pegawai.nama, YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) AS age FROM tb_pegawai) a where age BETWEEN 23 and 38) a
			UNION
			select count(*) AS Jumlah FROM (select nama,age from (SELECT tb_pegawai.nama, YEAR(CURDATE()) - YEAR(tb_pegawai.tanggal_lahir) AS age FROM tb_pegawai) a where age BETWEEN 18 and 22) a");
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return array();
		}
	}


	
	
}