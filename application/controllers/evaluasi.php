<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Evaluasi extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html

	 */

	public function __construct()
	{
		parent::__construct();
        /*if(!$this->session->userdata('nopeg')){
				$this->session->set_flashdata('error','Maaf anda belum log in');	
				redirect('login');			
			}*/

			$this->load->helper('text');
			$this->load->helper('form');
			$this->load->library('image_lib');
			$this->load->library('form_validation');
			$this->load->model('model_users');
		}
		public function index()
		{
			$data['provinsi'] = $this->model_users->get_provinsi();
			$this->load->view('user/main-dashboard',$data);
		}

		public function get_provinsi(){
			echo json_encode($this->model_users->get_provinsi());
		}

		public function get_kota(){
			$param = $this->input->get('prov');
			$model = $this->model_users->get_kota($param);
			if($model != "Error"){
				$object['data'] = $model;
				$object['status'] = true;
			} else {
				$object['status'] = false;
			}
			echo json_encode($object);
		}

		public function get_cakupan_ori($ori){
			$provinsi = $this->input->get('prov')? $this->input->get('prov') : null;
			$kota = $this->input->get('kota')? $this->input->get('kota') : null;
			$model = $this->model_users->get_cakupan_ori($ori,$provinsi,$kota);
			if($model != "Error"){
				$object['data'] = $model;
				$object['status'] = true;
			} else {
				$object['status'] = false;
			}
			echo json_encode($object);
		}

		public function get_penderita_difteri($tahun){
			$provinsi = $this->input->get('prov')? $this->input->get('prov') : null;
			$kota = $this->input->get('kota')? $this->input->get('kota') : null;
			$tahun = $tahun;
			for ($k=1; $k <=12 ; $k++) { 
				$model = $this->model_users->get_penderita_difteri($tahun,$k,$provinsi,$kota);
				$object['grafik'][$k-1]['bulan'] = $k;
				$object['grafik'][$k-1]['jumlah_penderita'] = $model==false? 0 : $model[0]->Jumlah_Penderita;
			}
			$kota = $this->model_users->getKota($provinsi,$kota,$tahun);
			if($kota != "Error"){
				for ($i=0; $i < count($kota) ; $i++) { 
				$model1 = $this->model_users->get_penderita_difteri($tahun,1,$kota[$i]->id_provinsi,$kota[$i]->id_kota);
				$model2 = $this->model_users->get_penderita_difteri($tahun,2,$kota[$i]->id_provinsi,$kota[$i]->id_kota);
				$model3 = $this->model_users->get_penderita_difteri($tahun,3,$kota[$i]->id_provinsi,$kota[$i]->id_kota);
				$model4 = $this->model_users->get_penderita_difteri($tahun,4,$kota[$i]->id_provinsi,$kota[$i]->id_kota);
				$model5 = $this->model_users->get_penderita_difteri($tahun,5,$kota[$i]->id_provinsi,$kota[$i]->id_kota);
				$model6 = $this->model_users->get_penderita_difteri($tahun,6,$kota[$i]->id_provinsi,$kota[$i]->id_kota);
				$model7 = $this->model_users->get_penderita_difteri($tahun,7,$kota[$i]->id_provinsi,$kota[$i]->id_kota);
				$model8 = $this->model_users->get_penderita_difteri($tahun,8,$kota[$i]->id_provinsi,$kota[$i]->id_kota);
				$model9 = $this->model_users->get_penderita_difteri($tahun,9,$kota[$i]->id_provinsi,$kota[$i]->id_kota);
				$model10 = $this->model_users->get_penderita_difteri($tahun,10,$kota[$i]->id_provinsi,$kota[$i]->id_kota);
				$model11 = $this->model_users->get_penderita_difteri($tahun,11,$kota[$i]->id_provinsi,$kota[$i]->id_kota);
				$model12 = $this->model_users->get_penderita_difteri($tahun,12,$kota[$i]->id_provinsi,$kota[$i]->id_kota);
					
				$object['data'][$i]['kota'] = $kota[$i]->nama_kota; 
				$object['data'][$i]['januari'] = $model1==false? 0 : $model1[0]->Jumlah_Penderita;
				$object['data'][$i]['februari'] = $model2==false? 0 : $model2[0]->Jumlah_Penderita;
				$object['data'][$i]['maret'] = $model3==false? 0 : $model3[0]->Jumlah_Penderita;
				$object['data'][$i]['april'] = $model4==false? 0 : $model4[0]->Jumlah_Penderita;
				$object['data'][$i]['mei'] = $model5==false? 0 : $model5[0]->Jumlah_Penderita;
				$object['data'][$i]['juni'] = $model6==false? 0 : $model6[0]->Jumlah_Penderita;
				$object['data'][$i]['juli'] = $model7==false? 0 : $model7[0]->Jumlah_Penderita;
				$object['data'][$i]['agustus'] = $model8==false? 0 : $model8[0]->Jumlah_Penderita;
				$object['data'][$i]['september'] = $model9==false? 0 : $model9[0]->Jumlah_Penderita;
				$object['data'][$i]['oktober'] = $model10==false? 0 : $model10[0]->Jumlah_Penderita;
				$object['data'][$i]['nopember'] = $model11==false? 0 : $model11[0]->Jumlah_Penderita;
				$object['data'][$i]['desember'] = $model12==false? 0 : $model12[0]->Jumlah_Penderita;
				}
			}
			
			$object['status'] = true;
			echo json_encode($object);
		}

		public function get_penderita_difteri_by_terima_ads($tahun){
			$provinsi = $this->input->get('prov')? $this->input->get('prov') : null;
			$kota = $this->input->get('kota')? $this->input->get('kota') : null;
			$tahun = $tahun;
			$model = $this->model_users->get_penderita_difteri_by_terima_ads($provinsi,$kota);
			$model1 = $this->model_users->get_penderita_difteri_by_terima_ads($provinsi,$kota);
			if($model != false){
				for ($k=1; $k <= 12 ; $k++) {
					$object['data'][0][$k] = "0";
					for ($i=0; $i < count($model) ; $i++) { 
						if($model[$i]->Status == "Terima ADS" && $model[$i]->Bulan == $k){
							$object['data'][0][$k] = $model[$i]->Jumlah;	
						}
					}
				}
				for ($k=1; $k <= 12 ; $k++) {
					$object['data'][1][$k] = "0";
					for ($i=0; $i < count($model1) ; $i++) { 
						if($model1[$i]->Status == "Tidak Terima ADS" && $model1[$i]->Bulan == $k){
							$object['data'][1][$k] = $model1[$i]->Jumlah;	
						}
					}
				}
				$object['data'][0]["status"] = "Jumlah Penderita Terima ADS";
				$object['data'][1]["status"] = "Jumlah Penderita Tidak Terima ADS";
			}
			$object['status'] = true;
			echo json_encode($object);
		}

		public function get_penderita_difteri_by_terima_ads_status_imun($tahun,$status){
			$provinsi = $this->input->get('prov')? $this->input->get('prov') : null;
			$kota = $this->input->get('kota')? $this->input->get('kota') : null;
			$tahun = $tahun;
			$model = $this->model_users->get_penderita_difteri_by_terima_ads_status_imun($provinsi,$kota,$status);
			$model1 = $this->model_users->get_penderita_difteri_by_terima_ads_status_imun($provinsi,$kota,$status);
			if($model != false){
				for ($k=1; $k <= 12 ; $k++) {
					$object['data'][0][$k] = "0";
					for ($i=0; $i < count($model) ; $i++) { 
						if($model[$i]->Status == "Pernah Imunisasi" && $model[$i]->Bulan == $k){
							$object['data'][0][$k] = $model[$i]->Jumlah;	
						}
					}
				}
				for ($k=1; $k <= 12 ; $k++) {
					$object['data'][1][$k] = "0";
					for ($i=0; $i < count($model1) ; $i++) { 
						if($model1[$i]->Status == "Tidak Pernah Imunisasi" && $model1[$i]->Bulan == $k){
							$object['data'][1][$k] = $model1[$i]->Jumlah;	
						}
					}
				}
				if($status == 1){
					$object['data'][0]["status"] = "Jumlah Penderita Terima ADS dan Pernah Imunisasi";
					$object['data'][1]["status"] = "Jumlah Penderita Terima ADS dan Tidak Pernah Imunisasi";
				} else {
					$object['data'][0]["status"] = "Jumlah Penderita Tidak Terima ADS dan Pernah Imunisasi";
					$object['data'][1]["status"] = "Jumlah Penderita Tidak Terima ADS dan Tidak Pernah Imunisasi";
				}
			}
			$object['status'] = true;
			echo json_encode($object);
		}

		public function get_penderita_difteri_by_umur($tahun){
			$provinsi = $this->input->get('prov')? $this->input->get('prov') : null;
			$kota = $this->input->get('kota')? $this->input->get('kota') : null;
			$tahun = $tahun;
			$model = $this->model_users->get_penderita_difteri_by_umur($provinsi,$kota,10);
			$model1 = $this->model_users->get_penderita_difteri_by_umur($provinsi,$kota,10);
			if($model != false){
				for ($k=1; $k <= 12 ; $k++) {
					$object['data'][0][$k] = "0";
					for ($i=0; $i < count($model) ; $i++) { 
						if($model[$i]->Status == "Kurang dari 19 Tahun" && $model[$i]->Bulan == $k){
							$object['data'][0][$k] = $model[$i]->Jumlah;	
						}
					}
				}
				for ($k=1; $k <= 12 ; $k++) {
					$object['data'][1][$k] = "0";
					for ($i=0; $i < count($model1) ; $i++) { 
						if($model1[$i]->Status == "Lebih dari 19 Tahun" && $model1[$i]->Bulan == $k){
							$object['data'][1][$k] = $model1[$i]->Jumlah;	
						}
					}
				}
					$object['data'][0]["status"] = "Dibawah 19 tahun";
					$object['data'][1]["status"] = "Lebih dari 19 tahun";
			}
			$object['status'] = true;
			echo json_encode($object);
		}

		public function get_penderita_difteri_by_umur_terima_ads($tahun){
			$provinsi = $this->input->get('prov')? $this->input->get('prov') : null;
			$kota = $this->input->get('kota')? $this->input->get('kota') : null;
			$tahun = $tahun;
			$model = $this->model_users->get_penderita_difteri_by_umur($provinsi,$kota,11);
			$model1 = $this->model_users->get_penderita_difteri_by_umur($provinsi,$kota,11);
			if($model != false){
				for ($k=1; $k <= 12 ; $k++) {
					$object['data'][0][$k] = "0";
					for ($i=0; $i < count($model) ; $i++) { 
						if($model[$i]->Status == "Kurang dari 19 Tahun" && $model[$i]->Bulan == $k){
							$object['data'][0][$k] = $model[$i]->Jumlah;	
						}
					}
				}
				for ($k=1; $k <= 12 ; $k++) {
					$object['data'][1][$k] = "0";
					for ($i=0; $i < count($model1) ; $i++) { 
						if($model1[$i]->Status == "Lebih dari 19 Tahun" && $model1[$i]->Bulan == $k){
							$object['data'][1][$k] = $model1[$i]->Jumlah;	
						}
					}
				}
					$object['data'][0]["status"] = "Dibawah 19 tahun";
					$object['data'][1]["status"] = "Lebih dari 19 tahun";
			}
			$object['status'] = true;
			echo json_encode($object);
		}

		public function get_penderita_difteri_by_umur_tidak_rekomen_ads($tahun){
			$provinsi = $this->input->get('prov')? $this->input->get('prov') : null;
			$kota = $this->input->get('kota')? $this->input->get('kota') : null;
			$tahun = $tahun;
			$model = $this->model_users->get_penderita_difteri_by_umur($provinsi,$kota,12);
			$model1 = $this->model_users->get_penderita_difteri_by_umur($provinsi,$kota,12);
			if($model != false){
				$object['data'][0]["jumlah"] = $model[0]->Jumlah? $model[0]->Jumlah:0;
				$object['data'][1]["jumlah"] = $model[1]->Jumlah? $model[1]->Jumlah:0;
				$object['data'][0]["status"] = "Dibawah 19 tahun";
				$object['data'][1]["status"] = "Lebih dari 19 tahun";
			}
			$object['status'] = true;
			echo json_encode($object);
		}

		public function get_penderita_difteri_by_umur_terima_ads_and_imun($tahun,$ads){
			if($ads == 1) {
				$provinsi = $this->input->get('prov')? $this->input->get('prov') : null;
				$kota = $this->input->get('kota')? $this->input->get('kota') : null;
				$tahun = $tahun;
				$model = $this->model_users->get_penderita_difteri_by_umur($provinsi,$kota,13);
				$model1 = $this->model_users->get_penderita_difteri_by_umur($provinsi,$kota,13);
				$model3 = $this->model_users->get_penderita_difteri_by_umur($provinsi,$kota,13);
				$model4 = $this->model_users->get_penderita_difteri_by_umur($provinsi,$kota,13);
				if($model != false){
					for ($k=1; $k <= 12 ; $k++) {
						$object['data'][0][$k] = "0";
						for ($i=0; $i < count($model) ; $i++) { 
							if($model[$i]->Penderita == "Kurang dari 19 Tahun" && $model[$i]->Status == "Pernah Imunisasi" && $model[$i]->Bulan == $k){
								$object['data'][0][$k] = $model[$i]->Jumlah;	
							}
						}
					}
					for ($k=1; $k <= 12 ; $k++) {
						$object['data'][1][$k] = "0";
						for ($i=0; $i < count($model1) ; $i++) { 
							if($model1[$i]->Penderita == "Kurang dari 19 Tahun" && $model1[$i]->Status == "Tidak Pernah Imunisasi" && $model1[$i]->Bulan == $k){
								$object['data'][1][$k] = $model1[$i]->Jumlah;	
							}
						}
					}
					for ($k=1; $k <= 12 ; $k++) {
						$object['data'][2][$k] = "0";
						for ($i=0; $i < count($model3) ; $i++) { 
							if($model3[$i]->Penderita == "Lebih dari 19 Tahun" && $model3[$i]->Status == "Pernah Imunisasi" && $model3[$i]->Bulan == $k){
								$object['data'][2][$k] = $model3[$i]->Jumlah;	
							}
						}
					}
					for ($k=1; $k <= 12 ; $k++) {
						$object['data'][3][$k] = "0";
						for ($i=0; $i < count($model4) ; $i++) { 
							if($model4[$i]->Penderita == "Lebih dari 19 Tahun" && $model4[$i]->Status == "Tidak Pernah Imunisasi" && $model4[$i]->Bulan == $k){
								$object['data'][3][$k] = $model4[$i]->Jumlah;	
							}
						}
					}
						$object['data'][0]["status"] = "Dibawah 19 tahun pernah imunisasi";
						$object['data'][1]["status"] = "Dibawah 19 tahun tidak pernah imunisasi";
						$object['data'][2]["status"] = "Lebih dari 19 tahun pernah imunisasi";
						$object['data'][3]["status"] = "Lebih dari 19 tahun tidak pernah imunisasi";
				}
				$object['status'] = true;
				echo json_encode($object);
			} else if($ads==0) {
				$provinsi = $this->input->get('prov')? $this->input->get('prov') : null;
				$kota = $this->input->get('kota')? $this->input->get('kota') : null;
				$tahun = $tahun;
				$model = $this->model_users->get_penderita_difteri_by_umur($provinsi,$kota,14);
				$model1 = $this->model_users->get_penderita_difteri_by_umur($provinsi,$kota,14);
				$model3 = $this->model_users->get_penderita_difteri_by_umur($provinsi,$kota,14);
				$model4 = $this->model_users->get_penderita_difteri_by_umur($provinsi,$kota,14);
				if($model != false){
					for ($k=1; $k <= 12 ; $k++) {
						$object['data'][0][$k] = "0";
						for ($i=0; $i < count($model) ; $i++) { 
							if($model[$i]->Penderita == "Kurang dari 19 Tahun" && $model[$i]->Status == "Pernah Imunisasi" && $model[$i]->Bulan == $k){
								$object['data'][0][$k] = $model[$i]->Jumlah;	
							}
						}
					}
					for ($k=1; $k <= 12 ; $k++) {
						$object['data'][1][$k] = "0";
						for ($i=0; $i < count($model1) ; $i++) { 
							if($model1[$i]->Penderita == "Kurang dari 19 Tahun" && $model1[$i]->Status == "Tidak Pernah Imunisasi" && $model1[$i]->Bulan == $k){
								$object['data'][1][$k] = $model1[$i]->Jumlah;	
							}
						}
					}
					for ($k=1; $k <= 12 ; $k++) {
						$object['data'][2][$k] = "0";
						for ($i=0; $i < count($model3) ; $i++) { 
							if($model3[$i]->Penderita == "Lebih dari 19 Tahun" && $model3[$i]->Status == "Pernah Imunisasi" && $model3[$i]->Bulan == $k){
								$object['data'][2][$k] = $model3[$i]->Jumlah;	
							}
						}
					}
					for ($k=1; $k <= 12 ; $k++) {
						$object['data'][3][$k] = "0";
						for ($i=0; $i < count($model4) ; $i++) { 
							if($model4[$i]->Penderita == "Lebih dari 19 Tahun" && $model4[$i]->Status == "Tidak Pernah Imunisasi" && $model4[$i]->Bulan == $k){
								$object['data'][3][$k] = $model4[$i]->Jumlah;	
							}
						}
					}
						$object['data'][0]["status"] = "Dibawah 19 tahun pernah imunisasi";
						$object['data'][1]["status"] = "Dibawah 19 tahun tidak pernah imunisasi";
						$object['data'][2]["status"] = "Lebih dari 19 tahun pernah imunisasi";
						$object['data'][3]["status"] = "Lebih dari 19 tahun tidak pernah imunisasi";
				}
				$object['status'] = true;
				echo json_encode($object);
			}
		}


		public function logic($array,$target){
			$index = [];
			for ($i=0; $i < count($array) ; $i++) { 
				for ($j=0; $j < count($array) ; $j++) { 
					if($i != $j){
						if($array[$i] + $array[$j] == $target){
							$index = [$j,$i];
						}
					}
				}
			}
			return $index;
		}


		public function solusi(){
			$array = array(-1,20,3,5,11);
			$target = 19;
			$index = $this->logic($array,$target);
			print_r($index);
		}

	}	