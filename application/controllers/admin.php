<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_admin');
		date_default_timezone_set("Asia/Jakarta");
		if ($this->session->userdata('role')!=1) {
            redirect('error');
        }
	}
	public function index()
	{		
		$data['form'] = $this->model_admin->form_list();
		// $data['list_construct'] = $this->model_admin->list_construct();
		// $data['list_pertanyaan'] = $this->model_admin->list_pertanyaan();
		// $data['list_multiple_choice'] = $this->model_admin->list_multiple_choice();
		// $data['list_forced_choice'] = $this->model_admin->list_forced_choice();
		// $data['list_kategori'] = $this->model_admin->list_kategori();
		$this->load->view('admin/form_list',$data);
	}

	public function add_form(){
		$this->form_validation->set_rules('title', 'title');
		$this->form_validation->set_rules('description', 'description');
			
		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('msg', '<div class="alert animated fadeInRight alert-danger">Gagal menambahkan form baru.</div>');
			redirect('admin');
		}
		else {
			$status = $this->input->post('status');
			$form_code  = $this->getRandomString();
			$link	 = $this->input->post('link');

			//eksekusi query insert
			$data_form = array(
				'formCode'		=> $form_code,
				'link'			=> $this->input->post('link'),
				'title'			=> $this->input->post('title'),
				'description'	=> $this->input->post('description'),
				'isActive'		=> $status,
				'createdDate'	=> date("Y-m-d H:i:s"),
				'createdBy'		=> $this->session->userdata('username'),
			);

			$sts = $this->model_admin->cekData('tb_form',$link);
			if($sts){
				$this->model_admin->insertData('tb_form',$data_form);
				$this->session->set_flashdata('msg', '<div class="alert animated fadeInRight alert-success">Berhasil menambahkan form baru.</div>');	
			} else {
				$this->session->set_flashdata('msg', '<div class="alert animated fadeInRight alert-danger">Gagal menambahkan form baru. Silahkan memasukkan link yang berbeda.</div>');
			}
			
			redirect('admin');

		}
	}

	function getRandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $string = '';

	    for ($i = 0; $i < $length; $i++) {
	        $string .= $characters[mt_rand(0, strlen($characters) - 1)];
	    }

	    return $string;
	}


	public function construct()
	{		
		//print_r($data);
		$data['data_form'] = $this->model_admin->data_form();
		$data['list_construct'] = $this->model_admin->list_construct();
		$this->load->view('admin/list_construct',$data);
	}

	public function edit_pertanyaan($id_child){
		$this->form_validation->set_rules('parent_id', 'Construct');
		$this->form_validation->set_rules('question', 'Pertanyaan');
		$this->form_validation->set_rules('type', 'Tipe Pertanyaan');
		$s=$this->input->post('edittext');
		// $y=$s[0];
		// print_r($y);
		if ($this->form_validation->run() == FALSE){
			redirect('admin');
		}
		else {

			if ($this->input->post('type')=='multiple choice') {
					//eksekusi query insert
					$data_pertanyaan = array(
						'id_form'		=> $this->input->post('id_form'),
						'parent_id'		=> $this->input->post('parent_id'),
						'question'		=> $this->input->post('question'),
						'type'			=> $this->input->post('type'),
						'jumlah'		=> $this->input->post('jumlah'),
					);
					$this->model_admin->edit_pertanyaan($data_pertanyaan, $id_child);
					$id_choice=$this->model_admin->ambil_pertanyaan();
					$data_pilihan= array(
						'id_question'	=> $id_choice[0]->id_child,
						'choice1'		=> $this->input->post('tanya1'),
						'choice2'		=> $this->input->post('tanya2'),
						'choice3'		=> $this->input->post('tanya3'),
						'choice4'		=> $this->input->post('tanya4'),
						'answer'		=> $this->input->post('jawaban'),
					);
					$this->model_admin->edit_pilihan($data_pilihan);
			} elseif($this->input->post('type')=='forced choice') {
					//eksekusi query insert
					$data_pertanyaan = array(
						'id_form'		=> $this->input->post('id_form'),
						'parent_id'		=> $this->input->post('parent_id'),
						'question'		=> $this->input->post('perintah'),
						'type'			=> $this->input->post('type'),
						'jumlah'		=> $this->input->post('jumlah'),
					);
					$this->model_admin->edit_pertanyaan($data_pertanyaan, $id_child);
					$data_forced= array(
						'id_child'		=> $data_id[0]->id_child,
						'pertanyaan1'	=> $this->input->post('pertanyaan1'),
						'kategori1'		=> $this->input->post('kategori1'),
						'pertanyaan2'	=> $this->input->post('pertanyaan2'),
						'kategori2'		=> $this->input->post('kategori2'),
					);
					$this->model_admin->edit_forced($data_forced);
			} elseif ($this->input->post('type')=='skala'){
					$data_pertanyaan = array(
						'id_form'		=> $this->input->post('id_form'),
						'parent_id'		=> $this->input->post('parent_id'),
						'question'		=> $this->input->post('question'),
						'type'			=> $this->input->post('type'),
						'kategori'		=> $this->input->post('kategori'),
						'jumlah'		=> $this->input->post('jumlah')
					);
					$this->model_admin->edit_pertanyaan($data_pertanyaan, $id_child);
			} else {
			//eksekusi query insert
			$data_pertanyaan = array(
				'id_form'		=> $this->input->post('id_form'),
				'parent_id'		=> $this->input->post('parent_id'),
				'question'		=> $this->input->post('question'),
				'type'			=> $this->input->post('type'),
				'jumlah'		=> $this->input->post('jumlah')
			);
			$this->model_admin->edit_pertanyaan($data_pertanyaan, $id_child);
			}
			redirect('admin');
		}
	}

	public function edit_construct($id_parent){
		$this->form_validation->set_rules('parent_name', 'Construct');
			
		if ($this->form_validation->run() == FALSE){
			redirect('admin/construct');
		}
		else {
			//eksekusi query insert
			$data_pertanyaan = array(
				'id_form'		=> $this->input->post('id_form'),
				'parent_name'		=> $this->input->post('parent_name'),
			);
			$this->model_admin->edit_construct($data_pertanyaan, $id_parent);
			redirect('admin/construct');

		}
	}

	public function edit_form($id_form){
		$this->form_validation->set_rules('judul', 'Judul');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi');
			
		if ($this->form_validation->run() == FALSE){
			redirect('admin/forms');
		}
		else {
			//eksekusi query insert
			$data_form = array(
				'judul'			=> $this->input->post('judul'),
				'deskripsi'		=> $this->input->post('deskripsi'),
				'form_type'		=> $this->input->post('form_type')
			);
			$this->model_admin->edit_form($data_form, $id_form);
			redirect('admin/forms');

		}
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
 	
	public function proses(){
		//sebelum mengeksekusi query
		$this->form_validation->set_rules('judul');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('admin/data');
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
						window.location.href='".base_url("admin/data")."';</script>";
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
						window.location.href='".base_url("admin/data")."';</script>";
						}
					}
			//redirect('admin/data'); 
		}
	}
	function logout()
	{
		$this->session->sess_destroy();
		redirect('admin_login');
	}
}