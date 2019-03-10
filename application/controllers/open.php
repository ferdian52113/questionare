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


	
}