<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_chart2 extends CI_Model {

	public function sm($param,$data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT '$param' as sitacode,avg(a.rata) as rata FROM (SELECT a.sitacode,a.tahun, avg(a.rata) as rata FROM (SELECT a.target,b.sitacode,b.unit,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun=$tahun GROUP BY target,periode,tahun)a GROUP BY sitacode)a");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}

	public function sm1($param,$data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT '$param' as sitacode,avg(a.rata) as rata FROM (SELECT a.sitacode,a.tahun, avg(a.rata) as rata FROM (SELECT a.target,b.sitacode,b.unit,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun=$tahun AND periode=1 GROUP BY target,periode,tahun)a GROUP BY sitacode)a");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function sm2($param,$data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT '$param' as sitacode,avg(a.rata) as rata FROM (SELECT a.sitacode,a.tahun, avg(a.rata) as rata FROM (SELECT a.target,b.sitacode,b.unit,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun=$tahun AND periode=2 GROUP BY target,periode,tahun)a GROUP BY sitacode)a");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function sm3($param,$data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT '$param' as sitacode,avg(a.rata) as rata FROM (SELECT a.sitacode,a.tahun, avg(a.rata) as rata FROM (SELECT a.target,b.sitacode,b.unit,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun=$tahun AND periode=3 GROUP BY target,periode,tahun)a GROUP BY sitacode)a");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function sm4($param,$data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT '$param' as sitacode,avg(a.rata) as rata FROM (SELECT a.sitacode,a.tahun, avg(a.rata) as rata FROM (SELECT a.target,b.sitacode,b.unit,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun=$tahun AND periode=4 GROUP BY target,periode,tahun)a GROUP BY sitacode)a");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	
	public function listnilai($param,$data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT a.target,a.name,AVG(a.rata) as rata FROM (SELECT a.target,b.name,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' and tahun=$tahun GROUP BY target,tahun,periode)a GROUP by a.target order by rata DESC LIMIT 10");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function listnilaip1($param,$data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT a.target,a.name,AVG(a.rata) as rata FROM (SELECT a.target,b.name,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' and tahun=$tahun and periode=1 GROUP BY target,tahun,periode)a GROUP by a.target order by rata DESC LIMIT 10");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function listnilaip2($param,$data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT a.target,a.name,AVG(a.rata) as rata FROM (SELECT a.target,b.name,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' and tahun=$tahun and periode=2 GROUP BY target,tahun,periode)a GROUP by a.target order by rata DESC LIMIT 10");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function listnilaip3($param,$data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT a.target,a.name,AVG(a.rata) as rata FROM (SELECT a.target,b.name,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' and tahun=$tahun and periode=3 GROUP BY target,tahun,periode)a GROUP by a.target order by rata DESC LIMIT 10");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function listnilaip4($param,$data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT a.target,a.name,AVG(a.rata) as rata FROM (SELECT a.target,b.name,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' and tahun=$tahun and periode=4 GROUP BY target,tahun,periode)a GROUP by a.target order by rata DESC LIMIT 10");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}

	public function topunit($param){
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT a.target,b.name,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE unit ='$param' GROUP BY target order by rata DESC LIMIT 3");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function botunit($param){
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT a.target,b.name,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE unit ='$param' GROUP BY target order by rata ASC LIMIT 3");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function dimensiunit($param,$data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT 'A' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 90 and rata <= 100 UNION
SELECT 'B' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 75 and rata < 90 UNION
SELECT 'C' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 50 and rata < 75 UNION
SELECT 'D' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' GROUP BY target,tahun,periode) a group by target) a WHERE rata < 50");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function dimensiunit1($param,$data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT 'A' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' AND periode=1 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 90 and rata <= 100 UNION
SELECT 'B' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' AND periode=1 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 75 and rata < 90 UNION
SELECT 'C' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' AND periode=1 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 50 and rata < 75 UNION
SELECT 'D' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' AND periode=1 GROUP BY target,tahun,periode) a group by target) a WHERE rata < 50");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function dimensiunit2($param,$data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT 'A' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' AND periode=2 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 90 and rata <= 100 UNION
SELECT 'B' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' AND periode=2 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 75 and rata < 90 UNION
SELECT 'C' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' AND periode=2 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 50 and rata < 75 UNION
SELECT 'D' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' AND periode=2 GROUP BY target,tahun,periode) a group by target) a WHERE rata < 50");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function dimensiunit3($param,$data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT 'A' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' AND periode=3 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 90 and rata <= 100 UNION
SELECT 'B' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' AND periode=3 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 75 and rata < 90 UNION
SELECT 'C' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' AND periode=3 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 50 and rata < 75 UNION
SELECT 'D' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' AND periode=3 GROUP BY target,tahun,periode) a group by target) a WHERE rata < 50");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function dimensiunit4($param,$data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT 'A' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' AND periode=4 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 90 and rata <= 100 UNION
SELECT 'B' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' AND periode=4 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 75 and rata < 90 UNION
SELECT 'C' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' AND periode=4 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 50 and rata < 75 UNION
SELECT 'D' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' AND periode=4 GROUP BY target,tahun,periode) a group by target) a WHERE rata < 50");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function sumdimensiunit($param,$data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT SUM(nilai) as jumlah FROM (SELECT 'A' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 90 and rata <= 100 UNION
SELECT 'B' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 75 and rata < 90 UNION
SELECT 'C' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 50 and rata < 75 UNION
SELECT 'D' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' GROUP BY target,tahun,periode) a group by target) a WHERE rata < 50)a");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function sumdimensiunit1($param,$data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT SUM(nilai) as jumlah FROM (SELECT 'A' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' AND periode=1 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 90 and rata <= 100 UNION
SELECT 'B' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' AND periode=1 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 75 and rata < 90 UNION
SELECT 'C' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' AND periode=1 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 50 and rata < 75 UNION
SELECT 'D' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' AND periode=1 GROUP BY target,tahun,periode) a group by target) a WHERE rata < 50)a");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function sumdimensiunit2($param,$data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT SUM(nilai) as jumlah FROM (SELECT 'A' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' AND periode=2 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 90 and rata <= 100 UNION
SELECT 'B' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' AND periode=2 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 75 and rata < 90 UNION
SELECT 'C' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' AND periode=2 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 50 and rata < 75 UNION
SELECT 'D' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' AND periode=2 GROUP BY target,tahun,periode) a group by target) a WHERE rata < 50)a");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function sumdimensiunit3($param,$data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT SUM(nilai) as jumlah FROM (SELECT 'A' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' AND periode=3 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 90 and rata <= 100 UNION
SELECT 'B' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' AND periode=3 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 75 and rata < 90 UNION
SELECT 'C' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' AND periode=3 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 50 and rata < 75 UNION
SELECT 'D' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' AND periode=3 GROUP BY target,tahun,periode) a group by target) a WHERE rata < 50)a");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function sumdimensiunit4($param,$data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT SUM(nilai) as jumlah FROM (SELECT 'A' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' AND periode=4 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 90 and rata <= 100 UNION
SELECT 'B' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' AND periode=4 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 75 and rata < 90 UNION
SELECT 'C' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' AND periode=4 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 50 and rata < 75 UNION
SELECT 'D' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' AND periode=4 GROUP BY target,tahun,periode) a group by target) a WHERE rata < 50)a");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}

	public function listnilai2($param){
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT a.target,b.name, b.unit, sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.direktorat='$param' GROUP BY target ORDER BY rata DESC LIMIT 10");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function direktorat($param,$data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT b.direktorat, AVG(b.rata) as rata FROM(SELECT a.target,a.name,a.direktorat,a.tahun,AVG(rata) as rata from (SELECT a.target,b.name,b.direktorat,a.tahun,a.periode, sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.direktorat='$param' AND tahun=$tahun GROUP BY target,tahun,periode)a group by a.target)b");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function direktorat1($param,$data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT b.direktorat, AVG(b.rata) as rata FROM(SELECT a.target,a.name,a.direktorat,a.tahun,AVG(rata) as rata from (SELECT a.target,b.name,b.direktorat,a.tahun,a.periode, sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.direktorat='$param' AND tahun=$tahun AND periode=1 GROUP BY target,tahun,periode)a group by a.target)b");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function direktorat2($param,$data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT b.direktorat, AVG(b.rata) as rata FROM(SELECT a.target,a.name,a.direktorat,a.tahun,AVG(rata) as rata from (SELECT a.target,b.name,b.direktorat,a.tahun,a.periode, sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.direktorat='$param' AND tahun=$tahun AND periode=2 GROUP BY target,tahun,periode)a group by a.target)b");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function direktorat3($param,$data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT b.direktorat, AVG(b.rata) as rata FROM(SELECT a.target,a.name,a.direktorat,a.tahun,AVG(rata) as rata from (SELECT a.target,b.name,b.direktorat,a.tahun,a.periode, sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.direktorat='$param' AND tahun=$tahun AND periode=3 GROUP BY target,tahun,periode)a group by a.target)b");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function direktorat4($param,$data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT b.direktorat, AVG(b.rata) as rata FROM(SELECT a.target,a.name,a.direktorat,a.tahun,AVG(rata) as rata from (SELECT a.target,b.name,b.direktorat,a.tahun,a.periode, sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.direktorat='$param' AND tahun=$tahun AND periode=4 GROUP BY target,tahun,periode)a group by a.target)b");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function namedir($param){
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT a.NIP, b.direktorat FROM tb_pegawai a JOIN unit b ON a.unit=b.unit WHERE a.NIP='$param'");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function dimensidir($param){
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT 'a' as kategori, COUNT(*) as nilai FROM (SELECT a.target,b.name,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE direktorat ='$param' GROUP BY target) a WHERE rata > 90 and rata <= 100 UNION SELECT 'b' as kategori, COUNT(*) as nilai FROM (SELECT a.target,b.name,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE direktorat ='$param' GROUP BY target) a WHERE rata > 75 and rata <= 90 UNION SELECT 'c' as kategori, COUNT(*) as nilai FROM (SELECT a.target,b.name,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE direktorat ='$param' GROUP BY target) a WHERE rata > 50 and rata <= 75 UNION SELECT 'd' as kategori, COUNT(*) as nilai FROM (SELECT a.target,b.name,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE direktorat ='$param' GROUP BY target) a WHERE rata >= 0 and rata <= 50");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function sumdimensidir($param){
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT SUM(a.nilai) as jumlah FROM (SELECT 'a' as kategori, COUNT(*) as nilai FROM (SELECT a.target,b.name,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE direktorat ='$param' GROUP BY target) a WHERE rata > 90 and rata <= 100 UNION SELECT 'b' as kategori, COUNT(*) as nilai FROM (SELECT a.target,b.name,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE direktorat ='$param' GROUP BY target) a WHERE rata > 75 and rata <= 90 UNION SELECT 'c' as kategori, COUNT(*) as nilai FROM (SELECT a.target,b.name,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE direktorat ='$param' GROUP BY target) a WHERE rata > 50 and rata <= 75 UNION SELECT 'd' as kategori, COUNT(*) as nilai FROM (SELECT a.target,b.name,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE direktorat ='$param' GROUP BY target) a WHERE rata >= 0 and rata <= 50) a");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function topdir($param){
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT a.target,b.name, b.unit,direktorat, sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.direktorat='$param' GROUP BY target ORDER BY rata DESC LIMIT 3");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function botdir($param){
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT a.target,b.name, b.unit,b.direktorat, sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.direktorat='$param' GROUP BY target ORDER BY rata ASC LIMIT 3");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function topdimensiunit($param,$data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT 'Collaborate' as Dimensi, avg(hasilq1) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' UNION
			SELECT 'Empower Diversity' as Dimensi, avg(hasilq2) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' UNION
			SELECT 'Honesty' as Dimensi, avg(hasilq3) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' UNION
			SELECT 'Commitment' as Dimensi, avg(hasilq4) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' UNION
			SELECT 'Care & Polite' as Dimensi, avg(hasilq5) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' UNION
			SELECT 'Fast & Easy' as Dimensi, avg(hasilq6) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' UNION
			SELECT 'Adaptive & Creative' as Dimensi, avg(hasilq7) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' UNION
			SELECT 'Persistent' as Dimensi, avg(hasilq8) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' UNION
			SELECT 'Compliance' as Dimensi, avg(hasilq9) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' UNION
			SELECT 'Risk Management' as Dimensi, avg(hasilq10) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' ORDER BY rata DESC");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function botdimensiunit($param,$data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT 'Collaborate' as Dimensi, avg(hasilq1) as rata,1 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' UNION
			SELECT 'Empower Diversity' as Dimensi, avg(hasilq2) as rata,2 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' UNION
			SELECT 'Honesty' as Dimensi, avg(hasilq3) as rata,3 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' UNION
			SELECT 'Commitment' as Dimensi, avg(hasilq4) as rata,4 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' UNION
			SELECT 'Care & Polite' as Dimensi, avg(hasilq5) as rata,5 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' UNION
			SELECT 'Fast & Easy' as Dimensi, avg(hasilq6) as rata,6 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' UNION
			SELECT 'Adaptive & Creative' as Dimensi, avg(hasilq7) as rata,7 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' UNION
			SELECT 'Persistent' as Dimensi, avg(hasilq8) as rata,8 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' UNION
			SELECT 'Compliance' as Dimensi, avg(hasilq9) as rata,9 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' UNION
			SELECT 'Risk Management' as Dimensi, avg(hasilq10) as rata,10 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' order by rata DESC");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}

	public function nilai_dimensi1($param,$data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("select b.id_rekomendasi,a.rata,a.Dimensi,b.top,b.bottom from (SELECT 'Collaborate' as Dimensi, avg(hasilq1) as rata,1 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' UNION
			SELECT 'Empower Diversity' as Dimensi, avg(hasilq2) as rata,2 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' UNION
			SELECT 'Honesty' as Dimensi, avg(hasilq3) as rata,3 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' UNION
			SELECT 'Commitment' as Dimensi, avg(hasilq4) as rata,4 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' UNION
			SELECT 'Care & Polite' as Dimensi, avg(hasilq5) as rata,5 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' UNION
			SELECT 'Fast & Easy' as Dimensi, avg(hasilq6) as rata,6 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' UNION
			SELECT 'Adaptive & Creative' as Dimensi, avg(hasilq7) as rata,7 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' UNION
			SELECT 'Persistent' as Dimensi, avg(hasilq8) as rata,8 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' UNION
			SELECT 'Compliance' as Dimensi, avg(hasilq9) as rata,9 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' UNION
			SELECT 'Risk Management' as Dimensi, avg(hasilq10) as rata,10 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun') a JOIN rekomendasi b on a.id=b.id_rekomendasi ORDER BY rata DESC");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function nilai_dimensip1($param,$data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("select b.id_rekomendasi,a.rata,a.Dimensi,b.top,b.bottom from (SELECT 'Collaborate' as Dimensi, avg(hasilq1) as rata,1 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' and periode=1 UNION
			SELECT 'Empower Diversity' as Dimensi, avg(hasilq2) as rata,2 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' and periode=1 UNION
			SELECT 'Honesty' as Dimensi, avg(hasilq3) as rata,3 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' and periode=1 UNION
			SELECT 'Commitment' as Dimensi, avg(hasilq4) as rata,4 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' and periode=1 UNION
			SELECT 'Care & Polite' as Dimensi, avg(hasilq5) as rata,5 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' and periode=1 UNION
			SELECT 'Fast & Easy' as Dimensi, avg(hasilq6) as rata,6 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' and periode=1 UNION
			SELECT 'Adaptive & Creative' as Dimensi, avg(hasilq7) as rata,7 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' and periode=1 UNION
			SELECT 'Persistent' as Dimensi, avg(hasilq8) as rata,8 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' AND periode=1 UNION
			SELECT 'Compliance' as Dimensi, avg(hasilq9) as rata,9 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' and periode=1 UNION
			SELECT 'Risk Management' as Dimensi, avg(hasilq10) as rata,10 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' and periode=1) a JOIN rekomendasi b on a.id=b.id_rekomendasi ORDER BY rata DESC");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function nilai_dimensip2($param,$data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("select b.id_rekomendasi,a.rata,a.Dimensi,b.top,b.bottom from (SELECT 'Collaborate' as Dimensi, avg(hasilq1) as rata,1 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' and periode=2 UNION
			SELECT 'Empower Diversity' as Dimensi, avg(hasilq2) as rata,2 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' and periode=2 UNION
			SELECT 'Honesty' as Dimensi, avg(hasilq3) as rata,3 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' and periode=2 UNION
			SELECT 'Commitment' as Dimensi, avg(hasilq4) as rata,4 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' and periode=2 UNION
			SELECT 'Care & Polite' as Dimensi, avg(hasilq5) as rata,5 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' and periode=2 UNION
			SELECT 'Fast & Easy' as Dimensi, avg(hasilq6) as rata,6 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' and periode=2 UNION
			SELECT 'Adaptive & Creative' as Dimensi, avg(hasilq7) as rata,7 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' and periode=2 UNION
			SELECT 'Persistent' as Dimensi, avg(hasilq8) as rata,8 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' AND periode=2 UNION
			SELECT 'Compliance' as Dimensi, avg(hasilq9) as rata,9 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' and periode=2 UNION
			SELECT 'Risk Management' as Dimensi, avg(hasilq10) as rata,10 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' and periode=2) a JOIN rekomendasi b on a.id=b.id_rekomendasi ORDER BY rata DESC");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function nilai_dimensip3($param,$data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("select b.id_rekomendasi,a.rata,a.Dimensi,b.top,b.bottom from (SELECT 'Collaborate' as Dimensi, avg(hasilq1) as rata,1 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' and periode=3 UNION
			SELECT 'Empower Diversity' as Dimensi, avg(hasilq2) as rata,2 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' and periode=3 UNION
			SELECT 'Honesty' as Dimensi, avg(hasilq3) as rata,3 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' and periode=3 UNION
			SELECT 'Commitment' as Dimensi, avg(hasilq4) as rata,4 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' and periode=3 UNION
			SELECT 'Care & Polite' as Dimensi, avg(hasilq5) as rata,5 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' and periode=3 UNION
			SELECT 'Fast & Easy' as Dimensi, avg(hasilq6) as rata,6 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' and periode=3 UNION
			SELECT 'Adaptive & Creative' as Dimensi, avg(hasilq7) as rata,7 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' and periode=3 UNION
			SELECT 'Persistent' as Dimensi, avg(hasilq8) as rata,8 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' AND periode=3 UNION
			SELECT 'Compliance' as Dimensi, avg(hasilq9) as rata,9 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' and periode=3 UNION
			SELECT 'Risk Management' as Dimensi, avg(hasilq10) as rata,10 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' and periode=3) a JOIN rekomendasi b on a.id=b.id_rekomendasi ORDER BY rata DESC");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function nilai_dimensip4($param,$data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("select b.id_rekomendasi,a.rata,a.Dimensi,b.top,b.bottom from (SELECT 'Collaborate' as Dimensi, avg(hasilq1) as rata,1 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' and periode=4 UNION
			SELECT 'Empower Diversity' as Dimensi, avg(hasilq2) as rata,2 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' and periode=4 UNION
			SELECT 'Honesty' as Dimensi, avg(hasilq3) as rata,3 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' and periode=4 UNION
			SELECT 'Commitment' as Dimensi, avg(hasilq4) as rata,4 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' and periode=4 UNION
			SELECT 'Care & Polite' as Dimensi, avg(hasilq5) as rata,5 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' and periode=4 UNION
			SELECT 'Fast & Easy' as Dimensi, avg(hasilq6) as rata,6 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' and periode=4 UNION
			SELECT 'Adaptive & Creative' as Dimensi, avg(hasilq7) as rata,7 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' and periode=4 UNION
			SELECT 'Persistent' as Dimensi, avg(hasilq8) as rata,8 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' AND periode=4 UNION
			SELECT 'Compliance' as Dimensi, avg(hasilq9) as rata,9 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' and periode=4 UNION
			SELECT 'Risk Management' as Dimensi, avg(hasilq10) as rata,10 id FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.sitacode LIKE '$param%' AND tahun='$tahun' and periode=4) a JOIN rekomendasi b on a.id=b.id_rekomendasi ORDER BY rata DESC");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}

	public function gaugeunit($param,$data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT SUM(nilai) as jumlah FROM (SELECT 'A' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 90 and rata <= 100 UNION
SELECT 'B' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 75 and rata < 90)a");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function gaugeunit1($param,$data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT SUM(nilai) as jumlah FROM (SELECT 'A' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' and periode=1 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 90 and rata <= 100 UNION
SELECT 'B' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' and periode=1 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 75 and rata < 90)a");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function gaugeunit2($param,$data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT SUM(nilai) as jumlah FROM (SELECT 'A' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' and periode=2 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 90 and rata <= 100 UNION
SELECT 'B' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' and periode=2 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 75 and rata < 90)a");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function gaugeunit3($param,$data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT SUM(nilai) as jumlah FROM (SELECT 'A' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' and periode=3 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 90 and rata <= 100 UNION
SELECT 'B' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' and periode=3 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 75 and rata < 90)a");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function gaugeunit4($param,$data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT SUM(nilai) as jumlah FROM (SELECT 'A' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' and periode=4 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 90 and rata <= 100 UNION
SELECT 'B' as kategori, COUNT(*) as nilai FROM (SELECT a.target,a.name,a.tahun,AVG(a.rata) as rata from (SELECT a.target,b.name,a.tahun,a.periode,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE sitacode LIKE '$param%' AND tahun='$tahun' and periode=4 GROUP BY target,tahun,periode) a group by target) a WHERE rata >= 75 and rata < 90)a");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function gaugedir($param){
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT COUNT(a.nilai) as Jumlah FROM (SELECT 'a' as kategori, COUNT(*) as nilai FROM (SELECT a.target,b.name,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE direktorat ='$param' GROUP BY target) a WHERE rata > 90 and rata <= 100 UNION SELECT 'b' as kategori, COUNT(*) as nilai FROM (SELECT a.target,b.name,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.direktorat ='$param' GROUP BY target) a WHERE rata > 75 and rata <= 90) a");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function listunit($param){
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT a.unit, AVG(a.rata) as rata FROM (SELECT a.target,b.name, b.unit,direktorat, sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.direktorat='$param' GROUP BY target ORDER BY rata DESC) a GROUP BY a.unit ORDER BY a.rata DESC");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}

	public function topdimensidir($param){
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT 'Collaborate' as Dimensi, avg(hasilq1) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.direktorat='$param' UNION SELECT 'Empower Diversity' as Dimensi, avg(hasilq2) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.direktorat='$param' UNION
			SELECT 'Honesty' as Dimensi, avg(hasilq3) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.direktorat='$param' UNION
			SELECT 'Commitment' as Dimensi, avg(hasilq4) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.direktorat='$param' UNION SELECT 'Care & Polite' as Dimensi, avg(hasilq5) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.direktorat='$param' UNION
			SELECT 'Fast & Easy' as Dimensi, avg(hasilq6) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.direktorat='$param' UNION
			SELECT 'Adaptive & Creative' as Dimensi, avg(hasilq7) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.direktorat='$param' UNION
			SELECT 'Persistent' as Dimensi, avg(hasilq8) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.direktorat='$param' UNION
			SELECT 'Compliance' as Dimensi, avg(hasilq9) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.direktorat='$param' UNION
			SELECT 'Risk Management' as Dimensi, avg(hasilq10) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.direktorat='$param' ORDER BY rata DESC LIMIT 3");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function botdimensidir($param){
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT 'Collaborate' as Dimensi, avg(hasilq1) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.direktorat='$param' UNION SELECT 'Empower Diversity' as Dimensi, avg(hasilq2) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.direktorat='$param' UNION
			SELECT 'Honesty' as Dimensi, avg(hasilq3) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.direktorat='$param' UNION
			SELECT 'Commitment' as Dimensi, avg(hasilq4) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.direktorat='$param' UNION SELECT 'Care & Polite' as Dimensi, avg(hasilq5) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.direktorat='$param' UNION
			SELECT 'Fast & Easy' as Dimensi, avg(hasilq6) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.direktorat='$param' UNION
			SELECT 'Adaptive & Creative' as Dimensi, avg(hasilq7) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.direktorat='$param' UNION
			SELECT 'Persistent' as Dimensi, avg(hasilq8) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.direktorat='$param' UNION
			SELECT 'Compliance' as Dimensi, avg(hasilq9) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.direktorat='$param' UNION
			SELECT 'Risk Management' as Dimensi, avg(hasilq10) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.direktorat='$param' ORDER BY rata ASC LIMIT 3");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
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
	public function dir($param){
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT b.direktorat, AVG(b.rata) as rata FROM(SELECT a.target,b.name,b.direktorat, sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE b.direktorat='$param' GROUP BY target) b");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function listnilaim($param,$data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("select * from (SELECT c.sitacode, AVG(c.rata) as rata FROM (SELECT a.target,a.name,a.sitacode, AVG(a.rata) as rata FROM (SELECT a.target,b.name,b.sitacode, sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE unit ='$param' and length(b.sitacode) >= 6 AND tahun=$tahun GROUP BY a.target,a.tahun,a.periode)a GROUP BY a.target)c GROUP BY c.sitacode)d where length(d.sitacode)>6");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function listnilaim1($param,$data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("select * from (SELECT c.sitacode, AVG(c.rata) as rata FROM (SELECT a.target,a.name,a.sitacode, AVG(a.rata) as rata FROM (SELECT a.target,b.name,b.sitacode, sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE unit ='$param' and length(b.sitacode) >= 6 AND tahun=$tahun AND periode=1 GROUP BY a.target,a.tahun,a.periode)a GROUP BY a.target)c GROUP BY c.sitacode)d where length(d.sitacode)>6");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}	
	public function listnilaim2($param,$data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("select * from (SELECT c.sitacode, AVG(c.rata) as rata FROM (SELECT a.target,a.name,a.sitacode, AVG(a.rata) as rata FROM (SELECT a.target,b.name,b.sitacode, sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE unit ='$param' and length(b.sitacode) >= 6 AND tahun=$tahun AND periode=2 GROUP BY a.target,a.tahun,a.periode)a GROUP BY a.target)c GROUP BY c.sitacode)d where length(d.sitacode)>6");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}	
	public function listnilaim3($param,$data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("select * from (SELECT c.sitacode, AVG(c.rata) as rata FROM (SELECT a.target,a.name,a.sitacode, AVG(a.rata) as rata FROM (SELECT a.target,b.name,b.sitacode, sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE unit ='$param' and length(b.sitacode) >= 6 AND tahun=$tahun AND periode=3 GROUP BY a.target,a.tahun,a.periode)a GROUP BY a.target)c GROUP BY c.sitacode)d where length(d.sitacode)>6");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}	
	public function listnilaim4($param,$data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("select * from (SELECT c.sitacode, AVG(c.rata) as rata FROM (SELECT a.target,a.name,a.sitacode, AVG(a.rata) as rata FROM (SELECT a.target,b.name,b.sitacode, sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE unit ='$param' and length(b.sitacode) >= 6 AND tahun=$tahun AND periode=4 GROUP BY a.target,a.tahun,a.periode)a GROUP BY a.target)c GROUP BY c.sitacode)d where length(d.sitacode)>6");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}	
	public function listnilaism($param,$data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT substring(c.sitacode,1,6) as SM, AVG(c.rata) as rata FROM (SELECT a.target,a.name,a.sitacode, AVG(a.rata) as rata FROM (SELECT a.target,b.name,b.sitacode, sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE unit ='$param' and length(b.sitacode) >= 6 AND tahun=$tahun GROUP BY a.target,a.tahun,a.periode) a GROUP BY a.target) c GROUP BY substring(c.sitacode,1,6)");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}	
	public function listnilaism1($param,$data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT substring(c.sitacode,1,6) as SM, AVG(c.rata) as rata FROM (SELECT a.target,a.name,a.sitacode, AVG(a.rata) as rata FROM (SELECT a.target,b.name,b.sitacode, sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE unit ='$param' and length(b.sitacode) >= 6 AND tahun=$tahun AND periode=1 GROUP BY a.target,a.tahun,a.periode) a GROUP BY a.target) c GROUP BY substring(c.sitacode,1,6)");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}	
	public function listnilaism2($param,$data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT substring(c.sitacode,1,6) as SM, AVG(c.rata) as rata FROM (SELECT a.target,a.name,a.sitacode, AVG(a.rata) as rata FROM (SELECT a.target,b.name,b.sitacode, sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE unit ='$param' and length(b.sitacode) >= 6 AND tahun=$tahun AND periode=2 GROUP BY a.target,a.tahun,a.periode) a GROUP BY a.target) c GROUP BY substring(c.sitacode,1,6)");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}	
	public function listnilaism3($param,$data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT substring(c.sitacode,1,6) as SM, AVG(c.rata) as rata FROM (SELECT a.target,a.name,a.sitacode, AVG(a.rata) as rata FROM (SELECT a.target,b.name,b.sitacode, sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE unit ='$param' and length(b.sitacode) >= 6 AND tahun=$tahun AND periode=3 GROUP BY a.target,a.tahun,a.periode) a GROUP BY a.target) c GROUP BY substring(c.sitacode,1,6)");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}	
	public function listnilaism4($param,$data){
		$tahun=$data['tahun'];
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT substring(c.sitacode,1,6) as SM, AVG(c.rata) as rata FROM (SELECT a.target,a.name,a.sitacode, AVG(a.rata) as rata FROM (SELECT a.target,b.name,b.sitacode, sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE unit ='$param' and length(b.sitacode) >= 6 AND tahun=$tahun AND periode=4 GROUP BY a.target,a.tahun,a.periode) a GROUP BY a.target) c GROUP BY substring(c.sitacode,1,6)");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}	
	public function nilaism($param){
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT substring(c.sitacode,1,6) as SM, AVG(c.rata) as rata FROM (SELECT a.target,b.name,b.sitacode, sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE length(b.sitacode) = 6 and substring(sitacode,1,6)='$param' GROUP BY a.target) c GROUP BY substring(c.sitacode,1,6)");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function dimensism($param){
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT 'a' as kategori, COUNT(*) as nilai FROM (SELECT a.target,b.name,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE substring(sitacode,1,6) ='$param' GROUP BY target) a WHERE rata >= 90 and rata <= 100 UNION SELECT 'b' as kategori, COUNT(*) as nilai FROM (SELECT a.target,b.name,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE substring(sitacode,1,6) ='$param' GROUP BY target) a WHERE rata >= 75 and rata < 90 UNION SELECT 'c' as kategori, COUNT(*) as nilai FROM (SELECT a.target,b.name,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE substring(sitacode,1,6) ='$param' GROUP BY target) a WHERE rata >= 50 and rata < 75 UNION SELECT 'd' as kategori, COUNT(*) as nilai FROM (SELECT a.target,b.name,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE substring(sitacode,1,6) ='$param' GROUP BY target) a WHERE rata >= 0 and rata < 50");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function sumdimensism($param){
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT SUM(x.nilai) as jumlah FROM (SELECT 'a' as kategori, COUNT(*) as nilai FROM (SELECT a.target,b.name,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE substring(sitacode,1,6) ='$param' GROUP BY target) a WHERE rata > 90 and rata <= 100 UNION SELECT 'b' as kategori, COUNT(*) as nilai FROM (SELECT a.target,b.name,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE substring(sitacode,1,6) ='$param' GROUP BY target) a WHERE rata > 75 and rata <= 90 UNION SELECT 'c' as kategori, COUNT(*) as nilai FROM (SELECT a.target,b.name,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE substring(sitacode,1,6) ='$param' GROUP BY target) a WHERE rata > 50 and rata <= 75 UNION SELECT 'd' as kategori, COUNT(*) as nilai FROM (SELECT a.target,b.name,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE substring(sitacode,1,6) ='$param' GROUP BY target) a WHERE rata >= 0 and rata <= 50) x");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function listnilaism5($param){
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT a.target,b.name,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE substring(sitacode,1,6) ='$param' GROUP BY target ORDER BY rata DESC");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function topdimensism($param){
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT 'Collaborate' as Dimensi, avg(hasilq1) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE substring(sitacode,1,6)='$param'
			UNION
			SELECT 'Empower Diversity' as Dimensi, avg(hasilq2) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE substring(sitacode,1,6)='$param'
			UNION
			SELECT 'Honesty' as Dimensi, avg(hasilq3) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE substring(sitacode,1,6)='$param'
			UNION
			SELECT 'Commitment' as Dimensi, avg(hasilq4) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE substring(sitacode,1,6)='$param'
			UNION
			SELECT 'Care & Polite' as Dimensi, avg(hasilq5) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE substring(sitacode,1,6)='$param'
			UNION
			SELECT 'Fast & Easy' as Dimensi, avg(hasilq6) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE substring(sitacode,1,6)='$param'
			UNION
			SELECT 'Adaptive & Creative' as Dimensi, avg(hasilq7) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE substring(sitacode,1,6)='$param'
			UNION
			SELECT 'Persistent' as Dimensi, avg(hasilq8) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE substring(sitacode,1,6)='$param'
			UNION
			SELECT 'Compliance' as Dimensi, avg(hasilq9) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE substring(sitacode,1,6)='$param'
			UNION
			SELECT 'Risk Management' as Dimensi, avg(hasilq10) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE substring(sitacode,1,6)='$param' ORDER BY rata DESC LIMIT 3");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function botdimensism($param){
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT 'Collaborate' as Dimensi, avg(hasilq1) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE substring(sitacode,1,6)='$param'
			UNION
			SELECT 'Empower Diversity' as Dimensi, avg(hasilq2) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE substring(sitacode,1,6)='$param'
			UNION
			SELECT 'Honesty' as Dimensi, avg(hasilq3) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE substring(sitacode,1,6)='$param'
			UNION
			SELECT 'Commitment' as Dimensi, avg(hasilq4) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE substring(sitacode,1,6)='$param'
			UNION
			SELECT 'Care & Polite' as Dimensi, avg(hasilq5) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE substring(sitacode,1,6)='$param'
			UNION
			SELECT 'Fast & Easy' as Dimensi, avg(hasilq6) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE substring(sitacode,1,6)='$param'
			UNION
			SELECT 'Adaptive & Creative' as Dimensi, avg(hasilq7) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE substring(sitacode,1,6)='$param'
			UNION
			SELECT 'Persistent' as Dimensi, avg(hasilq8) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE substring(sitacode,1,6)='$param'
			UNION
			SELECT 'Compliance' as Dimensi, avg(hasilq9) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE substring(sitacode,1,6)='$param'
			UNION
			SELECT 'Risk Management' as Dimensi, avg(hasilq10) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE substring(sitacode,1,6)='$param' ORDER BY rata ASC LIMIT 3");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	public function gaugesm($param){
		//Query mencari record berdasarkan ID
		$hasil = $this->db->query("SELECT SUM(x.nilai) as Jumlah FROM (SELECT 'a' as kategori, COUNT(*) as nilai FROM (SELECT a.target,b.name,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE substring(sitacode,1,6) ='$param' GROUP BY target) a WHERE rata >= 90 and rata <= 100 UNION SELECT 'b' as kategori, COUNT(*) as nilai FROM (SELECT a.target,b.name,sum(a.rata) as rata FROM assessment a JOIN tb_pegawai b ON a.target=b.NIP WHERE substring(sitacode,1,6) ='$param' GROUP BY target) a WHERE rata >= 75 and rata < 90) x");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return array();
		}
	}
	////////////////SM
	function ceksm_bottom($nopeg,$data) {
		$tahun=$data['tahun'];
 		$query = $this->db->query("SELECT * FROM tb_aksism WHERE tb_aksism.id_nip = '$nopeg' AND tb_aksism.status='bottom' AND tahun='$tahun' AND periode=1");
		if($query->num_rows() > 0) {
			return $query->result();
		}
		else{
			return $a=0;
		}
 	}
 	function ceksm_bottom2($nopeg,$data) {
 		$tahun=$data['tahun'];
 		$query = $this->db->query("SELECT * FROM tb_aksism WHERE tb_aksism.id_nip = '$nopeg' AND tb_aksism.status='bottom' AND tahun='$tahun' AND periode=2");
		if($query->num_rows() > 0) {
			return $query->result();
		}
		else{
			return $a=0;
		}
 	}
 	function ceksm_bottom3($nopeg,$data) {
 		$tahun=$data['tahun'];
 		$query = $this->db->query("SELECT * FROM tb_aksism WHERE tb_aksism.id_nip = '$nopeg' AND tb_aksism.status='bottom' AND tahun='$tahun' AND periode=3");
		if($query->num_rows() > 0) {
			return $query->result();
		}
		else{
			return $a=0;
		}
 	}
 	function ceksm_bottom4($nopeg,$data) {
 		$tahun=$data['tahun'];
 		$query = $this->db->query("SELECT * FROM tb_aksism WHERE tb_aksism.id_nip = '$nopeg' AND tb_aksism.status='bottom' AND tahun='$tahun' AND periode=4");
		if($query->num_rows() > 0) {
			return $query->result();
		}
		else{
			return $a=0;
		}
 	}

 	function ceksm_top($nopeg,$data) {
 		$tahun=$data['tahun'];
 		$query = $this->db->query("SELECT * FROM tb_aksism WHERE tb_aksism.id_nip = '$nopeg' AND tb_aksism.status='top' AND tahun='$tahun' AND periode=1");
		if($query->num_rows() > 0) {
			return $query->result();
		}
		else{
			return $a=0;
		}
 	}
 	function ceksm_top2($nopeg,$data) {
 		$tahun=$data['tahun'];
 		$query = $this->db->query("SELECT * FROM tb_aksism WHERE tb_aksism.id_nip = '$nopeg' AND tb_aksism.status='top' AND tahun='$tahun' AND periode=2");
		if($query->num_rows() > 0) {
			return $query->result();
		}
		else{
			return $a=0;
		}
 	}
 	function ceksm_top3($nopeg,$data) {
 		$tahun=$data['tahun'];
 		$query = $this->db->query("SELECT * FROM tb_aksism WHERE tb_aksism.id_nip = '$nopeg' AND tb_aksism.status='top' AND tahun='$tahun' AND periode=3");
		if($query->num_rows() > 0) {
			return $query->result();
		}
		else{
			return $a=0;
		}
 	}
 	function ceksm_top4($nopeg,$data) {
 		$tahun=$data['tahun'];
 		$query = $this->db->query("SELECT * FROM tb_aksism WHERE tb_aksism.id_nip = '$nopeg' AND tb_aksism.status='top' AND tahun='$tahun' AND periode=4");
		if($query->num_rows() > 0) {
			return $query->result();
		}
		else{
			return $a=0;
		}
 	}
 	function progressm_aksi($nip,$data) {
 		$tahun=$data['tahun'];
 		$query = $this->db->query("SELECT * FROM tb_aksism WHERE tb_aksism.penanggung_jawab = '$nip' AND tahun='$tahun' AND periode=1");
		if($query->num_rows() > 0) {
			return $query->result();
		}
		else{
			return "kosong";
		}
 	}
 	function progressm_aksi2($nip,$data) {
 		$tahun=$data['tahun'];
 		$query = $this->db->query("SELECT * FROM tb_aksism WHERE tb_aksism.penanggung_jawab = '$nip' AND tahun='$tahun' AND periode=2");
		if($query->num_rows() > 0) {
			return $query->result();
		}
		else{
			return "kosong";
		}
 	}
 	function progressm_aksi3($nip,$data) {
 		$tahun=$data['tahun'];
 		$query = $this->db->query("SELECT * FROM tb_aksism WHERE tb_aksism.penanggung_jawab = '$nip' AND tahun='$tahun' AND periode=3");
		if($query->num_rows() > 0) {
			return $query->result();
		}
		else{
			return "kosong";
		}
 	}
 	function progressm_aksi4($nip,$data) {
 		$tahun=$data['tahun'];
 		$query = $this->db->query("SELECT * FROM tb_aksism WHERE tb_aksism.penanggung_jawab = '$nip' AND tahun='$tahun' AND periode=4");
		if($query->num_rows() > 0) {
			return $query->result();
		}
		else{
			return "kosong";
		}
 	}

 	public function updatesm_progres($id_aksi, $data_progres) {
		//Query update from ... where id = ...
		$nilai=$data_progres['progres'];
		$ket=$data_progres['keterangan'];
		$status_progres=$data_progres['status_progres'];
		$this->db->query("update tb_aksism set progres=$nilai, keterangan='$ket', status_progres='$status_progres' where id_aksi=$id_aksi");
	}

	public function tampilsm_aksi($id,$data) {
		$tahun=$data['tahun'];
		//Query update from ... where id = ...
		$hasil = $this->db->query("select * from tb_aksism a join rekomendasi b on a.id_rekomendasi=b.id_rekomendasi where a.id_nip='$id' AND status='top' AND tahun='$tahun' AND periode=1");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return "kosong";
		}
	}
	public function tampilsm_aksi2($id,$data) {
		$tahun=$data['tahun'];
		//Query update from ... where id = ...
		$hasil = $this->db->query("select * from tb_aksism a join rekomendasi b on a.id_rekomendasi=b.id_rekomendasi where a.id_nip='$id' AND status='top' AND tahun='$tahun' AND periode=2");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return "kosong";
		}
	}
	public function tampilsm_aksi3($id,$data) {
		$tahun=$data['tahun'];
		//Query update from ... where id = ...
		$hasil = $this->db->query("select * from tb_aksism a join rekomendasi b on a.id_rekomendasi=b.id_rekomendasi where a.id_nip='$id' AND status='top' AND tahun='$tahun' AND periode=3");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return "kosong";
		}
	}
	public function tampilsm_aksi4($id,$data) {
		$tahun=$data['tahun'];
		//Query update from ... where id = ...
		$hasil = $this->db->query("select * from tb_aksism a join rekomendasi b on a.id_rekomendasi=b.id_rekomendasi where a.id_nip='$id' AND status='top' AND tahun='$tahun' AND periode=4");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return "kosong";
		}
	}

	public function tampilsm_aksi_bottom($id,$data) {
		$tahun=$data['tahun'];
		//Query update from ... where id = ...
		$hasil = $this->db->query("select * from tb_aksism a join rekomendasi b on a.id_rekomendasi=b.id_rekomendasi where a.id_nip='$id' AND status='bottom' AND tahun='$tahun' AND periode=1");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return "kosong";
		}
	}
	public function tampilsm_aksi_bottom2($id,$data) {
		$tahun=$data['tahun'];
		//Query update from ... where id = ...
		$hasil = $this->db->query("select * from tb_aksism a join rekomendasi b on a.id_rekomendasi=b.id_rekomendasi where a.id_nip='$id' AND status='bottom' AND tahun='$tahun' AND periode=2");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return "kosong";
		}
	}
	public function tampilsm_aksi_bottom3($id,$data) {
		$tahun=$data['tahun'];
		//Query update from ... where id = ...
		$hasil = $this->db->query("select * from tb_aksism a join rekomendasi b on a.id_rekomendasi=b.id_rekomendasi where a.id_nip='$id' AND status='bottom' AND tahun='$tahun' AND periode=3");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return "kosong";
		}
	}
	public function tampilsm_aksi_bottom4($id,$data) {
		$tahun=$data['tahun'];
		//Query update from ... where id = ...
		$hasil = $this->db->query("select * from tb_aksism a join rekomendasi b on a.id_rekomendasi=b.id_rekomendasi where a.id_nip='$id' AND status='bottom' AND tahun='$tahun' AND periode=4");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return "kosong";
		}
	}

	public function listaksism($nip,$data){
		$tahun=$data['tahun'];
		$hasil = $this->db->query("SELECT * FROM tb_aksism a WHERE a.id_nip='$nip' AND tahun='$tahun' AND periode=1");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
	public function listaksism2($nip,$data){
		$tahun=$data['tahun'];
		$hasil = $this->db->query("SELECT * FROM tb_aksism a WHERE a.id_nip='$nip' AND tahun='$tahun' AND periode=2");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
	public function listaksism3($nip,$data){
		$tahun=$data['tahun'];
		$hasil = $this->db->query("SELECT * FROM tb_aksism a WHERE a.id_nip='$nip' AND tahun='$tahun' AND periode=3");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
	public function listaksism4($nip,$data){
		$tahun=$data['tahun'];
		$hasil = $this->db->query("SELECT * FROM tb_aksism a WHERE a.id_nip='$nip' AND tahun='$tahun' AND periode=4");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
	public function listaksismfull($nip,$data){
		$tahun=$data['tahun'];
		$hasil = $this->db->query("SELECT * FROM tb_aksism a WHERE a.id_nip='$nip' AND tahun='$tahun'");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
	public function sumaksism($nip,$data){
		$tahun=$data['tahun'];
		$hasil = $this->db->query("SELECT a.status_progres, COUNT(*) as jumlah FROM tb_aksism a WHERE a.id_nip ='$nip' AND tahun='$tahun' AND periode=1 GROUP BY a.status_progres");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
	public function sumaksism2($nip,$data){
		$tahun=$data['tahun'];
		$hasil = $this->db->query("SELECT a.status_progres, COUNT(*) as jumlah FROM tb_aksism a WHERE a.id_nip ='$nip' AND tahun='$tahun' AND periode=2 GROUP BY a.status_progres");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
	public function sumaksism3($nip,$data){
		$tahun=$data['tahun'];
		$hasil = $this->db->query("SELECT a.status_progres, COUNT(*) as jumlah FROM tb_aksism a WHERE a.id_nip ='$nip' AND tahun='$tahun' AND periode=3 GROUP BY a.status_progres");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
	public function sumaksism4($nip,$data){
		$tahun=$data['tahun'];
		$hasil = $this->db->query("SELECT a.status_progres, COUNT(*) as jumlah FROM tb_aksism a WHERE a.id_nip ='$nip' AND tahun='$tahun' AND periode=4 GROUP BY a.status_progres");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
	public function sumaksismfull($nip,$data){
		$tahun=$data['tahun'];
		$hasil = $this->db->query("SELECT a.status_progres, COUNT(*) as jumlah FROM tb_aksism a WHERE a.id_nip ='$nip' AND tahun='$tahun' GROUP BY a.status_progres");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
		else {
			return array();
		}
	}
	



}

/* End of file model_chart.php */
/* Location: ./application/models/model_chart.php */

