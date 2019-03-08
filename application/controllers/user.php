<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

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
        
        $this->load->helper('text');
        $this->load->helper('form');
        $this->load->library("PHPExcel");
        $this->load->library('image_lib');
        $this->load->library('form_validation');
		$this->load->model('model_users');
		$this->load->model('demografi_model');
	}
	public function index()
	{
		$data['data_form'] = $this->model_users->data_form();
		$this->load->view('user/user_index',$data);
	}

	public function survey($id_form)
	{
		$data['judul']  = $this->model_users->judul($id_form);
		$data['list_parent']  = $this->model_users->list_parent($id_form);
		$data['list_question'] = $this->model_users->list_question($id_form);
		$data['list_multiple_choice'] = $this->model_users->list_multiple_choice();
		$data['list_forced_choice'] = $this->model_users->list_forced_choice();
		$this->load->view('user/survey',$data);
	}

	public function self_assessment()
	{
		$this->load->view('user/self_assessment');
	}

	public function survey_360($role)
	{
		$form_360 = $this->model_users->form_360();
		$id_form=$form_360[0]->id_form;
		$data['role'] = $role;
		$data['judul']  = $this->model_users->judul($id_form);
		$data['list_parent']  = $this->model_users->list_parent($id_form);
		$data['list_question'] = $this->model_users->list_question($id_form);
		$data['list_multiple_choice'] = $this->model_users->list_multiple_choice();
		$data['list_forced_choice'] = $this->model_users->list_forced_choice();
		$this->load->view('user/survey360',$data);
	}


	public function user_dashboard()
	{	
		$mine = $this->session->userdata('nopeg');
		$data['plot_adkar'] = $this->model_users->plot_adkar($mine);
		$data['avg_adkar'] = $this->model_users->avg_adkar($mine);
		$data['ketercapaian_360'] = $this->model_users->ketercapaian_360($mine);
		$data['data_akselerasi'] = $this->model_users->data_akselerasi($mine);
		$data['gauge_akselerasi'] = $this->model_users->gauge_akselerasi($mine);
		$data['engagement_score'] = $this->model_users->engagement_score($mine);
		$data['engagement_dimensi'] = $this->model_users->engagement_dimensi($mine);
		
		$this->load->view('user/user_dashboard', $data);
	}

	public function upload_akselerasi(){
		//sebelum mengeksekusi query
		$mine = $this->session->userdata('nopeg');
		$this->form_validation->set_rules('judul');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('user/user_dashboard');
		}
		else {
			if($_FILES['userfile']['name'] != NULL){
				//form sumbit dengan gambar diisi
				//load uploading file library
				 $config['upload_path']   = './uploads/'; 
		         $config['allowed_types'] = 'xls|xlsx|csv'; 
		         $config['max_size']	= '2048';
		         $config['overwrite']	= true;
				$this->model_users->delete_akselerasi($mine);
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if ( !$this->upload->do_upload()){
						$error = array('error' => $this->upload->display_errors());
        			    //var_dump($error);
        			    $message = "File yang anda unggah tidak sesuai dengan format. Unggah data kembali.";
						echo "<script type='text/javascript'>alert('$message');
						window.location.href='".base_url("user/user_dashboard")."';</script>";
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
						for ($row = 2; $row <= $highestRow; $row++){ 
						    //  Read a row of data into an array
						    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
						                                    NULL,
						                                    TRUE,
						                                    FALSE);
						    //  Insert row data array into your database of choice here
						    //print_r($rowData[1]);
						    
						    $this->model_users->upload_akselerasi($rowData,$mine);
						}
						
						//delete file
			            $file = $upload_data['file_name'];
			            $path = './uploads/' . $file;
			            unlink($path);

			            $message = "Data telah berhasil diperbaharui";
						echo "<script type='text/javascript'>alert('$message');
						window.location.href='".base_url("user/user_dashboard")."';</script>";
						}
					}
			//redirect('admin/data'); 
		}
	}

	public $data_akselerasi = 'data_akselerasi';

	public function extract_akselerasi() {
        //membuat objek
        	$mine=$this->session->userdata('nopeg');
            $objPHPExcel = new PHPExcel();
            $data = $this->db->query("SELECT id_akselerasi, pelaksana, mission, progres FROM $this->data_akselerasi WHERE nopeg=$mine");

            // Nama Field Baris Pertama
        	$fields = $data->list_fields();
        	$col = 0;
	        foreach ($fields as $field)
	        {
	            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $field);
	            $col++;
	        }
	 
	        // Mengambil Data
	        $row = 2;
	        foreach($data->result() as $data)
	        {
	            $col = 0;
	            foreach ($fields as $field)
	            {
	                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data->$field);
	                $col++;
	            }
	 
	            $row++;
	        }
	        $objPHPExcel->setActiveSheetIndex(0);

            //Set Title
            $objPHPExcel->getActiveSheet()->setTitle('Data Akselerasi');
 
            //Save ke .xlsx, kalau ingin .xls, ubah 'Excel2007' menjadi 'Excel5'
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
 
            //Header
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: no-store, no-cache, must-revalidate");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

            //Nama File
            header('Content-Disposition: attachment;filename="Data Akselerasi.xlsx"');

            //Download
            $objWriter->save("php://output");

    }

	public function isi_survey(){
		$this->form_validation->set_rules('id_question', 'Pertanyaan');
		$o=$this->input->post();
		// $b = count($this->input->post());
		// print_r($o);
		// exit();
		if ($this->form_validation->run() == FALSE){
			echo '<b>Periksa lagi data yang anda masukkan</b><br />';
		}
		else {
			//eksekusi query insert
			$b = sizeof($this->input->post());
			$c = 0;
			for ($i=0; $i < $b ; $i++) { 
			if ($this->input->post('type'.$i)=='skala'){
				$data_aksi = array(
					'id_question'			=> $this->input->post('id_question'.$i),
					'responden'				=> $this->input->post('responden'),
					'nilai'					=> $this->input->post('nilai'.$i),
					'input'					=> $c,
				);
				$this->model_users->tambah_survey($data_aksi);
			}
			elseif ($this->input->post('type'.$i)=='input'){
				$data_aksi = array(
					'id_question'			=> $this->input->post('id_question'.$i),
					'responden'				=> $this->input->post('responden'),
					'nilai'					=> $c,
					'input'					=> $this->input->post('nilai'.$i),

				);
				$this->model_users->tambah_survey($data_aksi);
			}	
			elseif ($this->input->post('type'.$i)=='textarea'){
				$data_aksi = array(
					'id_question'			=> $this->input->post('id_question'.$i),
					'responden'				=> $this->input->post('responden'),
					'nilai'					=> $c,
					'input'					=> $this->input->post('nilai'.$i),

				);
				$this->model_users->tambah_survey($data_aksi);
			}
			elseif ($this->input->post('type'.$i)=='multiple choice'){
				$data_aksi = array(
					'id_question'			=> $this->input->post('id_question'.$i),
					'responden'				=> $this->input->post('responden'),
					'nilai'					=> $c,
					'input'					=> $this->input->post('input_radio'.$i),

				);
				$this->model_users->tambah_survey($data_aksi);
			}
			elseif ($this->input->post('type'.$i)=='forced choice'){
				$id=$this->input->post('id_question'.$i);
					if($this->input->post('pil'.$id)==0){
						$nilaia	= 0;
						$nilaib	= 5;
					}
					elseif($this->input->post('pil'.$id)==1){
						$nilaia	= 1;
						$nilaib	= 4;
					}
					elseif($this->input->post('pil'.$id)==2){
						$nilaia	= 2;
						$nilaib	= 3;
					}
					elseif($this->input->post('pil'.$id)==3){
						$nilaia	= 3;
						$nilaib	= 2;
					}
					elseif($this->input->post('pil'.$id)==4){
						$nilaia	= 4;
						$nilaib	= 1;
					}
					elseif($this->input->post('pil'.$id)==5){
						$nilaia	= 5;
						$nilaib	= 0;
					}

					if($this->input->post('pila'.$id)==0){
						$nilaic	= 0;
						$nilaid	= 5;
					}
					elseif($this->input->post('pila'.$id)==1){
						$nilaic	= 1;
						$nilaid	= 4;
					}
					elseif($this->input->post('pila'.$id)==2){
						$nilaic	= 2;
						$nilaid	= 3;
					}
					elseif($this->input->post('pila'.$id)==3){
						$nilaic	= 3;
						$nilaid	= 2;
					}
					elseif($this->input->post('pila'.$id)==4){
						$nilaic	= 4;
						$nilaid	= 1;
					}
					elseif($this->input->post('pila'.$id)==5){
						$nilaic	= 5;
						$nilaid	= 0;
					}

				$data_aksi = array(
					'id_child'			=> $this->input->post('id_question'.$i),
					'responden'			=> $this->input->post('responden'),
					'curent1'			=> $nilaia,
					'curent2'			=> $nilaib,
					'future1'			=> $nilaic,
					'future2'			=> $nilaid,
				);
				$this->model_users->tambah_penilaian_forced($data_aksi);
			}
			
			//echo '<b>Data tindak lanjut 1 berhasil disimpan.</b><br />';
			}
			//print_r($data_aksi);

		} 
		redirect('user');
	}

	public function isi_survey360(){
		$this->form_validation->set_rules('id_question', 'Pertanyaan');
		$o=$this->input->post();
		// $b = count($this->input->post());
		// print_r($o);
		// exit();
		if ($this->form_validation->run() == FALSE){
			echo '<b>Periksa lagi data yang anda masukkan</b><br />';
		}
		else {
			//eksekusi query insert
			$b = sizeof($this->input->post());
			$c = 0;
			for ($i=0; $i < $b ; $i++) { 
			if ($this->input->post('type'.$i)=='skala'){
				$data_aksi = array(
					'id_question'			=> $this->input->post('id_question'.$i),
					'responden'				=> $this->input->post('responden'),
					'nilai'					=> $this->input->post('nilai'.$i),
					'input'					=> $this->input->post('role'),
				);
				$this->model_users->tambah_survey($data_aksi);
			}
			elseif ($this->input->post('type'.$i)=='input'){
				$data_aksi = array(
					'id_question'			=> $this->input->post('id_question'.$i),
					'responden'				=> $this->input->post('responden'),
					'nilai'					=> $c,
					'input'					=> $this->input->post('nilai'.$i),

				);
				$this->model_users->tambah_survey($data_aksi);
			}	
			elseif ($this->input->post('type'.$i)=='textarea'){
				$data_aksi = array(
					'id_question'			=> $this->input->post('id_question'.$i),
					'responden'				=> $this->input->post('responden'),
					'nilai'					=> $c,
					'input'					=> $this->input->post('nilai'.$i),

				);
				$this->model_users->tambah_survey($data_aksi);
			}
			elseif ($this->input->post('type'.$i)=='multiple choice'){
				$data_aksi = array(
					'id_question'			=> $this->input->post('id_question'.$i),
					'responden'				=> $this->input->post('responden'),
					'nilai'					=> $c,
					'input'					=> $this->input->post('input_radio'.$i),

				);
				$this->model_users->tambah_survey($data_aksi);
			}
			elseif ($this->input->post('type'.$i)=='forced choice'){
				$id=$this->input->post('id_question'.$i);
					if($this->input->post('pil'.$id)==0){
						$nilaia	= 0;
						$nilaib	= 5;
					}
					elseif($this->input->post('pil'.$id)==1){
						$nilaia	= 1;
						$nilaib	= 4;
					}
					elseif($this->input->post('pil'.$id)==2){
						$nilaia	= 2;
						$nilaib	= 3;
					}
					elseif($this->input->post('pil'.$id)==3){
						$nilaia	= 3;
						$nilaib	= 2;
					}
					elseif($this->input->post('pil'.$id)==4){
						$nilaia	= 4;
						$nilaib	= 1;
					}
					elseif($this->input->post('pil'.$id)==5){
						$nilaia	= 5;
						$nilaib	= 0;
					}

					if($this->input->post('pila'.$id)==0){
						$nilaic	= 0;
						$nilaid	= 5;
					}
					elseif($this->input->post('pila'.$id)==1){
						$nilaic	= 1;
						$nilaid	= 4;
					}
					elseif($this->input->post('pila'.$id)==2){
						$nilaic	= 2;
						$nilaid	= 3;
					}
					elseif($this->input->post('pila'.$id)==3){
						$nilaic	= 3;
						$nilaid	= 2;
					}
					elseif($this->input->post('pila'.$id)==4){
						$nilaic	= 4;
						$nilaid	= 1;
					}
					elseif($this->input->post('pila'.$id)==5){
						$nilaic	= 5;
						$nilaid	= 0;
					}

				$data_aksi = array(
					'id_child'			=> $this->input->post('id_question'.$i),
					'responden'			=> $this->input->post('responden'),
					'curent1'			=> $nilaia,
					'curent2'			=> $nilaib,
					'future1'			=> $nilaic,
					'future2'			=> $nilaid,
				);
				$this->model_users->tambah_penilaian_forced($data_aksi);
			}
			
			//echo '<b>Data tindak lanjut 1 berhasil disimpan.</b><br />';
			}
			//print_r($data_aksi);

		} 
		redirect('user');
	}

	public function action_top1(){
		$this->form_validation->set_rules('aksi', 'Aksi');
		$this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab');
		$this->form_validation->set_rules('frekuensi', 'Frekuensi');
		$this->form_validation->set_rules('waktu_pelaksanaan', 'Waktu Pelaksanaan');
		$this->form_validation->set_rules('batas_pelaksanaan', 'Batas Pelaksanaan');
			
		if ($this->form_validation->run() == FALSE){
			echo '<b>Periksa lagi data yang anda masukkan</b><br />';
		}
		else {
			//eksekusi query insert
			$status='top';
			$data_aksi = array(
				'id_rekomendasi'		=> $this->input->post('id_rekomendasi'),
				'status'				=> $status,
				'id_unit'				=> $this->session->userdata('unit'),
				'aksi'					=> $this->input->post('aksi'),
				'penanggung_jawab'		=> $this->input->post('penanggung_jawab'),
				'frekuensi'				=> $this->input->post('frekuensi'),
				'waktu_pelaksanaan'		=> $this->input->post('waktu_pelaksanaan'),
				'batas_pelaksanaan'		=> $this->input->post('batas_pelaksanaan')
			);
			 $this->model_users->tambah_aksi($data_aksi);
			 echo '<b>Data tindak lanjut 1 berhasil disimpan.</b><br />';
		}
	}

	public function action_top2(){
		$this->form_validation->set_rules('aksi', 'Aksi');
		$this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab');
		$this->form_validation->set_rules('frekuensi', 'Frekuensi');
		$this->form_validation->set_rules('waktu_pelaksanaan', 'Waktu Pelaksanaan');
		$this->form_validation->set_rules('batas_pelaksanaan', 'Batas Pelaksanaan');
			
		if ($this->form_validation->run() == FALSE){
			echo '<b>Periksa lagi data yang anda masukkan</b><br />';
		}
		else {
			//eksekusi query insert
			$status='top';
			$data_aksi = array(
				'id_rekomendasi'		=> $this->input->post('id_rekomendasi'),
				'status'				=> $status,
				'id_unit'				=> $this->session->userdata('unit'),
				'aksi'					=> $this->input->post('aksi'),
				'penanggung_jawab'		=> $this->input->post('penanggung_jawab'),
				'frekuensi'				=> $this->input->post('frekuensi'),
				'waktu_pelaksanaan'		=> $this->input->post('waktu_pelaksanaan'),
				'batas_pelaksanaan'		=> $this->input->post('batas_pelaksanaan')
			);
			 $this->model_users->tambah_aksi($data_aksi);
			 echo '<b>Data tindak lanjut 2 berhasil disimpan.</b><br />';
		}
	}

	public function action_top3(){
		$this->form_validation->set_rules('aksi', 'Aksi');
		$this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab');
		$this->form_validation->set_rules('frekuensi', 'Frekuensi');
		$this->form_validation->set_rules('waktu_pelaksanaan', 'Waktu Pelaksanaan');
		$this->form_validation->set_rules('batas_pelaksanaan', 'Batas Pelaksanaan');
			
		if ($this->form_validation->run() == FALSE){
			echo '<b>Periksa lagi data yang anda masukkan</b><br />';
		}
		else {
			//eksekusi query insert
			$status='top';
			$data_aksi = array(
				'id_rekomendasi'		=> $this->input->post('id_rekomendasi'),
				'status'				=> $status,
				'id_unit'				=> $this->session->userdata('unit'),
				'aksi'					=> $this->input->post('aksi'),
				'penanggung_jawab'		=> $this->input->post('penanggung_jawab'),
				'frekuensi'				=> $this->input->post('frekuensi'),
				'waktu_pelaksanaan'		=> $this->input->post('waktu_pelaksanaan'),
				'batas_pelaksanaan'		=> $this->input->post('batas_pelaksanaan')
			);
			 $this->model_users->tambah_aksi($data_aksi);
			 echo '<b>Data tindak lanjut 3 berhasil disimpan.</b><br />';
		}
	}

	public function action_bottom1(){
		$this->form_validation->set_rules('aksi', 'Aksi');
		$this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab');
		$this->form_validation->set_rules('frekuensi', 'Frekuensi');
		$this->form_validation->set_rules('waktu_pelaksanaan', 'Waktu Pelaksanaan');
		$this->form_validation->set_rules('batas_pelaksanaan', 'Batas Pelaksanaan');
			
		if ($this->form_validation->run() == FALSE){
			echo '<b>Periksa lagi data yang anda masukkan</b><br />';
		}
		else {
			//eksekusi query insert
			$status='bottom';
			$data_aksi = array(
				'id_rekomendasi'		=> $this->input->post('id_rekomendasi'),
				'status'				=> $status,
				'id_unit'				=> $this->session->userdata('unit'),
				'aksi'					=> $this->input->post('aksi'),
				'penanggung_jawab'		=> $this->input->post('penanggung_jawab'),
				'frekuensi'				=> $this->input->post('frekuensi'),
				'waktu_pelaksanaan'		=> $this->input->post('waktu_pelaksanaan'),
				'batas_pelaksanaan'		=> $this->input->post('batas_pelaksanaan')
			);
			 $this->model_users->tambah_aksi($data_aksi);
			 echo '<b>Data tindak lanjut 1 berhasil disimpan.</b><br />';
		}
	}

	public function action_bottom2(){
		$this->form_validation->set_rules('aksi', 'Aksi');
		$this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab');
		$this->form_validation->set_rules('frekuensi', 'Frekuensi');
		$this->form_validation->set_rules('waktu_pelaksanaan', 'Waktu Pelaksanaan');
		$this->form_validation->set_rules('batas_pelaksanaan', 'Batas Pelaksanaan');
			
		if ($this->form_validation->run() == FALSE){
			echo '<b>Periksa lagi data yang anda masukkan</b><br />';
		}
		else {
			//eksekusi query insert
			$status='bottom';
			$data_aksi = array(
				'id_rekomendasi'		=> $this->input->post('id_rekomendasi'),
				'status'				=> $status,
				'id_unit'				=> $this->session->userdata('unit'),
				'aksi'					=> $this->input->post('aksi'),
				'penanggung_jawab'		=> $this->input->post('penanggung_jawab'),
				'frekuensi'				=> $this->input->post('frekuensi'),
				'waktu_pelaksanaan'		=> $this->input->post('waktu_pelaksanaan'),
				'batas_pelaksanaan'		=> $this->input->post('batas_pelaksanaan')
			);
			 $this->model_users->tambah_aksi($data_aksi);
			 echo '<b>Data tindak lanjut 2 berhasil disimpan.</b><br />';
		}
	}

	public function action_bottom3(){
		$this->form_validation->set_rules('aksi', 'Aksi');
		$this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab');
		$this->form_validation->set_rules('frekuensi', 'Frekuensi');
		$this->form_validation->set_rules('waktu_pelaksanaan', 'Waktu Pelaksanaan');
		$this->form_validation->set_rules('batas_pelaksanaan', 'Batas Pelaksanaan');
			
		if ($this->form_validation->run() == FALSE){
			echo '<b>Periksa lagi data yang anda masukkan</b><br />';
		}
		else {
			//eksekusi query insert
			$status='bottom';
			$data_aksi = array(
				'id_rekomendasi'		=> $this->input->post('id_rekomendasi'),
				'status'				=> $status,
				'id_unit'				=> $this->session->userdata('unit'),
				'aksi'					=> $this->input->post('aksi'),
				'penanggung_jawab'		=> $this->input->post('penanggung_jawab'),
				'frekuensi'				=> $this->input->post('frekuensi'),
				'waktu_pelaksanaan'		=> $this->input->post('waktu_pelaksanaan'),
				'batas_pelaksanaan'		=> $this->input->post('batas_pelaksanaan')
			);
			 $this->model_users->tambah_aksi($data_aksi);
			 echo '<b>Data tindak lanjut 3 berhasil disimpan.</b><br />';
		}
	}

	
	function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}

	public function monitor()
	{	
		$unit = $this->session->userdata('unit');
		$data['monitoring_vp'] = $this->model_users->monitoring_vp($unit);
		$data['monitoring_dir'] = $this->model_users->monitoring_dir($unit);
		$data['daftar_aksivp'] = $this->model_users->daftar_aksivp($unit);
		$data['daftar_aksidir'] = $this->model_users->daftar_aksidir($unit);
		//print_r($data);
		$this->load->view('user/monitoring', $data);
	}

	public function cetak(){
		$unit = $this->session->userdata('unit');
		
		if ($this->session->userdata('level')=='MGR'){ 
			$data['mgrsm'] = $this->model_users->mgrsm($unit);
			$data['mgrvp'] = $this->model_users->mgrvp($unit);
			$data['mgrdir'] = $this->model_users->mgrdir($unit);
		}
		elseif ($this->session->userdata('level')=='SM'){
			$data['smvp'] = $this->model_users->smvp($unit);
			$data['smdir'] = $this->model_users->smdir($unit);
		}
		elseif ($this->session->userdata('level')=='VP'){ 
			$data['vpdir'] = $this->model_users->vpdir($unit);
		}
		else{ 
			$data['dir'] = $this->model_users->dir();
		}
		$data['corporate'] = $this->model_users->corporate();
		$data['score'] = $this->model_users->nilaiku($unit);
		$data['level'] = $this->model_users->levelku($unit);
		$data['nilai_dimensi'] = $this->model_users->nilai_dimensi($unit);
		$data['direktur'] = $this->model_users->direktur();
		$data['cek_bottom'] = $this->model_users->cek_bottom($unit);
		$data['cek_top'] = $this->model_users->cek_top($unit);
		//Demografi
		$data['gender'] = $this->demografi_model->gender();
		$data['lokasi'] = $this->demografi_model->lokasi();
		$data['pendidikan'] = $this->demografi_model->pendidikan1();
		$data['posisi'] = $this->demografi_model->posisi();
		$data['profesi'] = $this->demografi_model->profesi();
		$data['usia'] = $this->demografi_model->usia1();
		$data['generasi'] = $this->demografi_model->generasi1();
		$data['status'] = $this->demografi_model->status1();
		$data['Hpendidikan'] = $this->demografi_model->Hpendidikan1();
		$data['Hposisi'] = $this->demografi_model->Hposisi1();
		$data['Hprofesi'] = $this->demografi_model->Hprofesi1();
		$data['Hstatus'] = $this->demografi_model->Hstatus1();
		$data['Husia'] = $this->demografi_model->Husia1();
		$data['Hgenerasi'] = $this->demografi_model->Hgenerasi1();
		//$data = [];
        //load the view and saved it into $html variable
        $html=$this->load->view('export_user', $data, true);
 
        //this the the PDF filename that user will get to download
        $pdfFilePath = "MyDashboard.pdf";
 
        //load mPDF library
        $this->load->library('m_pdf');

        $mpdf = new mPDF('utf-8', 'A4', '', '', '0', '0', '0', '0', '7', '7');

		$mpdf->useSubstitutions = true;
		$mpdf->simpleTables = true;
		$mpdf->SetHTMLHeader($header);
        $mpdf->SetHTMLHeader($headerEven, 'E');
        $mpdf->SetHTMLFooter($footer);
        $mpdf->SetHTMLFooter($footer, 'E');
		$mpdf->setAutoTopMargin = 'stretch';
		$mpdf->setAutoBottomMargin = 'stretch';
		$mpdf->autoMarginPadding = 0;
		$mpdf->SetDisplayMode('fullpage');
 
       //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($html);
 
        //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, "D");
        redirect('user');
	}

	public function edit()
	{
		$unit = $this->session->userdata('unit');
		$data['list_staf'] = $this->model_users->list_staf($unit);
		$data['list_vp'] = $this->model_users->list_vp($unit);
		$data['aksi'] = $this->model_users->tampil_aksi($unit);
		$data['aksi1'] = $this->model_users->tampil_aksi_bottom($unit);				
		//print_r($data);
		$this->load->view('user/edit_aksi',$data);
	}

	// public function progres()
	// {
	// 	$penanggung_jawab = $this->session->userdata('penanggung_jawab');
	// 	$data['progres_aksi'] = $this->model_users->progres_aksi($penanggung_jawab);			
	// 	//print_r($data);
	// 	$this->load->view('user/progres',$data);
	// }

	// public function update_progres($id_aksi){
	// 	$this->form_validation->set_rules('progres');
	// 	$this->form_validation->set_rules('keterangan');

	// 	if ($this->form_validation->run() == FALSE){
	// 		$penanggung_jawab = $this->session->userdata('penanggung_jawab');
	// 		$data['progres_aksi'] = $this->model_users->progres_aksi($penanggung_jawab);
	// 		$this->load->view('user/progres', $data);
	// 	}
	// 	else {
	// 			$data_progres = array(
	// 					'progres'				=> set_value('progres'),
	// 					'keterangan'			=> set_value('keterangan')
	// 			);
	// 			$this->model_users->update_progres($id_aksi, $data_progres);
	// 			redirect('user/progres');
	// 		}
	
	// }

	public function edit_action_top($id_aksi) {
		$this->form_validation->set_rules('aksi',"Aksi");
		$unit = $this->session->userdata('unit');
		$data['list_staf'] = $this->model_users->list_staf($unit);
		$data['list_vp'] = $this->model_users->list_vp($unit);
		$data['aksi'] = $this->model_users->tampil_aksi($unit);
		$data['aksi1'] = $this->model_users->tampil_aksi_bottom($unit);			
		if ($this->form_validation->run() == FALSE){
			$this->load->view('user/edit_aksi',$data);
		}
		else {
				//form submit dengan gambar dikosongkan
				$status='top';
				$data_aksi = array(
				'status'				=> $status,
				'id_unit'				=> $this->session->userdata('unit'),
				'aksi'					=> $this->input->post('aksi'),
				'penanggung_jawab'		=> $this->input->post('penanggung_jawab'),
				'frekuensi'				=> $this->input->post('frekuensi'),
				'waktu_pelaksanaan'		=> $this->input->post('waktu_pelaksanaan'),
				'batas_pelaksanaan'		=> $this->input->post('batas_pelaksanaan'),
				
			);
			 $this->model_users->edit_aksi_top($id_aksi,$data_aksi);
			 redirect('user/edit');
			
		}
	}	
	public function edit_action_bottom($id_aksi) {
		$this->form_validation->set_rules('aksi',"Aksi");
		$unit = $this->session->userdata('unit');
		$data['list_staf'] = $this->model_users->list_staf($unit);
		$data['list_vp'] = $this->model_users->list_vp($unit);
		$data['aksi'] = $this->model_users->tampil_aksi($unit);
		$data['aksi1'] = $this->model_users->tampil_aksi_bottom($unit);			
		if ($this->form_validation->run() == FALSE){
			$this->load->view('user/edit_aksi',$data);
		}
		else {
				//form submit dengan gambar dikosongkan
				$status='bottom';
				$data_aksi = array(
				'status'				=> $status,
				'id_unit'				=> $this->session->userdata('unit'),
				'aksi'					=> $this->input->post('aksi'),
				'penanggung_jawab'		=> $this->input->post('penanggung_jawab'),
				'frekuensi'				=> $this->input->post('frekuensi'),
				'waktu_pelaksanaan'		=> $this->input->post('waktu_pelaksanaan'),
				'batas_pelaksanaan'		=> $this->input->post('batas_pelaksanaan'),
			);
			$this->model_users->edit_aksi_bottom($id_aksi,$data_aksi);
			redirect('user/edit');
			
		}
	}


	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */