<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller {

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
		if($this->session->userdata('username')!="admin"){
			$this->session->set_flashdata('error','Maaf anda belum log in sebagain admin');	
				redirect('error');			
			}
		$this->load->model('model_users');
		$this->load->model('model_chart1');
		$this->load->model('model_chart');
		$this->load->model('model_admin');
		$this->load->model('demografi_model');
	}
	public function index()
	{
		//$data['hasil_penilaian'] = $this->model_users->getAllHasil();	
		//print_r($data); 
		$this->load->view('admin/dashboard_view');
	}

    function json(){
        $this->load->library('datatables');
        $this->datatables->select('*');
        $this->datatables->from('tb_pegawai');
        return print_r($this->datatables->generate());
    }

	function demography()
	{
		
		$data['direktorat'] = $this->demografi_model->direktorat();
		$data['gender'] = $this->demografi_model->gender();
		$data['pendidikan'] = $this->demografi_model->pendidikan();
		$data['lokasi'] = $this->demografi_model->lokasi();
		$data['posisi'] = $this->demografi_model->posisi();
		$data['profesi'] = $this->demografi_model->profesi();
		$data['usia'] = $this->demografi_model->usia();
		$data['generasi'] = $this->demografi_model->generasi();			
		$this->load->view('admin/demografi',$data);
	}
	
	function setup_question()
	{
		$data['pertanyaan_unit'] = $this->model_admin->list_question();
			//print_r($identitas1);
		$this->load->view('admin/daftar_pertanyaan_view', $data);
	}

	function nilai_akhir()
	{
		$data['nilai_akhir'] = $this->model_admin->get_nilai_akhir();
			//print_r($identitas1);
		$this->load->view('admin/daftar_nilai_akhir', $data);
	}
	function upload()
	{
		$data['nilai_kinerja'] = $this->model_admin->get_nilai_kinerja();
			//print_r($identitas1);
		$this->load->view('admin/upload_kinerja',$data);
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		redirect('admin_login');
	}

	function setting()
	{
		
		$data['setting'] = $this->model_admin->skala();
		$data['rekomendasi'] = $this->model_admin->rekomendasi();
		//print_r($data);
		$this->load->view('admin/setting_view', $data);
			   
	}

	function setup_people()
	{
		$data['people'] = $this->model_admin->all();
		$this->load->view('admin/setup_people_view',$data);
	}
	function status_people()
	{
		/*memberikan keterangan halaman yang diload dan judul halamannya*/
		$tahun_pilih = $this->input->post('tahun');
		$periode_pilih = $this->input->post('periode');
		
		//jika belum dipilih, maka gunakan tahun aktif
		if (!$tahun_pilih)
		{
			$tahun_pilih = $this->session->userdata('tahun_pilih');
		}
		if (!$periode_pilih)
		{
			$periode_pilih = $this->session->userdata('periode_pilih');
		}
		$data['tahun'] = $tahun_pilih;
		$data['periode']=$periode_pilih;
		$data['tahun_aktif'] = $this->session->userdata('tahun');
		$data['periode_aktif'] = $this->session->userdata('periode');
		$data['_daftar_tahun'] = $this->model_admin->list_tahun();
		$data['_daftar_periode'] = $this->model_admin->list_periode();
		/*print_r($data['tahun_aktif']);exit();*/
		$data['status_people'] = $this->model_admin->status($data['tahun'],$data['periode']);
		$this->load->view('admin/status_people_view',$data);
	}
	public function delete_isian($id_assessment,$tahun,$periode){
		/*print_r($id_assessment);
		print_r($tahun);
		print_r($periode);exit();*/
		$this->model_admin->delete_isian($id_assessment,$tahun,$periode);
		redirect('admin/status_people');
	}

	public function edit_people($id){
		$this->form_validation->set_rules('penilai3');

		$data['people'] = $this->model_admin->findid($id);
		$data_a = array ($data['people']->id_asses,$data['people']->target,$data['people']->unit,$data['people']->direktorat);
		if ($data['people']->level=="STAFF") {
			$data['peers'] = $this->model_admin->findpeers_staff($data_a);
		}
		else if ($data['people']->level=="Manager") {
			$data['peers'] = $this->model_admin->findpeers_manager($data_a);
		}
		else if ($data['people']->level=="SM") {
			$data['peers'] = $this->model_admin->findpeers_seniormanager($data_a);
		}
		else if ($data['people']->level=="VP") {
			$data['peers'] = $this->model_admin->findpeers_vp($data_a);
		}
		$data['atasan'] = $this->model_admin->findatasan($data_a);
		//$data['peers'] = $this->model_admin->findpeers($data_a);
		//print_r($data['atasan']);
		if ($this->form_validation->run() == FALSE){
			$this->load->view('admin/edit_setup_people',$data);
		}
		else {
				$data_people = array(
								'penilai2'			=> $this->input->post('penilai2'),
								'penilai3'			=> $this->input->post('penilai3'),
								'penilai4'			=> $this->input->post('penilai4')
						);
				$this->model_admin->update_setup_people($id, $data_people);
				//print_r($data_pertanyaan);
				redirect('admin/setup_people'); 
			}
		}
	public function edit_rekomendasi($id) {
		$this->form_validation->set_rules('kriteria',"Kriteria");
		$data['setting'] = $this->model_admin->skala();
		$data['rekomendasi'] = $this->model_admin->rekomendasi();
		if ($this->form_validation->run() == FALSE){
			$this->load->view('admin/setting_view',$data);
		}
		else {
				//form submit dengan gambar dikosongkan
				$data_rekomendasi = array(
				'top'				=> $this->input->post('top'),
				'bottom'			=> $this->input->post('bottom')
			);
			 $this->model_admin->edit_rekomendasi($id,$data_rekomendasi);
			 redirect('admin/setting');
			
		}
	}
	public function add($unit) {
		$this->load->helper('form');
		$data['unit'] = $this->model_admin->find($unit);
		$this->load->view('admin/tambah_pertanyaan',$data);
		//print_r($data);
	}
	public function tambah(){
		//sebelum mengeksekusi query
		$this->form_validation->set_rules('Pertanyaan 1');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('admin/tambah_pertanyaan');
		}
		else {
			$data_pertanyaan = array(
								'kode_unit'			=> $this->input->post('target'),
								'q1'				=> $this->input->post('q1'),
								'q2'				=> $this->input->post('q2'),
								'q3'				=> $this->input->post('q3'),
								'q4'				=> $this->input->post('q4'),
								'q5'				=> $this->input->post('q5'),
								'q6'				=> $this->input->post('q6'),
								'q7'				=> $this->input->post('q7'),
								'q8'				=> $this->input->post('q8'),
								'q9'				=> $this->input->post('q9'),
								'q10'				=> $this->input->post('q10')

						);
			//print_r($data_pertanyaan);
			$this->model_admin->tambah($data_pertanyaan);
			redirect('admin/setup_question'); 
			}
	}

	public function update($unit){
		$this->form_validation->set_rules('Pertanyaan 1');

		if ($this->form_validation->run() == FALSE){
			$data['unit'] = $this->model_admin->find($unit);
			$this->load->view('admin/edit_pertanyaan',$data);
		}
		else {
				$data_pertanyaan = array(
								'kode_unit'			=> $this->input->post('target'),
								'q1'				=> $this->input->post('q1'),
								'q2'				=> $this->input->post('q2'),
								'q3'				=> $this->input->post('q3'),
								'q4'				=> $this->input->post('q4'),
								'q5'				=> $this->input->post('q5'),
								'q6'				=> $this->input->post('q6'),
								'q7'				=> $this->input->post('q7'),
								'q8'				=> $this->input->post('q8'),
								'q9'				=> $this->input->post('q9'),
								'q10'				=> $this->input->post('q10')
						);
						$this->model_admin->update($unit, $data_pertanyaan);
						//print_r($data_pertanyaan);
						redirect('admin/setup_question'); 
			}
		}

	public function delete($unit){
		$this->model_admin->delete($unit);
		redirect('admin/setup_question');
	}	

	public function update_skala(){
		$this->form_validation->set_rules('skala');
		
		$id=1;
		$data['setting'] = $this->model_admin->skala();
			$data['rekomendasi'] = $this->model_admin->rekomendasi();
		if ($this->form_validation->run() == FALSE){
			
			$this->load->view('admin/setting_view', $data);
		}
		else {
				$data_skala = array(
						'skala'				=> $this->input->post('skala'),
						'label1'				=> $this->input->post('label1'),
						'label2'				=> $this->input->post('label2'),
						'tahun_aktif'			=> $this->input->post('tahun_aktif'),
						'periode_aktif'			=> $this->input->post('periode_aktif')
				);
				//print_r($data_skala['tahun_aktif']);exit();
				$this->model_admin->update_skala($id, $data_skala);
				$this->model_admin->update_tahun($data_skala['tahun_aktif']);
				$data['setting'] = $this->model_admin->skala();
				$this->load->view('admin/setting_view', $data);
			}
	
	}
	public function proses(){
		//sebelum mengeksekusi query
		$this->form_validation->set_rules('judul');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('admin/daftar_pertanyaan_view');
		}
		else {
			if($_FILES['userfile']['name'] != NULL){
				//form sumbit dengan gambar diisi
				//load uploading file library
				 $config['upload_path']   = './uploads/'; 
		         $config['allowed_types'] = 'xls|xlsx|csv'; 
		         $config['max_size']	= '2048';
		         $config['overwrite']	= true;
				
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if ( !$this->upload->do_upload()){
						$error = array('error' => $this->upload->display_errors());
        			    //var_dump($error);
        			    $message = "File yang anda unggah tidak sesuai dengan format. Unggah data kembali.";
						echo "<script type='text/javascript'>alert('$message');
						window.location.href='".base_url("admin/setup_question")."';</script>";
					}
					else {
						// jika berhasil upload ambil data dan masukkan ke database
		                $upload_data = $this->upload->data();

			            //  Include PHPExcel_IOFactory
						include 'PHPExcel/IOFactory.php';

						$inputFileName = $upload_data['full_path'];

						//  Read your Excel workbook
						try {
						    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
						    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
						    $objPHPExcel = $objReader->load($inputFileName);
						} catch(Exception $e) {
						    die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
						}

						//  Get worksheet dimensions
						$sheet = $objPHPExcel->getSheet(0); 
						$highestRow = $sheet->getHighestRow(); 
						$highestColumn = $sheet->getHighestColumn();

						//  Loop through each row of the worksheet in turn
						for ($row = 1; $row <= $highestRow; $row++){ 
						    //  Read a row of data into an array
						    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
						                                    NULL,
						                                    TRUE,
						                                    FALSE);
						    //  Insert row data array into your database of choice here
						    //print_r($rowData[1]);
						    $this->model_admin->simpan($rowData);
						}
						
						//delete file
			            $file = $upload_data['file_name'];
			            $path = './uploads/' . $file;
			            unlink($path);

			            $message = "Data telah berhasil diperbaharui";
						echo "<script type='text/javascript'>alert('$message');
						window.location.href='".base_url("admin/setup_question")."';</script>";
						}
					}
			//redirect('admin/data'); 
		}
	}
	public function proses_upload(){
		//sebelum mengeksekusi query
		$this->form_validation->set_rules('judul');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('admin/daftar_pertanyaan_view');
		}
		else {
			if($_FILES['userfile']['name'] != NULL){
				//form sumbit dengan gambar diisi
				//load uploading file library
				 $config['upload_path']   = './uploads/'; 
		         $config['allowed_types'] = 'xls|xlsx|csv'; 
		         $config['max_size']	= '2048';
		         $config['overwrite']	= true;
				
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if ( !$this->upload->do_upload()){
						$error = array('error' => $this->upload->display_errors());
        			    //var_dump($error);
        			    $message = "File yang anda unggah tidak sesuai dengan format. Unggah data kembali.";
						echo "<script type='text/javascript'>alert('$message');
						window.location.href='".base_url("admin/setup_people")."';</script>";
					}
					else {
						// jika berhasil upload ambil data dan masukkan ke database
		                $upload_data = $this->upload->data();

			            //  Include PHPExcel_IOFactory
						include 'PHPExcel/IOFactory.php';

						$inputFileName = $upload_data['full_path'];

						//  Read your Excel workbook
						try {
						    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
						    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
						    $objPHPExcel = $objReader->load($inputFileName);
						} catch(Exception $e) {
						    die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
						}

						//  Get worksheet dimensions
						$sheet = $objPHPExcel->getSheet(0); 
						$highestRow = $sheet->getHighestRow(); 
						$highestColumn = $sheet->getHighestColumn();

						//  Loop through each row of the worksheet in turn
						for ($row = 1; $row <= $highestRow; $row++){ 
						    //  Read a row of data into an array
						    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
						                                    NULL,
						                                    TRUE,
						                                    FALSE);
						    //  Insert row data array into your database of choice here
						    //print_r($rowData[1]);
						    $this->model_admin->simpan_upload($rowData);
						}
						
						//delete file
			            $file = $upload_data['file_name'];
			            $path = './uploads/' . $file;
			            unlink($path);

			            $message = "Data telah berhasil diperbaharui";
						echo "<script type='text/javascript'>alert('$message');
						window.location.href='".base_url("admin/setup_people")."';</script>";
						}
					}
			//redirect('admin/data'); 
		}
	}
	public function upload_kinerja(){
		//sebelum mengeksekusi query
		$this->form_validation->set_rules('judul');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('admin/upload_kinerja');
		}
		else {
			if($_FILES['userfile']['name'] != NULL){
				//form sumbit dengan gambar diisi
				//load uploading file library
				 $config['upload_path']   = './uploads/'; 
		         $config['allowed_types'] = 'xls|xlsx|csv'; 
		         $config['max_size']	= '2048';
		         $config['overwrite']	= true;
				
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if ( !$this->upload->do_upload()){
						$error = array('error' => $this->upload->display_errors());
        			    //var_dump($error);
        			    $message = "File yang anda unggah tidak sesuai dengan format. Unggah data kembali.";
						echo "<script type='text/javascript'>alert('$message');
						window.location.href='".base_url("admin/setup_question")."';</script>";
					}
					else {
						// jika berhasil upload ambil data dan masukkan ke database
		                $upload_data = $this->upload->data();

			            //  Include PHPExcel_IOFactory
						include 'PHPExcel/IOFactory.php';

						$inputFileName = $upload_data['full_path'];

						//  Read your Excel workbook
						try {
						    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
						    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
						    $objPHPExcel = $objReader->load($inputFileName);
						} catch(Exception $e) {
						    die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
						}

						//  Get worksheet dimensions
						$sheet = $objPHPExcel->getSheet(0); 
						$highestRow = $sheet->getHighestRow(); 
						$highestColumn = $sheet->getHighestColumn();

						//  Loop through each row of the worksheet in turn
						for ($row = 1; $row <= $highestRow; $row++){ 
						    //  Read a row of data into an array
						    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
						                                    NULL,
						                                    TRUE,
						                                    FALSE);
						    //  Insert row data array into your database of choice here
						    //print_r($rowData[1]);
						    $this->model_admin->simpan_kinerja($rowData);
						}
						
						//delete file
			            $file = $upload_data['file_name'];
			            $path = './uploads/' . $file;
			            unlink($path);

			            $message = "Data telah berhasil diperbaharui";
						echo "<script type='text/javascript'>alert('$message');
						window.location.href='".base_url("admin/upload")."';</script>";
						}
					}
			//redirect('admin/data'); 
		}
	}

	////////////////////////////DIREKTORAT
	public function corporatescore(){
		/*memberikan keterangan halaman yang diload dan judul halamannya*/
		$tahun_pilih = $this->input->post('tahun');
		
		//jika belum dipilih, maka gunakan tahun aktif
		if (!$tahun_pilih)
		{
			$tahun_pilih = $this->session->userdata('tahun_pilih');
		}
		$data['tahun'] = $tahun_pilih;
		$data['tahun_aktif'] = $this->session->userdata('tahun');
		$data['periode_aktif'] = $this->session->userdata('periode');
		$data['_daftar_tahun'] = $this->model_admin->list_tahun();
		$mine = $this->session->userdata('nopeg');
		$data['jumlah_periode']= $this->model_users->count_periode($mine,$data);
		$unit=$this->session->userdata('unit');
		$level=$this->session->userdata('level');
		$direktorat=$this->session->userdata('direktorat');
			$data['unit']=$unit;
			$data['direktorat']=$direktorat;
			$data['corporate']=$this->model_admin->corporate($data);
			$data['corporate1']=$this->model_admin->corporate1($data);
			$data['corporate2']=$this->model_admin->corporate2($data);
			$data['corporate3']=$this->model_admin->corporate3($data);
			$data['corporate4']=$this->model_admin->corporate4($data);
			$data['sumdimensicorporate']=$this->model_admin->sumdimensicorporate($data);
			$data['sumdimensicorporate1']=$this->model_admin->sumdimensicorporate1($data);
			$data['sumdimensicorporate2']=$this->model_admin->sumdimensicorporate2($data);
			$data['sumdimensicorporate3']=$this->model_admin->sumdimensicorporate3($data);
			$data['sumdimensicorporate4']=$this->model_admin->sumdimensicorporate4($data);
			$data['dimensicorporate']=$this->model_admin->dimensicorporate($data);
			$data['dimensicorporate1']=$this->model_admin->dimensicorporate1($data);
			$data['dimensicorporate2']=$this->model_admin->dimensicorporate2($data);
			$data['dimensicorporate3']=$this->model_admin->dimensicorporate3($data);
			$data['dimensicorporate4']=$this->model_admin->dimensicorporate4($data);
			$data['listnilai']=$this->model_admin->listnilai($data);	
			$data['listnilaip1']=$this->model_admin->listnilaip1($data);	
			$data['listnilaip2']=$this->model_admin->listnilaip2($data);	
			$data['listnilaip3']=$this->model_admin->listnilaip3($data);	
			$data['listnilaip4']=$this->model_admin->listnilaip4($data);
			$data['listdirektur']=$this->model_admin->listnilaidirektur($data);
			$data['listdirektur1']=$this->model_admin->listnilaidirektur1($data);
			$data['listdirektur2']=$this->model_admin->listnilaidirektur2($data);
			$data['listdirektur3']=$this->model_admin->listnilaidirektur3($data);
			$data['listdirektur4']=$this->model_admin->listnilaidirektur4($data);

			$data['direktoratall'] = $this->model_chart1->direktoratall($data);
			$data['direktorat1'] = $this->model_chart1->direktoratvp1($data);
			$data['direktorat2'] = $this->model_chart1->direktoratvp2($data);
			$data['direktorat3'] = $this->model_chart1->direktoratvp3($data);
			$data['direktorat4'] = $this->model_chart1->direktoratvp4($data);
			$data['score2']= $this->model_chart1->direktorat($direktorat,$data);
			$data['score21']= $this->model_chart1->direktorat1($direktorat,$data);
			$data['score22']= $this->model_chart1->direktorat2($direktorat,$data);
			$data['score23']= $this->model_chart1->direktorat3($direktorat,$data);
			$data['score24']= $this->model_chart1->direktorat4($direktorat,$data);
			$data['score']= $this->model_chart1->unit($unit,$data);
			$data['scorep1']= $this->model_chart1->unit1($unit,$data);
			$data['scorep2']= $this->model_chart1->unit2($unit,$data);
			$data['scorep3']= $this->model_chart1->unit3($unit,$data);
			$data['scorep4']= $this->model_chart1->unit4($unit,$data);
			
			$data['nilaiother']= $this->model_chart1->nilaiother($unit,$data);
			$data['nilaiother1']= $this->model_chart1->nilaiother1($unit,$data);
			$data['nilaiother2']= $this->model_chart1->nilaiother2($unit,$data);
			$data['nilaiother3']= $this->model_chart1->nilaiother3($unit,$data);
			$data['nilaiother4']= $this->model_chart1->nilaiother4($unit,$data);
			$data['gaugecorporate']=$this->model_admin->gaugecorporate($data);
			
				
			
			$data['gaugeunit1']=$this->model_chart->gaugeunit1($unit,$data);
			$data['gaugeunit2']=$this->model_chart->gaugeunit2($unit,$data);
			$data['gaugeunit3']=$this->model_chart->gaugeunit3($unit,$data);
			$data['gaugeunit4']=$this->model_chart->gaugeunit4($unit,$data);

			$data['nilai_dimensi']= $this->model_admin->nilai_dimensi1($data);
			$data['nilai_dimensi1']= $this->model_admin->nilai_dimensip1($data);
			$data['nilai_dimensi2']= $this->model_admin->nilai_dimensip2($data);
			$data['nilai_dimensi3']= $this->model_admin->nilai_dimensip3($data);
			$data['nilai_dimensi4']= $this->model_admin->nilai_dimensip4($data);


			
			$data['cek_top']= $this->model_users->cekdirektorat_top($mine,$data);
			$data['cek_top2']= $this->model_users->cekdirektorat_top2($mine,$data);
			$data['cek_top3']= $this->model_users->cekdirektorat_top3($mine,$data);
			$data['cek_top4']= $this->model_users->cekdirektorat_top4($mine,$data);
			$data['cek_bottom']= $this->model_users->cekdirektorat_bottom($mine,$data);
			$data['cek_bottom2']= $this->model_users->cekdirektorat_bottom2($mine,$data);
			$data['cek_bottom3']= $this->model_users->cekdirektorat_bottom3($mine,$data);
			$data['cek_bottom4']= $this->model_users->cekdirektorat_bottom4($mine,$data);
			

			
			
		
			//print_r($data['scorep3']);
			$this->load->view('admin/corporatescore_view',$data,$unit);
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */