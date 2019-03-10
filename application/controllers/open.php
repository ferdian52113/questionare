<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Open extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        
        $this->load->helper('text');
        $this->load->helper('form');
        $this->load->library('image_lib');
        $this->load->library('form_validation');
		$this->load->model('model_questionare');
		$this->load->model('model_admin');
		date_default_timezone_set("Asia/Jakarta");
	}
	public function index()
	{
		$param=$_GET;
		if(count($param)>0){
			$formCode = isset($_GET['formCode'])? $_GET['formCode'] : null;
			if($formCode != null){
				$status=$this->model_questionare->cekDataForm('tb_form',$formCode);
				if(!$status){
					$this->load->view('404');
				} else {
					$this->loadQuestionare($formCode);
				}
			} else {
				$this->load->view('404');
			}
		} else {
			$result=json_decode($this->model_questionare->getDefaultForm());
			if($result->status){
				$formCode=$result->data[0]->formCode;
				$this->loadQuestionare($formCode);
			} else {
				$this->load->view('404');
			}
		}
	}

	private function loadQuestionare($formCode){
		$dtForm = json_decode($this->model_questionare->getDataTable('formCode',$formCode,'tb_form'));
		$dtSection = json_decode($this->model_questionare->getDataTable('formCode',$formCode,'tb_section'));
		$dtQuestion = json_decode($this->model_questionare->getDataTableQuestion('formCode',$formCode,'tb_question'));
		$dtQuestionDetail = json_decode($this->model_questionare->getDataTableQuestionDetail($formCode));
		$data['form'] = $dtForm->status==true? $dtForm->data : null;
		$data['section'] = $dtSection->status==true? $dtSection->data : null;
		$data['question'] = $dtQuestion->status==true? $dtQuestion->data : null;
		$data['questionDetail'] = $dtQuestionDetail->status==true? $dtQuestionDetail->data : null;
		$this->load->view('template_question-2',$data);
		//print_r($data['question']);
	}

	public function save($status=null)
	{
		
		//print_r($this->input->get());
		$formCode=$this->input->post('formCode');
		$sectionID=$this->input->post('sectionID');
		$responseID=$this->input->post('responseID');
		$dtQuestion = json_decode($this->model_questionare->getDataTableQuestion2('formCode',$formCode,'sectionID',$sectionID,'tb_question'));
		$question = $dtQuestion->data;
		$size = sizeof($question);
		//Insert tb_response
		$data_responden = array( 
			'responseID' => $responseID,
			'formCode' => $formCode,
			'createdDate' => date("Y-m-d H:i:s"),
			'status'	=> 0,
		);
		$data_jabawan_temp = array( 
			'responseID' => $responseID,
			'formCode' => $formCode,
			'sectionID' => $sectionID,
		);
		$this->model_questionare->insertSelectData('tb_response', $data_responden);
		$this->model_questionare->deleteData2('tb_answer_temp',$data_jabawan_temp);
		for ($i=0; $i < $size; $i++) {
			$data_jabawan = array(
				'responseID'				=> $responseID,
				'sectionID'					=> $sectionID,
				'formCode'					=> $formCode,
				'questionID'				=> $question[$i]->questionID,
				'value'						=> $this->input->post($question[$i]->questionID) == "other"? $this->input->post($question[$i]->questionID.'-other') : $this->input->post($question[$i]->questionID),
				'createdDate'				=> date("Y-m-d H:i:s"),
			);
			$this->model_questionare->insertData('tb_answer_temp', $data_jabawan);
		}
		
		if($status=="final"){
			//Update tb_response and Insert tb_answer_temp to tb_answer
			$this->model_questionare->moveUpdateData($data_jabawan_temp);
		}

		$data = array('success' => true);
		echo json_encode($data);
	}


	function done($formCode=null){
		if($formCode){
			$dtForm = json_decode($this->model_questionare->getDataTable('formCode',$formCode,'tb_form'));
			$data['form'] = $dtForm->status==true? $dtForm->data : null;
			$this->load->view('template_question_success',$data);
		} else {
			$this->load->view('404');
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

	
}