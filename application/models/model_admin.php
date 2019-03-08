<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_admin extends CI_Model {
	
	public function check_credential($username,$password){

		$query = $this->db->get_where('users', array('username' => $username,'password' => $password));
		return $query->result();
	}
	public function all() {
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("select e.*,f.sitacode,f.unit,f.direktorat from (select e.id_asses,e.target,e.penilai1,e.nama_penilai1,e.penilai2,e.nama_penilai2 as penilai_2,e.penilai3,e.nama_penilai3 as penilai_3,e.penilai4,f.name as nama_penilai4 from (select e.id_asses,e.target,e.penilai1,e.nama_penilai1,e.penilai2,e.nama_penilai2,e.penilai3,f.name as nama_penilai3,e.penilai4 from (select c.id_asses,c.target,c.penilai1,c.nama_penilai1,c.penilai2,d.name as nama_penilai2,c.penilai3,c.penilai4 from (SELECT a.id_asses,a.target,a.penilai1,b.name as nama_penilai1,a.penilai2,a.penilai3,a.penilai4 from setup_assessment a JOIN tb_pegawai b on a.target=b.NIP) c LEFT JOIN tb_pegawai d on c.penilai2=d.NIP) e LEFT JOIN tb_pegawai f on e.penilai3=f.NIP) e LEFT JOIN tb_pegawai f on e.penilai4=f.NIP) e JOIN tb_pegawai f on e.target=f.NIP");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}

	public function list_question(){
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT DISTINCT(pertanyaan) as unit,direktorat as dir_name,nama_pertanyaan as unit_name,status FROM tb_pegawai LEFT JOIN question ON tb_pegawai.pertanyaan = question.kode_unit order by direktorat");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function list_tahun(){
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT DISTINCT(tahun) FROM assessment");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function list_periode(){
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT DISTINCT(periode) FROM assessment");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function find($unit) {
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT * FROM tb_pegawai a LEFT JOIN question b ON a.pertanyaan = b.kode_unit where a.pertanyaan='$unit'");
		if($hasil->num_rows() > 0){
			return $hasil->row();
		}
		else {
			return array();
		}
	}
	public function findid($id) {
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("select x.*,level from (select g.id_asses,g.target,g.sitacode,g.unit,g.direktorat,g.penilai1,g.nama_penilai1,g.penilai2,g.penilai_2,g.penilai3,g.penilai_3,g.penilai4,h.name as nama_penilai4 from (select e.id_asses,e.target,e.sitacode,e.unit,e.direktorat,e.penilai1,e.nama_penilai1,e.penilai2,e.penilai_2,e.penilai3,f.name as penilai_3,e.penilai4 from (select c.id_asses,c.target,c.sitacode,c.unit,c.direktorat,c.penilai1,c.nama_penilai1,c.penilai2,d.name as penilai_2,c.penilai3,c.penilai4 from (SELECT a.id_asses,a.target,b.sitacode,b.unit,b.direktorat,a.penilai1,b.name as nama_penilai1,a.penilai2,a.penilai3,a.penilai4 from setup_assessment a JOIN (SELECT nip,name,sitacode,unit,direktorat from tb_pegawai) b ON a.target=b.nip) c LEFT JOIN tb_pegawai d on c.penilai2=d.NIP) e LEFT JOIN tb_pegawai f on e.penilai3=f.NIP) g LEFT JOIN tb_pegawai h on g.penilai4=h.NIP where g.id_asses=$id) x JOIN tb_pegawai y on x.target=y.NIP");
		if($hasil->num_rows() > 0){
			return $hasil->row();
		}
		else {
			return array();
		}
	}

	public function findatasan($data_a) {
		//Query mencari record berdasarkan ID
		$a=$data_a[0];
		$b=$data_a[1];
		$c=$data_a[2];
		$d=$data_a[3];
		$hasil = $this->db->query("SELECT * FROM tb_pegawai where unit='$c' AND direktorat='$d' AND (level='VP' OR level='SM') order by name ASC");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
	public function findpeers_staff($data_a) {
		//Query mencari record berdasarkan ID
		$a=$data_a[0];
		$b=$data_a[1];
		$c=$data_a[2];
		$d=$data_a[3];
		$hasil = $this->db->query("SELECT * FROM tb_pegawai where unit='$c' AND direktorat='$d' AND level='STAFF' order by name ASC");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
	public function findpeers_manager($data_a) {
		//Query mencari record berdasarkan ID
		$a=$data_a[0];
		$b=$data_a[1];
		$c=$data_a[2];
		$d=$data_a[3];
		$hasil = $this->db->query("SELECT * FROM tb_pegawai where unit='$c' AND direktorat='$d' AND (level='STAFF' OR level='Manager') order by name ASC");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
	public function findpeers_seniormanager($data_a) {
		//Query mencari record berdasarkan ID
		$a=$data_a[0];
		$b=$data_a[1];
		$c=$data_a[2];
		$d=$data_a[3];
		$hasil = $this->db->query("SELECT * FROM tb_pegawai where direktorat='$d' AND (level='SM') order by name ASC");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
	public function findpeers_vp($data_a) {
		//Query mencari record berdasarkan ID
		$a=$data_a[0];
		$b=$data_a[1];
		$c=$data_a[2];
		$d=$data_a[3];
		$hasil = $this->db->query("SELECT * FROM tb_pegawai where direktorat='$d' AND (level='VP') order by name ASC");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
	public function tambah($data_pertanyaan){
		//Quert insert into
		$this->db->insert('question', $data_pertanyaan);
	}

	public function update($unit, $data_pertanyaan) {
		//Query update from ... where id = ...
		$this->db->where('kode_unit', $unit)
				 ->update('question', $data_pertanyaan);
	}
	public function delete($unit) {
		//Query delete ... where id=...
		$this->db->where('kode_unit', $unit)
				 ->delete('question');
	}
	public function status($tahun,$periode){
		$hasil=$this->db->query("select h.id_assessment,g.* from (select e.*,f.name as nama_penilai from (select c.target,c.name,c.penilai,d.status from (SELECT DISTINCT a.target,b.name,a.penilai1 as penilai FROM `setup_assessment` a join employee b ON a.target=b.NIP UNION 
SELECT DISTINCT a.target,b.name,a.penilai2 as penilai FROM setup_assessment a join employee b ON a.target=b.NIP UNION 
SELECT DISTINCT a.target,b.name,a.penilai3 as penilai FROM setup_assessment a join employee b ON a.target=b.NIP UNION 
SELECT DISTINCT a.target,b.name,a.penilai4 as penilai FROM setup_assessment a join employee b ON a.target=b.NIP) c LEFT JOIN (select * from assessment  where tahun=$tahun AND periode=$periode) d on c.target=d.target AND c.penilai=d.asesor) e JOIN employee f on e.penilai=f.nip) g LEFT JOIN (select * from assessment  where tahun=$tahun AND periode=$periode) h on g.target=h.target AND g.penilai=h.asesor order by g.name,g.nama_penilai");
		return $hasil->result();
	}
	public function delete_isian($id_assessment,$tahun,$periode) {
		//Query delete ... where id=...
		$this->db->query("delete from assessment where id_assessment=$id_assessment AND tahun=$tahun AND periode=$periode");
		
	}

	public function skala() {
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT * FROM setting where id=1");
		if($hasil->num_rows() > 0){
			return $hasil->row();
		}
		else {
			return array();
		}
	}

	public function update_skala($id, $data_skala) {
		//Query update from ... where id = ...
		$this->db->where('id', $id)
				 ->update('setting', $data_skala);
	}
	public function update_tahun($tahun) {
		//Query update from ... where id = ...
		$this->db->query("update setup_assessment set tahun='$tahun'");
	}
	public function update_setup_people($id, $data_people) {
		//Query update from ... where id = ...
		$this->db->where('id_asses', $id)
				 ->update('setup_assessment', $data_people);
	}
	function loaddata($dataarray) {
        for ($i = 0; $i < count($dataarray); $i++) {
            $data = array(
                'kode_unit' => $dataarray[$i]['kode_unit'],
                'q1' => $dataarray[$i]['q1'],
                'q2' => $dataarray[$i]['q2'],
                'q3' => $dataarray[$i]['q3'],
                'q4' => $dataarray[$i]['q4'],
                'q5' => $dataarray[$i]['q5'],
                'q6' => $dataarray[$i]['q6'],
                'q7' => $dataarray[$i]['q7'],
                'q8' => $dataarray[$i]['q8'],
                'q9' => $dataarray[$i]['q9'],
                'q10' => $dataarray[$i]['q10']
            );
            //ini untuk menambahkan apakah dalam tabel sudah ada data yang sama
            //apabila data sudah ada maka data di-skip
            // saya contohkan kalau ada data nama yang sama maka data tidak dimasukkan
            $this->db->where('kode_unit', $this->input->post('kode_unit'));            
            if ($cek) {
            	$this->db->insert('question', $data);
            }
        }
    }

    public function simpan($rowData){
            $data = array(
            	'kode_unit' => $rowData['0'][0],
                'q1' => $rowData['0'][1],
                'q2' => $rowData['0'][2],
                'q3' => $rowData['0'][3],
                'q4' => $rowData['0'][4],
                'q5' => $rowData['0'][5],
                'q6' => $rowData['0'][6],
                'q7' => $rowData['0'][7],
                'q8' => $rowData['0'][8],
                'q9' => $rowData['0'][9],
                'q10' => $rowData['0'][10]
            );
		//Query insert into
		$this->db->replace('question', $data);
	}

	function loaddata_upload($dataarray) {
        for ($i = 0; $i < count($dataarray); $i++) {
            $data = array(
                'id_assess' => $dataarray[$i]['id_assess'],
                'target' => $dataarray[$i]['target'],
                'penilai1' => $dataarray[$i]['penilai1'],
                'penilai2' => $dataarray[$i]['penilai2'],
                'penilai3' => $dataarray[$i]['penilai3'],
                'penilai4' => $dataarray[$i]['penilai4']
            );
            //ini untuk menambahkan apakah dalam tabel sudah ada data yang sama
            //apabila data sudah ada maka data di-skip
            // saya contohkan kalau ada data nama yang sama maka data tidak dimasukkan
            $this->db->where('id_asses', $this->input->post('id_asses'));            
            if ($cek) {
            	$this->db->insert('setup_assessment', $data);
            }
        }
    }

    public function simpan_upload($rowData){
            $data = array(
            	'id_asses' => $rowData['0'][0],
                'target' => $rowData['0'][1],
                'penilai1' => $rowData['0'][2],
                'penilai2' => $rowData['0'][3],
                'penilai3' => $rowData['0'][4],
                'penilai4' => $rowData['0'][5]
            );
		//Query insert into
		$this->db->replace('setup_assessment', $data);
	}

	public function simpan_kinerja($rowData){
            $data = array(
            	'nopeg' => $rowData['0'][0],
                'nilai' => $rowData['0'][1]
            );
		//Query insert into
		$this->db->replace('tb_kinerja', $data);
	}


	public function rekomendasi(){
		$hasil = $this->db->query("SELECT * FROM rekomendasi");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
	public function edit_rekomendasi($id, $data_rekomendasi) {
		//Query update from ... where id = ...
		$this->db->where('id_rekomendasi', $id)
				 ->update('rekomendasi', $data_rekomendasi);
	}
	public function get_kategori_PCM(){
		$hasil = $this->db->query("select 'Kategori A' as kategori,count(*) as jumlah from (select a.*,b.nilai as nilai_kinerja  from (SELECT a.target,b.*,SUM(rata) as nilai_360 FROM `assessment` a JOIN tb_pegawai b on a.target=b.NIP GROUP by target) a JOIN tb_kinerja b on a.target=b.nopeg where a.level='VP') a where nilai_360 > 90 AND nilai_kinerja >90 UNION
select 'Kategori B' as kategori,count(*) as jumlah from (select a.*,b.nilai as nilai_kinerja  from (SELECT a.target,b.*,SUM(rata) as nilai_360 FROM `assessment` a JOIN tb_pegawai b on a.target=b.NIP GROUP by target) a JOIN tb_kinerja b on a.target=b.nopeg where a.level='VP') a where (nilai_360 > 50 AND nilai_360 < 91) AND nilai_kinerja >90 UNION
select 'Kategori C' as kategori,count(*) as jumlah from (select a.*,b.nilai as nilai_kinerja  from (SELECT a.target,b.*,SUM(rata) as nilai_360 FROM `assessment` a JOIN tb_pegawai b on a.target=b.NIP GROUP by target) a JOIN tb_kinerja b on a.target=b.nopeg where a.level='VP') a where nilai_360 < 51 AND nilai_kinerja >90 UNION
select 'Kategori D' as kategori,count(*) as jumlah from (select a.*,b.nilai as nilai_kinerja  from (SELECT a.target,b.*,SUM(rata) as nilai_360 FROM `assessment` a JOIN tb_pegawai b on a.target=b.NIP GROUP by target) a JOIN tb_kinerja b on a.target=b.nopeg where a.level='VP') a where nilai_360 > 90 AND (nilai_kinerja >50 AND nilai_kinerja < 91) UNION
select 'Kategori E' as kategori,count(*) as jumlah from (select a.*,b.nilai as nilai_kinerja  from (SELECT a.target,b.*,SUM(rata) as nilai_360 FROM `assessment` a JOIN tb_pegawai b on a.target=b.NIP GROUP by target) a JOIN tb_kinerja b on a.target=b.nopeg where a.level='VP') a where (nilai_360 > 50 AND nilai_360 < 91) AND (nilai_kinerja >50 AND nilai_kinerja < 91) UNION
select 'Kategori F' as kategori,count(*) as jumlah from (select a.*,b.nilai as nilai_kinerja  from (SELECT a.target,b.*,SUM(rata) as nilai_360 FROM `assessment` a JOIN tb_pegawai b on a.target=b.NIP GROUP by target) a JOIN tb_kinerja b on a.target=b.nopeg where a.level='VP') a where nilai_360 < 51 AND (nilai_kinerja >50 AND nilai_kinerja < 91) UNION
select 'Kategori G' as kategori,count(*) as jumlah from (select a.*,b.nilai as nilai_kinerja  from (SELECT a.target,b.*,SUM(rata) as nilai_360 FROM `assessment` a JOIN tb_pegawai b on a.target=b.NIP GROUP by target) a JOIN tb_kinerja b on a.target=b.nopeg where a.level='VP') a where nilai_360 > 90 AND nilai_kinerja < 51 UNION
select 'Kategori H' as kategori,count(*) as jumlah from (select a.*,b.nilai as nilai_kinerja  from (SELECT a.target,b.*,SUM(rata) as nilai_360 FROM `assessment` a JOIN tb_pegawai b on a.target=b.NIP GROUP by target) a JOIN tb_kinerja b on a.target=b.nopeg where a.level='VP') a where (nilai_360 > 50 AND nilai_360 < 91) AND nilai_kinerja < 51 UNION
select 'Kategori H' as kategori,count(*) as jumlah from (select a.*,b.nilai as nilai_kinerja  from (SELECT a.target,b.*,SUM(rata) as nilai_360 FROM `assessment` a JOIN tb_pegawai b on a.target=b.NIP GROUP by target) a JOIN tb_kinerja b on a.target=b.nopeg where a.level='VP') a where nilai_360 < 51 AND nilai_kinerja < 51");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}


	public function get_kategoriA(){
		$hasil = $this->db->query("select 'Kategori A' as kategori,a.* from (select a.*,b.nilai as nilai_kinerja  from (SELECT a.target,b.*,SUM(rata) as nilai_360 FROM `assessment` a JOIN tb_pegawai b on a.target=b.NIP GROUP by target) a JOIN tb_kinerja b on a.target=b.nopeg where a.level='VP') a where nilai_360 > 90 AND nilai_kinerja >90");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
	public function get_kategoriB(){
		$hasil = $this->db->query("select 'Kategori B' as kategori,a.* from (select a.*,b.nilai as nilai_kinerja  from (SELECT a.target,b.*,SUM(rata) as nilai_360 FROM `assessment` a JOIN tb_pegawai b on a.target=b.NIP GROUP by target) a JOIN tb_kinerja b on a.target=b.nopeg where a.level='VP') a where (nilai_360 > 50 AND nilai_360 < 91) AND nilai_kinerja >90");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
	public function get_kategoriC(){
		$hasil = $this->db->query("select 'Kategori C' as kategori,a.* from (select a.*,b.nilai as nilai_kinerja  from (SELECT a.target,b.*,SUM(rata) as nilai_360 FROM `assessment` a JOIN tb_pegawai b on a.target=b.NIP GROUP by target) a JOIN tb_kinerja b on a.target=b.nopeg where a.level='VP') a where nilai_360 < 51 AND nilai_kinerja >90");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
	public function get_kategoriD(){
		$hasil = $this->db->query("select 'Kategori D' as kategori,a.* from (select a.*,b.nilai as nilai_kinerja  from (SELECT a.target,b.*,SUM(rata) as nilai_360 FROM `assessment` a JOIN tb_pegawai b on a.target=b.NIP GROUP by target) a JOIN tb_kinerja b on a.target=b.nopeg where a.level='VP') a where nilai_360 > 90 AND (nilai_kinerja >50 AND nilai_kinerja < 91)");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
	public function get_kategoriE(){
		$hasil = $this->db->query("select 'Kategori E' as kategori,a.* from (select a.*,b.nilai as nilai_kinerja  from (SELECT a.target,b.*,SUM(rata) as nilai_360 FROM `assessment` a JOIN tb_pegawai b on a.target=b.NIP GROUP by target) a JOIN tb_kinerja b on a.target=b.nopeg where a.level='VP') a where (nilai_360 > 50 AND nilai_360 < 91) AND (nilai_kinerja >50 AND nilai_kinerja < 91)");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
	public function get_kategoriF(){
		$hasil = $this->db->query("select 'Kategori F' as kategori,a.* from (select a.*,b.nilai as nilai_kinerja  from (SELECT a.target,b.*,SUM(rata) as nilai_360 FROM `assessment` a JOIN tb_pegawai b on a.target=b.NIP GROUP by target) a JOIN tb_kinerja b on a.target=b.nopeg where a.level='VP') a where nilai_360 < 51 AND (nilai_kinerja >50 AND nilai_kinerja < 91)");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
	public function get_kategoriG(){
		$hasil = $this->db->query("select 'Kategori G' as kategori,a.* from (select a.*,b.nilai as nilai_kinerja  from (SELECT a.target,b.*,SUM(rata) as nilai_360 FROM `assessment` a JOIN tb_pegawai b on a.target=b.NIP GROUP by target) a JOIN tb_kinerja b on a.target=b.nopeg where a.level='VP') a where nilai_360 > 90 AND nilai_kinerja < 51");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
	public function get_kategoriH(){
		$hasil = $this->db->query("select 'Kategori H' as kategori,a.* from (select a.*,b.nilai as nilai_kinerja  from (SELECT a.target,b.*,SUM(rata) as nilai_360 FROM `assessment` a JOIN tb_pegawai b on a.target=b.NIP GROUP by target) a JOIN tb_kinerja b on a.target=b.nopeg where a.level='VP') a where (nilai_360 > 50 AND nilai_360 < 91) AND nilai_kinerja < 51");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
	public function get_kategoriI(){
		$hasil = $this->db->query("select 'Kategori I' as kategori,a.* from (select a.*,b.nilai as nilai_kinerja  from (SELECT a.target,b.*,SUM(rata) as nilai_360 FROM `assessment` a JOIN tb_pegawai b on a.target=b.NIP GROUP by target) a JOIN tb_kinerja b on a.target=b.nopeg where a.level='VP') a where nilai_360 < 51 AND nilai_kinerja < 51");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}


	public function get_nilai_akhir(){
		$hasil = $this->db->query("select a.*,b.nilai as nilai_kinerja  from (SELECT a.target,b.*,SUM(rata) as nilai_360 FROM `assessment` a JOIN tb_pegawai b on a.target=b.NIP GROUP by target) a JOIN tb_kinerja b on a.target=b.nopeg");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}


	public function get_nilai_kinerja(){
		$hasil = $this->db->query("select * from tb_kinerja a JOIN tb_pegawai b on a.nopeg=b.NIP");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
	
	public function corporate($data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT 'Corporate' as corporate, AVG(b.rata) as rata FROM(SELECT a.target,a.name,a.unit,a.tahun,AVG(rata) as rata from (SELECT a.target,b.name,b.unit,a.tahun,a.periode, sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP where tahun=$tahun GROUP BY target,tahun,periode) a GROUP BY a.target)b");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function corporate1($data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT 'Corporate' as corporate, AVG(b.rata) as rata FROM(SELECT a.target,a.name,a.unit,a.tahun,AVG(rata) as rata from (SELECT a.target,b.name,b.unit,a.tahun,a.periode, sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP where tahun=$tahun AND periode=1 GROUP BY target,tahun,periode) a GROUP BY a.target)b");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function corporate2($data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT 'Corporate' as corporate, AVG(b.rata) as rata FROM(SELECT a.target,a.name,a.unit,a.tahun,AVG(rata) as rata from (SELECT a.target,b.name,b.unit,a.tahun,a.periode, sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP where tahun=$tahun AND periode=2 GROUP BY target,tahun,periode) a GROUP BY a.target)b");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function corporate3($data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT 'Corporate' as corporate, AVG(b.rata) as rata FROM(SELECT a.target,a.name,a.unit,a.tahun,AVG(rata) as rata from (SELECT a.target,b.name,b.unit,a.tahun,a.periode, sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP where tahun=$tahun AND periode=3 GROUP BY target,tahun,periode) a GROUP BY a.target)b");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function corporate4($data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT 'Corporate' as corporate, AVG(b.rata) as rata FROM(SELECT a.target,a.name,a.unit,a.tahun,AVG(rata) as rata from (SELECT a.target,b.name,b.unit,a.tahun,a.periode, sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP where tahun=$tahun AND periode=4 GROUP BY target,tahun,periode) a GROUP BY a.target)b");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function sumdimensicorporate($data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT SUM(nilai) as jumlah FROM (SELECT 'A' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun='$tahun' GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 90 and rata <= 100 UNION
SELECT 'B' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun='$tahun' GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 75 and rata < 90 UNION
SELECT 'C' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun='$tahun' GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 50 and rata < 75 UNION
SELECT 'D' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun='$tahun' GROUP BY target,tahun,periode) a group by target) a WHERE rata < 50)a");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function sumdimensicorporate1($data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT SUM(nilai) as jumlah FROM (SELECT 'A' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun='$tahun' AND periode=1 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 90 and rata <= 100 UNION
SELECT 'B' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun='$tahun' AND periode=1 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 75 and rata < 90 UNION
SELECT 'C' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun='$tahun' AND periode=1 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 50 and rata < 75 UNION
SELECT 'D' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun='$tahun' AND periode=1 GROUP BY target,tahun,periode) a group by target) a WHERE rata < 50)a");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function sumdimensicorporate2($data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT SUM(nilai) as jumlah FROM (SELECT 'A' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun='$tahun' AND periode=2 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 90 and rata <= 100 UNION
SELECT 'B' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun='$tahun' AND periode=2 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 75 and rata < 90 UNION
SELECT 'C' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun='$tahun' AND periode=2 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 50 and rata < 75 UNION
SELECT 'D' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun='$tahun' AND periode=2 GROUP BY target,tahun,periode) a group by target) a WHERE rata < 50)a");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function sumdimensicorporate3($data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT SUM(nilai) as jumlah FROM (SELECT 'A' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun='$tahun' AND periode=3 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 90 and rata <= 100 UNION
SELECT 'B' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun='$tahun' AND periode=3 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 75 and rata < 90 UNION
SELECT 'C' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun='$tahun' AND periode=3 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 50 and rata < 75 UNION
SELECT 'D' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun='$tahun' AND periode=3 GROUP BY target,tahun,periode) a group by target) a WHERE rata < 50)a");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function sumdimensicorporate4($data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT SUM(nilai) as jumlah FROM (SELECT 'A' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun='$tahun' AND periode=4 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 90 and rata <= 100 UNION
SELECT 'B' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun='$tahun' AND periode=4 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 75 and rata < 90 UNION
SELECT 'C' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun='$tahun' AND periode=4 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 50 and rata < 75 UNION
SELECT 'D' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun='$tahun' AND periode=4 GROUP BY target,tahun,periode) a group by target) a WHERE rata < 50)a");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function dimensicorporate($data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT 'A' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE  tahun='$tahun' GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 90 and rata <= 100 UNION
SELECT 'B' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE  tahun='$tahun' GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 75 and rata < 90 UNION
SELECT 'C' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE  tahun='$tahun' GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 50 and rata < 75 UNION
SELECT 'D' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE  tahun='$tahun' GROUP BY target,tahun,periode) a group by target) a WHERE rata < 50");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function dimensicorporate1($data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT 'A' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE  tahun='$tahun' AND periode=1 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 90 and rata <= 100 UNION
SELECT 'B' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE  tahun='$tahun' AND periode=1 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 75 and rata < 90 UNION
SELECT 'C' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE  tahun='$tahun' AND periode=1 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 50 and rata < 75 UNION
SELECT 'D' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE  tahun='$tahun' AND periode=1 GROUP BY target,tahun,periode) a group by target) a WHERE rata < 50");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function dimensicorporate2($data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT 'A' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE  tahun='$tahun' AND periode=2 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 90 and rata <= 100 UNION
SELECT 'B' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE  tahun='$tahun' AND periode=2 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 75 and rata < 90 UNION
SELECT 'C' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE  tahun='$tahun' AND periode=2 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 50 and rata < 75 UNION
SELECT 'D' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE  tahun='$tahun' AND periode=2 GROUP BY target,tahun,periode) a group by target) a WHERE rata < 50");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function dimensicorporate3($data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT 'A' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE  tahun='$tahun' AND periode=3 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 90 and rata <= 100 UNION
SELECT 'B' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE  tahun='$tahun' AND periode=3 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 75 and rata < 90 UNION
SELECT 'C' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE  tahun='$tahun' AND periode=3 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 50 and rata < 75 UNION
SELECT 'D' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE  tahun='$tahun' AND periode=3 GROUP BY target,tahun,periode) a group by target) a WHERE rata < 50");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function dimensicorporate4($data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT 'A' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun='$tahun' AND periode=4 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 90 and rata <= 100 UNION
SELECT 'B' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun='$tahun' AND periode=4 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 75 and rata < 90 UNION
SELECT 'C' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun='$tahun' AND periode=4 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 50 and rata < 75 UNION
SELECT 'D' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun='$tahun' AND periode=4 GROUP BY target,tahun,periode) a group by target) a WHERE rata < 50");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function listnilai($data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT a.target,a.name,AVG(a.rata) as rata FROM (SELECT a.target,b.name,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun GROUP BY target,tahun,periode)a GROUP by a.target order by rata DESC LIMIT 10");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function listnilaip1($data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT a.target,a.name,AVG(a.rata) as rata FROM (SELECT a.target,b.name,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun and periode=1 GROUP BY target,tahun,periode)a GROUP by a.target order by rata DESC LIMIT 10");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function listnilaip2($data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT a.target,a.name,AVG(a.rata) as rata FROM (SELECT a.target,b.name,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun and periode=2 GROUP BY target,tahun,periode)a GROUP by a.target order by rata DESC LIMIT 10");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function listnilaip3($data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT a.target,a.name,AVG(a.rata) as rata FROM (SELECT a.target,b.name,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun and periode=3 GROUP BY target,tahun,periode)a GROUP by a.target order by rata DESC LIMIT 10");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function listnilaip4($data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT a.target,a.name,AVG(a.rata) as rata FROM (SELECT a.target,b.name,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun and periode=4 GROUP BY target,tahun,periode)a GROUP by a.target order by rata DESC LIMIT 10");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}

	public function listnilaidirektur1($data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT a.direktorat, AVG(a.rata) as rata FROM (SELECT a.target,b.name,b.direktorat,b.unit,b.sitacode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun AND periode=1 GROUP BY a.target,a.tahun,a.periode)a GROUP BY a.direktorat");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}	
	public function listnilaidirektur2($data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT a.direktorat, AVG(a.rata) as rata FROM (SELECT a.target,b.name,b.direktorat,b.unit,b.sitacode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun AND periode=2 GROUP BY a.target,a.tahun,a.periode)a GROUP BY a.direktorat");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}	
	public function listnilaidirektur3($data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT a.direktorat, AVG(a.rata) as rata FROM (SELECT a.target,b.name,b.direktorat,b.unit,b.sitacode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun AND periode=3 GROUP BY a.target,a.tahun,a.periode)a GROUP BY a.direktorat");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}	
	public function listnilaidirektur4($data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT a.direktorat, AVG(a.rata) as rata FROM (SELECT a.target,b.name,b.direktorat,b.unit,b.sitacode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun AND periode=4 GROUP BY a.target,a.tahun,a.periode)a GROUP BY a.direktorat");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}	
	public function listnilaidirektur($data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT a.direktorat, AVG(a.rata) as rata FROM (SELECT a.target,b.name,b.direktorat,b.unit,b.sitacode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun GROUP BY a.target,a.tahun,a.periode)a GROUP BY a.direktorat");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function gaugecorporate($data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT SUM(nilai) as jumlah FROM (SELECT 'A' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE  tahun='$tahun' GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 90 and rata <= 100 UNION
SELECT 'B' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE  tahun='$tahun' GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 75 and rata < 90)a");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function nilai_dimensi1($data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("select b.id_rekomendasi,a.rata,a.Dimensi,b.top,b.bottom from (SELECT 'Collaborate' as Dimensi, avg(hasilq1) as rata,1 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun UNION
			SELECT 'Empower Diversity' as Dimensi, avg(hasilq2) as rata,2 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun UNION
			SELECT 'Honesty' as Dimensi, avg(hasilq3) as rata,3 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun UNION
			SELECT 'Commitment' as Dimensi, avg(hasilq4) as rata,4 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun UNION
			SELECT 'Care & Polite' as Dimensi, avg(hasilq5) as rata,5 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun UNION
			SELECT 'Fast & Easy' as Dimensi, avg(hasilq6) as rata,6 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun UNION
			SELECT 'Adaptive & Creative' as Dimensi, avg(hasilq7) as rata,7 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun UNION
			SELECT 'Persistent' as Dimensi, avg(hasilq8) as rata,8 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun UNION
			SELECT 'Compliance' as Dimensi, avg(hasilq9) as rata,9 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun UNION
			SELECT 'Risk Management' as Dimensi, avg(hasilq10) as rata,10 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun) a JOIN rekomendasi b on a.id=b.id_rekomendasi ORDER BY rata DESC");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function nilai_dimensip1($data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("select b.id_rekomendasi,a.rata,a.Dimensi,b.top,b.bottom from (SELECT 'Collaborate' as Dimensi, avg(hasilq1) as rata,1 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun and periode=1 UNION
			SELECT 'Empower Diversity' as Dimensi, avg(hasilq2) as rata,2 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun and periode=1 UNION
			SELECT 'Honesty' as Dimensi, avg(hasilq3) as rata,3 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun and periode=1 UNION
			SELECT 'Commitment' as Dimensi, avg(hasilq4) as rata,4 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun and periode=1 UNION
			SELECT 'Care & Polite' as Dimensi, avg(hasilq5) as rata,5 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun and periode=1 UNION
			SELECT 'Fast & Easy' as Dimensi, avg(hasilq6) as rata,6 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun and periode=1 UNION
			SELECT 'Adaptive & Creative' as Dimensi, avg(hasilq7) as rata,7 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun and periode=1 UNION
			SELECT 'Persistent' as Dimensi, avg(hasilq8) as rata,8 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun AND periode=1 UNION
			SELECT 'Compliance' as Dimensi, avg(hasilq9) as rata,9 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun and periode=1 UNION
			SELECT 'Risk Management' as Dimensi, avg(hasilq10) as rata,10 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun and periode=1) a JOIN rekomendasi b on a.id=b.id_rekomendasi ORDER BY rata DESC");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function nilai_dimensip2($data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("select b.id_rekomendasi,a.rata,a.Dimensi,b.top,b.bottom from (SELECT 'Collaborate' as Dimensi, avg(hasilq1) as rata,1 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun and periode=2 UNION
			SELECT 'Empower Diversity' as Dimensi, avg(hasilq2) as rata,2 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun and periode=2 UNION
			SELECT 'Honesty' as Dimensi, avg(hasilq3) as rata,3 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun and periode=2 UNION
			SELECT 'Commitment' as Dimensi, avg(hasilq4) as rata,4 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun and periode=2 UNION
			SELECT 'Care & Polite' as Dimensi, avg(hasilq5) as rata,5 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun and periode=2 UNION
			SELECT 'Fast & Easy' as Dimensi, avg(hasilq6) as rata,6 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun and periode=2 UNION
			SELECT 'Adaptive & Creative' as Dimensi, avg(hasilq7) as rata,7 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun and periode=2 UNION
			SELECT 'Persistent' as Dimensi, avg(hasilq8) as rata,8 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun AND periode=2 UNION
			SELECT 'Compliance' as Dimensi, avg(hasilq9) as rata,9 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun and periode=2 UNION
			SELECT 'Risk Management' as Dimensi, avg(hasilq10) as rata,10 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun and periode=2) a JOIN rekomendasi b on a.id=b.id_rekomendasi ORDER BY rata DESC");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function nilai_dimensip3($data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("select b.id_rekomendasi,a.rata,a.Dimensi,b.top,b.bottom from (SELECT 'Collaborate' as Dimensi, avg(hasilq1) as rata,1 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun and periode=3 UNION
			SELECT 'Empower Diversity' as Dimensi, avg(hasilq2) as rata,2 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun and periode=3 UNION
			SELECT 'Honesty' as Dimensi, avg(hasilq3) as rata,3 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun and periode=3 UNION
			SELECT 'Commitment' as Dimensi, avg(hasilq4) as rata,4 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun and periode=3 UNION
			SELECT 'Care & Polite' as Dimensi, avg(hasilq5) as rata,5 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun and periode=3 UNION
			SELECT 'Fast & Easy' as Dimensi, avg(hasilq6) as rata,6 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun and periode=3 UNION
			SELECT 'Adaptive & Creative' as Dimensi, avg(hasilq7) as rata,7 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun and periode=3 UNION
			SELECT 'Persistent' as Dimensi, avg(hasilq8) as rata,8 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun AND periode=3 UNION
			SELECT 'Compliance' as Dimensi, avg(hasilq9) as rata,9 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun and periode=3 UNION
			SELECT 'Risk Management' as Dimensi, avg(hasilq10) as rata,10 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun and periode=3) a JOIN rekomendasi b on a.id=b.id_rekomendasi ORDER BY rata DESC");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function nilai_dimensip4($data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("select b.id_rekomendasi,a.rata,a.Dimensi,b.top,b.bottom from (SELECT 'Collaborate' as Dimensi, avg(hasilq1) as rata,1 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun and periode=4 UNION
			SELECT 'Empower Diversity' as Dimensi, avg(hasilq2) as rata,2 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun and periode=4 UNION
			SELECT 'Honesty' as Dimensi, avg(hasilq3) as rata,3 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun and periode=4 UNION
			SELECT 'Commitment' as Dimensi, avg(hasilq4) as rata,4 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun and periode=4 UNION
			SELECT 'Care & Polite' as Dimensi, avg(hasilq5) as rata,5 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun and periode=4 UNION
			SELECT 'Fast & Easy' as Dimensi, avg(hasilq6) as rata,6 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun and periode=4 UNION
			SELECT 'Adaptive & Creative' as Dimensi, avg(hasilq7) as rata,7 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun and periode=4 UNION
			SELECT 'Persistent' as Dimensi, avg(hasilq8) as rata,8 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun AND periode=4 UNION
			SELECT 'Compliance' as Dimensi, avg(hasilq9) as rata,9 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun and periode=4 UNION
			SELECT 'Risk Management' as Dimensi, avg(hasilq10) as rata,10 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE tahun=$tahun and periode=4) a JOIN rekomendasi b on a.id=b.id_rekomendasi ORDER BY rata DESC");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
}