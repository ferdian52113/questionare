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
        if(!$this->session->userdata('nopeg')){
				$this->session->set_flashdata('error','Maaf anda belum log in');	
				redirect('login');			
			}
        
        $this->load->helper('text');
        $this->load->helper('form');
        $this->load->library('image_lib');
        $this->load->library('form_validation');
		$this->load->model('model_users');
		$this->load->model('model_users1');
		$this->load->model('model_admin');
		$this->load->model('model_chart');
		$this->load->model('model_chart1');
		$this->load->model('model_chart2');
	}
	public function index()
	{
		$this->load->view('user/index_user');
	}
	
	function profile()
	{
		$this->load->view('user/profile_view');
	}
	
	function assessment()
	{	
		$mine = $this->session->userdata('unit');
		$data['pertanyaan']	= $this->model_users->daftar($mine);
		$data['setting']	= $this->model_users->skala();
             /*foreach ($data['pertanyaan'] as $a) {
                 for($j=0;$j<10;$j++) {
                 	$a='$q'.$j;
                 print_r($a);
             }
             }
                  */
		$this->load->view('user/assessment_view',$data);
	}
	
	function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}
	
	function assign_people(){
		$tahun_pilih = $this->input->post('tahun');
		
		//jika belum dipilih, maka gunakan tahun aktif
		if (!$tahun_pilih)
		{
			$tahun_pilih = $this->session->userdata('tahun_pilih');
		}
		$data['tahun'] = $tahun_pilih;
		$data['tahun_aktif'] = $this->session->userdata('tahun');
		$data['_daftar_tahun'] = $this->model_admin->list_tahun();
		$mine = $this->session->userdata('nopeg');
		$data['setting']= $this->model_admin->skala();
		$periode=$data['setting']->periode_aktif;
		$tahun=$data['setting']->tahun_aktif;
		$data['peoples']= $this->model_users->assign($mine,$tahun,$periode);
		//print_r($data['peoples']);

		$this->load->view('user/assign_people_view',$data);
	}

	function myscore(){
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
		/*print_r($data['tahun_aktif']);exit();*/
		
		$mine = $this->session->userdata('nopeg');
		$data['jumlah_periode']= $this->model_users->count_periode($mine,$data);
		$data['score']= $this->model_users->score($mine,$data);
		//print_r($data['score']);exit();
		if (!$data['score'][0]->jumlah_nilai) {
				$data['score']=0;	
		} else {
				$data['score']=($data['score'][0]->jumlah_nilai)/($data['jumlah_periode'][0]->jumlah_periode);
		}
		$data['scoreperiode1']= $this->model_users->scoreperiode1($mine,$data);
		$data['scoreperiode2']= $this->model_users->scoreperiode2($mine,$data);
		$data['scoreperiode3']= $this->model_users->scoreperiode3($mine,$data);
		$data['scoreperiode4']= $this->model_users->scoreperiode4($mine,$data);
		$data['jumlah_penilaian']= $this->model_users->jumlah_penilaian($mine,$data);
		$data['jumlah_penilaian2']= $this->model_users->jumlah_penilaian2($mine,$data);
		$data['jumlah_penilaian3']= $this->model_users->jumlah_penilaian3($mine,$data);
		$data['jumlah_penilaian4']= $this->model_users->jumlah_penilaian4($mine,$data);
		$data['nilai_dimensi_total']= $this->model_users->nilai_dimensi($mine,$data);
		$data['nilai_dimensi1']= $this->model_users->nilai_dimensiperiode1($mine,$data);
		$data['nilai_dimensi2']= $this->model_users->nilai_dimensiperiode2($mine,$data);
		$data['nilai_dimensi3']= $this->model_users->nilai_dimensiperiode3($mine,$data);
		$data['nilai_dimensi4']= $this->model_users->nilai_dimensiperiode4($mine,$data);
		$data['cek_top']= $this->model_users->cek_top($mine,$data);
		$data['cek_top2']= $this->model_users->cek_top2($mine,$data);
		$data['cek_top3']= $this->model_users->cek_top3($mine,$data);
		$data['cek_top4']= $this->model_users->cek_top4($mine,$data);
		$data['cek_bottom']= $this->model_users->cek_bottom($mine,$data);
		$data['cek_bottom2']= $this->model_users->cek_bottom2($mine,$data);
		$data['cek_bottom3']= $this->model_users->cek_bottom3($mine,$data);
		$data['cek_bottom4']= $this->model_users->cek_bottom4($mine,$data);
		$data['listaksi']= $this->model_users->listaksi($mine,$data);
		$data['listaksi2']= $this->model_users->listaksi2($mine,$data);
		$data['listaksi3']= $this->model_users->listaksi3($mine,$data);
		$data['listaksi4']= $this->model_users->listaksi4($mine,$data);
		$data['listaksifull']= $this->model_users->listaksifull($mine,$data);
		$data['sumaksi']= $this->model_users->sumaksi($mine,$data);
		$data['sumaksi2']= $this->model_users->sumaksi2($mine,$data);
		$data['sumaksi3']= $this->model_users->sumaksi3($mine,$data);
		$data['sumaksi4']= $this->model_users->sumaksi4($mine,$data);
		$data['sumaksifull']= $this->model_users->sumaksifull($mine,$data);
		/*print_r($data['nilai_dimensi1']);
		print("---");
		print_r($data['nilai_dimensi2']);
		print("---");
		print_r($data['nilai_dimensi3']);
		print("---");
		print_r($data['nilai_dimensi4']);*/
		//exit();
		$this->load->view('user/score_view',$data);
	}
	function asses($nopeg){
		$mine = $this->session->userdata('unit');
		$data['nopeg_target']=$nopeg;
		$data['nama']=$this->model_users->find($nopeg);
		$data['target']=$nopeg;
		$data['pertanyaan']	= $this->model_users->daftar($data['nama'][0]->pertanyaan);
		$data['setting']	= $this->model_users->skala();
		//print_r($data['nama'][0]->unit);
		$this->load->view('user/assessment_view',$data);
	}

	function daftar()
	{
		$this->load->helper('form');
		$this->load->view('user/tambah_inovasi');
	}
	public function tambah(){
		//sebelum mengeksekusi query
		$this->form_validation->set_rules('target');
		$data['setting'] = $this->model_users->skala();
		if ($this->form_validation->run() == FALSE){
			$this->load->view('user/assessment_view');
		}
		else {
			$year1=$data['setting'][0]->tahun_aktif;
			$data_hasilpenilaian = array(
								'asesor'				=> $this->session->userdata('nopeg'),
								'target'				=> $this->input->post('target'),
								'hasilq1'				=> $this->input->post('hasilq1'),
								'hasilq2'				=> $this->input->post('hasilq2'),
								'hasilq3'				=> $this->input->post('hasilq3'),
								'hasilq4'				=> $this->input->post('hasilq4'),
								'hasilq5'				=> $this->input->post('hasilq5'),
								'hasilq6'				=> $this->input->post('hasilq6'),
								'hasilq7'				=> $this->input->post('hasilq7'),
								'hasilq8'				=> $this->input->post('hasilq8'),
								'hasilq9'				=> $this->input->post('hasilq9'),
								'hasilq10'				=> $this->input->post('hasilq10'),
								'tahun'					=> $year1,
								'periode'				=> $data['setting'][0]->periode_aktif,
								'skala'					=> $this->input->post('skala')
						);
				//print_r($data_hasilpenilaian);exit();	
			$a=$data_hasilpenilaian['target'];
			$b=$data_hasilpenilaian['asesor'];
			$data['target']=$this->model_users->find3($a);
			$data['asesor']=$this->model_users->find3($b);
			//print_r($data['target'][0]->level);
			if ($data['asesor'][0]->level==$data['target'][0]->level){
				$this->model_users->tambah_hasilpenilaianpeers($data_hasilpenilaian);
			}
			else if ($data['asesor'][0]->level=='STAFF' && $data['target'][0]->level=='Manager'){
				$this->model_users->tambah_hasilpenilaianpeers($data_hasilpenilaian);
			}
			else {
				$this->model_users->tambah_hasilpenilaianatasan($data_hasilpenilaian);
			}
			redirect('user/assign_people');
			}
	}

	public function action_bottom1(){
		$this->form_validation->set_rules('aksi', 'Aksi');
		$this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab');
		$this->form_validation->set_rules('frekuensi', 'Frekuensi');
		$this->form_validation->set_rules('waktu_pelaksanaan', 'Waktu Pelaksanaan');
		$this->form_validation->set_rules('batas_pelaksanaan', 'Batas Pelaksanaan');
		
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
		$data['score']= $this->model_users->score($mine,$data);
		if (!$data['score'][0]->jumlah_nilai) {
				$data['score']=0;	
		} else {
				$data['score']=($data['score'][0]->jumlah_nilai)/($data['jumlah_periode'][0]->jumlah_periode);
		}
		$data['scoreperiode1']= $this->model_users->scoreperiode1($mine,$data);
		$data['scoreperiode2']= $this->model_users->scoreperiode2($mine,$data);
		$data['scoreperiode3']= $this->model_users->scoreperiode3($mine,$data);
		$data['scoreperiode4']= $this->model_users->scoreperiode4($mine,$data);
		$data['jumlah_penilaian']= $this->model_users->jumlah_penilaian($mine,$data);
		$data['jumlah_penilaian2']= $this->model_users->jumlah_penilaian2($mine,$data);
		$data['jumlah_penilaian3']= $this->model_users->jumlah_penilaian3($mine,$data);
		$data['jumlah_penilaian4']= $this->model_users->jumlah_penilaian4($mine,$data);
		$data['nilai_dimensi1']= $this->model_users->nilai_dimensiperiode1($mine,$data);
		$data['nilai_dimensi2']= $this->model_users->nilai_dimensiperiode2($mine,$data);
		$data['nilai_dimensi3']= $this->model_users->nilai_dimensiperiode3($mine,$data);
		$data['nilai_dimensi4']= $this->model_users->nilai_dimensiperiode4($mine,$data);
		$data['cek_top']= $this->model_users->cek_top($mine,$data);
		$data['cek_top2']= $this->model_users->cek_top2($mine,$data);
		$data['cek_top3']= $this->model_users->cek_top3($mine,$data);
		$data['cek_top4']= $this->model_users->cek_top4($mine,$data);
		$data['cek_bottom']= $this->model_users->cek_bottom($mine,$data);
		$data['cek_bottom2']= $this->model_users->cek_bottom2($mine,$data);
		$data['cek_bottom3']= $this->model_users->cek_bottom3($mine,$data);
		$data['cek_bottom4']= $this->model_users->cek_bottom4($mine,$data);
		
		$unit = $this->session->userdata('unit');

		if ($this->form_validation->run() == FALSE){
			echo '<b>Periksa lagi data yang anda masukkan</b><br />';
		}
		else {
			//eksekusi query insert
			$status='bottom';
			$data_aksi = array(
				'id_rekomendasi'		=> $this->input->post('id_rekomendasi'),
				'id_nip'				=> $mine,
				'id_direktorat'			=> $this->session->userdata('direktorat'),
				'id_unit'				=> $this->session->userdata('unit'),
				'aksi'					=> $this->input->post('aksi'),
				'penanggung_jawab'		=> $this->session->userdata('nopeg'),
				'frekuensi'				=> $this->input->post('frekuensi'),
				'waktu_pelaksanaan'		=> $this->input->post('waktu_pelaksanaan'),
				'batas_pelaksanaan'		=> $this->input->post('batas_pelaksanaan'),
				'status'				=> $status,
				'tahun'					=> $data['tahun_aktif'],
				'periode'				=> $data['periode_aktif']
			);
			//print_r($data_aksi);exit();
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
		$data['score']= $this->model_users->score($mine,$data);
		if (!$data['score'][0]->jumlah_nilai) {
				$data['score']=0;	
		} else {
				$data['score']=($data['score'][0]->jumlah_nilai)/($data['jumlah_periode'][0]->jumlah_periode);
		}
		$data['scoreperiode1']= $this->model_users->scoreperiode1($mine,$data);
		$data['scoreperiode2']= $this->model_users->scoreperiode2($mine,$data);
		$data['scoreperiode3']= $this->model_users->scoreperiode3($mine,$data);
		$data['scoreperiode4']= $this->model_users->scoreperiode4($mine,$data);
		$data['jumlah_penilaian']= $this->model_users->jumlah_penilaian($mine,$data);
		$data['jumlah_penilaian2']= $this->model_users->jumlah_penilaian2($mine,$data);
		$data['jumlah_penilaian3']= $this->model_users->jumlah_penilaian3($mine,$data);
		$data['jumlah_penilaian4']= $this->model_users->jumlah_penilaian4($mine,$data);
		$data['nilai_dimensi1']= $this->model_users->nilai_dimensiperiode1($mine,$data);
		$data['nilai_dimensi2']= $this->model_users->nilai_dimensiperiode2($mine,$data);
		$data['nilai_dimensi3']= $this->model_users->nilai_dimensiperiode3($mine,$data);
		$data['nilai_dimensi4']= $this->model_users->nilai_dimensiperiode4($mine,$data);
		$data['cek_top']= $this->model_users->cek_top($mine,$data);
		$data['cek_top2']= $this->model_users->cek_top2($mine,$data);
		$data['cek_top3']= $this->model_users->cek_top3($mine,$data);
		$data['cek_top4']= $this->model_users->cek_top4($mine,$data);
		$data['cek_bottom']= $this->model_users->cek_bottom($mine,$data);
		$data['cek_bottom2']= $this->model_users->cek_bottom2($mine,$data);
		$data['cek_bottom3']= $this->model_users->cek_bottom3($mine,$data);
		$data['cek_bottom4']= $this->model_users->cek_bottom4($mine,$data);
		
		$unit = $this->session->userdata('unit');
		if ($this->form_validation->run() == FALSE){
			echo '<b>Periksa lagi data yang anda masukkan</b><br />';
		}
		else {
			//eksekusi query insert
			$status='bottom';
			$data_aksi = array(
				'id_rekomendasi'		=> $this->input->post('id_rekomendasi'),
				'id_nip'				=> $mine,
				'id_direktorat'			=> $this->session->userdata('direktorat'),
				'id_unit'				=> $this->session->userdata('unit'),
				'aksi'					=> $this->input->post('aksi'),
				'penanggung_jawab'		=> $this->session->userdata('nopeg'),
				'frekuensi'				=> $this->input->post('frekuensi'),
				'waktu_pelaksanaan'		=> $this->input->post('waktu_pelaksanaan'),
				'batas_pelaksanaan'		=> $this->input->post('batas_pelaksanaan'),
				'status'				=> $status,
				'tahun'					=> $data['tahun_aktif'],
				'periode'				=> $data['periode_aktif']
			);
			//print_r($data_aksi);exit();
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
		$data['score']= $this->model_users->score($mine,$data);
		if (!$data['score'][0]->jumlah_nilai) {
				$data['score']=0;	
		} else {
				$data['score']=($data['score'][0]->jumlah_nilai)/($data['jumlah_periode'][0]->jumlah_periode);
		}
		$data['scoreperiode1']= $this->model_users->scoreperiode1($mine,$data);
		$data['scoreperiode2']= $this->model_users->scoreperiode2($mine,$data);
		$data['scoreperiode3']= $this->model_users->scoreperiode3($mine,$data);
		$data['scoreperiode4']= $this->model_users->scoreperiode4($mine,$data);
		$data['jumlah_penilaian']= $this->model_users->jumlah_penilaian($mine,$data);
		$data['jumlah_penilaian2']= $this->model_users->jumlah_penilaian2($mine,$data);
		$data['jumlah_penilaian3']= $this->model_users->jumlah_penilaian3($mine,$data);
		$data['jumlah_penilaian4']= $this->model_users->jumlah_penilaian4($mine,$data);
		$data['nilai_dimensi1']= $this->model_users->nilai_dimensiperiode1($mine,$data);
		$data['nilai_dimensi2']= $this->model_users->nilai_dimensiperiode2($mine,$data);
		$data['nilai_dimensi3']= $this->model_users->nilai_dimensiperiode3($mine,$data);
		$data['nilai_dimensi4']= $this->model_users->nilai_dimensiperiode4($mine,$data);
		$data['cek_top']= $this->model_users->cek_top($mine,$data);
		$data['cek_top2']= $this->model_users->cek_top2($mine,$data);
		$data['cek_top3']= $this->model_users->cek_top3($mine,$data);
		$data['cek_top4']= $this->model_users->cek_top4($mine,$data);
		$data['cek_bottom']= $this->model_users->cek_bottom($mine,$data);
		$data['cek_bottom2']= $this->model_users->cek_bottom2($mine,$data);
		$data['cek_bottom3']= $this->model_users->cek_bottom3($mine,$data);
		$data['cek_bottom4']= $this->model_users->cek_bottom4($mine,$data);
		
		$unit = $this->session->userdata('unit');

		if ($this->form_validation->run() == FALSE){
			echo '<b>Periksa lagi data yang anda masukkan</b><br />';
		}
		else {
			//eksekusi query insert
			$status='bottom';
			$data_aksi = array(
				'id_rekomendasi'		=> $this->input->post('id_rekomendasi'),
				'id_nip'				=> $mine,
				'id_direktorat'			=> $this->session->userdata('direktorat'),
				'id_unit'				=> $this->session->userdata('unit'),
				'aksi'					=> $this->input->post('aksi'),
				'penanggung_jawab'		=> $this->session->userdata('nopeg'),
				'frekuensi'				=> $this->input->post('frekuensi'),
				'waktu_pelaksanaan'		=> $this->input->post('waktu_pelaksanaan'),
				'batas_pelaksanaan'		=> $this->input->post('batas_pelaksanaan'),
				'status'				=> $status,
				'tahun'					=> $data['tahun_aktif'],
				'periode'				=> $data['periode_aktif']
			);
			//print_r($data_aksi);exit();
			 $this->model_users->tambah_aksi($data_aksi);
			 echo '<b>Data tindak lanjut 3 berhasil disimpan.</b><br />';
		}
	}

	public function action_top1(){
		$this->form_validation->set_rules('aksi', 'Aksi');
		$this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab');
		$this->form_validation->set_rules('frekuensi', 'Frekuensi');
		$this->form_validation->set_rules('waktu_pelaksanaan', 'Waktu Pelaksanaan');
		$this->form_validation->set_rules('batas_pelaksanaan', 'Batas Pelaksanaan');
		
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
		$data['score']= $this->model_users->score($mine,$data);
		if (!$data['score'][0]->jumlah_nilai) {
				$data['score']=0;	
		} else {
				$data['score']=($data['score'][0]->jumlah_nilai)/($data['jumlah_periode'][0]->jumlah_periode);
		}
		$data['scoreperiode1']= $this->model_users->scoreperiode1($mine,$data);
		$data['scoreperiode2']= $this->model_users->scoreperiode2($mine,$data);
		$data['scoreperiode3']= $this->model_users->scoreperiode3($mine,$data);
		$data['scoreperiode4']= $this->model_users->scoreperiode4($mine,$data);
		$data['jumlah_penilaian']= $this->model_users->jumlah_penilaian($mine,$data);
		$data['jumlah_penilaian2']= $this->model_users->jumlah_penilaian2($mine,$data);
		$data['jumlah_penilaian3']= $this->model_users->jumlah_penilaian3($mine,$data);
		$data['jumlah_penilaian4']= $this->model_users->jumlah_penilaian4($mine,$data);
		$data['nilai_dimensi1']= $this->model_users->nilai_dimensiperiode1($mine,$data);
		$data['nilai_dimensi2']= $this->model_users->nilai_dimensiperiode2($mine,$data);
		$data['nilai_dimensi3']= $this->model_users->nilai_dimensiperiode3($mine,$data);
		$data['nilai_dimensi4']= $this->model_users->nilai_dimensiperiode4($mine,$data);
		$data['cek_top']= $this->model_users->cek_top($mine,$data);
		$data['cek_top2']= $this->model_users->cek_top2($mine,$data);
		$data['cek_top3']= $this->model_users->cek_top3($mine,$data);
		$data['cek_top4']= $this->model_users->cek_top4($mine,$data);
		$data['cek_bottom']= $this->model_users->cek_bottom($mine,$data);
		$data['cek_bottom2']= $this->model_users->cek_bottom2($mine,$data);
		$data['cek_bottom3']= $this->model_users->cek_bottom3($mine,$data);
		$data['cek_bottom4']= $this->model_users->cek_bottom4($mine,$data);
		
		$unit = $this->session->userdata('unit');

		if ($this->form_validation->run() == FALSE){
			echo '<b>Periksa lagi data yang anda masukkan</b><br />';
		}
		else {
			//eksekusi query insert
			$status='top';
			$data_aksi = array(
				'id_rekomendasi'		=> $this->input->post('id_rekomendasi'),
				'id_nip'				=> $mine,
				'id_direktorat'			=> $this->session->userdata('direktorat'),
				'id_unit'				=> $this->session->userdata('unit'),
				'aksi'					=> $this->input->post('aksi'),
				'penanggung_jawab'		=> $this->session->userdata('nopeg'),
				'frekuensi'				=> $this->input->post('frekuensi'),
				'waktu_pelaksanaan'		=> $this->input->post('waktu_pelaksanaan'),
				'batas_pelaksanaan'		=> $this->input->post('batas_pelaksanaan'),
				'status'				=> $status,
				'tahun'					=> $data['tahun_aktif'],
				'periode'				=> $data['periode_aktif']
			);
			//print_r($data_aksi);exit();
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
		$data['score']= $this->model_users->score($mine,$data);
		if (!$data['score'][0]->jumlah_nilai) {
				$data['score']=0;	
		} else {
				$data['score']=($data['score'][0]->jumlah_nilai)/($data['jumlah_periode'][0]->jumlah_periode);
		}
		$data['scoreperiode1']= $this->model_users->scoreperiode1($mine,$data);
		$data['scoreperiode2']= $this->model_users->scoreperiode2($mine,$data);
		$data['scoreperiode3']= $this->model_users->scoreperiode3($mine,$data);
		$data['scoreperiode4']= $this->model_users->scoreperiode4($mine,$data);
		$data['jumlah_penilaian']= $this->model_users->jumlah_penilaian($mine,$data);
		$data['jumlah_penilaian2']= $this->model_users->jumlah_penilaian2($mine,$data);
		$data['jumlah_penilaian3']= $this->model_users->jumlah_penilaian3($mine,$data);
		$data['jumlah_penilaian4']= $this->model_users->jumlah_penilaian4($mine,$data);
		$data['nilai_dimensi1']= $this->model_users->nilai_dimensiperiode1($mine,$data);
		$data['nilai_dimensi2']= $this->model_users->nilai_dimensiperiode2($mine,$data);
		$data['nilai_dimensi3']= $this->model_users->nilai_dimensiperiode3($mine,$data);
		$data['nilai_dimensi4']= $this->model_users->nilai_dimensiperiode4($mine,$data);
		$data['cek_top']= $this->model_users->cek_top($mine,$data);
		$data['cek_top2']= $this->model_users->cek_top2($mine,$data);
		$data['cek_top3']= $this->model_users->cek_top3($mine,$data);
		$data['cek_top4']= $this->model_users->cek_top4($mine,$data);
		$data['cek_bottom']= $this->model_users->cek_bottom($mine,$data);
		$data['cek_bottom2']= $this->model_users->cek_bottom2($mine,$data);
		$data['cek_bottom3']= $this->model_users->cek_bottom3($mine,$data);
		$data['cek_bottom4']= $this->model_users->cek_bottom4($mine,$data);
		
		$unit = $this->session->userdata('unit');
		if ($this->form_validation->run() == FALSE){
			echo '<b>Periksa lagi data yang anda masukkan</b><br />';
		}
		else {
			//eksekusi query insert
			$status='top';
			$data_aksi = array(
				'id_rekomendasi'		=> $this->input->post('id_rekomendasi'),
				'id_nip'				=> $mine,
				'id_direktorat'			=> $this->session->userdata('direktorat'),
				'id_unit'				=> $this->session->userdata('unit'),
				'aksi'					=> $this->input->post('aksi'),
				'penanggung_jawab'		=> $this->session->userdata('nopeg'),
				'frekuensi'				=> $this->input->post('frekuensi'),
				'waktu_pelaksanaan'		=> $this->input->post('waktu_pelaksanaan'),
				'batas_pelaksanaan'		=> $this->input->post('batas_pelaksanaan'),
				'status'				=> $status,
				'tahun'					=> $data['tahun_aktif'],
				'periode'				=> $data['periode_aktif']			);
			//print_r($data_aksi);exit();
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
		$data['score']= $this->model_users->score($mine,$data);
		if (!$data['score'][0]->jumlah_nilai) {
				$data['score']=0;	
		} else {
				$data['score']=($data['score'][0]->jumlah_nilai)/($data['jumlah_periode'][0]->jumlah_periode);
		}
		$data['scoreperiode1']= $this->model_users->scoreperiode1($mine,$data);
		$data['scoreperiode2']= $this->model_users->scoreperiode2($mine,$data);
		$data['scoreperiode3']= $this->model_users->scoreperiode3($mine,$data);
		$data['scoreperiode4']= $this->model_users->scoreperiode4($mine,$data);
		$data['jumlah_penilaian']= $this->model_users->jumlah_penilaian($mine,$data);
		$data['jumlah_penilaian2']= $this->model_users->jumlah_penilaian2($mine,$data);
		$data['jumlah_penilaian3']= $this->model_users->jumlah_penilaian3($mine,$data);
		$data['jumlah_penilaian4']= $this->model_users->jumlah_penilaian4($mine,$data);
		$data['nilai_dimensi1']= $this->model_users->nilai_dimensiperiode1($mine,$data);
		$data['nilai_dimensi2']= $this->model_users->nilai_dimensiperiode2($mine,$data);
		$data['nilai_dimensi3']= $this->model_users->nilai_dimensiperiode3($mine,$data);
		$data['nilai_dimensi4']= $this->model_users->nilai_dimensiperiode4($mine,$data);
		$data['cek_top']= $this->model_users->cek_top($mine,$data);
		$data['cek_top2']= $this->model_users->cek_top2($mine,$data);
		$data['cek_top3']= $this->model_users->cek_top3($mine,$data);
		$data['cek_top4']= $this->model_users->cek_top4($mine,$data);
		$data['cek_bottom']= $this->model_users->cek_bottom($mine,$data);
		$data['cek_bottom2']= $this->model_users->cek_bottom2($mine,$data);
		$data['cek_bottom3']= $this->model_users->cek_bottom3($mine,$data);
		$data['cek_bottom4']= $this->model_users->cek_bottom4($mine,$data);
		
		$unit = $this->session->userdata('unit');

		if ($this->form_validation->run() == FALSE){
			echo '<b>Periksa lagi data yang anda masukkan</b><br />';
		}
		else {
			//eksekusi query insert
			$status='top';
			$data_aksi = array(
				'id_rekomendasi'		=> $this->input->post('id_rekomendasi'),
				'id_nip'				=> $mine,
				'id_direktorat'			=> $this->session->userdata('direktorat'),
				'id_unit'				=> $this->session->userdata('unit'),
				'aksi'					=> $this->input->post('aksi'),
				'penanggung_jawab'		=> $this->session->userdata('nopeg'),
				'frekuensi'				=> $this->input->post('frekuensi'),
				'waktu_pelaksanaan'		=> $this->input->post('waktu_pelaksanaan'),
				'batas_pelaksanaan'		=> $this->input->post('batas_pelaksanaan'),
				'status'				=> $status,
				'tahun'					=> $data['tahun_aktif'],
				'periode'				=> $data['periode_aktif']
			);
			//print_r($data_aksi);exit();
			 $this->model_users->tambah_aksi($data_aksi);
			 echo '<b>Data tindak lanjut 3 berhasil disimpan.</b><br />';
		}
	}

	public function edit()
	{
		$tahun_pilih = $this->input->post('tahun');
		if (!$tahun_pilih)
		{
			$tahun_pilih = $this->session->userdata('tahun_pilih');
		}
		$data['tahun'] = $tahun_pilih;
		$data['tahun_aktif'] = $this->session->userdata('tahun');
		$data['periode_aktif'] = $this->session->userdata('periode');
		$data['_daftar_tahun'] = $this->model_admin->list_tahun();
		$unit = $this->session->userdata('unit');
		$mine = $this->session->userdata('nopeg');
		$data['aksi'] = $this->model_users->tampil_aksi($mine,$data);
		$data['aksi2'] = $this->model_users->tampil_aksi2($mine,$data);
		$data['aksi3'] = $this->model_users->tampil_aksi3($mine,$data);
		$data['aksi4'] = $this->model_users->tampil_aksi4($mine,$data);
		$data['aksi1'] = $this->model_users->tampil_aksi_bottom($mine,$data);		
		$data['aksi12'] = $this->model_users->tampil_aksi_bottom2($mine,$data);		
		$data['aksi13'] = $this->model_users->tampil_aksi_bottom3($mine,$data);		
		$data['aksi14'] = $this->model_users->tampil_aksi_bottom4($mine,$data);				
		//print_r($data);
		$this->load->view('user/edit_aksi',$data);
	}
	public function edit_action_top($id_aksi) {
		$this->form_validation->set_rules('aksi',"Aksi");
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
		$unit = $this->session->userdata('unit');
		$mine = $this->session->userdata('nopeg');
		$data['aksi'] = $this->model_users->tampil_aksi($mine,$data);
		$data['aksi2'] = $this->model_users->tampil_aksi2($mine,$data);
		$data['aksi3'] = $this->model_users->tampil_aksi3($mine,$data);
		$data['aksi4'] = $this->model_users->tampil_aksi4($mine,$data);
		$data['aksi1'] = $this->model_users->tampil_aksi_bottom($mine,$data);		
		$data['aksi12'] = $this->model_users->tampil_aksi_bottom2($mine,$data);		
		$data['aksi13'] = $this->model_users->tampil_aksi_bottom3($mine,$data);		
		$data['aksi14'] = $this->model_users->tampil_aksi_bottom4($mine,$data);	
		if ($this->form_validation->run() == FALSE){
			$this->load->view('user/edit_aksi',$data);
		}
		else {
				//form submit dengan gambar dikosongkan
				$status='top';
				$data_aksi = array(
				'id_nip'				=> $mine,
				'id_direktorat'			=> $this->session->userdata('direktorat'),
				'id_unit'				=> $this->session->userdata('unit'),
				'aksi'					=> $this->input->post('aksi'),
				'penanggung_jawab'		=> $this->session->userdata('nopeg'),
				'frekuensi'				=> $this->input->post('frekuensi'),
				'waktu_pelaksanaan'		=> $this->input->post('waktu_pelaksanaan'),
				'batas_pelaksanaan'		=> $this->input->post('batas_pelaksanaan'),
				'status'				=> $status,
				'tahun'					=> $data['tahun_aktif'],
				'periode'				=> $data['periode_aktif']
			);
				//print_r($data_aksi);exit();
			 $this->model_users->edit_aksi_top($id_aksi,$data_aksi);
			 redirect('user/edit');

			
		}
	}	
	public function edit_action_bottom($id_aksi) {
		$this->form_validation->set_rules('aksi',"Aksi");
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
		$unit = $this->session->userdata('unit');
		$mine = $this->session->userdata('nopeg');
		$data['aksi'] = $this->model_users->tampil_aksi($mine,$data);
		$data['aksi2'] = $this->model_users->tampil_aksi2($mine,$data);
		$data['aksi3'] = $this->model_users->tampil_aksi3($mine,$data);
		$data['aksi4'] = $this->model_users->tampil_aksi4($mine,$data);
		$data['aksi1'] = $this->model_users->tampil_aksi_bottom($mine,$data);		
		$data['aksi12'] = $this->model_users->tampil_aksi_bottom2($mine,$data);		
		$data['aksi13'] = $this->model_users->tampil_aksi_bottom3($mine,$data);		
		$data['aksi14'] = $this->model_users->tampil_aksi_bottom4($mine,$data);		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('user/edit_aksi',$data);
		}
		else {
				//form submit dengan gambar dikosongkan
				$status='bottom';
				$data_aksi = array(
				'id_nip'				=> $mine,
				'id_direktorat'			=> $this->session->userdata('direktorat'),
				'id_unit'				=> $this->session->userdata('unit'),
				'aksi'					=> $this->input->post('aksi'),
				'penanggung_jawab'		=> $this->session->userdata('nopeg'),
				'frekuensi'				=> $this->input->post('frekuensi'),
				'waktu_pelaksanaan'		=> $this->input->post('waktu_pelaksanaan'),
				'batas_pelaksanaan'		=> $this->input->post('batas_pelaksanaan'),
				'status'				=> $status,
				'tahun'					=> $data['tahun_aktif'],
				'periode'				=> $data['periode_aktif']
			);
			//print_r($data_aksi);exit();
			 $this->model_users->edit_aksi_bottom($id_aksi,$data_aksi);
			 redirect('user/edit');
			
		}
	}	
	public function progres()
	{
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
		$penanggung_jawab = $this->session->userdata('nopeg');
		$data['progres_aksi'] = $this->model_users->progres_aksi($penanggung_jawab,$data);
		$data['progres_aksi2'] = $this->model_users->progres_aksi2($penanggung_jawab,$data);
		$data['progres_aksi3'] = $this->model_users->progres_aksi3($penanggung_jawab,$data);
		$data['progres_aksi4'] = $this->model_users->progres_aksi4($penanggung_jawab,$data);			
		//print_r($data);
		$this->load->view('user/progres',$data);
	}
	public function update_progres($id_aksi){
		$this->form_validation->set_rules('progres');
		$this->form_validation->set_rules('keterangan');
		$tahun_pilih = $this->input->post('tahun');
		$s= $this->input->post();
		$y=strtotime($this->input->post('batas_pelaksanaan'));
		$o=strtotime('now');
		/*print_r($y);
		print_r($o);*/
		//jika belum dipilih, maka gunakan tahun aktif
		if (!$tahun_pilih)
		{
			$tahun_pilih = $this->session->userdata('tahun_pilih');
		}
		$data['tahun'] = $tahun_pilih;
		$data['tahun_aktif'] = $this->session->userdata('tahun');
		$data['periode_aktif'] = $this->session->userdata('periode');
		$data['_daftar_tahun'] = $this->model_admin->list_tahun();
		$penanggung_jawab = $this->session->userdata('nopeg');
		$data['progres_aksi'] = $this->model_users->progres_aksi($penanggung_jawab,$data);
		$data['progres_aksi2'] = $this->model_users->progres_aksi2($penanggung_jawab,$data);
		$data['progres_aksi3'] = $this->model_users->progres_aksi3($penanggung_jawab,$data);
		$data['progres_aksi4'] = $this->model_users->progres_aksi4($penanggung_jawab,$data);			

		if ($this->form_validation->run() == FALSE){
			$this->load->view('user/progres', $data);
			//print_r("cok");
			exit();
		}
		else {
			if ($this->input->post('progres')==0 && strtotime($this->input->post('batas_pelaksanaan')) > strtotime('now')) {
				$data_progres = array(
						'progres'				=> $this->input->post('progres'),
						'keterangan'			=> $this->input->post('keterangan'),
						'status_progres'		=> 'Not Started'
				);
			} elseif ($this->input->post('progres')<100 && strtotime($this->input->post('batas_pelaksanaan')) > strtotime('now')) {
				$data_progres = array(
						'progres'				=> $this->input->post('progres'),
						'keterangan'			=> $this->input->post('keterangan'),
						'status_progres'		=> 'On Progress'
				);
			} elseif ($this->input->post('progres')<=100 && strtotime($this->input->post('batas_pelaksanaan')) < strtotime('now')) {
				$data_progres = array(
						'progres'				=> $this->input->post('progres'),
						'keterangan'			=> $this->input->post('keterangan'),
						'status_progres'		=> 'Failed'
				);
			} elseif ($this->input->post('progres')==100 && strtotime($this->input->post('batas_pelaksanaan')) >= strtotime('now')) {
				$data_progres = array(
						'progres'				=> $this->input->post('progres'),
						'keterangan'			=> $this->input->post('keterangan'),
						'status_progres'		=> 'Succeed'
				);
				
			}
			/*print_r($data_progres);
			exit();*/
			$this->model_users->update_progres($id_aksi, $data_progres);
			redirect('user/progres');
		}

			
	
	}
	public function update($id){
		$this->form_validation->set_rules('nip1');
		$this->form_validation->set_rules('nama1');
		$this->form_validation->set_rules('nip2');
		$this->form_validation->set_rules('nip3');
		$this->form_validation->set_rules('nip4');
		$this->form_validation->set_rules('kategori');
		$this->form_validation->set_rules('judul');
		$this->form_validation->set_rules('latar_belakang');
		$this->form_validation->set_rules('deskripsi');
		$this->form_validation->set_rules('cost_saving');
		$this->form_validation->set_rules('revenue');
		$this->form_validation->set_rules('waktu');

		if ($this->form_validation->run() == FALSE){
			$data['inovasi'] = $this->model_users->find($id);
			$this->load->view('user/edit_inovasi',$data);
		}
		else {
			if($_FILES['userfile']['name'] != NULL){
				//form sumbit dengan gambar diisi
				//load uploading file library
				 $config['upload_path']   = './uploads/'; 
		         $config['allowed_types'] = 'pdf'; 
		         $config['max_size']	= '2048';
		         $config['overwrite']	= true;

				
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
					if ( !$this->upload->do_upload()){
						$error = array('error' => $this->upload->display_errors());
        			    var_dump($error);
					}
					else {
						$gambar = $this->upload->data();
						$data_inovasi = array(
								'nip1'				=> $this->session->userdata('nopeg'),
								'nip2'				=> $this->input->post('nip2'),
								'nip3'				=> $this->input->post('nip3'),
								'nip4'				=> $this->input->post('nip4'),
								'nama1'				=> $this->session->userdata('nama'),
								'kategori'			=> $this->input->post('kategori'),
								'judul'				=> $this->input->post('judul'),
								'latar_belakang'	=> $this->input->post('latar_belakang'),
								'deskripsi'			=> $this->input->post('deskripsi'),
								'cost_saving'		=> $this->input->post('cost_saving'),
								'revenue'			=> $this->input->post('revenue'),
								'waktu'				=> $this->input->post('waktu'),
								'userfile'			=> $gambar['file_name']
						);
						$this->model_users->update($id, $data_inovasi);
						//print_r($data_inovasi);
						redirect('user/innovation'); 
						}
					}
			else {
				//form submit dengan gambar dikosongkan
				$data_inovasi = array(
						'nip1'				=> $this->session->userdata('nopeg'),
						'nip2'				=> $this->input->post('nip2'),
						'nip3'				=> $this->input->post('nip3'),
						'nip4'				=> $this->input->post('nip4'),
						'nama1'				=> $this->session->userdata('nama'),
						'kategori'			=> $this->input->post('kategori'),
						'judul'				=> $this->input->post('judul'),
						'latar_belakang'	=> $this->input->post('latar_belakang'),
						'deskripsi'			=> $this->input->post('deskripsi'),
						'cost_saving'		=> $this->input->post('cost_saving'),
						'revenue'			=> $this->input->post('revenue'),
						'waktu'				=> $this->input->post('waktu')
				);
				$this->model_users->update($id, $data_inovasi);
				//print_r($data_inovasi);
				redirect('user/innovation'); 
			}
		}
	}


	public function delete($id){
		$this->model_users->delete($id);
		redirect('user/innovation');
	}

	////////////////////////////////////////////////////////////


	public function unitscore(){
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
		/*print_r($data['tahun_aktif']);exit();*/
		
		$mine = $this->session->userdata('nopeg');
		$data['jumlah_periode']= $this->model_users->count_periode($mine,$data);
		//$data['score']= $this->model_users->score($mine,$data);
		//print_r($data['score']);exit();
		/*if (!$data['score'][0]->jumlah_nilai) {
				$data['score']=0;	
		} else {
				$data['score']=($data['score'][0]->jumlah_nilai)/($data['jumlah_periode'][0]->jumlah_periode);
		}*/
		$mine = $this->session->userdata('nopeg');
		$unit=$this->session->userdata('unit');
		$level=$this->session->userdata('level');
		$direktorat=$this->session->userdata('direktorat');
		if($level=='VP') 
		{
			$data['unit']=$unit;
			$data['corporate']=$this->model_chart->corporate($data);
			$data['corporate1']=$this->model_chart->corporate1($data);
			$data['corporate2']=$this->model_chart->corporate2($data);
			$data['corporate3']=$this->model_chart->corporate3($data);
			$data['corporate4']=$this->model_chart->corporate4($data);
			$data['score2']= $this->model_chart->direktorat($direktorat,$data);
			$data['score21']= $this->model_chart->direktorat1($direktorat,$data);
			$data['score22']= $this->model_chart->direktorat2($direktorat,$data);
			$data['score23']= $this->model_chart->direktorat3($direktorat,$data);
			$data['score24']= $this->model_chart->direktorat4($direktorat,$data);
			$data['score']= $this->model_chart->unit($unit,$data);
			$data['scorep1']= $this->model_chart->unit1($unit,$data);
			$data['scorep2']= $this->model_chart->unit2($unit,$data);
			$data['scorep3']= $this->model_chart->unit3($unit,$data);
			$data['scorep4']= $this->model_chart->unit4($unit,$data);
			$data['listunit']=$this->model_chart->listnilaism($unit,$data);
			$data['listunit1']=$this->model_chart->listnilaism1($unit,$data);
			$data['listunit2']=$this->model_chart->listnilaism2($unit,$data);
			$data['listunit3']=$this->model_chart->listnilaism3($unit,$data);
			$data['listunit4']=$this->model_chart->listnilaism4($unit,$data);
			$data['nilaiother']= $this->model_chart->nilaiother($unit,$data);
			$data['nilaiother1']= $this->model_chart->nilaiother1($unit,$data);
			$data['nilaiother2']= $this->model_chart->nilaiother2($unit,$data);
			$data['nilaiother3']= $this->model_chart->nilaiother3($unit,$data);
			$data['nilaiother4']= $this->model_chart->nilaiother4($unit,$data);

			$data['sumdimensiunit']=$this->model_chart->sumdimensiunit($unit,$data);
			$data['sumdimensiunit1']=$this->model_chart->sumdimensiunit1($unit,$data);
			$data['sumdimensiunit2']=$this->model_chart->sumdimensiunit2($unit,$data);
			$data['sumdimensiunit3']=$this->model_chart->sumdimensiunit3($unit,$data);
			$data['sumdimensiunit4']=$this->model_chart->sumdimensiunit4($unit,$data);
			$data['dimensiunit']=$this->model_chart->dimensiunit($unit,$data);
			$data['dimensiunit1']=$this->model_chart->dimensiunit1($unit,$data);
			$data['dimensiunit2']=$this->model_chart->dimensiunit2($unit,$data);
			$data['dimensiunit3']=$this->model_chart->dimensiunit3($unit,$data);
			$data['dimensiunit4']=$this->model_chart->dimensiunit4($unit,$data);
			$data['listnilai']=$this->model_chart->listnilai($unit,$data);	
			$data['listnilaip1']=$this->model_chart->listnilaip1($unit,$data);	
			$data['listnilaip2']=$this->model_chart->listnilaip2($unit,$data);	
			$data['listnilaip3']=$this->model_chart->listnilaip3($unit,$data);	
			$data['listnilaip4']=$this->model_chart->listnilaip4($unit,$data);	
			$data['gaugeunit']=$this->model_chart->gaugeunit($unit,$data);
			$data['gaugeunit1']=$this->model_chart->gaugeunit1($unit,$data);
			$data['gaugeunit2']=$this->model_chart->gaugeunit2($unit,$data);
			$data['gaugeunit3']=$this->model_chart->gaugeunit3($unit,$data);
			$data['gaugeunit4']=$this->model_chart->gaugeunit4($unit,$data);
			$data['nilai_dimensi']= $this->model_chart->nilai_dimensi1($unit,$data);
			$data['nilai_dimensi1']= $this->model_chart->nilai_dimensip1($unit,$data);
			$data['nilai_dimensi2']= $this->model_chart->nilai_dimensip2($unit,$data);
			$data['nilai_dimensi3']= $this->model_chart->nilai_dimensip3($unit,$data);
			$data['nilai_dimensi4']= $this->model_chart->nilai_dimensip4($unit,$data);


			
			$data['cek_top']= $this->model_users->cekunit_top($mine,$data);
			$data['cek_top2']= $this->model_users->cekunit_top2($mine,$data);
			$data['cek_top3']= $this->model_users->cekunit_top3($mine,$data);
			$data['cek_top4']= $this->model_users->cekunit_top4($mine,$data);
			$data['cek_bottom']= $this->model_users->cekunit_bottom($mine,$data);
			$data['cek_bottom2']= $this->model_users->cekunit_bottom2($mine,$data);
			$data['cek_bottom3']= $this->model_users->cekunit_bottom3($mine,$data);
			$data['cek_bottom4']= $this->model_users->cekunit_bottom4($mine,$data);
			
			$data['listaksi']= $this->model_users->listaksiunit($mine,$data);
			$data['listaksi2']= $this->model_users->listaksiunit2($mine,$data);
			$data['listaksi3']= $this->model_users->listaksiunit3($mine,$data);
			$data['listaksi4']= $this->model_users->listaksiunit4($mine,$data);
			$data['listaksifull']= $this->model_users->listaksiunitfull($mine,$data);
			$data['sumaksi']= $this->model_users->sumaksiunit($mine,$data);
			$data['sumaksi2']= $this->model_users->sumaksiunit2($mine,$data);
			$data['sumaksi3']= $this->model_users->sumaksiunit3($mine,$data);
			$data['sumaksi4']= $this->model_users->sumaksiunit4($mine,$data);
			$data['sumaksifull']= $this->model_users->sumaksiunitfull($mine,$data);
			
			
		
			//print_r($data['scorep3']);
			$this->load->view('user/unitscore_view',$data,$unit);
		}
		else 
		redirect('error');		
		
	}	

	public function actionunit_bottom1(){
		$this->form_validation->set_rules('aksi', 'Aksi');
		$this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab');
		$this->form_validation->set_rules('frekuensi', 'Frekuensi');
		$this->form_validation->set_rules('waktu_pelaksanaan', 'Waktu Pelaksanaan');
		$this->form_validation->set_rules('batas_pelaksanaan', 'Batas Pelaksanaan');
		
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
		$unit = $this->session->userdata('unit');
		$level=$this->session->userdata('level');
		$direktorat=$this->session->userdata('direktorat');
		$data['corporate']=$this->model_chart->corporate($data);
			$data['corporate1']=$this->model_chart->corporate1($data);
			$data['corporate2']=$this->model_chart->corporate2($data);
			$data['corporate3']=$this->model_chart->corporate3($data);
			$data['corporate4']=$this->model_chart->corporate4($data);
			$data['score2']= $this->model_chart->direktorat($direktorat,$data);
			$data['score21']= $this->model_chart->direktorat1($direktorat,$data);
			$data['score22']= $this->model_chart->direktorat2($direktorat,$data);
			$data['score23']= $this->model_chart->direktorat3($direktorat,$data);
			$data['score24']= $this->model_chart->direktorat4($direktorat,$data);
			$data['score']= $this->model_chart->unit($unit,$data);
			$data['scorep1']= $this->model_chart->unit1($unit,$data);
			$data['scorep2']= $this->model_chart->unit2($unit,$data);
			$data['scorep3']= $this->model_chart->unit3($unit,$data);
			$data['scorep4']= $this->model_chart->unit4($unit,$data);
			$data['listunit']=$this->model_chart->listnilaism($unit,$data);
			$data['listunit1']=$this->model_chart->listnilaism1($unit,$data);
			$data['listunit2']=$this->model_chart->listnilaism2($unit,$data);
			$data['listunit3']=$this->model_chart->listnilaism3($unit,$data);
			$data['listunit4']=$this->model_chart->listnilaism4($unit,$data);
			$data['nilaiother']= $this->model_chart->nilaiother($unit,$data);
			$data['nilaiother1']= $this->model_chart->nilaiother1($unit,$data);
			$data['nilaiother2']= $this->model_chart->nilaiother2($unit,$data);
			$data['nilaiother3']= $this->model_chart->nilaiother3($unit,$data);
			$data['nilaiother4']= $this->model_chart->nilaiother4($unit,$data);

			$data['sumdimensiunit']=$this->model_chart->sumdimensiunit($unit,$data);
			$data['sumdimensiunit1']=$this->model_chart->sumdimensiunit1($unit,$data);
			$data['sumdimensiunit2']=$this->model_chart->sumdimensiunit2($unit,$data);
			$data['sumdimensiunit3']=$this->model_chart->sumdimensiunit3($unit,$data);
			$data['sumdimensiunit4']=$this->model_chart->sumdimensiunit4($unit,$data);
			$data['dimensiunit']=$this->model_chart->dimensiunit($unit,$data);
			$data['dimensiunit1']=$this->model_chart->dimensiunit1($unit,$data);
			$data['dimensiunit2']=$this->model_chart->dimensiunit2($unit,$data);
			$data['dimensiunit3']=$this->model_chart->dimensiunit3($unit,$data);
			$data['dimensiunit4']=$this->model_chart->dimensiunit4($unit,$data);
			$data['listnilai']=$this->model_chart->listnilai($unit,$data);	
			$data['listnilaip1']=$this->model_chart->listnilaip1($unit,$data);	
			$data['listnilaip2']=$this->model_chart->listnilaip2($unit,$data);	
			$data['listnilaip3']=$this->model_chart->listnilaip3($unit,$data);	
			$data['listnilaip4']=$this->model_chart->listnilaip4($unit,$data);	
			$data['gaugeunit']=$this->model_chart->gaugeunit($unit,$data);
			$data['gaugeunit1']=$this->model_chart->gaugeunit1($unit,$data);
			$data['gaugeunit2']=$this->model_chart->gaugeunit2($unit,$data);
			$data['gaugeunit3']=$this->model_chart->gaugeunit3($unit,$data);
			$data['gaugeunit4']=$this->model_chart->gaugeunit4($unit,$data);
			$data['nilai_dimensi']= $this->model_chart->nilai_dimensi1($unit,$data);
			$data['nilai_dimensi1']= $this->model_chart->nilai_dimensip1($unit,$data);
			$data['nilai_dimensi2']= $this->model_chart->nilai_dimensip2($unit,$data);
			$data['nilai_dimensi3']= $this->model_chart->nilai_dimensip3($unit,$data);
			$data['nilai_dimensi4']= $this->model_chart->nilai_dimensip4($unit,$data);


			
			$data['cek_top']= $this->model_users->cekunit_top($mine,$data);
			$data['cek_top2']= $this->model_users->cekunit_top2($mine,$data);
			$data['cek_top3']= $this->model_users->cekunit_top3($mine,$data);
			$data['cek_top4']= $this->model_users->cekunit_top4($mine,$data);
			$data['cek_bottom']= $this->model_users->cekunit_bottom($mine,$data);
			$data['cek_bottom2']= $this->model_users->cekunit_bottom2($mine,$data);
			$data['cek_bottom3']= $this->model_users->cekunit_bottom3($mine,$data);
			$data['cek_bottom4']= $this->model_users->cekunit_bottom4($mine,$data);

		if ($this->form_validation->run() == FALSE){
			echo '<b>Periksa lagi data yang anda masukkan</b><br />';
		}
		else {
			//eksekusi query insert
			$status='bottom';
			$data_aksi = array(
				'id_rekomendasi'		=> $this->input->post('id_rekomendasi'),
				'id_nip'				=> $mine,
				'id_direktorat'			=> $this->session->userdata('direktorat'),
				'id_unit'				=> $this->session->userdata('unit'),
				'aksi'					=> $this->input->post('aksi'),
				'penanggung_jawab'		=> $this->session->userdata('nopeg'),
				'frekuensi'				=> $this->input->post('frekuensi'),
				'waktu_pelaksanaan'		=> $this->input->post('waktu_pelaksanaan'),
				'batas_pelaksanaan'		=> $this->input->post('batas_pelaksanaan'),
				'status'				=> $status,
				'tahun'					=> $data['tahun_aktif'],
				'periode'				=> $data['periode_aktif']
			);
			//print_r($data_aksi);exit();
			 $this->model_users->tambah_aksi_unit($data_aksi);
			 echo '<b>Data tindak lanjut 1 berhasil disimpan.</b><br />';
		}
	}

	public function actionunit_bottom2(){
		$this->form_validation->set_rules('aksi', 'Aksi');
		$this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab');
		$this->form_validation->set_rules('frekuensi', 'Frekuensi');
		$this->form_validation->set_rules('waktu_pelaksanaan', 'Waktu Pelaksanaan');
		$this->form_validation->set_rules('batas_pelaksanaan', 'Batas Pelaksanaan');
		
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
		$unit = $this->session->userdata('unit');
		$level=$this->session->userdata('level');
		$direktorat=$this->session->userdata('direktorat');
		$data['corporate']=$this->model_chart->corporate($data);
			$data['corporate1']=$this->model_chart->corporate1($data);
			$data['corporate2']=$this->model_chart->corporate2($data);
			$data['corporate3']=$this->model_chart->corporate3($data);
			$data['corporate4']=$this->model_chart->corporate4($data);
			$data['score2']= $this->model_chart->direktorat($direktorat,$data);
			$data['score21']= $this->model_chart->direktorat1($direktorat,$data);
			$data['score22']= $this->model_chart->direktorat2($direktorat,$data);
			$data['score23']= $this->model_chart->direktorat3($direktorat,$data);
			$data['score24']= $this->model_chart->direktorat4($direktorat,$data);
			$data['score']= $this->model_chart->unit($unit,$data);
			$data['scorep1']= $this->model_chart->unit1($unit,$data);
			$data['scorep2']= $this->model_chart->unit2($unit,$data);
			$data['scorep3']= $this->model_chart->unit3($unit,$data);
			$data['scorep4']= $this->model_chart->unit4($unit,$data);
			$data['listunit']=$this->model_chart->listnilaism($unit,$data);
			$data['listunit1']=$this->model_chart->listnilaism1($unit,$data);
			$data['listunit2']=$this->model_chart->listnilaism2($unit,$data);
			$data['listunit3']=$this->model_chart->listnilaism3($unit,$data);
			$data['listunit4']=$this->model_chart->listnilaism4($unit,$data);
			$data['nilaiother']= $this->model_chart->nilaiother($unit,$data);
			$data['nilaiother1']= $this->model_chart->nilaiother1($unit,$data);
			$data['nilaiother2']= $this->model_chart->nilaiother2($unit,$data);
			$data['nilaiother3']= $this->model_chart->nilaiother3($unit,$data);
			$data['nilaiother4']= $this->model_chart->nilaiother4($unit,$data);

			$data['sumdimensiunit']=$this->model_chart->sumdimensiunit($unit,$data);
			$data['sumdimensiunit1']=$this->model_chart->sumdimensiunit1($unit,$data);
			$data['sumdimensiunit2']=$this->model_chart->sumdimensiunit2($unit,$data);
			$data['sumdimensiunit3']=$this->model_chart->sumdimensiunit3($unit,$data);
			$data['sumdimensiunit4']=$this->model_chart->sumdimensiunit4($unit,$data);
			$data['dimensiunit']=$this->model_chart->dimensiunit($unit,$data);
			$data['dimensiunit1']=$this->model_chart->dimensiunit1($unit,$data);
			$data['dimensiunit2']=$this->model_chart->dimensiunit2($unit,$data);
			$data['dimensiunit3']=$this->model_chart->dimensiunit3($unit,$data);
			$data['dimensiunit4']=$this->model_chart->dimensiunit4($unit,$data);
			$data['listnilai']=$this->model_chart->listnilai($unit,$data);	
			$data['listnilaip1']=$this->model_chart->listnilaip1($unit,$data);	
			$data['listnilaip2']=$this->model_chart->listnilaip2($unit,$data);	
			$data['listnilaip3']=$this->model_chart->listnilaip3($unit,$data);	
			$data['listnilaip4']=$this->model_chart->listnilaip4($unit,$data);	
			$data['gaugeunit']=$this->model_chart->gaugeunit($unit,$data);
			$data['gaugeunit1']=$this->model_chart->gaugeunit1($unit,$data);
			$data['gaugeunit2']=$this->model_chart->gaugeunit2($unit,$data);
			$data['gaugeunit3']=$this->model_chart->gaugeunit3($unit,$data);
			$data['gaugeunit4']=$this->model_chart->gaugeunit4($unit,$data);
			$data['nilai_dimensi']= $this->model_chart->nilai_dimensi1($unit,$data);
			$data['nilai_dimensi1']= $this->model_chart->nilai_dimensip1($unit,$data);
			$data['nilai_dimensi2']= $this->model_chart->nilai_dimensip2($unit,$data);
			$data['nilai_dimensi3']= $this->model_chart->nilai_dimensip3($unit,$data);
			$data['nilai_dimensi4']= $this->model_chart->nilai_dimensip4($unit,$data);


			
			$data['cek_top']= $this->model_users->cekunit_top($mine,$data);
			$data['cek_top2']= $this->model_users->cekunit_top2($mine,$data);
			$data['cek_top3']= $this->model_users->cekunit_top3($mine,$data);
			$data['cek_top4']= $this->model_users->cekunit_top4($mine,$data);
			$data['cek_bottom']= $this->model_users->cekunit_bottom($mine,$data);
			$data['cek_bottom2']= $this->model_users->cekunit_bottom2($mine,$data);
			$data['cek_bottom3']= $this->model_users->cekunit_bottom3($mine,$data);
			$data['cek_bottom4']= $this->model_users->cekunit_bottom4($mine,$data);
		if ($this->form_validation->run() == FALSE){
			echo '<b>Periksa lagi data yang anda masukkan</b><br />';
		}
		else {
			//eksekusi query insert
			$status='bottom';
			$data_aksi = array(
				'id_rekomendasi'		=> $this->input->post('id_rekomendasi'),
				'id_nip'				=> $mine,
				'id_direktorat'			=> $this->session->userdata('direktorat'),
				'id_unit'				=> $this->session->userdata('unit'),
				'aksi'					=> $this->input->post('aksi'),
				'penanggung_jawab'		=> $this->session->userdata('nopeg'),
				'frekuensi'				=> $this->input->post('frekuensi'),
				'waktu_pelaksanaan'		=> $this->input->post('waktu_pelaksanaan'),
				'batas_pelaksanaan'		=> $this->input->post('batas_pelaksanaan'),
				'status'				=> $status,
				'tahun'					=> $data['tahun_aktif'],
				'periode'				=> $data['periode_aktif']
			);
			//print_r($data_aksi);exit();
			 $this->model_users->tambah_aksi_unit($data_aksi);
			 echo '<b>Data tindak lanjut 2 berhasil disimpan.</b><br />';
		}
	}

	public function actionunit_bottom3(){
		$this->form_validation->set_rules('aksi', 'Aksi');
		$this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab');
		$this->form_validation->set_rules('frekuensi', 'Frekuensi');
		$this->form_validation->set_rules('waktu_pelaksanaan', 'Waktu Pelaksanaan');
		$this->form_validation->set_rules('batas_pelaksanaan', 'Batas Pelaksanaan');
		
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
		$unit = $this->session->userdata('unit');
		$level=$this->session->userdata('level');
		$direktorat=$this->session->userdata('direktorat');
		$data['corporate']=$this->model_chart->corporate($data);
			$data['corporate1']=$this->model_chart->corporate1($data);
			$data['corporate2']=$this->model_chart->corporate2($data);
			$data['corporate3']=$this->model_chart->corporate3($data);
			$data['corporate4']=$this->model_chart->corporate4($data);
			$data['score2']= $this->model_chart->direktorat($direktorat,$data);
			$data['score21']= $this->model_chart->direktorat1($direktorat,$data);
			$data['score22']= $this->model_chart->direktorat2($direktorat,$data);
			$data['score23']= $this->model_chart->direktorat3($direktorat,$data);
			$data['score24']= $this->model_chart->direktorat4($direktorat,$data);
			$data['score']= $this->model_chart->unit($unit,$data);
			$data['scorep1']= $this->model_chart->unit1($unit,$data);
			$data['scorep2']= $this->model_chart->unit2($unit,$data);
			$data['scorep3']= $this->model_chart->unit3($unit,$data);
			$data['scorep4']= $this->model_chart->unit4($unit,$data);
			$data['listunit']=$this->model_chart->listnilaism($unit,$data);
			$data['listunit1']=$this->model_chart->listnilaism1($unit,$data);
			$data['listunit2']=$this->model_chart->listnilaism2($unit,$data);
			$data['listunit3']=$this->model_chart->listnilaism3($unit,$data);
			$data['listunit4']=$this->model_chart->listnilaism4($unit,$data);
			$data['nilaiother']= $this->model_chart->nilaiother($unit,$data);
			$data['nilaiother1']= $this->model_chart->nilaiother1($unit,$data);
			$data['nilaiother2']= $this->model_chart->nilaiother2($unit,$data);
			$data['nilaiother3']= $this->model_chart->nilaiother3($unit,$data);
			$data['nilaiother4']= $this->model_chart->nilaiother4($unit,$data);

			$data['sumdimensiunit']=$this->model_chart->sumdimensiunit($unit,$data);
			$data['sumdimensiunit1']=$this->model_chart->sumdimensiunit1($unit,$data);
			$data['sumdimensiunit2']=$this->model_chart->sumdimensiunit2($unit,$data);
			$data['sumdimensiunit3']=$this->model_chart->sumdimensiunit3($unit,$data);
			$data['sumdimensiunit4']=$this->model_chart->sumdimensiunit4($unit,$data);
			$data['dimensiunit']=$this->model_chart->dimensiunit($unit,$data);
			$data['dimensiunit1']=$this->model_chart->dimensiunit1($unit,$data);
			$data['dimensiunit2']=$this->model_chart->dimensiunit2($unit,$data);
			$data['dimensiunit3']=$this->model_chart->dimensiunit3($unit,$data);
			$data['dimensiunit4']=$this->model_chart->dimensiunit4($unit,$data);
			$data['listnilai']=$this->model_chart->listnilai($unit,$data);	
			$data['listnilaip1']=$this->model_chart->listnilaip1($unit,$data);	
			$data['listnilaip2']=$this->model_chart->listnilaip2($unit,$data);	
			$data['listnilaip3']=$this->model_chart->listnilaip3($unit,$data);	
			$data['listnilaip4']=$this->model_chart->listnilaip4($unit,$data);	
			$data['gaugeunit']=$this->model_chart->gaugeunit($unit,$data);
			$data['gaugeunit1']=$this->model_chart->gaugeunit1($unit,$data);
			$data['gaugeunit2']=$this->model_chart->gaugeunit2($unit,$data);
			$data['gaugeunit3']=$this->model_chart->gaugeunit3($unit,$data);
			$data['gaugeunit4']=$this->model_chart->gaugeunit4($unit,$data);
			$data['nilai_dimensi']= $this->model_chart->nilai_dimensi1($unit,$data);
			$data['nilai_dimensi1']= $this->model_chart->nilai_dimensip1($unit,$data);
			$data['nilai_dimensi2']= $this->model_chart->nilai_dimensip2($unit,$data);
			$data['nilai_dimensi3']= $this->model_chart->nilai_dimensip3($unit,$data);
			$data['nilai_dimensi4']= $this->model_chart->nilai_dimensip4($unit,$data);


			
			$data['cek_top']= $this->model_users->cekunit_top($mine,$data);
			$data['cek_top2']= $this->model_users->cekunit_top2($mine,$data);
			$data['cek_top3']= $this->model_users->cekunit_top3($mine,$data);
			$data['cek_top4']= $this->model_users->cekunit_top4($mine,$data);
			$data['cek_bottom']= $this->model_users->cekunit_bottom($mine,$data);
			$data['cek_bottom2']= $this->model_users->cekunit_bottom2($mine,$data);
			$data['cek_bottom3']= $this->model_users->cekunit_bottom3($mine,$data);
			$data['cek_bottom4']= $this->model_users->cekunit_bottom4($mine,$data);

		if ($this->form_validation->run() == FALSE){
			echo '<b>Periksa lagi data yang anda masukkan</b><br />';
		}
		else {
			//eksekusi query insert
			$status='bottom';
			$data_aksi = array(
				'id_rekomendasi'		=> $this->input->post('id_rekomendasi'),
				'id_nip'				=> $mine,
				'id_direktorat'			=> $this->session->userdata('direktorat'),
				'id_unit'				=> $this->session->userdata('unit'),
				'aksi'					=> $this->input->post('aksi'),
				'penanggung_jawab'		=> $this->session->userdata('nopeg'),
				'frekuensi'				=> $this->input->post('frekuensi'),
				'waktu_pelaksanaan'		=> $this->input->post('waktu_pelaksanaan'),
				'batas_pelaksanaan'		=> $this->input->post('batas_pelaksanaan'),
				'status'				=> $status,
				'tahun'					=> $data['tahun_aktif'],
				'periode'				=> $data['periode_aktif']
			);
			//print_r($data_aksi);exit();
			 $this->model_users->tambah_aksi_unit($data_aksi);
			 echo '<b>Data tindak lanjut 3 berhasil disimpan.</b><br />';
		}
	}

	public function actionunit_top1(){
		$this->form_validation->set_rules('aksi', 'Aksi');
		$this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab');
		$this->form_validation->set_rules('frekuensi', 'Frekuensi');
		$this->form_validation->set_rules('waktu_pelaksanaan', 'Waktu Pelaksanaan');
		$this->form_validation->set_rules('batas_pelaksanaan', 'Batas Pelaksanaan');
		
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
		$unit = $this->session->userdata('unit');
		$level=$this->session->userdata('level');
		$direktorat=$this->session->userdata('direktorat');
		$data['corporate']=$this->model_chart->corporate($data);
			$data['corporate1']=$this->model_chart->corporate1($data);
			$data['corporate2']=$this->model_chart->corporate2($data);
			$data['corporate3']=$this->model_chart->corporate3($data);
			$data['corporate4']=$this->model_chart->corporate4($data);
			$data['score2']= $this->model_chart->direktorat($direktorat,$data);
			$data['score21']= $this->model_chart->direktorat1($direktorat,$data);
			$data['score22']= $this->model_chart->direktorat2($direktorat,$data);
			$data['score23']= $this->model_chart->direktorat3($direktorat,$data);
			$data['score24']= $this->model_chart->direktorat4($direktorat,$data);
			$data['score']= $this->model_chart->unit($unit,$data);
			$data['scorep1']= $this->model_chart->unit1($unit,$data);
			$data['scorep2']= $this->model_chart->unit2($unit,$data);
			$data['scorep3']= $this->model_chart->unit3($unit,$data);
			$data['scorep4']= $this->model_chart->unit4($unit,$data);
			$data['listunit']=$this->model_chart->listnilaism($unit,$data);
			$data['listunit1']=$this->model_chart->listnilaism1($unit,$data);
			$data['listunit2']=$this->model_chart->listnilaism2($unit,$data);
			$data['listunit3']=$this->model_chart->listnilaism3($unit,$data);
			$data['listunit4']=$this->model_chart->listnilaism4($unit,$data);
			$data['nilaiother']= $this->model_chart->nilaiother($unit,$data);
			$data['nilaiother1']= $this->model_chart->nilaiother1($unit,$data);
			$data['nilaiother2']= $this->model_chart->nilaiother2($unit,$data);
			$data['nilaiother3']= $this->model_chart->nilaiother3($unit,$data);
			$data['nilaiother4']= $this->model_chart->nilaiother4($unit,$data);

			$data['sumdimensiunit']=$this->model_chart->sumdimensiunit($unit,$data);
			$data['sumdimensiunit1']=$this->model_chart->sumdimensiunit1($unit,$data);
			$data['sumdimensiunit2']=$this->model_chart->sumdimensiunit2($unit,$data);
			$data['sumdimensiunit3']=$this->model_chart->sumdimensiunit3($unit,$data);
			$data['sumdimensiunit4']=$this->model_chart->sumdimensiunit4($unit,$data);
			$data['dimensiunit']=$this->model_chart->dimensiunit($unit,$data);
			$data['dimensiunit1']=$this->model_chart->dimensiunit1($unit,$data);
			$data['dimensiunit2']=$this->model_chart->dimensiunit2($unit,$data);
			$data['dimensiunit3']=$this->model_chart->dimensiunit3($unit,$data);
			$data['dimensiunit4']=$this->model_chart->dimensiunit4($unit,$data);
			$data['listnilai']=$this->model_chart->listnilai($unit,$data);	
			$data['listnilaip1']=$this->model_chart->listnilaip1($unit,$data);	
			$data['listnilaip2']=$this->model_chart->listnilaip2($unit,$data);	
			$data['listnilaip3']=$this->model_chart->listnilaip3($unit,$data);	
			$data['listnilaip4']=$this->model_chart->listnilaip4($unit,$data);	
			$data['gaugeunit']=$this->model_chart->gaugeunit($unit,$data);
			$data['gaugeunit1']=$this->model_chart->gaugeunit1($unit,$data);
			$data['gaugeunit2']=$this->model_chart->gaugeunit2($unit,$data);
			$data['gaugeunit3']=$this->model_chart->gaugeunit3($unit,$data);
			$data['gaugeunit4']=$this->model_chart->gaugeunit4($unit,$data);
			$data['nilai_dimensi']= $this->model_chart->nilai_dimensi1($unit,$data);
			$data['nilai_dimensi1']= $this->model_chart->nilai_dimensip1($unit,$data);
			$data['nilai_dimensi2']= $this->model_chart->nilai_dimensip2($unit,$data);
			$data['nilai_dimensi3']= $this->model_chart->nilai_dimensip3($unit,$data);
			$data['nilai_dimensi4']= $this->model_chart->nilai_dimensip4($unit,$data);


			
			$data['cek_top']= $this->model_users->cekunit_top($mine,$data);
			$data['cek_top2']= $this->model_users->cekunit_top2($mine,$data);
			$data['cek_top3']= $this->model_users->cekunit_top3($mine,$data);
			$data['cek_top4']= $this->model_users->cekunit_top4($mine,$data);
			$data['cek_bottom']= $this->model_users->cekunit_bottom($mine,$data);
			$data['cek_bottom2']= $this->model_users->cekunit_bottom2($mine,$data);
			$data['cek_bottom3']= $this->model_users->cekunit_bottom3($mine,$data);
			$data['cek_bottom4']= $this->model_users->cekunit_bottom4($mine,$data);

		if ($this->form_validation->run() == FALSE){
			echo '<b>Periksa lagi data yang anda masukkan</b><br />';
		}
		else {
			//eksekusi query insert
			$status='top';
			$data_aksi = array(
				'id_rekomendasi'		=> $this->input->post('id_rekomendasi'),
				'id_nip'				=> $mine,
				'id_direktorat'			=> $this->session->userdata('direktorat'),
				'id_unit'				=> $this->session->userdata('unit'),
				'aksi'					=> $this->input->post('aksi'),
				'penanggung_jawab'		=> $this->session->userdata('nopeg'),
				'frekuensi'				=> $this->input->post('frekuensi'),
				'waktu_pelaksanaan'		=> $this->input->post('waktu_pelaksanaan'),
				'batas_pelaksanaan'		=> $this->input->post('batas_pelaksanaan'),
				'status'				=> $status,
				'tahun'					=> $data['tahun_aktif'],
				'periode'				=> $data['periode_aktif']
			);
			/*print_r($data_aksi);exit();*/
			/*echo '<b>Data tindak lanjut 1 berhasil disimpan.</b><br />';*/
			 $this->model_users->tambah_aksi_unit($data_aksi);
			 echo '<b>Data tindak lanjut 1 berhasil disimpan.</b><br />';
		}
	}

	public function actionunit_top2(){
		$this->form_validation->set_rules('aksi', 'Aksi');
		$this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab');
		$this->form_validation->set_rules('frekuensi', 'Frekuensi');
		$this->form_validation->set_rules('waktu_pelaksanaan', 'Waktu Pelaksanaan');
		$this->form_validation->set_rules('batas_pelaksanaan', 'Batas Pelaksanaan');
		
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
		$unit = $this->session->userdata('unit');
		$level=$this->session->userdata('level');
		$direktorat=$this->session->userdata('direktorat');
		$data['corporate']=$this->model_chart->corporate($data);
			$data['corporate1']=$this->model_chart->corporate1($data);
			$data['corporate2']=$this->model_chart->corporate2($data);
			$data['corporate3']=$this->model_chart->corporate3($data);
			$data['corporate4']=$this->model_chart->corporate4($data);
			$data['score2']= $this->model_chart->direktorat($direktorat,$data);
			$data['score21']= $this->model_chart->direktorat1($direktorat,$data);
			$data['score22']= $this->model_chart->direktorat2($direktorat,$data);
			$data['score23']= $this->model_chart->direktorat3($direktorat,$data);
			$data['score24']= $this->model_chart->direktorat4($direktorat,$data);
			$data['score']= $this->model_chart->unit($unit,$data);
			$data['scorep1']= $this->model_chart->unit1($unit,$data);
			$data['scorep2']= $this->model_chart->unit2($unit,$data);
			$data['scorep3']= $this->model_chart->unit3($unit,$data);
			$data['scorep4']= $this->model_chart->unit4($unit,$data);
			$data['listunit']=$this->model_chart->listnilaism($unit,$data);
			$data['listunit1']=$this->model_chart->listnilaism1($unit,$data);
			$data['listunit2']=$this->model_chart->listnilaism2($unit,$data);
			$data['listunit3']=$this->model_chart->listnilaism3($unit,$data);
			$data['listunit4']=$this->model_chart->listnilaism4($unit,$data);
			$data['nilaiother']= $this->model_chart->nilaiother($unit,$data);
			$data['nilaiother1']= $this->model_chart->nilaiother1($unit,$data);
			$data['nilaiother2']= $this->model_chart->nilaiother2($unit,$data);
			$data['nilaiother3']= $this->model_chart->nilaiother3($unit,$data);
			$data['nilaiother4']= $this->model_chart->nilaiother4($unit,$data);

			$data['sumdimensiunit']=$this->model_chart->sumdimensiunit($unit,$data);
			$data['sumdimensiunit1']=$this->model_chart->sumdimensiunit1($unit,$data);
			$data['sumdimensiunit2']=$this->model_chart->sumdimensiunit2($unit,$data);
			$data['sumdimensiunit3']=$this->model_chart->sumdimensiunit3($unit,$data);
			$data['sumdimensiunit4']=$this->model_chart->sumdimensiunit4($unit,$data);
			$data['dimensiunit']=$this->model_chart->dimensiunit($unit,$data);
			$data['dimensiunit1']=$this->model_chart->dimensiunit1($unit,$data);
			$data['dimensiunit2']=$this->model_chart->dimensiunit2($unit,$data);
			$data['dimensiunit3']=$this->model_chart->dimensiunit3($unit,$data);
			$data['dimensiunit4']=$this->model_chart->dimensiunit4($unit,$data);
			$data['listnilai']=$this->model_chart->listnilai($unit,$data);	
			$data['listnilaip1']=$this->model_chart->listnilaip1($unit,$data);	
			$data['listnilaip2']=$this->model_chart->listnilaip2($unit,$data);	
			$data['listnilaip3']=$this->model_chart->listnilaip3($unit,$data);	
			$data['listnilaip4']=$this->model_chart->listnilaip4($unit,$data);	
			$data['gaugeunit']=$this->model_chart->gaugeunit($unit,$data);
			$data['gaugeunit1']=$this->model_chart->gaugeunit1($unit,$data);
			$data['gaugeunit2']=$this->model_chart->gaugeunit2($unit,$data);
			$data['gaugeunit3']=$this->model_chart->gaugeunit3($unit,$data);
			$data['gaugeunit4']=$this->model_chart->gaugeunit4($unit,$data);
			$data['nilai_dimensi']= $this->model_chart->nilai_dimensi1($unit,$data);
			$data['nilai_dimensi1']= $this->model_chart->nilai_dimensip1($unit,$data);
			$data['nilai_dimensi2']= $this->model_chart->nilai_dimensip2($unit,$data);
			$data['nilai_dimensi3']= $this->model_chart->nilai_dimensip3($unit,$data);
			$data['nilai_dimensi4']= $this->model_chart->nilai_dimensip4($unit,$data);


			
			$data['cek_top']= $this->model_users->cekunit_top($mine,$data);
			$data['cek_top2']= $this->model_users->cekunit_top2($mine,$data);
			$data['cek_top3']= $this->model_users->cekunit_top3($mine,$data);
			$data['cek_top4']= $this->model_users->cekunit_top4($mine,$data);
			$data['cek_bottom']= $this->model_users->cekunit_bottom($mine,$data);
			$data['cek_bottom2']= $this->model_users->cekunit_bottom2($mine,$data);
			$data['cek_bottom3']= $this->model_users->cekunit_bottom3($mine,$data);
			$data['cek_bottom4']= $this->model_users->cekunit_bottom4($mine,$data);
		if ($this->form_validation->run() == FALSE){
			echo '<b>Periksa lagi data yang anda masukkan</b><br />';
		}
		else {
			//eksekusi query insert
			$status='top';
			$data_aksi = array(
				'id_rekomendasi'		=> $this->input->post('id_rekomendasi'),
				'id_nip'				=> $mine,
				'id_direktorat'			=> $this->session->userdata('direktorat'),
				'id_unit'				=> $this->session->userdata('unit'),
				'aksi'					=> $this->input->post('aksi'),
				'penanggung_jawab'		=> $this->session->userdata('nopeg'),
				'frekuensi'				=> $this->input->post('frekuensi'),
				'waktu_pelaksanaan'		=> $this->input->post('waktu_pelaksanaan'),
				'batas_pelaksanaan'		=> $this->input->post('batas_pelaksanaan'),
				'status'				=> $status,
				'tahun'					=> $data['tahun_aktif'],
				'periode'				=> $data['periode_aktif']			);
			//print_r($data_aksi);exit();
			 $this->model_users->tambah_aksi_unit($data_aksi);
			 echo '<b>Data tindak lanjut 2 berhasil disimpan.</b><br />';
		}
	}

	public function actionunit_top3(){
		$this->form_validation->set_rules('aksi', 'Aksi');
		$this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab');
		$this->form_validation->set_rules('frekuensi', 'Frekuensi');
		$this->form_validation->set_rules('waktu_pelaksanaan', 'Waktu Pelaksanaan');
		$this->form_validation->set_rules('batas_pelaksanaan', 'Batas Pelaksanaan');
		
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
		$unit = $this->session->userdata('unit');
		$level=$this->session->userdata('level');
		$direktorat=$this->session->userdata('direktorat');
		$data['corporate']=$this->model_chart->corporate($data);
			$data['corporate1']=$this->model_chart->corporate1($data);
			$data['corporate2']=$this->model_chart->corporate2($data);
			$data['corporate3']=$this->model_chart->corporate3($data);
			$data['corporate4']=$this->model_chart->corporate4($data);
			$data['score2']= $this->model_chart->direktorat($direktorat,$data);
			$data['score21']= $this->model_chart->direktorat1($direktorat,$data);
			$data['score22']= $this->model_chart->direktorat2($direktorat,$data);
			$data['score23']= $this->model_chart->direktorat3($direktorat,$data);
			$data['score24']= $this->model_chart->direktorat4($direktorat,$data);
			$data['score']= $this->model_chart->unit($unit,$data);
			$data['scorep1']= $this->model_chart->unit1($unit,$data);
			$data['scorep2']= $this->model_chart->unit2($unit,$data);
			$data['scorep3']= $this->model_chart->unit3($unit,$data);
			$data['scorep4']= $this->model_chart->unit4($unit,$data);
			$data['listunit']=$this->model_chart->listnilaism($unit,$data);
			$data['listunit1']=$this->model_chart->listnilaism1($unit,$data);
			$data['listunit2']=$this->model_chart->listnilaism2($unit,$data);
			$data['listunit3']=$this->model_chart->listnilaism3($unit,$data);
			$data['listunit4']=$this->model_chart->listnilaism4($unit,$data);
			$data['nilaiother']= $this->model_chart->nilaiother($unit,$data);
			$data['nilaiother1']= $this->model_chart->nilaiother1($unit,$data);
			$data['nilaiother2']= $this->model_chart->nilaiother2($unit,$data);
			$data['nilaiother3']= $this->model_chart->nilaiother3($unit,$data);
			$data['nilaiother4']= $this->model_chart->nilaiother4($unit,$data);

			$data['sumdimensiunit']=$this->model_chart->sumdimensiunit($unit,$data);
			$data['sumdimensiunit1']=$this->model_chart->sumdimensiunit1($unit,$data);
			$data['sumdimensiunit2']=$this->model_chart->sumdimensiunit2($unit,$data);
			$data['sumdimensiunit3']=$this->model_chart->sumdimensiunit3($unit,$data);
			$data['sumdimensiunit4']=$this->model_chart->sumdimensiunit4($unit,$data);
			$data['dimensiunit']=$this->model_chart->dimensiunit($unit,$data);
			$data['dimensiunit1']=$this->model_chart->dimensiunit1($unit,$data);
			$data['dimensiunit2']=$this->model_chart->dimensiunit2($unit,$data);
			$data['dimensiunit3']=$this->model_chart->dimensiunit3($unit,$data);
			$data['dimensiunit4']=$this->model_chart->dimensiunit4($unit,$data);
			$data['listnilai']=$this->model_chart->listnilai($unit,$data);	
			$data['listnilaip1']=$this->model_chart->listnilaip1($unit,$data);	
			$data['listnilaip2']=$this->model_chart->listnilaip2($unit,$data);	
			$data['listnilaip3']=$this->model_chart->listnilaip3($unit,$data);	
			$data['listnilaip4']=$this->model_chart->listnilaip4($unit,$data);	
			$data['gaugeunit']=$this->model_chart->gaugeunit($unit,$data);
			$data['gaugeunit1']=$this->model_chart->gaugeunit1($unit,$data);
			$data['gaugeunit2']=$this->model_chart->gaugeunit2($unit,$data);
			$data['gaugeunit3']=$this->model_chart->gaugeunit3($unit,$data);
			$data['gaugeunit4']=$this->model_chart->gaugeunit4($unit,$data);
			$data['nilai_dimensi']= $this->model_chart->nilai_dimensi1($unit,$data);
			$data['nilai_dimensi1']= $this->model_chart->nilai_dimensip1($unit,$data);
			$data['nilai_dimensi2']= $this->model_chart->nilai_dimensip2($unit,$data);
			$data['nilai_dimensi3']= $this->model_chart->nilai_dimensip3($unit,$data);
			$data['nilai_dimensi4']= $this->model_chart->nilai_dimensip4($unit,$data);


			
			$data['cek_top']= $this->model_users->cekunit_top($mine,$data);
			$data['cek_top2']= $this->model_users->cekunit_top2($mine,$data);
			$data['cek_top3']= $this->model_users->cekunit_top3($mine,$data);
			$data['cek_top4']= $this->model_users->cekunit_top4($mine,$data);
			$data['cek_bottom']= $this->model_users->cekunit_bottom($mine,$data);
			$data['cek_bottom2']= $this->model_users->cekunit_bottom2($mine,$data);
			$data['cek_bottom3']= $this->model_users->cekunit_bottom3($mine,$data);
			$data['cek_bottom4']= $this->model_users->cekunit_bottom4($mine,$data);
		if ($this->form_validation->run() == FALSE){
			echo '<b>Periksa lagi data yang anda masukkan</b><br />';
		}
		else {
			//eksekusi query insert
			$status='top';
			$data_aksi = array(
				'id_rekomendasi'		=> $this->input->post('id_rekomendasi'),
				'id_nip'				=> $mine,
				'id_direktorat'			=> $this->session->userdata('direktorat'),
				'id_unit'				=> $this->session->userdata('unit'),
				'aksi'					=> $this->input->post('aksi'),
				'penanggung_jawab'		=> $this->session->userdata('nopeg'),
				'frekuensi'				=> $this->input->post('frekuensi'),
				'waktu_pelaksanaan'		=> $this->input->post('waktu_pelaksanaan'),
				'batas_pelaksanaan'		=> $this->input->post('batas_pelaksanaan'),
				'status'				=> $status,
				'tahun'					=> $data['tahun_aktif'],
				'periode'				=> $data['periode_aktif']
			);
			//print_r($data_aksi);exit();
			 $this->model_users->tambah_aksi_unit($data_aksi);
			 echo '<b>Data tindak lanjut 3 berhasil disimpan.</b><br />';
		}
	}

	public function unitedit()
	{
		$tahun_pilih = $this->input->post('tahun');
		if (!$tahun_pilih)
		{
			$tahun_pilih = $this->session->userdata('tahun_pilih');
		}
		$data['tahun'] = $tahun_pilih;
		$data['tahun_aktif'] = $this->session->userdata('tahun');
		$data['periode_aktif'] = $this->session->userdata('periode');
		$data['_daftar_tahun'] = $this->model_admin->list_tahun();
		$unit = $this->session->userdata('unit');
		$mine = $this->session->userdata('nopeg');
		$data['aksi'] = $this->model_users->tampilunit_aksi($mine,$data);
		$data['aksi2'] = $this->model_users->tampilunit_aksi2($mine,$data);
		$data['aksi3'] = $this->model_users->tampilunit_aksi3($mine,$data);
		$data['aksi4'] = $this->model_users->tampilunit_aksi4($mine,$data);
		$data['aksi1'] = $this->model_users->tampilunit_aksi_bottom($mine,$data);		
		$data['aksi12'] = $this->model_users->tampilunit_aksi_bottom2($mine,$data);		
		$data['aksi13'] = $this->model_users->tampilunit_aksi_bottom3($mine,$data);		
		$data['aksi14'] = $this->model_users->tampilunit_aksi_bottom4($mine,$data);				
		//print_r($data);
		$this->load->view('user/unitedit_aksi',$data);
	}
	public function editunit_action_top($id_aksi) {
		$this->form_validation->set_rules('aksi',"Aksi");
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
		$unit = $this->session->userdata('unit');
		$mine = $this->session->userdata('nopeg');
		$data['aksi'] = $this->model_users->tampilunit_aksi($mine,$data);
		$data['aksi2'] = $this->model_users->tampilunit_aksi2($mine,$data);
		$data['aksi3'] = $this->model_users->tampilunit_aksi3($mine,$data);
		$data['aksi4'] = $this->model_users->tampilunit_aksi4($mine,$data);
		$data['aksi1'] = $this->model_users->tampilunit_aksi_bottom($mine,$data);		
		$data['aksi12'] = $this->model_users->tampilunit_aksi_bottom2($mine,$data);		
		$data['aksi13'] = $this->model_users->tampilunit_aksi_bottom3($mine,$data);		
		$data['aksi14'] = $this->model_users->tampilunit_aksi_bottom4($mine,$data);
		if ($this->form_validation->run() == FALSE){
			$this->load->view('user/unitedit_aksi',$data);
		}
		else {
				//form submit dengan gambar dikosongkan
				$status='top';
				$data_aksi = array(
				'id_nip'				=> $mine,
				'id_direktorat'			=> $this->session->userdata('direktorat'),
				'id_unit'				=> $this->session->userdata('unit'),
				'aksi'					=> $this->input->post('aksi'),
				'penanggung_jawab'		=> $this->session->userdata('nopeg'),
				'frekuensi'				=> $this->input->post('frekuensi'),
				'waktu_pelaksanaan'		=> $this->input->post('waktu_pelaksanaan'),
				'batas_pelaksanaan'		=> $this->input->post('batas_pelaksanaan'),
				'status'				=> $status,
				'tahun'					=> $data['tahun_aktif'],
				'periode'				=> $data['periode_aktif']
			);
				//print_r($data_aksi);exit();
			 $this->model_users->editunit_aksi_top($id_aksi,$data_aksi);
			 redirect('user/unitedit');

			
		}
	}	
	public function editunit_action_bottom($id_aksi) {
		$this->form_validation->set_rules('aksi',"Aksi");
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
		$unit = $this->session->userdata('unit');
		$mine = $this->session->userdata('nopeg');
		$data['aksi'] = $this->model_users->tampilunit_aksi($mine,$data);
		$data['aksi2'] = $this->model_users->tampilunit_aksi2($mine,$data);
		$data['aksi3'] = $this->model_users->tampilunit_aksi3($mine,$data);
		$data['aksi4'] = $this->model_users->tampilunit_aksi4($mine,$data);
		$data['aksi1'] = $this->model_users->tampilunit_aksi_bottom($mine,$data);		
		$data['aksi12'] = $this->model_users->tampilunit_aksi_bottom2($mine,$data);		
		$data['aksi13'] = $this->model_users->tampilunit_aksi_bottom3($mine,$data);		
		$data['aksi14'] = $this->model_users->tampilunit_aksi_bottom4($mine,$data);
		if ($this->form_validation->run() == FALSE){
			$this->load->view('user/unitedit_aksi',$data);
		}
		else {
				//form submit dengan gambar dikosongkan
				$status='bottom';
				$data_aksi = array(
				'id_nip'				=> $mine,
				'id_direktorat'			=> $this->session->userdata('direktorat'),
				'id_unit'				=> $this->session->userdata('unit'),
				'aksi'					=> $this->input->post('aksi'),
				'penanggung_jawab'		=> $this->session->userdata('nopeg'),
				'frekuensi'				=> $this->input->post('frekuensi'),
				'waktu_pelaksanaan'		=> $this->input->post('waktu_pelaksanaan'),
				'batas_pelaksanaan'		=> $this->input->post('batas_pelaksanaan'),
				'status'				=> $status,
				'tahun'					=> $data['tahun_aktif'],
				'periode'				=> $data['periode_aktif']
			);
			//print_r($data_aksi);exit();
			 $this->model_users->editunit_aksi_bottom($id_aksi,$data_aksi);
			 redirect('user/unitedit');
			
		}
	}	

	public function unitprogres()
	{
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
		$penanggung_jawab = $this->session->userdata('nopeg');
		$data['progres_aksi'] = $this->model_users->progresunit_aksi($penanggung_jawab,$data);
		$data['progres_aksi2'] = $this->model_users->progresunit_aksi2($penanggung_jawab,$data);
		$data['progres_aksi3'] = $this->model_users->progresunit_aksi3($penanggung_jawab,$data);
		$data['progres_aksi4'] = $this->model_users->progresunit_aksi4($penanggung_jawab,$data);			
		//print_r($data);
		$this->load->view('user/unitprogres_view',$data);
	}
	public function updateunit_progres($id_aksi){
		$this->form_validation->set_rules('progres');
		$this->form_validation->set_rules('keterangan');
		$tahun_pilih = $this->input->post('tahun');
		$s= $this->input->post();
		$y=strtotime($this->input->post('batas_pelaksanaan'));
		$o=strtotime('now');
		/*print_r($y);
		print_r($o);*/
		//jika belum dipilih, maka gunakan tahun aktif
		if (!$tahun_pilih)
		{
			$tahun_pilih = $this->session->userdata('tahun_pilih');
		}
		$data['tahun'] = $tahun_pilih;
		$data['tahun_aktif'] = $this->session->userdata('tahun');
		$data['periode_aktif'] = $this->session->userdata('periode');
		$data['_daftar_tahun'] = $this->model_admin->list_tahun();
		$penanggung_jawab = $this->session->userdata('nopeg');
		$data['progres_aksi'] = $this->model_users->progresunit_aksi($penanggung_jawab,$data);
		$data['progres_aksi2'] = $this->model_users->progresunit_aksi2($penanggung_jawab,$data);
		$data['progres_aksi3'] = $this->model_users->progresunit_aksi3($penanggung_jawab,$data);
		$data['progres_aksi4'] = $this->model_users->progresunit_aksi4($penanggung_jawab,$data);			

		if ($this->form_validation->run() == FALSE){
			$this->load->view('user/unitprogres', $data);
			//print_r("cok");
			exit();
		}
		else {
			if ($this->input->post('progres')==0 && strtotime($this->input->post('batas_pelaksanaan')) > strtotime('now')) {
				$data_progres = array(
						'progres'				=> $this->input->post('progres'),
						'keterangan'			=> $this->input->post('keterangan'),
						'status_progres'		=> 'Not Started'
				);
			} elseif ($this->input->post('progres')<100 && strtotime($this->input->post('batas_pelaksanaan')) > strtotime('now')) {
				$data_progres = array(
						'progres'				=> $this->input->post('progres'),
						'keterangan'			=> $this->input->post('keterangan'),
						'status_progres'		=> 'On Progress'
				);
			} elseif ($this->input->post('progres')<=100 && strtotime($this->input->post('batas_pelaksanaan')) < strtotime('now')) {
				$data_progres = array(
						'progres'				=> $this->input->post('progres'),
						'keterangan'			=> $this->input->post('keterangan'),
						'status_progres'		=> 'Failed'
				);
			} elseif ($this->input->post('progres')==100 && strtotime($this->input->post('batas_pelaksanaan')) >= strtotime('now')) {
				$data_progres = array(
						'progres'				=> $this->input->post('progres'),
						'keterangan'			=> $this->input->post('keterangan'),
						'status_progres'		=> 'Succeed'
				);
				
			}
			/*print_r($data_progres);
			exit();*/
			$this->model_users->updateunit_progres($id_aksi, $data_progres);
			redirect('user/unitprogres');
		}

}


	////////////////////////////DIREKTORAT
	public function direktoratscore(){
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
		if($level=='Direktur') 
		{
			$data['unit']=$unit;
			$data['direktorat']=$direktorat;
			$data['corporate']=$this->model_chart1->corporate($data);
			$data['corporate1']=$this->model_chart1->corporate1($data);
			$data['corporate2']=$this->model_chart1->corporate2($data);
			$data['corporate3']=$this->model_chart1->corporate3($data);
			$data['corporate4']=$this->model_chart1->corporate4($data);
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
			$data['listunit']=$this->model_chart1->listnilaivp($direktorat,$data);
			$data['listunit1']=$this->model_chart1->listnilaivp1($direktorat,$data);
			$data['listunit2']=$this->model_chart1->listnilaivp2($direktorat,$data);
			$data['listunit3']=$this->model_chart1->listnilaivp3($direktorat,$data);
			$data['listunit4']=$this->model_chart1->listnilaivp4($direktorat,$data);
			$data['nilaiother']= $this->model_chart1->nilaiother($unit,$data);
			$data['nilaiother1']= $this->model_chart1->nilaiother1($unit,$data);
			$data['nilaiother2']= $this->model_chart1->nilaiother2($unit,$data);
			$data['nilaiother3']= $this->model_chart1->nilaiother3($unit,$data);
			$data['nilaiother4']= $this->model_chart1->nilaiother4($unit,$data);
			$data['sumdimensiunit']=$this->model_chart1->sumdimensiunit($direktorat,$data);
			$data['sumdimensiunit1']=$this->model_chart1->sumdimensiunit1($direktorat,$data);
			$data['sumdimensiunit2']=$this->model_chart1->sumdimensiunit2($direktorat,$data);
			$data['sumdimensiunit3']=$this->model_chart1->sumdimensiunit3($direktorat,$data);
			$data['sumdimensiunit4']=$this->model_chart1->sumdimensiunit4($direktorat,$data);
			$data['dimensiunit']=$this->model_chart1->dimensiunit($direktorat,$data);
			$data['dimensiunit1']=$this->model_chart1->dimensiunit1($direktorat,$data);
			$data['dimensiunit2']=$this->model_chart1->dimensiunit2($direktorat,$data);
			$data['dimensiunit3']=$this->model_chart1->dimensiunit3($direktorat,$data);
			$data['dimensiunit4']=$this->model_chart1->dimensiunit4($direktorat,$data);
			$data['listnilai']=$this->model_chart1->listnilai($direktorat,$data);	
			$data['listnilaip1']=$this->model_chart1->listnilaip1($direktorat,$data);	
			$data['listnilaip2']=$this->model_chart1->listnilaip2($direktorat,$data);	
			$data['listnilaip3']=$this->model_chart1->listnilaip3($direktorat,$data);	
			$data['listnilaip4']=$this->model_chart1->listnilaip4($direktorat,$data);	
			$data['gaugeunit']=$this->model_chart1->gaugeunit($direktorat,$data);
			$data['gaugeunit1']=$this->model_chart->gaugeunit1($unit,$data);
			$data['gaugeunit2']=$this->model_chart->gaugeunit2($unit,$data);
			$data['gaugeunit3']=$this->model_chart->gaugeunit3($unit,$data);
			$data['gaugeunit4']=$this->model_chart->gaugeunit4($unit,$data);
			$data['nilai_dimensi']= $this->model_chart1->nilai_dimensi1($direktorat,$data);
			$data['nilai_dimensi1']= $this->model_chart1->nilai_dimensip1($direktorat,$data);
			$data['nilai_dimensi2']= $this->model_chart1->nilai_dimensip2($direktorat,$data);
			$data['nilai_dimensi3']= $this->model_chart1->nilai_dimensip3($direktorat,$data);
			$data['nilai_dimensi4']= $this->model_chart1->nilai_dimensip4($direktorat,$data);


			
			$data['cek_top']= $this->model_users->cekdirektorat_top($mine,$data);
			$data['cek_top2']= $this->model_users->cekdirektorat_top2($mine,$data);
			$data['cek_top3']= $this->model_users->cekdirektorat_top3($mine,$data);
			$data['cek_top4']= $this->model_users->cekdirektorat_top4($mine,$data);
			$data['cek_bottom']= $this->model_users->cekdirektorat_bottom($mine,$data);
			$data['cek_bottom2']= $this->model_users->cekdirektorat_bottom2($mine,$data);
			$data['cek_bottom3']= $this->model_users->cekdirektorat_bottom3($mine,$data);
			$data['cek_bottom4']= $this->model_users->cekdirektorat_bottom4($mine,$data);
			

			$data['listaksi']= $this->model_users->listaksidirektorat($mine,$data);
			$data['listaksi2']= $this->model_users->listaksidirektorat2($mine,$data);
			$data['listaksi3']= $this->model_users->listaksidirektorat3($mine,$data);
			$data['listaksi4']= $this->model_users->listaksidirektorat4($mine,$data);
			$data['listaksifull']= $this->model_users->listaksidirektoratfull($mine,$data);
			$data['sumaksi']= $this->model_users->sumaksidirektorat($mine,$data);
			$data['sumaksi2']= $this->model_users->sumaksidirektorat2($mine,$data);
			$data['sumaksi3']= $this->model_users->sumaksidirektorat3($mine,$data);
			$data['sumaksi4']= $this->model_users->sumaksidirektorat4($mine,$data);
			$data['sumaksifull']= $this->model_users->sumaksidirektoratfull($mine,$data);
			
			
		
			//print_r($data['scorep3']);
			$this->load->view('user/direktoratscore_view',$data,$unit);
		}
		else 
		redirect('error');		
		
	}
	public function actiondirektorat_bottom1(){
		$this->form_validation->set_rules('aksi', 'Aksi');
		$this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab');
		$this->form_validation->set_rules('frekuensi', 'Frekuensi');
		$this->form_validation->set_rules('waktu_pelaksanaan', 'Waktu Pelaksanaan');
		$this->form_validation->set_rules('batas_pelaksanaan', 'Batas Pelaksanaan');
		
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
			$data['corporate']=$this->model_chart1->corporate($data);
			$data['corporate1']=$this->model_chart1->corporate1($data);
			$data['corporate2']=$this->model_chart1->corporate2($data);
			$data['corporate3']=$this->model_chart1->corporate3($data);
			$data['corporate4']=$this->model_chart1->corporate4($data);
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
			$data['listunit']=$this->model_chart1->listnilaivp($direktorat,$data);
			$data['listunit1']=$this->model_chart1->listnilaivp1($direktorat,$data);
			$data['listunit2']=$this->model_chart1->listnilaivp2($direktorat,$data);
			$data['listunit3']=$this->model_chart1->listnilaivp3($direktorat,$data);
			$data['listunit4']=$this->model_chart1->listnilaivp4($direktorat,$data);
			$data['nilaiother']= $this->model_chart1->nilaiother($unit,$data);
			$data['nilaiother1']= $this->model_chart1->nilaiother1($unit,$data);
			$data['nilaiother2']= $this->model_chart1->nilaiother2($unit,$data);
			$data['nilaiother3']= $this->model_chart1->nilaiother3($unit,$data);
			$data['nilaiother4']= $this->model_chart1->nilaiother4($unit,$data);
			$data['sumdimensiunit']=$this->model_chart1->sumdimensiunit($direktorat,$data);
			$data['sumdimensiunit1']=$this->model_chart1->sumdimensiunit1($direktorat,$data);
			$data['sumdimensiunit2']=$this->model_chart1->sumdimensiunit2($direktorat,$data);
			$data['sumdimensiunit3']=$this->model_chart1->sumdimensiunit3($direktorat,$data);
			$data['sumdimensiunit4']=$this->model_chart1->sumdimensiunit4($direktorat,$data);
			$data['dimensiunit']=$this->model_chart1->dimensiunit($direktorat,$data);
			$data['dimensiunit1']=$this->model_chart1->dimensiunit1($direktorat,$data);
			$data['dimensiunit2']=$this->model_chart1->dimensiunit2($direktorat,$data);
			$data['dimensiunit3']=$this->model_chart1->dimensiunit3($direktorat,$data);
			$data['dimensiunit4']=$this->model_chart1->dimensiunit4($direktorat,$data);
			$data['listnilai']=$this->model_chart1->listnilai($direktorat,$data);	
			$data['listnilaip1']=$this->model_chart1->listnilaip1($direktorat,$data);	
			$data['listnilaip2']=$this->model_chart1->listnilaip2($direktorat,$data);	
			$data['listnilaip3']=$this->model_chart1->listnilaip3($direktorat,$data);	
			$data['listnilaip4']=$this->model_chart1->listnilaip4($direktorat,$data);	
			$data['gaugeunit']=$this->model_chart1->gaugeunit($direktorat,$data);
			$data['nilai_dimensi']= $this->model_chart1->nilai_dimensi1($direktorat,$data);
			$data['nilai_dimensi1']= $this->model_chart1->nilai_dimensip1($direktorat,$data);
			$data['nilai_dimensi2']= $this->model_chart1->nilai_dimensip2($direktorat,$data);
			$data['nilai_dimensi3']= $this->model_chart1->nilai_dimensip3($direktorat,$data);
			$data['nilai_dimensi4']= $this->model_chart1->nilai_dimensip4($direktorat,$data);


			
			$data['cek_top']= $this->model_users->cekdirektorat_top($mine,$data);
			$data['cek_top2']= $this->model_users->cekdirektorat_top2($mine,$data);
			$data['cek_top3']= $this->model_users->cekdirektorat_top3($mine,$data);
			$data['cek_top4']= $this->model_users->cekdirektorat_top4($mine,$data);
			$data['cek_bottom']= $this->model_users->cekdirektorat_bottom($mine,$data);
			$data['cek_bottom2']= $this->model_users->cekdirektorat_bottom2($mine,$data);
			$data['cek_bottom3']= $this->model_users->cekdirektorat_bottom3($mine,$data);
			$data['cek_bottom4']= $this->model_users->cekdirektorat_bottom4($mine,$data);
			

			$data['listaksi']= $this->model_users->listaksidirektorat($mine,$data);
			$data['listaksi2']= $this->model_users->listaksidirektorat2($mine,$data);
			$data['listaksi3']= $this->model_users->listaksidirektorat3($mine,$data);
			$data['listaksi4']= $this->model_users->listaksidirektorat4($mine,$data);
			$data['listaksifull']= $this->model_users->listaksidirektoratfull($mine,$data);
			$data['sumaksi']= $this->model_users->sumaksidirektorat($mine,$data);
			$data['sumaksi2']= $this->model_users->sumaksidirektorat2($mine,$data);
			$data['sumaksi3']= $this->model_users->sumaksidirektorat3($mine,$data);
			$data['sumaksi4']= $this->model_users->sumaksidirektorat4($mine,$data);
			$data['sumaksifull']= $this->model_users->sumaksidirektoratfull($mine,$data);
	

		if ($this->form_validation->run() == FALSE){
			echo '<b>Periksa lagi data yang anda masukkan</b><br />';
		}
		else {
			//eksekusi query insert
			$status='bottom';
			$data_aksi = array(
				'id_rekomendasi'		=> $this->input->post('id_rekomendasi'),
				'id_nip'				=> $mine,
				'id_direktorat'			=> $this->session->userdata('direktorat'),
				'id_unit'				=> $this->session->userdata('unit'),
				'aksi'					=> $this->input->post('aksi'),
				'penanggung_jawab'		=> $this->session->userdata('nopeg'),
				'frekuensi'				=> $this->input->post('frekuensi'),
				'waktu_pelaksanaan'		=> $this->input->post('waktu_pelaksanaan'),
				'batas_pelaksanaan'		=> $this->input->post('batas_pelaksanaan'),
				'status'				=> $status,
				'tahun'					=> $data['tahun_aktif'],
				'periode'				=> $data['periode_aktif']
			);
			//print_r($data_aksi);exit();
			 $this->model_users->tambah_aksi_direktorat($data_aksi);
			 echo '<b>Data tindak lanjut 1 berhasil disimpan.</b><br />';
		}
	}
	public function actiondirektorat_bottom2(){
		$this->form_validation->set_rules('aksi', 'Aksi');
		$this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab');
		$this->form_validation->set_rules('frekuensi', 'Frekuensi');
		$this->form_validation->set_rules('waktu_pelaksanaan', 'Waktu Pelaksanaan');
		$this->form_validation->set_rules('batas_pelaksanaan', 'Batas Pelaksanaan');
		
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
			$data['corporate']=$this->model_chart1->corporate($data);
			$data['corporate1']=$this->model_chart1->corporate1($data);
			$data['corporate2']=$this->model_chart1->corporate2($data);
			$data['corporate3']=$this->model_chart1->corporate3($data);
			$data['corporate4']=$this->model_chart1->corporate4($data);
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
			$data['listunit']=$this->model_chart1->listnilaivp($direktorat,$data);
			$data['listunit1']=$this->model_chart1->listnilaivp1($direktorat,$data);
			$data['listunit2']=$this->model_chart1->listnilaivp2($direktorat,$data);
			$data['listunit3']=$this->model_chart1->listnilaivp3($direktorat,$data);
			$data['listunit4']=$this->model_chart1->listnilaivp4($direktorat,$data);
			$data['nilaiother']= $this->model_chart1->nilaiother($unit,$data);
			$data['nilaiother1']= $this->model_chart1->nilaiother1($unit,$data);
			$data['nilaiother2']= $this->model_chart1->nilaiother2($unit,$data);
			$data['nilaiother3']= $this->model_chart1->nilaiother3($unit,$data);
			$data['nilaiother4']= $this->model_chart1->nilaiother4($unit,$data);
			$data['sumdimensiunit']=$this->model_chart1->sumdimensiunit($direktorat,$data);
			$data['sumdimensiunit1']=$this->model_chart1->sumdimensiunit1($direktorat,$data);
			$data['sumdimensiunit2']=$this->model_chart1->sumdimensiunit2($direktorat,$data);
			$data['sumdimensiunit3']=$this->model_chart1->sumdimensiunit3($direktorat,$data);
			$data['sumdimensiunit4']=$this->model_chart1->sumdimensiunit4($direktorat,$data);
			$data['dimensiunit']=$this->model_chart1->dimensiunit($direktorat,$data);
			$data['dimensiunit1']=$this->model_chart1->dimensiunit1($direktorat,$data);
			$data['dimensiunit2']=$this->model_chart1->dimensiunit2($direktorat,$data);
			$data['dimensiunit3']=$this->model_chart1->dimensiunit3($direktorat,$data);
			$data['dimensiunit4']=$this->model_chart1->dimensiunit4($direktorat,$data);
			$data['listnilai']=$this->model_chart1->listnilai($direktorat,$data);	
			$data['listnilaip1']=$this->model_chart1->listnilaip1($direktorat,$data);	
			$data['listnilaip2']=$this->model_chart1->listnilaip2($direktorat,$data);	
			$data['listnilaip3']=$this->model_chart1->listnilaip3($direktorat,$data);	
			$data['listnilaip4']=$this->model_chart1->listnilaip4($direktorat,$data);	
			$data['gaugeunit']=$this->model_chart1->gaugeunit($direktorat,$data);
			$data['nilai_dimensi']= $this->model_chart1->nilai_dimensi1($direktorat,$data);
			$data['nilai_dimensi1']= $this->model_chart1->nilai_dimensip1($direktorat,$data);
			$data['nilai_dimensi2']= $this->model_chart1->nilai_dimensip2($direktorat,$data);
			$data['nilai_dimensi3']= $this->model_chart1->nilai_dimensip3($direktorat,$data);
			$data['nilai_dimensi4']= $this->model_chart1->nilai_dimensip4($direktorat,$data);


			
			$data['cek_top']= $this->model_users->cekdirektorat_top($mine,$data);
			$data['cek_top2']= $this->model_users->cekdirektorat_top2($mine,$data);
			$data['cek_top3']= $this->model_users->cekdirektorat_top3($mine,$data);
			$data['cek_top4']= $this->model_users->cekdirektorat_top4($mine,$data);
			$data['cek_bottom']= $this->model_users->cekdirektorat_bottom($mine,$data);
			$data['cek_bottom2']= $this->model_users->cekdirektorat_bottom2($mine,$data);
			$data['cek_bottom3']= $this->model_users->cekdirektorat_bottom3($mine,$data);
			$data['cek_bottom4']= $this->model_users->cekdirektorat_bottom4($mine,$data);
			

			$data['listaksi']= $this->model_users->listaksidirektorat($mine,$data);
			$data['listaksi2']= $this->model_users->listaksidirektorat2($mine,$data);
			$data['listaksi3']= $this->model_users->listaksidirektorat3($mine,$data);
			$data['listaksi4']= $this->model_users->listaksidirektorat4($mine,$data);
			$data['listaksifull']= $this->model_users->listaksidirektoratfull($mine,$data);
			$data['sumaksi']= $this->model_users->sumaksidirektorat($mine,$data);
			$data['sumaksi2']= $this->model_users->sumaksidirektorat2($mine,$data);
			$data['sumaksi3']= $this->model_users->sumaksidirektorat3($mine,$data);
			$data['sumaksi4']= $this->model_users->sumaksidirektorat4($mine,$data);
			$data['sumaksifull']= $this->model_users->sumaksidirektoratfull($mine,$data);
	

		if ($this->form_validation->run() == FALSE){
			echo '<b>Periksa lagi data yang anda masukkan</b><br />';
		}
		else {
			//eksekusi query insert
			$status='bottom';
			$data_aksi = array(
				'id_rekomendasi'		=> $this->input->post('id_rekomendasi'),
				'id_nip'				=> $mine,
				'id_direktorat'			=> $this->session->userdata('direktorat'),
				'id_unit'				=> $this->session->userdata('unit'),
				'aksi'					=> $this->input->post('aksi'),
				'penanggung_jawab'		=> $this->session->userdata('nopeg'),
				'frekuensi'				=> $this->input->post('frekuensi'),
				'waktu_pelaksanaan'		=> $this->input->post('waktu_pelaksanaan'),
				'batas_pelaksanaan'		=> $this->input->post('batas_pelaksanaan'),
				'status'				=> $status,
				'tahun'					=> $data['tahun_aktif'],
				'periode'				=> $data['periode_aktif']
			);
			//print_r($data_aksi);exit();
			 $this->model_users->tambah_aksi_direktorat($data_aksi);
			 echo '<b>Data tindak lanjut 2 berhasil disimpan.</b><br />';
		}
	}
	public function actiondirektorat_bottom3(){
		$this->form_validation->set_rules('aksi', 'Aksi');
		$this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab');
		$this->form_validation->set_rules('frekuensi', 'Frekuensi');
		$this->form_validation->set_rules('waktu_pelaksanaan', 'Waktu Pelaksanaan');
		$this->form_validation->set_rules('batas_pelaksanaan', 'Batas Pelaksanaan');
		
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
			$data['corporate']=$this->model_chart1->corporate($data);
			$data['corporate1']=$this->model_chart1->corporate1($data);
			$data['corporate2']=$this->model_chart1->corporate2($data);
			$data['corporate3']=$this->model_chart1->corporate3($data);
			$data['corporate4']=$this->model_chart1->corporate4($data);
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
			$data['listunit']=$this->model_chart1->listnilaivp($direktorat,$data);
			$data['listunit1']=$this->model_chart1->listnilaivp1($direktorat,$data);
			$data['listunit2']=$this->model_chart1->listnilaivp2($direktorat,$data);
			$data['listunit3']=$this->model_chart1->listnilaivp3($direktorat,$data);
			$data['listunit4']=$this->model_chart1->listnilaivp4($direktorat,$data);
			$data['nilaiother']= $this->model_chart1->nilaiother($unit,$data);
			$data['nilaiother1']= $this->model_chart1->nilaiother1($unit,$data);
			$data['nilaiother2']= $this->model_chart1->nilaiother2($unit,$data);
			$data['nilaiother3']= $this->model_chart1->nilaiother3($unit,$data);
			$data['nilaiother4']= $this->model_chart1->nilaiother4($unit,$data);
			$data['sumdimensiunit']=$this->model_chart1->sumdimensiunit($direktorat,$data);
			$data['sumdimensiunit1']=$this->model_chart1->sumdimensiunit1($direktorat,$data);
			$data['sumdimensiunit2']=$this->model_chart1->sumdimensiunit2($direktorat,$data);
			$data['sumdimensiunit3']=$this->model_chart1->sumdimensiunit3($direktorat,$data);
			$data['sumdimensiunit4']=$this->model_chart1->sumdimensiunit4($direktorat,$data);
			$data['dimensiunit']=$this->model_chart1->dimensiunit($direktorat,$data);
			$data['dimensiunit1']=$this->model_chart1->dimensiunit1($direktorat,$data);
			$data['dimensiunit2']=$this->model_chart1->dimensiunit2($direktorat,$data);
			$data['dimensiunit3']=$this->model_chart1->dimensiunit3($direktorat,$data);
			$data['dimensiunit4']=$this->model_chart1->dimensiunit4($direktorat,$data);
			$data['listnilai']=$this->model_chart1->listnilai($direktorat,$data);	
			$data['listnilaip1']=$this->model_chart1->listnilaip1($direktorat,$data);	
			$data['listnilaip2']=$this->model_chart1->listnilaip2($direktorat,$data);	
			$data['listnilaip3']=$this->model_chart1->listnilaip3($direktorat,$data);	
			$data['listnilaip4']=$this->model_chart1->listnilaip4($direktorat,$data);	
			$data['gaugeunit']=$this->model_chart1->gaugeunit($direktorat,$data);
			$data['nilai_dimensi']= $this->model_chart1->nilai_dimensi1($direktorat,$data);
			$data['nilai_dimensi1']= $this->model_chart1->nilai_dimensip1($direktorat,$data);
			$data['nilai_dimensi2']= $this->model_chart1->nilai_dimensip2($direktorat,$data);
			$data['nilai_dimensi3']= $this->model_chart1->nilai_dimensip3($direktorat,$data);
			$data['nilai_dimensi4']= $this->model_chart1->nilai_dimensip4($direktorat,$data);


			
			$data['cek_top']= $this->model_users->cekdirektorat_top($mine,$data);
			$data['cek_top2']= $this->model_users->cekdirektorat_top2($mine,$data);
			$data['cek_top3']= $this->model_users->cekdirektorat_top3($mine,$data);
			$data['cek_top4']= $this->model_users->cekdirektorat_top4($mine,$data);
			$data['cek_bottom']= $this->model_users->cekdirektorat_bottom($mine,$data);
			$data['cek_bottom2']= $this->model_users->cekdirektorat_bottom2($mine,$data);
			$data['cek_bottom3']= $this->model_users->cekdirektorat_bottom3($mine,$data);
			$data['cek_bottom4']= $this->model_users->cekdirektorat_bottom4($mine,$data);
			

			$data['listaksi']= $this->model_users->listaksidirektorat($mine,$data);
			$data['listaksi2']= $this->model_users->listaksidirektorat2($mine,$data);
			$data['listaksi3']= $this->model_users->listaksidirektorat3($mine,$data);
			$data['listaksi4']= $this->model_users->listaksidirektorat4($mine,$data);
			$data['listaksifull']= $this->model_users->listaksidirektoratfull($mine,$data);
			$data['sumaksi']= $this->model_users->sumaksidirektorat($mine,$data);
			$data['sumaksi2']= $this->model_users->sumaksidirektorat2($mine,$data);
			$data['sumaksi3']= $this->model_users->sumaksidirektorat3($mine,$data);
			$data['sumaksi4']= $this->model_users->sumaksidirektorat4($mine,$data);
			$data['sumaksifull']= $this->model_users->sumaksidirektoratfull($mine,$data);
	

		if ($this->form_validation->run() == FALSE){
			echo '<b>Periksa lagi data yang anda masukkan</b><br />';
		}
		else {
			//eksekusi query insert
			$status='bottom';
			$data_aksi = array(
				'id_rekomendasi'		=> $this->input->post('id_rekomendasi'),
				'id_nip'				=> $mine,
				'id_direktorat'			=> $this->session->userdata('direktorat'),
				'id_unit'				=> $this->session->userdata('unit'),
				'aksi'					=> $this->input->post('aksi'),
				'penanggung_jawab'		=> $this->session->userdata('nopeg'),
				'frekuensi'				=> $this->input->post('frekuensi'),
				'waktu_pelaksanaan'		=> $this->input->post('waktu_pelaksanaan'),
				'batas_pelaksanaan'		=> $this->input->post('batas_pelaksanaan'),
				'status'				=> $status,
				'tahun'					=> $data['tahun_aktif'],
				'periode'				=> $data['periode_aktif']
			);
			//print_r($data_aksi);exit();
			 $this->model_users->tambah_aksi_direktorat($data_aksi);
			 echo '<b>Data tindak lanjut 3 berhasil disimpan.</b><br />';
		}
	}
	public function actiondirektorat_top1(){
		$this->form_validation->set_rules('aksi', 'Aksi');
		$this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab');
		$this->form_validation->set_rules('frekuensi', 'Frekuensi');
		$this->form_validation->set_rules('waktu_pelaksanaan', 'Waktu Pelaksanaan');
		$this->form_validation->set_rules('batas_pelaksanaan', 'Batas Pelaksanaan');
		
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
		$unit = $this->session->userdata('unit');
		$level=$this->session->userdata('level');
		$direktorat=$this->session->userdata('direktorat');
		$data['corporate']=$this->model_chart->corporate($data);
			$data['corporate1']=$this->model_chart->corporate1($data);
			$data['corporate2']=$this->model_chart->corporate2($data);
			$data['corporate3']=$this->model_chart->corporate3($data);
			$data['corporate4']=$this->model_chart->corporate4($data);
			$data['score2']= $this->model_chart->direktorat($direktorat,$data);
			$data['score21']= $this->model_chart->direktorat1($direktorat,$data);
			$data['score22']= $this->model_chart->direktorat2($direktorat,$data);
			$data['score23']= $this->model_chart->direktorat3($direktorat,$data);
			$data['score24']= $this->model_chart->direktorat4($direktorat,$data);
			$data['score']= $this->model_chart->unit($unit,$data);
			$data['scorep1']= $this->model_chart->unit1($unit,$data);
			$data['scorep2']= $this->model_chart->unit2($unit,$data);
			$data['scorep3']= $this->model_chart->unit3($unit,$data);
			$data['scorep4']= $this->model_chart->unit4($unit,$data);
			$data['listunit']=$this->model_chart->listnilaism($unit,$data);
			$data['listunit1']=$this->model_chart->listnilaism1($unit,$data);
			$data['listunit2']=$this->model_chart->listnilaism2($unit,$data);
			$data['listunit3']=$this->model_chart->listnilaism3($unit,$data);
			$data['listunit4']=$this->model_chart->listnilaism4($unit,$data);
			$data['nilaiother']= $this->model_chart->nilaiother($unit,$data);
			$data['nilaiother1']= $this->model_chart->nilaiother1($unit,$data);
			$data['nilaiother2']= $this->model_chart->nilaiother2($unit,$data);
			$data['nilaiother3']= $this->model_chart->nilaiother3($unit,$data);
			$data['nilaiother4']= $this->model_chart->nilaiother4($unit,$data);

			$data['sumdimensiunit']=$this->model_chart->sumdimensiunit($unit,$data);
			$data['sumdimensiunit1']=$this->model_chart->sumdimensiunit1($unit,$data);
			$data['sumdimensiunit2']=$this->model_chart->sumdimensiunit2($unit,$data);
			$data['sumdimensiunit3']=$this->model_chart->sumdimensiunit3($unit,$data);
			$data['sumdimensiunit4']=$this->model_chart->sumdimensiunit4($unit,$data);
			$data['dimensiunit']=$this->model_chart->dimensiunit($unit,$data);
			$data['dimensiunit1']=$this->model_chart->dimensiunit1($unit,$data);
			$data['dimensiunit2']=$this->model_chart->dimensiunit2($unit,$data);
			$data['dimensiunit3']=$this->model_chart->dimensiunit3($unit,$data);
			$data['dimensiunit4']=$this->model_chart->dimensiunit4($unit,$data);
			$data['listnilai']=$this->model_chart->listnilai($unit,$data);	
			$data['listnilaip1']=$this->model_chart->listnilaip1($unit,$data);	
			$data['listnilaip2']=$this->model_chart->listnilaip2($unit,$data);	
			$data['listnilaip3']=$this->model_chart->listnilaip3($unit,$data);	
			$data['listnilaip4']=$this->model_chart->listnilaip4($unit,$data);	
			$data['gaugeunit']=$this->model_chart->gaugeunit($unit,$data);
			$data['gaugeunit1']=$this->model_chart->gaugeunit1($unit,$data);
			$data['gaugeunit2']=$this->model_chart->gaugeunit2($unit,$data);
			$data['gaugeunit3']=$this->model_chart->gaugeunit3($unit,$data);
			$data['gaugeunit4']=$this->model_chart->gaugeunit4($unit,$data);
			$data['nilai_dimensi']= $this->model_chart->nilai_dimensi1($unit,$data);
			$data['nilai_dimensi1']= $this->model_chart->nilai_dimensip1($unit,$data);
			$data['nilai_dimensi2']= $this->model_chart->nilai_dimensip2($unit,$data);
			$data['nilai_dimensi3']= $this->model_chart->nilai_dimensip3($unit,$data);
			$data['nilai_dimensi4']= $this->model_chart->nilai_dimensip4($unit,$data);


			
			$data['cek_top']= $this->model_users->cekunit_top($mine,$data);
			$data['cek_top2']= $this->model_users->cekunit_top2($mine,$data);
			$data['cek_top3']= $this->model_users->cekunit_top3($mine,$data);
			$data['cek_top4']= $this->model_users->cekunit_top4($mine,$data);
			$data['cek_bottom']= $this->model_users->cekunit_bottom($mine,$data);
			$data['cek_bottom2']= $this->model_users->cekunit_bottom2($mine,$data);
			$data['cek_bottom3']= $this->model_users->cekunit_bottom3($mine,$data);
			$data['cek_bottom4']= $this->model_users->cekunit_bottom4($mine,$data);

		if ($this->form_validation->run() == FALSE){
			echo '<b>Periksa lagi data yang anda masukkan</b><br />';
		}
		else {
			//eksekusi query insert
			$status='top';
			$data_aksi = array(
				'id_rekomendasi'		=> $this->input->post('id_rekomendasi'),
				'id_nip'				=> $mine,
				'id_direktorat'			=> $this->session->userdata('direktorat'),
				'id_unit'				=> $this->session->userdata('unit'),
				'aksi'					=> $this->input->post('aksi'),
				'penanggung_jawab'		=> $this->session->userdata('nopeg'),
				'frekuensi'				=> $this->input->post('frekuensi'),
				'waktu_pelaksanaan'		=> $this->input->post('waktu_pelaksanaan'),
				'batas_pelaksanaan'		=> $this->input->post('batas_pelaksanaan'),
				'status'				=> $status,
				'tahun'					=> $data['tahun_aktif'],
				'periode'				=> $data['periode_aktif']
			);
			//print_r($data_aksi);exit();
			//echo '<b>Data tindak lanjut 1 berhasil disimpan.</b><br />';
			 $this->model_users->tambah_aksi_direktorat($data_aksi);
			 echo '<b>Data tindak lanjut 1 berhasil disimpan.</b><br />';
		}
	}
	public function actiondirektorat_top2(){
		$this->form_validation->set_rules('aksi', 'Aksi');
		$this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab');
		$this->form_validation->set_rules('frekuensi', 'Frekuensi');
		$this->form_validation->set_rules('waktu_pelaksanaan', 'Waktu Pelaksanaan');
		$this->form_validation->set_rules('batas_pelaksanaan', 'Batas Pelaksanaan');
		
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
		$unit = $this->session->userdata('unit');
		$level=$this->session->userdata('level');
		$direktorat=$this->session->userdata('direktorat');
		$data['corporate']=$this->model_chart->corporate($data);
			$data['corporate1']=$this->model_chart->corporate1($data);
			$data['corporate2']=$this->model_chart->corporate2($data);
			$data['corporate3']=$this->model_chart->corporate3($data);
			$data['corporate4']=$this->model_chart->corporate4($data);
			$data['score2']= $this->model_chart->direktorat($direktorat,$data);
			$data['score21']= $this->model_chart->direktorat1($direktorat,$data);
			$data['score22']= $this->model_chart->direktorat2($direktorat,$data);
			$data['score23']= $this->model_chart->direktorat3($direktorat,$data);
			$data['score24']= $this->model_chart->direktorat4($direktorat,$data);
			$data['score']= $this->model_chart->unit($unit,$data);
			$data['scorep1']= $this->model_chart->unit1($unit,$data);
			$data['scorep2']= $this->model_chart->unit2($unit,$data);
			$data['scorep3']= $this->model_chart->unit3($unit,$data);
			$data['scorep4']= $this->model_chart->unit4($unit,$data);
			$data['listunit']=$this->model_chart->listnilaism($unit,$data);
			$data['listunit1']=$this->model_chart->listnilaism1($unit,$data);
			$data['listunit2']=$this->model_chart->listnilaism2($unit,$data);
			$data['listunit3']=$this->model_chart->listnilaism3($unit,$data);
			$data['listunit4']=$this->model_chart->listnilaism4($unit,$data);
			$data['nilaiother']= $this->model_chart->nilaiother($unit,$data);
			$data['nilaiother1']= $this->model_chart->nilaiother1($unit,$data);
			$data['nilaiother2']= $this->model_chart->nilaiother2($unit,$data);
			$data['nilaiother3']= $this->model_chart->nilaiother3($unit,$data);
			$data['nilaiother4']= $this->model_chart->nilaiother4($unit,$data);

			$data['sumdimensiunit']=$this->model_chart->sumdimensiunit($unit,$data);
			$data['sumdimensiunit1']=$this->model_chart->sumdimensiunit1($unit,$data);
			$data['sumdimensiunit2']=$this->model_chart->sumdimensiunit2($unit,$data);
			$data['sumdimensiunit3']=$this->model_chart->sumdimensiunit3($unit,$data);
			$data['sumdimensiunit4']=$this->model_chart->sumdimensiunit4($unit,$data);
			$data['dimensiunit']=$this->model_chart->dimensiunit($unit,$data);
			$data['dimensiunit1']=$this->model_chart->dimensiunit1($unit,$data);
			$data['dimensiunit2']=$this->model_chart->dimensiunit2($unit,$data);
			$data['dimensiunit3']=$this->model_chart->dimensiunit3($unit,$data);
			$data['dimensiunit4']=$this->model_chart->dimensiunit4($unit,$data);
			$data['listnilai']=$this->model_chart->listnilai($unit,$data);	
			$data['listnilaip1']=$this->model_chart->listnilaip1($unit,$data);	
			$data['listnilaip2']=$this->model_chart->listnilaip2($unit,$data);	
			$data['listnilaip3']=$this->model_chart->listnilaip3($unit,$data);	
			$data['listnilaip4']=$this->model_chart->listnilaip4($unit,$data);	
			$data['gaugeunit']=$this->model_chart->gaugeunit($unit,$data);
			$data['gaugeunit1']=$this->model_chart->gaugeunit1($unit,$data);
			$data['gaugeunit2']=$this->model_chart->gaugeunit2($unit,$data);
			$data['gaugeunit3']=$this->model_chart->gaugeunit3($unit,$data);
			$data['gaugeunit4']=$this->model_chart->gaugeunit4($unit,$data);
			$data['nilai_dimensi']= $this->model_chart->nilai_dimensi1($unit,$data);
			$data['nilai_dimensi1']= $this->model_chart->nilai_dimensip1($unit,$data);
			$data['nilai_dimensi2']= $this->model_chart->nilai_dimensip2($unit,$data);
			$data['nilai_dimensi3']= $this->model_chart->nilai_dimensip3($unit,$data);
			$data['nilai_dimensi4']= $this->model_chart->nilai_dimensip4($unit,$data);


			
			$data['cek_top']= $this->model_users->cekunit_top($mine,$data);
			$data['cek_top2']= $this->model_users->cekunit_top2($mine,$data);
			$data['cek_top3']= $this->model_users->cekunit_top3($mine,$data);
			$data['cek_top4']= $this->model_users->cekunit_top4($mine,$data);
			$data['cek_bottom']= $this->model_users->cekunit_bottom($mine,$data);
			$data['cek_bottom2']= $this->model_users->cekunit_bottom2($mine,$data);
			$data['cek_bottom3']= $this->model_users->cekunit_bottom3($mine,$data);
			$data['cek_bottom4']= $this->model_users->cekunit_bottom4($mine,$data);

		if ($this->form_validation->run() == FALSE){
			echo '<b>Periksa lagi data yang anda masukkan</b><br />';
		}
		else {
			//eksekusi query insert
			$status='top';
			$data_aksi = array(
				'id_rekomendasi'		=> $this->input->post('id_rekomendasi'),
				'id_nip'				=> $mine,
				'id_direktorat'			=> $this->session->userdata('direktorat'),
				'id_unit'				=> $this->session->userdata('unit'),
				'aksi'					=> $this->input->post('aksi'),
				'penanggung_jawab'		=> $this->session->userdata('nopeg'),
				'frekuensi'				=> $this->input->post('frekuensi'),
				'waktu_pelaksanaan'		=> $this->input->post('waktu_pelaksanaan'),
				'batas_pelaksanaan'		=> $this->input->post('batas_pelaksanaan'),
				'status'				=> $status,
				'tahun'					=> $data['tahun_aktif'],
				'periode'				=> $data['periode_aktif']
			);
			//print_r($data_aksi);exit();
			//echo '<b>Data tindak lanjut 1 berhasil disimpan.</b><br />';
			 $this->model_users->tambah_aksi_direktorat($data_aksi);
			 echo '<b>Data tindak lanjut 2 berhasil disimpan.</b><br />';
		}
	}
	public function actiondirektorat_top3(){
		$this->form_validation->set_rules('aksi', 'Aksi');
		$this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab');
		$this->form_validation->set_rules('frekuensi', 'Frekuensi');
		$this->form_validation->set_rules('waktu_pelaksanaan', 'Waktu Pelaksanaan');
		$this->form_validation->set_rules('batas_pelaksanaan', 'Batas Pelaksanaan');
		
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
		$unit = $this->session->userdata('unit');
		$level=$this->session->userdata('level');
		$direktorat=$this->session->userdata('direktorat');
		$data['corporate']=$this->model_chart->corporate($data);
			$data['corporate1']=$this->model_chart->corporate1($data);
			$data['corporate2']=$this->model_chart->corporate2($data);
			$data['corporate3']=$this->model_chart->corporate3($data);
			$data['corporate4']=$this->model_chart->corporate4($data);
			$data['score2']= $this->model_chart->direktorat($direktorat,$data);
			$data['score21']= $this->model_chart->direktorat1($direktorat,$data);
			$data['score22']= $this->model_chart->direktorat2($direktorat,$data);
			$data['score23']= $this->model_chart->direktorat3($direktorat,$data);
			$data['score24']= $this->model_chart->direktorat4($direktorat,$data);
			$data['score']= $this->model_chart->unit($unit,$data);
			$data['scorep1']= $this->model_chart->unit1($unit,$data);
			$data['scorep2']= $this->model_chart->unit2($unit,$data);
			$data['scorep3']= $this->model_chart->unit3($unit,$data);
			$data['scorep4']= $this->model_chart->unit4($unit,$data);
			$data['listunit']=$this->model_chart->listnilaism($unit,$data);
			$data['listunit1']=$this->model_chart->listnilaism1($unit,$data);
			$data['listunit2']=$this->model_chart->listnilaism2($unit,$data);
			$data['listunit3']=$this->model_chart->listnilaism3($unit,$data);
			$data['listunit4']=$this->model_chart->listnilaism4($unit,$data);
			$data['nilaiother']= $this->model_chart->nilaiother($unit,$data);
			$data['nilaiother1']= $this->model_chart->nilaiother1($unit,$data);
			$data['nilaiother2']= $this->model_chart->nilaiother2($unit,$data);
			$data['nilaiother3']= $this->model_chart->nilaiother3($unit,$data);
			$data['nilaiother4']= $this->model_chart->nilaiother4($unit,$data);

			$data['sumdimensiunit']=$this->model_chart->sumdimensiunit($unit,$data);
			$data['sumdimensiunit1']=$this->model_chart->sumdimensiunit1($unit,$data);
			$data['sumdimensiunit2']=$this->model_chart->sumdimensiunit2($unit,$data);
			$data['sumdimensiunit3']=$this->model_chart->sumdimensiunit3($unit,$data);
			$data['sumdimensiunit4']=$this->model_chart->sumdimensiunit4($unit,$data);
			$data['dimensiunit']=$this->model_chart->dimensiunit($unit,$data);
			$data['dimensiunit1']=$this->model_chart->dimensiunit1($unit,$data);
			$data['dimensiunit2']=$this->model_chart->dimensiunit2($unit,$data);
			$data['dimensiunit3']=$this->model_chart->dimensiunit3($unit,$data);
			$data['dimensiunit4']=$this->model_chart->dimensiunit4($unit,$data);
			$data['listnilai']=$this->model_chart->listnilai($unit,$data);	
			$data['listnilaip1']=$this->model_chart->listnilaip1($unit,$data);	
			$data['listnilaip2']=$this->model_chart->listnilaip2($unit,$data);	
			$data['listnilaip3']=$this->model_chart->listnilaip3($unit,$data);	
			$data['listnilaip4']=$this->model_chart->listnilaip4($unit,$data);	
			$data['gaugeunit']=$this->model_chart->gaugeunit($unit,$data);
			$data['gaugeunit1']=$this->model_chart->gaugeunit1($unit,$data);
			$data['gaugeunit2']=$this->model_chart->gaugeunit2($unit,$data);
			$data['gaugeunit3']=$this->model_chart->gaugeunit3($unit,$data);
			$data['gaugeunit4']=$this->model_chart->gaugeunit4($unit,$data);
			$data['nilai_dimensi']= $this->model_chart->nilai_dimensi1($unit,$data);
			$data['nilai_dimensi1']= $this->model_chart->nilai_dimensip1($unit,$data);
			$data['nilai_dimensi2']= $this->model_chart->nilai_dimensip2($unit,$data);
			$data['nilai_dimensi3']= $this->model_chart->nilai_dimensip3($unit,$data);
			$data['nilai_dimensi4']= $this->model_chart->nilai_dimensip4($unit,$data);


			
			$data['cek_top']= $this->model_users->cekunit_top($mine,$data);
			$data['cek_top2']= $this->model_users->cekunit_top2($mine,$data);
			$data['cek_top3']= $this->model_users->cekunit_top3($mine,$data);
			$data['cek_top4']= $this->model_users->cekunit_top4($mine,$data);
			$data['cek_bottom']= $this->model_users->cekunit_bottom($mine,$data);
			$data['cek_bottom2']= $this->model_users->cekunit_bottom2($mine,$data);
			$data['cek_bottom3']= $this->model_users->cekunit_bottom3($mine,$data);
			$data['cek_bottom4']= $this->model_users->cekunit_bottom4($mine,$data);

		if ($this->form_validation->run() == FALSE){
			echo '<b>Periksa lagi data yang anda masukkan</b><br />';
		}
		else {
			//eksekusi query insert
			$status='top';
			$data_aksi = array(
				'id_rekomendasi'		=> $this->input->post('id_rekomendasi'),
				'id_nip'				=> $mine,
				'id_direktorat'			=> $this->session->userdata('direktorat'),
				'id_unit'				=> $this->session->userdata('unit'),
				'aksi'					=> $this->input->post('aksi'),
				'penanggung_jawab'		=> $this->session->userdata('nopeg'),
				'frekuensi'				=> $this->input->post('frekuensi'),
				'waktu_pelaksanaan'		=> $this->input->post('waktu_pelaksanaan'),
				'batas_pelaksanaan'		=> $this->input->post('batas_pelaksanaan'),
				'status'				=> $status,
				'tahun'					=> $data['tahun_aktif'],
				'periode'				=> $data['periode_aktif']
			);
			//print_r($data_aksi);exit();
			//echo '<b>Data tindak lanjut 1 berhasil disimpan.</b><br />';
			 $this->model_users->tambah_aksi_direktorat($data_aksi);
			 echo '<b>Data tindak lanjut 3 berhasil disimpan.</b><br />';
		}
	}

	public function direktoratedit()
	{
		$tahun_pilih = $this->input->post('tahun');
		if (!$tahun_pilih)
		{
			$tahun_pilih = $this->session->userdata('tahun_pilih');
		}
		$data['tahun'] = $tahun_pilih;
		$data['tahun_aktif'] = $this->session->userdata('tahun');
		$data['periode_aktif'] = $this->session->userdata('periode');
		$data['_daftar_tahun'] = $this->model_admin->list_tahun();
		$unit = $this->session->userdata('unit');
		$mine = $this->session->userdata('nopeg');
		$data['aksi'] = $this->model_users->tampildirektorat_aksi($mine,$data);
		$data['aksi2'] = $this->model_users->tampildirektorat_aksi2($mine,$data);
		$data['aksi3'] = $this->model_users->tampildirektorat_aksi3($mine,$data);
		$data['aksi4'] = $this->model_users->tampildirektorat_aksi4($mine,$data);
		$data['aksi1'] = $this->model_users->tampildirektorat_aksi_bottom($mine,$data);		
		$data['aksi12'] = $this->model_users->tampildirektorat_aksi_bottom2($mine,$data);		
		$data['aksi13'] = $this->model_users->tampildirektorat_aksi_bottom3($mine,$data);		
		$data['aksi14'] = $this->model_users->tampildirektorat_aksi_bottom4($mine,$data);				
		//print_r($data);
		$this->load->view('user/direktoratedit_aksi',$data);
	}
	public function editdirektorat_action_top($id_aksi) {
		$this->form_validation->set_rules('aksi',"Aksi");
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
		$unit = $this->session->userdata('unit');
		$mine = $this->session->userdata('nopeg');
		$data['aksi'] = $this->model_users->tampildirektorat_aksi($mine,$data);
		$data['aksi2'] = $this->model_users->tampildirektorat_aksi2($mine,$data);
		$data['aksi3'] = $this->model_users->tampildirektorat_aksi3($mine,$data);
		$data['aksi4'] = $this->model_users->tampildirektorat_aksi4($mine,$data);
		$data['aksi1'] = $this->model_users->tampildirektorat_aksi_bottom($mine,$data);		
		$data['aksi12'] = $this->model_users->tampildirektorat_aksi_bottom2($mine,$data);		
		$data['aksi13'] = $this->model_users->tampildirektorat_aksi_bottom3($mine,$data);		
		$data['aksi14'] = $this->model_users->tampildirektorat_aksi_bottom4($mine,$data);
		if ($this->form_validation->run() == FALSE){
			$this->load->view('user/direktoratedit_aksi',$data);
		}
		else {
				//form submit dengan gambar dikosongkan
				$status='top';
				$data_aksi = array(
				'id_nip'				=> $mine,
				'id_direktorat'			=> $this->session->userdata('direktorat'),
				'id_unit'				=> $this->session->userdata('unit'),
				'aksi'					=> $this->input->post('aksi'),
				'penanggung_jawab'		=> $this->session->userdata('nopeg'),
				'frekuensi'				=> $this->input->post('frekuensi'),
				'waktu_pelaksanaan'		=> $this->input->post('waktu_pelaksanaan'),
				'batas_pelaksanaan'		=> $this->input->post('batas_pelaksanaan'),
				'status'				=> $status,
				'tahun'					=> $data['tahun_aktif'],
				'periode'				=> $data['periode_aktif']
			);
				//print_r($data_aksi);exit();
			 $this->model_users->editdirektorat_aksi_top($id_aksi,$data_aksi);
			 redirect('user/direktoratedit');

			
		}
	}	
	public function editdirektorat_action_bottom($id_aksi) {
		$this->form_validation->set_rules('aksi',"Aksi");
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
		$unit = $this->session->userdata('unit');
		$mine = $this->session->userdata('nopeg');
		$data['aksi'] = $this->model_users->tampildirektorat_aksi($mine,$data);
		$data['aksi2'] = $this->model_users->tampildirektorat_aksi2($mine,$data);
		$data['aksi3'] = $this->model_users->tampildirektorat_aksi3($mine,$data);
		$data['aksi4'] = $this->model_users->tampildirektorat_aksi4($mine,$data);
		$data['aksi1'] = $this->model_users->tampildirektorat_aksi_bottom($mine,$data);		
		$data['aksi12'] = $this->model_users->tampildirektorat_aksi_bottom2($mine,$data);		
		$data['aksi13'] = $this->model_users->tampildirektorat_aksi_bottom3($mine,$data);		
		$data['aksi14'] = $this->model_users->tampildirektorat_aksi_bottom4($mine,$data);
		if ($this->form_validation->run() == FALSE){
			$this->load->view('user/direktoratedit_aksi',$data);
		}
		else {
				//form submit dengan gambar dikosongkan
				$status='bottom';
				$data_aksi = array(
				'id_nip'				=> $mine,
				'id_direktorat'			=> $this->session->userdata('direktorat'),
				'id_unit'				=> $this->session->userdata('unit'),
				'aksi'					=> $this->input->post('aksi'),
				'penanggung_jawab'		=> $this->session->userdata('nopeg'),
				'frekuensi'				=> $this->input->post('frekuensi'),
				'waktu_pelaksanaan'		=> $this->input->post('waktu_pelaksanaan'),
				'batas_pelaksanaan'		=> $this->input->post('batas_pelaksanaan'),
				'status'				=> $status,
				'tahun'					=> $data['tahun_aktif'],
				'periode'				=> $data['periode_aktif']
			);
			//print_r($data_aksi);exit();
			 $this->model_users->editdirektorat_aksi_bottom($id_aksi,$data_aksi);
			 redirect('user/direktoratedit');
			
		}
	}	

	public function direktoratprogres()
	{
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
		$penanggung_jawab = $this->session->userdata('nopeg');
		$data['progres_aksi'] = $this->model_users->progresdirektorat_aksi($penanggung_jawab,$data);
		$data['progres_aksi2'] = $this->model_users->progresdirektorat_aksi2($penanggung_jawab,$data);
		$data['progres_aksi3'] = $this->model_users->progresdirektorat_aksi3($penanggung_jawab,$data);
		$data['progres_aksi4'] = $this->model_users->progresdirektorat_aksi4($penanggung_jawab,$data);			
		//print_r($data);
		$this->load->view('user/direktoratprogres_view',$data);
	}
	public function updatedirektorat_progres($id_aksi){
		$this->form_validation->set_rules('progres');
		$this->form_validation->set_rules('keterangan');
		$tahun_pilih = $this->input->post('tahun');
		$s= $this->input->post();
		$y=strtotime($this->input->post('batas_pelaksanaan'));
		$o=strtotime('now');
		/*print_r($y);
		print_r($o);*/
		//jika belum dipilih, maka gunakan tahun aktif
		if (!$tahun_pilih)
		{
			$tahun_pilih = $this->session->userdata('tahun_pilih');
		}
		$data['tahun'] = $tahun_pilih;
		$data['tahun_aktif'] = $this->session->userdata('tahun');
		$data['periode_aktif'] = $this->session->userdata('periode');
		$data['_daftar_tahun'] = $this->model_admin->list_tahun();
		$penanggung_jawab = $this->session->userdata('nopeg');
		$data['progres_aksi'] = $this->model_users->progresdirektorat_aksi($penanggung_jawab,$data);
		$data['progres_aksi2'] = $this->model_users->progresdirektorat_aksi2($penanggung_jawab,$data);
		$data['progres_aksi3'] = $this->model_users->progresdirektorat_aksi3($penanggung_jawab,$data);
		$data['progres_aksi4'] = $this->model_users->progresdirektorat_aksi4($penanggung_jawab,$data);			

		if ($this->form_validation->run() == FALSE){
			$this->load->view('user/direktoratprogres', $data);
			/*print_r("cok");
			exit();*/
		}
		else {
			/*print_r("cok");
			exit();*/
			if ($this->input->post('progres')==0 && strtotime($this->input->post('batas_pelaksanaan')) > strtotime('now')) {
				$data_progres = array(
						'progres'				=> $this->input->post('progres'),
						'keterangan'			=> $this->input->post('keterangan'),
						'status_progres'		=> 'Not Started'
				);
			} elseif ($this->input->post('progres')<100 && strtotime($this->input->post('batas_pelaksanaan')) > strtotime('now')) {
				$data_progres = array(
						'progres'				=> $this->input->post('progres'),
						'keterangan'			=> $this->input->post('keterangan'),
						'status_progres'		=> 'On Progress'
				);
			} elseif ($this->input->post('progres')<=100 && strtotime($this->input->post('batas_pelaksanaan')) < strtotime('now')) {
				$data_progres = array(
						'progres'				=> $this->input->post('progres'),
						'keterangan'			=> $this->input->post('keterangan'),
						'status_progres'		=> 'Failed'
				);
			} elseif ($this->input->post('progres')==100 && strtotime($this->input->post('batas_pelaksanaan')) >= strtotime('now')) {
				$data_progres = array(
						'progres'				=> $this->input->post('progres'),
						'keterangan'			=> $this->input->post('keterangan'),
						'status_progres'		=> 'Succeed'
				);
				
			}
			/*print_r($data_progres);
			exit();*/
			$this->model_users->updatedirektorat_progres($id_aksi, $data_progres);
			redirect('user/direktoratprogres');
		}

}

	/////////////////////////////////////////////////////// SM
	public function smscore(){
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
		/*print_r($data['tahun_aktif']);exit();*/
		
		$mine = $this->session->userdata('nopeg');
		$data['jumlah_periode']= $this->model_users->count_periode($mine,$data);
		//$data['score']= $this->model_users->score($mine,$data);
		//print_r($data['score']);exit();
		/*if (!$data['score'][0]->jumlah_nilai) {
				$data['score']=0;	
		} else {
				$data['score']=($data['score'][0]->jumlah_nilai)/($data['jumlah_periode'][0]->jumlah_periode);
		}*/
		$mine = $this->session->userdata('nopeg');
		$sitacode=$this->session->userdata('sitacode');
		$unit=$this->session->userdata('unit');
		$level=$this->session->userdata('level');
		$direktorat=$this->session->userdata('direktorat');
		if($level=='SM') 
		{
			$data['unit']=$unit;
			$data['corporate']=$this->model_chart2->corporate($data);
			$data['corporate1']=$this->model_chart2->corporate1($data);
			$data['corporate2']=$this->model_chart2->corporate2($data);
			$data['corporate3']=$this->model_chart2->corporate3($data);
			$data['corporate4']=$this->model_chart2->corporate4($data);
			$data['score2']= $this->model_chart2->direktorat($direktorat,$data);
			$data['score21']= $this->model_chart2->direktorat1($direktorat,$data);
			$data['score22']= $this->model_chart2->direktorat2($direktorat,$data);
			$data['score23']= $this->model_chart2->direktorat3($direktorat,$data);
			$data['score24']= $this->model_chart2->direktorat4($direktorat,$data);
			$data['scoresm']= $this->model_chart2->sm($sitacode,$data);
			$data['scoresmp1']= $this->model_chart2->sm1($sitacode,$data);
			$data['scoresmp2']= $this->model_chart2->sm2($sitacode,$data);
			$data['scoresmp3']= $this->model_chart2->sm3($sitacode,$data);
			$data['scoresmp4']= $this->model_chart2->sm4($sitacode,$data);
			$data['score']= $this->model_chart->unit($unit,$data);
			$data['scorep1']= $this->model_chart->unit1($unit,$data);
			$data['scorep2']= $this->model_chart->unit2($unit,$data);
			$data['scorep3']= $this->model_chart->unit3($unit,$data);
			$data['scorep4']= $this->model_chart->unit4($unit,$data);
			$data['listunit']=$this->model_chart2->listnilaism($unit,$data);
			$data['listunit1']=$this->model_chart2->listnilaism1($unit,$data);
			$data['listunit2']=$this->model_chart2->listnilaism2($unit,$data);
			$data['listunit3']=$this->model_chart2->listnilaism3($unit,$data);
			$data['listunit4']=$this->model_chart2->listnilaism4($unit,$data);
			$data['listmanager']=$this->model_chart2->listnilaim($unit,$data);
			$data['listmanager1']=$this->model_chart2->listnilaim1($unit,$data);
			$data['listmanager2']=$this->model_chart2->listnilaim2($unit,$data);
			$data['listmanager3']=$this->model_chart2->listnilaim3($unit,$data);
			$data['listmanager4']=$this->model_chart2->listnilaim4($unit,$data);
			

			$data['sumdimensiunit']=$this->model_chart2->sumdimensiunit($sitacode,$data);
			$data['sumdimensiunit1']=$this->model_chart2->sumdimensiunit1($sitacode,$data);
			$data['sumdimensiunit2']=$this->model_chart2->sumdimensiunit2($sitacode,$data);
			$data['sumdimensiunit3']=$this->model_chart2->sumdimensiunit3($sitacode,$data);
			$data['sumdimensiunit4']=$this->model_chart2->sumdimensiunit4($sitacode,$data);

			$data['dimensiunit']=$this->model_chart2->dimensiunit($sitacode,$data);
			$data['dimensiunit1']=$this->model_chart2->dimensiunit1($sitacode,$data);
			$data['dimensiunit2']=$this->model_chart2->dimensiunit2($sitacode,$data);
			$data['dimensiunit3']=$this->model_chart2->dimensiunit3($sitacode,$data);
			$data['dimensiunit4']=$this->model_chart2->dimensiunit4($sitacode,$data);

			$data['listnilai']=$this->model_chart2->listnilai($sitacode,$data);	
			$data['listnilaip1']=$this->model_chart2->listnilaip1($sitacode,$data);	
			$data['listnilaip2']=$this->model_chart2->listnilaip2($sitacode,$data);	
			$data['listnilaip3']=$this->model_chart2->listnilaip3($sitacode,$data);	
			$data['listnilaip4']=$this->model_chart2->listnilaip4($sitacode,$data);	

			$data['gaugeunit']=$this->model_chart2->gaugeunit($sitacode,$data);
			$data['gaugeunit1']=$this->model_chart2->gaugeunit1($sitacode,$data);
			$data['gaugeunit2']=$this->model_chart2->gaugeunit2($sitacode,$data);
			$data['gaugeunit3']=$this->model_chart2->gaugeunit3($sitacode,$data);
			$data['gaugeunit4']=$this->model_chart2->gaugeunit4($sitacode,$data);

			$data['nilai_dimensi']= $this->model_chart2->nilai_dimensi1($sitacode,$data);
			$data['nilai_dimensi1']= $this->model_chart2->nilai_dimensip1($sitacode,$data);
			$data['nilai_dimensi2']= $this->model_chart2->nilai_dimensip2($sitacode,$data);
			$data['nilai_dimensi3']= $this->model_chart2->nilai_dimensip3($sitacode,$data);
			$data['nilai_dimensi4']= $this->model_chart2->nilai_dimensip4($sitacode,$data);


			
			$data['cek_top']= $this->model_chart2->ceksm_top($mine,$data);
			$data['cek_top2']= $this->model_chart2->ceksm_top2($mine,$data);
			$data['cek_top3']= $this->model_chart2->ceksm_top3($mine,$data);
			$data['cek_top4']= $this->model_chart2->ceksm_top4($mine,$data);
			$data['cek_bottom']= $this->model_chart2->ceksm_bottom($mine,$data);
			$data['cek_bottom2']= $this->model_chart2->ceksm_bottom2($mine,$data);
			$data['cek_bottom3']= $this->model_chart2->ceksm_bottom3($mine,$data);
			$data['cek_bottom4']= $this->model_chart2->ceksm_bottom4($mine,$data);
			
			$data['listaksi']= $this->model_chart2->listaksism($mine,$data);
			$data['listaksi2']= $this->model_chart2->listaksism2($mine,$data);
			$data['listaksi3']= $this->model_chart2->listaksism3($mine,$data);
			$data['listaksi4']= $this->model_chart2->listaksism4($mine,$data);
			$data['listaksifull']= $this->model_chart2->listaksismfull($mine,$data);
			$data['sumaksi']= $this->model_chart2->sumaksism($mine,$data);
			$data['sumaksi2']= $this->model_chart2->sumaksism2($mine,$data);
			$data['sumaksi3']= $this->model_chart2->sumaksism3($mine,$data);
			$data['sumaksi4']= $this->model_chart2->sumaksism4($mine,$data);
			$data['sumaksifull']= $this->model_chart2->sumaksismfull($mine,$data);
			
			
		
			//print_r($data['scorep3']);
			$this->load->view('user/smscore_view',$data,$unit);
		}
		else 
		redirect('error');		
		
	}
	public function actionsm_bottom1(){
		$this->form_validation->set_rules('aksi', 'Aksi');
		$this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab');
		$this->form_validation->set_rules('frekuensi', 'Frekuensi');
		$this->form_validation->set_rules('waktu_pelaksanaan', 'Waktu Pelaksanaan');
		$this->form_validation->set_rules('batas_pelaksanaan', 'Batas Pelaksanaan');
		
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
		$sitacode=$this->session->userdata('sitacode');
		$level=$this->session->userdata('level');
		$direktorat=$this->session->userdata('direktorat');
			$data['unit']=$unit;
			$data['corporate']=$this->model_chart2->corporate($data);
			$data['corporate1']=$this->model_chart2->corporate1($data);
			$data['corporate2']=$this->model_chart2->corporate2($data);
			$data['corporate3']=$this->model_chart2->corporate3($data);
			$data['corporate4']=$this->model_chart2->corporate4($data);
			$data['score2']= $this->model_chart2->direktorat($direktorat,$data);
			$data['score21']= $this->model_chart2->direktorat1($direktorat,$data);
			$data['score22']= $this->model_chart2->direktorat2($direktorat,$data);
			$data['score23']= $this->model_chart2->direktorat3($direktorat,$data);
			$data['score24']= $this->model_chart2->direktorat4($direktorat,$data);
			$data['scoresm']= $this->model_chart2->sm($sitacode,$data);
			$data['scoresmp1']= $this->model_chart2->sm1($sitacode,$data);
			$data['scoresmp2']= $this->model_chart2->sm2($sitacode,$data);
			$data['scoresmp3']= $this->model_chart2->sm3($sitacode,$data);
			$data['scoresmp4']= $this->model_chart2->sm4($sitacode,$data);
			$data['score']= $this->model_chart->unit($unit,$data);
			$data['scorep1']= $this->model_chart->unit1($unit,$data);
			$data['scorep2']= $this->model_chart->unit2($unit,$data);
			$data['scorep3']= $this->model_chart->unit3($unit,$data);
			$data['scorep4']= $this->model_chart->unit4($unit,$data);
			$data['listunit']=$this->model_chart2->listnilaism($unit,$data);
			$data['listunit1']=$this->model_chart2->listnilaism1($unit,$data);
			$data['listunit2']=$this->model_chart2->listnilaism2($unit,$data);
			$data['listunit3']=$this->model_chart2->listnilaism3($unit,$data);
			$data['listunit4']=$this->model_chart2->listnilaism4($unit,$data);
			$data['listmanager']=$this->model_chart2->listnilaim($unit,$data);
			$data['listmanager1']=$this->model_chart2->listnilaim1($unit,$data);
			$data['listmanager2']=$this->model_chart2->listnilaim2($unit,$data);
			$data['listmanager3']=$this->model_chart2->listnilaim3($unit,$data);
			$data['listmanager4']=$this->model_chart2->listnilaim4($unit,$data);
			

			$data['sumdimensiunit']=$this->model_chart2->sumdimensiunit($sitacode,$data);
			$data['sumdimensiunit1']=$this->model_chart2->sumdimensiunit1($sitacode,$data);
			$data['sumdimensiunit2']=$this->model_chart2->sumdimensiunit2($sitacode,$data);
			$data['sumdimensiunit3']=$this->model_chart2->sumdimensiunit3($sitacode,$data);
			$data['sumdimensiunit4']=$this->model_chart2->sumdimensiunit4($sitacode,$data);

			$data['dimensiunit']=$this->model_chart2->dimensiunit($sitacode,$data);
			$data['dimensiunit1']=$this->model_chart2->dimensiunit1($sitacode,$data);
			$data['dimensiunit2']=$this->model_chart2->dimensiunit2($sitacode,$data);
			$data['dimensiunit3']=$this->model_chart2->dimensiunit3($sitacode,$data);
			$data['dimensiunit4']=$this->model_chart2->dimensiunit4($sitacode,$data);

			$data['listnilai']=$this->model_chart2->listnilai($sitacode,$data);	
			$data['listnilaip1']=$this->model_chart2->listnilaip1($sitacode,$data);	
			$data['listnilaip2']=$this->model_chart2->listnilaip2($sitacode,$data);	
			$data['listnilaip3']=$this->model_chart2->listnilaip3($sitacode,$data);	
			$data['listnilaip4']=$this->model_chart2->listnilaip4($sitacode,$data);	

			$data['gaugeunit']=$this->model_chart2->gaugeunit($sitacode,$data);
			$data['gaugeunit1']=$this->model_chart2->gaugeunit1($sitacode,$data);
			$data['gaugeunit2']=$this->model_chart2->gaugeunit2($sitacode,$data);
			$data['gaugeunit3']=$this->model_chart2->gaugeunit3($sitacode,$data);
			$data['gaugeunit4']=$this->model_chart2->gaugeunit4($sitacode,$data);

			$data['nilai_dimensi']= $this->model_chart2->nilai_dimensi1($sitacode,$data);
			$data['nilai_dimensi1']= $this->model_chart2->nilai_dimensip1($sitacode,$data);
			$data['nilai_dimensi2']= $this->model_chart2->nilai_dimensip2($sitacode,$data);
			$data['nilai_dimensi3']= $this->model_chart2->nilai_dimensip3($sitacode,$data);
			$data['nilai_dimensi4']= $this->model_chart2->nilai_dimensip4($sitacode,$data);


			
			$data['cek_top']= $this->model_chart2->ceksm_top($mine,$data);
			$data['cek_top2']= $this->model_chart2->ceksm_top2($mine,$data);
			$data['cek_top3']= $this->model_chart2->ceksm_top3($mine,$data);
			$data['cek_top4']= $this->model_chart2->ceksm_top4($mine,$data);
			$data['cek_bottom']= $this->model_chart2->ceksm_bottom($mine,$data);
			$data['cek_bottom2']= $this->model_chart2->ceksm_bottom2($mine,$data);
			$data['cek_bottom3']= $this->model_chart2->ceksm_bottom3($mine,$data);
			$data['cek_bottom4']= $this->model_chart2->ceksm_bottom4($mine,$data);
			
			$data['listaksi']= $this->model_chart2->listaksism($mine,$data);
			$data['listaksi2']= $this->model_chart2->listaksism2($mine,$data);
			$data['listaksi3']= $this->model_chart2->listaksism3($mine,$data);
			$data['listaksi4']= $this->model_chart2->listaksism4($mine,$data);
			$data['listaksifull']= $this->model_chart2->listaksismfull($mine,$data);
			$data['sumaksi']= $this->model_chart2->sumaksism($mine,$data);
			$data['sumaksi2']= $this->model_chart2->sumaksism2($mine,$data);
			$data['sumaksi3']= $this->model_chart2->sumaksism3($mine,$data);
			$data['sumaksi4']= $this->model_chart2->sumaksism4($mine,$data);
			$data['sumaksifull']= $this->model_chart2->sumaksismfull($mine,$data);
	

		if ($this->form_validation->run() == FALSE){
			echo '<b>Periksa lagi data yang anda masukkan</b><br />';
		}
		else {
			//eksekusi query insert
			$status='bottom';
			$data_aksi = array(
				'id_rekomendasi'		=> $this->input->post('id_rekomendasi'),
				'id_nip'				=> $mine,
				'id_direktorat'			=> $this->session->userdata('direktorat'),
				'id_unit'				=> $this->session->userdata('unit'),
				'aksi'					=> $this->input->post('aksi'),
				'penanggung_jawab'		=> $this->session->userdata('nopeg'),
				'frekuensi'				=> $this->input->post('frekuensi'),
				'waktu_pelaksanaan'		=> $this->input->post('waktu_pelaksanaan'),
				'batas_pelaksanaan'		=> $this->input->post('batas_pelaksanaan'),
				'status'				=> $status,
				'tahun'					=> $data['tahun_aktif'],
				'periode'				=> $data['periode_aktif']
			);
			//print_r($data_aksi);exit();
			 $this->model_users->tambah_aksi_sm($data_aksi);
			 echo '<b>Data tindak lanjut 1 berhasil disimpan.</b><br />';
		}
	}
	public function actionsm_bottom2(){
		$this->form_validation->set_rules('aksi', 'Aksi');
		$this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab');
		$this->form_validation->set_rules('frekuensi', 'Frekuensi');
		$this->form_validation->set_rules('waktu_pelaksanaan', 'Waktu Pelaksanaan');
		$this->form_validation->set_rules('batas_pelaksanaan', 'Batas Pelaksanaan');
		
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
		$sitacode=$this->session->userdata('sitacode');
		$level=$this->session->userdata('level');
		$direktorat=$this->session->userdata('direktorat');
			$data['unit']=$unit;
			$data['corporate']=$this->model_chart2->corporate($data);
			$data['corporate1']=$this->model_chart2->corporate1($data);
			$data['corporate2']=$this->model_chart2->corporate2($data);
			$data['corporate3']=$this->model_chart2->corporate3($data);
			$data['corporate4']=$this->model_chart2->corporate4($data);
			$data['score2']= $this->model_chart2->direktorat($direktorat,$data);
			$data['score21']= $this->model_chart2->direktorat1($direktorat,$data);
			$data['score22']= $this->model_chart2->direktorat2($direktorat,$data);
			$data['score23']= $this->model_chart2->direktorat3($direktorat,$data);
			$data['score24']= $this->model_chart2->direktorat4($direktorat,$data);
			$data['scoresm']= $this->model_chart2->sm($sitacode,$data);
			$data['scoresmp1']= $this->model_chart2->sm1($sitacode,$data);
			$data['scoresmp2']= $this->model_chart2->sm2($sitacode,$data);
			$data['scoresmp3']= $this->model_chart2->sm3($sitacode,$data);
			$data['scoresmp4']= $this->model_chart2->sm4($sitacode,$data);
			$data['score']= $this->model_chart->unit($unit,$data);
			$data['scorep1']= $this->model_chart->unit1($unit,$data);
			$data['scorep2']= $this->model_chart->unit2($unit,$data);
			$data['scorep3']= $this->model_chart->unit3($unit,$data);
			$data['scorep4']= $this->model_chart->unit4($unit,$data);
			$data['listunit']=$this->model_chart2->listnilaism($unit,$data);
			$data['listunit1']=$this->model_chart2->listnilaism1($unit,$data);
			$data['listunit2']=$this->model_chart2->listnilaism2($unit,$data);
			$data['listunit3']=$this->model_chart2->listnilaism3($unit,$data);
			$data['listunit4']=$this->model_chart2->listnilaism4($unit,$data);
			$data['listmanager']=$this->model_chart2->listnilaim($unit,$data);
			$data['listmanager1']=$this->model_chart2->listnilaim1($unit,$data);
			$data['listmanager2']=$this->model_chart2->listnilaim2($unit,$data);
			$data['listmanager3']=$this->model_chart2->listnilaim3($unit,$data);
			$data['listmanager4']=$this->model_chart2->listnilaim4($unit,$data);
			

			$data['sumdimensiunit']=$this->model_chart2->sumdimensiunit($sitacode,$data);
			$data['sumdimensiunit1']=$this->model_chart2->sumdimensiunit1($sitacode,$data);
			$data['sumdimensiunit2']=$this->model_chart2->sumdimensiunit2($sitacode,$data);
			$data['sumdimensiunit3']=$this->model_chart2->sumdimensiunit3($sitacode,$data);
			$data['sumdimensiunit4']=$this->model_chart2->sumdimensiunit4($sitacode,$data);

			$data['dimensiunit']=$this->model_chart2->dimensiunit($sitacode,$data);
			$data['dimensiunit1']=$this->model_chart2->dimensiunit1($sitacode,$data);
			$data['dimensiunit2']=$this->model_chart2->dimensiunit2($sitacode,$data);
			$data['dimensiunit3']=$this->model_chart2->dimensiunit3($sitacode,$data);
			$data['dimensiunit4']=$this->model_chart2->dimensiunit4($sitacode,$data);

			$data['listnilai']=$this->model_chart2->listnilai($sitacode,$data);	
			$data['listnilaip1']=$this->model_chart2->listnilaip1($sitacode,$data);	
			$data['listnilaip2']=$this->model_chart2->listnilaip2($sitacode,$data);	
			$data['listnilaip3']=$this->model_chart2->listnilaip3($sitacode,$data);	
			$data['listnilaip4']=$this->model_chart2->listnilaip4($sitacode,$data);	

			$data['gaugeunit']=$this->model_chart2->gaugeunit($sitacode,$data);
			$data['gaugeunit1']=$this->model_chart2->gaugeunit1($sitacode,$data);
			$data['gaugeunit2']=$this->model_chart2->gaugeunit2($sitacode,$data);
			$data['gaugeunit3']=$this->model_chart2->gaugeunit3($sitacode,$data);
			$data['gaugeunit4']=$this->model_chart2->gaugeunit4($sitacode,$data);

			$data['nilai_dimensi']= $this->model_chart2->nilai_dimensi1($sitacode,$data);
			$data['nilai_dimensi1']= $this->model_chart2->nilai_dimensip1($sitacode,$data);
			$data['nilai_dimensi2']= $this->model_chart2->nilai_dimensip2($sitacode,$data);
			$data['nilai_dimensi3']= $this->model_chart2->nilai_dimensip3($sitacode,$data);
			$data['nilai_dimensi4']= $this->model_chart2->nilai_dimensip4($sitacode,$data);


			
			$data['cek_top']= $this->model_chart2->ceksm_top($mine,$data);
			$data['cek_top2']= $this->model_chart2->ceksm_top2($mine,$data);
			$data['cek_top3']= $this->model_chart2->ceksm_top3($mine,$data);
			$data['cek_top4']= $this->model_chart2->ceksm_top4($mine,$data);
			$data['cek_bottom']= $this->model_chart2->ceksm_bottom($mine,$data);
			$data['cek_bottom2']= $this->model_chart2->ceksm_bottom2($mine,$data);
			$data['cek_bottom3']= $this->model_chart2->ceksm_bottom3($mine,$data);
			$data['cek_bottom4']= $this->model_chart2->ceksm_bottom4($mine,$data);
			
			$data['listaksi']= $this->model_chart2->listaksism($mine,$data);
			$data['listaksi2']= $this->model_chart2->listaksism2($mine,$data);
			$data['listaksi3']= $this->model_chart2->listaksism3($mine,$data);
			$data['listaksi4']= $this->model_chart2->listaksism4($mine,$data);
			$data['listaksifull']= $this->model_chart2->listaksismfull($mine,$data);
			$data['sumaksi']= $this->model_chart2->sumaksism($mine,$data);
			$data['sumaksi2']= $this->model_chart2->sumaksism2($mine,$data);
			$data['sumaksi3']= $this->model_chart2->sumaksism3($mine,$data);
			$data['sumaksi4']= $this->model_chart2->sumaksism4($mine,$data);
			$data['sumaksifull']= $this->model_chart2->sumaksismfull($mine,$data);
	

		if ($this->form_validation->run() == FALSE){
			echo '<b>Periksa lagi data yang anda masukkan</b><br />';
		}
		else {
			//eksekusi query insert
			$status='bottom';
			$data_aksi = array(
				'id_rekomendasi'		=> $this->input->post('id_rekomendasi'),
				'id_nip'				=> $mine,
				'id_direktorat'			=> $this->session->userdata('direktorat'),
				'id_unit'				=> $this->session->userdata('unit'),
				'aksi'					=> $this->input->post('aksi'),
				'penanggung_jawab'		=> $this->session->userdata('nopeg'),
				'frekuensi'				=> $this->input->post('frekuensi'),
				'waktu_pelaksanaan'		=> $this->input->post('waktu_pelaksanaan'),
				'batas_pelaksanaan'		=> $this->input->post('batas_pelaksanaan'),
				'status'				=> $status,
				'tahun'					=> $data['tahun_aktif'],
				'periode'				=> $data['periode_aktif']
			);
			//print_r($data_aksi);exit();
			 $this->model_users->tambah_aksi_sm($data_aksi);
			 echo '<b>Data tindak lanjut 2 berhasil disimpan.</b><br />';
		}
	}
	public function actionsm_bottom3(){
		$this->form_validation->set_rules('aksi', 'Aksi');
		$this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab');
		$this->form_validation->set_rules('frekuensi', 'Frekuensi');
		$this->form_validation->set_rules('waktu_pelaksanaan', 'Waktu Pelaksanaan');
		$this->form_validation->set_rules('batas_pelaksanaan', 'Batas Pelaksanaan');
		
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
		$sitacode=$this->session->userdata('sitacode');
		$level=$this->session->userdata('level');
		$direktorat=$this->session->userdata('direktorat');
			$data['unit']=$unit;
			$data['corporate']=$this->model_chart2->corporate($data);
			$data['corporate1']=$this->model_chart2->corporate1($data);
			$data['corporate2']=$this->model_chart2->corporate2($data);
			$data['corporate3']=$this->model_chart2->corporate3($data);
			$data['corporate4']=$this->model_chart2->corporate4($data);
			$data['score2']= $this->model_chart2->direktorat($direktorat,$data);
			$data['score21']= $this->model_chart2->direktorat1($direktorat,$data);
			$data['score22']= $this->model_chart2->direktorat2($direktorat,$data);
			$data['score23']= $this->model_chart2->direktorat3($direktorat,$data);
			$data['score24']= $this->model_chart2->direktorat4($direktorat,$data);
			$data['scoresm']= $this->model_chart2->sm($sitacode,$data);
			$data['scoresmp1']= $this->model_chart2->sm1($sitacode,$data);
			$data['scoresmp2']= $this->model_chart2->sm2($sitacode,$data);
			$data['scoresmp3']= $this->model_chart2->sm3($sitacode,$data);
			$data['scoresmp4']= $this->model_chart2->sm4($sitacode,$data);
			$data['score']= $this->model_chart->unit($unit,$data);
			$data['scorep1']= $this->model_chart->unit1($unit,$data);
			$data['scorep2']= $this->model_chart->unit2($unit,$data);
			$data['scorep3']= $this->model_chart->unit3($unit,$data);
			$data['scorep4']= $this->model_chart->unit4($unit,$data);
			$data['listunit']=$this->model_chart2->listnilaism($unit,$data);
			$data['listunit1']=$this->model_chart2->listnilaism1($unit,$data);
			$data['listunit2']=$this->model_chart2->listnilaism2($unit,$data);
			$data['listunit3']=$this->model_chart2->listnilaism3($unit,$data);
			$data['listunit4']=$this->model_chart2->listnilaism4($unit,$data);
			$data['listmanager']=$this->model_chart2->listnilaim($unit,$data);
			$data['listmanager1']=$this->model_chart2->listnilaim1($unit,$data);
			$data['listmanager2']=$this->model_chart2->listnilaim2($unit,$data);
			$data['listmanager3']=$this->model_chart2->listnilaim3($unit,$data);
			$data['listmanager4']=$this->model_chart2->listnilaim4($unit,$data);
			

			$data['sumdimensiunit']=$this->model_chart2->sumdimensiunit($sitacode,$data);
			$data['sumdimensiunit1']=$this->model_chart2->sumdimensiunit1($sitacode,$data);
			$data['sumdimensiunit2']=$this->model_chart2->sumdimensiunit2($sitacode,$data);
			$data['sumdimensiunit3']=$this->model_chart2->sumdimensiunit3($sitacode,$data);
			$data['sumdimensiunit4']=$this->model_chart2->sumdimensiunit4($sitacode,$data);

			$data['dimensiunit']=$this->model_chart2->dimensiunit($sitacode,$data);
			$data['dimensiunit1']=$this->model_chart2->dimensiunit1($sitacode,$data);
			$data['dimensiunit2']=$this->model_chart2->dimensiunit2($sitacode,$data);
			$data['dimensiunit3']=$this->model_chart2->dimensiunit3($sitacode,$data);
			$data['dimensiunit4']=$this->model_chart2->dimensiunit4($sitacode,$data);

			$data['listnilai']=$this->model_chart2->listnilai($sitacode,$data);	
			$data['listnilaip1']=$this->model_chart2->listnilaip1($sitacode,$data);	
			$data['listnilaip2']=$this->model_chart2->listnilaip2($sitacode,$data);	
			$data['listnilaip3']=$this->model_chart2->listnilaip3($sitacode,$data);	
			$data['listnilaip4']=$this->model_chart2->listnilaip4($sitacode,$data);	

			$data['gaugeunit']=$this->model_chart2->gaugeunit($sitacode,$data);
			$data['gaugeunit1']=$this->model_chart2->gaugeunit1($sitacode,$data);
			$data['gaugeunit2']=$this->model_chart2->gaugeunit2($sitacode,$data);
			$data['gaugeunit3']=$this->model_chart2->gaugeunit3($sitacode,$data);
			$data['gaugeunit4']=$this->model_chart2->gaugeunit4($sitacode,$data);

			$data['nilai_dimensi']= $this->model_chart2->nilai_dimensi1($sitacode,$data);
			$data['nilai_dimensi1']= $this->model_chart2->nilai_dimensip1($sitacode,$data);
			$data['nilai_dimensi2']= $this->model_chart2->nilai_dimensip2($sitacode,$data);
			$data['nilai_dimensi3']= $this->model_chart2->nilai_dimensip3($sitacode,$data);
			$data['nilai_dimensi4']= $this->model_chart2->nilai_dimensip4($sitacode,$data);


			
			$data['cek_top']= $this->model_chart2->ceksm_top($mine,$data);
			$data['cek_top2']= $this->model_chart2->ceksm_top2($mine,$data);
			$data['cek_top3']= $this->model_chart2->ceksm_top3($mine,$data);
			$data['cek_top4']= $this->model_chart2->ceksm_top4($mine,$data);
			$data['cek_bottom']= $this->model_chart2->ceksm_bottom($mine,$data);
			$data['cek_bottom2']= $this->model_chart2->ceksm_bottom2($mine,$data);
			$data['cek_bottom3']= $this->model_chart2->ceksm_bottom3($mine,$data);
			$data['cek_bottom4']= $this->model_chart2->ceksm_bottom4($mine,$data);
			
			$data['listaksi']= $this->model_chart2->listaksism($mine,$data);
			$data['listaksi2']= $this->model_chart2->listaksism2($mine,$data);
			$data['listaksi3']= $this->model_chart2->listaksism3($mine,$data);
			$data['listaksi4']= $this->model_chart2->listaksism4($mine,$data);
			$data['listaksifull']= $this->model_chart2->listaksismfull($mine,$data);
			$data['sumaksi']= $this->model_chart2->sumaksism($mine,$data);
			$data['sumaksi2']= $this->model_chart2->sumaksism2($mine,$data);
			$data['sumaksi3']= $this->model_chart2->sumaksism3($mine,$data);
			$data['sumaksi4']= $this->model_chart2->sumaksism4($mine,$data);
			$data['sumaksifull']= $this->model_chart2->sumaksismfull($mine,$data);
	

		if ($this->form_validation->run() == FALSE){
			echo '<b>Periksa lagi data yang anda masukkan</b><br />';
		}
		else {
			//eksekusi query insert
			$status='bottom';
			$data_aksi = array(
				'id_rekomendasi'		=> $this->input->post('id_rekomendasi'),
				'id_nip'				=> $mine,
				'id_direktorat'			=> $this->session->userdata('direktorat'),
				'id_unit'				=> $this->session->userdata('unit'),
				'aksi'					=> $this->input->post('aksi'),
				'penanggung_jawab'		=> $this->session->userdata('nopeg'),
				'frekuensi'				=> $this->input->post('frekuensi'),
				'waktu_pelaksanaan'		=> $this->input->post('waktu_pelaksanaan'),
				'batas_pelaksanaan'		=> $this->input->post('batas_pelaksanaan'),
				'status'				=> $status,
				'tahun'					=> $data['tahun_aktif'],
				'periode'				=> $data['periode_aktif']
			);
			//print_r($data_aksi);exit();
			 $this->model_users->tambah_aksi_sm($data_aksi);
			 echo '<b>Data tindak lanjut 3 berhasil disimpan.</b><br />';
		}
	}
	public function actionsm_top1(){
		$this->form_validation->set_rules('aksi', 'Aksi');
		$this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab');
		$this->form_validation->set_rules('frekuensi', 'Frekuensi');
		$this->form_validation->set_rules('waktu_pelaksanaan', 'Waktu Pelaksanaan');
		$this->form_validation->set_rules('batas_pelaksanaan', 'Batas Pelaksanaan');
		
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
		$unit = $this->session->userdata('unit');
		$sitacode=$this->session->userdata('sitacode');
		$level=$this->session->userdata('level');
		$direktorat=$this->session->userdata('direktorat');
			$data['unit']=$unit;
			$data['corporate']=$this->model_chart2->corporate($data);
			$data['corporate1']=$this->model_chart2->corporate1($data);
			$data['corporate2']=$this->model_chart2->corporate2($data);
			$data['corporate3']=$this->model_chart2->corporate3($data);
			$data['corporate4']=$this->model_chart2->corporate4($data);
			$data['score2']= $this->model_chart2->direktorat($direktorat,$data);
			$data['score21']= $this->model_chart2->direktorat1($direktorat,$data);
			$data['score22']= $this->model_chart2->direktorat2($direktorat,$data);
			$data['score23']= $this->model_chart2->direktorat3($direktorat,$data);
			$data['score24']= $this->model_chart2->direktorat4($direktorat,$data);
			$data['scoresm']= $this->model_chart2->sm($sitacode,$data);
			$data['scoresmp1']= $this->model_chart2->sm1($sitacode,$data);
			$data['scoresmp2']= $this->model_chart2->sm2($sitacode,$data);
			$data['scoresmp3']= $this->model_chart2->sm3($sitacode,$data);
			$data['scoresmp4']= $this->model_chart2->sm4($sitacode,$data);
			$data['score']= $this->model_chart->unit($unit,$data);
			$data['scorep1']= $this->model_chart->unit1($unit,$data);
			$data['scorep2']= $this->model_chart->unit2($unit,$data);
			$data['scorep3']= $this->model_chart->unit3($unit,$data);
			$data['scorep4']= $this->model_chart->unit4($unit,$data);
			$data['listunit']=$this->model_chart2->listnilaism($unit,$data);
			$data['listunit1']=$this->model_chart2->listnilaism1($unit,$data);
			$data['listunit2']=$this->model_chart2->listnilaism2($unit,$data);
			$data['listunit3']=$this->model_chart2->listnilaism3($unit,$data);
			$data['listunit4']=$this->model_chart2->listnilaism4($unit,$data);
			$data['listmanager']=$this->model_chart2->listnilaim($unit,$data);
			$data['listmanager1']=$this->model_chart2->listnilaim1($unit,$data);
			$data['listmanager2']=$this->model_chart2->listnilaim2($unit,$data);
			$data['listmanager3']=$this->model_chart2->listnilaim3($unit,$data);
			$data['listmanager4']=$this->model_chart2->listnilaim4($unit,$data);
			

			$data['sumdimensiunit']=$this->model_chart2->sumdimensiunit($sitacode,$data);
			$data['sumdimensiunit1']=$this->model_chart2->sumdimensiunit1($sitacode,$data);
			$data['sumdimensiunit2']=$this->model_chart2->sumdimensiunit2($sitacode,$data);
			$data['sumdimensiunit3']=$this->model_chart2->sumdimensiunit3($sitacode,$data);
			$data['sumdimensiunit4']=$this->model_chart2->sumdimensiunit4($sitacode,$data);

			$data['dimensiunit']=$this->model_chart2->dimensiunit($sitacode,$data);
			$data['dimensiunit1']=$this->model_chart2->dimensiunit1($sitacode,$data);
			$data['dimensiunit2']=$this->model_chart2->dimensiunit2($sitacode,$data);
			$data['dimensiunit3']=$this->model_chart2->dimensiunit3($sitacode,$data);
			$data['dimensiunit4']=$this->model_chart2->dimensiunit4($sitacode,$data);

			$data['listnilai']=$this->model_chart2->listnilai($sitacode,$data);	
			$data['listnilaip1']=$this->model_chart2->listnilaip1($sitacode,$data);	
			$data['listnilaip2']=$this->model_chart2->listnilaip2($sitacode,$data);	
			$data['listnilaip3']=$this->model_chart2->listnilaip3($sitacode,$data);	
			$data['listnilaip4']=$this->model_chart2->listnilaip4($sitacode,$data);	

			$data['gaugeunit']=$this->model_chart2->gaugeunit($sitacode,$data);
			$data['gaugeunit1']=$this->model_chart2->gaugeunit1($sitacode,$data);
			$data['gaugeunit2']=$this->model_chart2->gaugeunit2($sitacode,$data);
			$data['gaugeunit3']=$this->model_chart2->gaugeunit3($sitacode,$data);
			$data['gaugeunit4']=$this->model_chart2->gaugeunit4($sitacode,$data);

			$data['nilai_dimensi']= $this->model_chart2->nilai_dimensi1($sitacode,$data);
			$data['nilai_dimensi1']= $this->model_chart2->nilai_dimensip1($sitacode,$data);
			$data['nilai_dimensi2']= $this->model_chart2->nilai_dimensip2($sitacode,$data);
			$data['nilai_dimensi3']= $this->model_chart2->nilai_dimensip3($sitacode,$data);
			$data['nilai_dimensi4']= $this->model_chart2->nilai_dimensip4($sitacode,$data);


			
			$data['cek_top']= $this->model_chart2->ceksm_top($mine,$data);
			$data['cek_top2']= $this->model_chart2->ceksm_top2($mine,$data);
			$data['cek_top3']= $this->model_chart2->ceksm_top3($mine,$data);
			$data['cek_top4']= $this->model_chart2->ceksm_top4($mine,$data);
			$data['cek_bottom']= $this->model_chart2->ceksm_bottom($mine,$data);
			$data['cek_bottom2']= $this->model_chart2->ceksm_bottom2($mine,$data);
			$data['cek_bottom3']= $this->model_chart2->ceksm_bottom3($mine,$data);
			$data['cek_bottom4']= $this->model_chart2->ceksm_bottom4($mine,$data);
			
			$data['listaksi']= $this->model_chart2->listaksism($mine,$data);
			$data['listaksi2']= $this->model_chart2->listaksism2($mine,$data);
			$data['listaksi3']= $this->model_chart2->listaksism3($mine,$data);
			$data['listaksi4']= $this->model_chart2->listaksism4($mine,$data);
			$data['listaksifull']= $this->model_chart2->listaksismfull($mine,$data);
			$data['sumaksi']= $this->model_chart2->sumaksism($mine,$data);
			$data['sumaksi2']= $this->model_chart2->sumaksism2($mine,$data);
			$data['sumaksi3']= $this->model_chart2->sumaksism3($mine,$data);
			$data['sumaksi4']= $this->model_chart2->sumaksism4($mine,$data);
			$data['sumaksifull']= $this->model_chart2->sumaksismfull($mine,$data);

		if ($this->form_validation->run() == FALSE){
			echo '<b>Periksa lagi data yang anda masukkan</b><br />';
		}
		else {
			//eksekusi query insert
			$status='top';
			$data_aksi = array(
				'id_rekomendasi'		=> $this->input->post('id_rekomendasi'),
				'id_nip'				=> $mine,
				'id_direktorat'			=> $this->session->userdata('direktorat'),
				'id_unit'				=> $this->session->userdata('unit'),
				'aksi'					=> $this->input->post('aksi'),
				'penanggung_jawab'		=> $this->session->userdata('nopeg'),
				'frekuensi'				=> $this->input->post('frekuensi'),
				'waktu_pelaksanaan'		=> $this->input->post('waktu_pelaksanaan'),
				'batas_pelaksanaan'		=> $this->input->post('batas_pelaksanaan'),
				'status'				=> $status,
				'tahun'					=> $data['tahun_aktif'],
				'periode'				=> $data['periode_aktif']
			);
			//print_r($data_aksi);exit();
			//echo '<b>Data tindak lanjut 1 berhasil disimpan.</b><br />';
			 $this->model_users->tambah_aksi_sm($data_aksi);
			 echo '<b>Data tindak lanjut 1 berhasil disimpan.</b><br />';
		}
	}
	public function actionsm_top2(){
		$this->form_validation->set_rules('aksi', 'Aksi');
		$this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab');
		$this->form_validation->set_rules('frekuensi', 'Frekuensi');
		$this->form_validation->set_rules('waktu_pelaksanaan', 'Waktu Pelaksanaan');
		$this->form_validation->set_rules('batas_pelaksanaan', 'Batas Pelaksanaan');
		
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
		$unit = $this->session->userdata('unit');
		$sitacode=$this->session->userdata('sitacode');
		$level=$this->session->userdata('level');
		$direktorat=$this->session->userdata('direktorat');
		$data['unit']=$unit;
			$data['corporate']=$this->model_chart2->corporate($data);
			$data['corporate1']=$this->model_chart2->corporate1($data);
			$data['corporate2']=$this->model_chart2->corporate2($data);
			$data['corporate3']=$this->model_chart2->corporate3($data);
			$data['corporate4']=$this->model_chart2->corporate4($data);
			$data['score2']= $this->model_chart2->direktorat($direktorat,$data);
			$data['score21']= $this->model_chart2->direktorat1($direktorat,$data);
			$data['score22']= $this->model_chart2->direktorat2($direktorat,$data);
			$data['score23']= $this->model_chart2->direktorat3($direktorat,$data);
			$data['score24']= $this->model_chart2->direktorat4($direktorat,$data);
			$data['scoresm']= $this->model_chart2->sm($sitacode,$data);
			$data['scoresmp1']= $this->model_chart2->sm1($sitacode,$data);
			$data['scoresmp2']= $this->model_chart2->sm2($sitacode,$data);
			$data['scoresmp3']= $this->model_chart2->sm3($sitacode,$data);
			$data['scoresmp4']= $this->model_chart2->sm4($sitacode,$data);
			$data['score']= $this->model_chart->unit($unit,$data);
			$data['scorep1']= $this->model_chart->unit1($unit,$data);
			$data['scorep2']= $this->model_chart->unit2($unit,$data);
			$data['scorep3']= $this->model_chart->unit3($unit,$data);
			$data['scorep4']= $this->model_chart->unit4($unit,$data);
			$data['listunit']=$this->model_chart2->listnilaism($unit,$data);
			$data['listunit1']=$this->model_chart2->listnilaism1($unit,$data);
			$data['listunit2']=$this->model_chart2->listnilaism2($unit,$data);
			$data['listunit3']=$this->model_chart2->listnilaism3($unit,$data);
			$data['listunit4']=$this->model_chart2->listnilaism4($unit,$data);
			$data['listmanager']=$this->model_chart2->listnilaim($unit,$data);
			$data['listmanager1']=$this->model_chart2->listnilaim1($unit,$data);
			$data['listmanager2']=$this->model_chart2->listnilaim2($unit,$data);
			$data['listmanager3']=$this->model_chart2->listnilaim3($unit,$data);
			$data['listmanager4']=$this->model_chart2->listnilaim4($unit,$data);
			

			$data['sumdimensiunit']=$this->model_chart2->sumdimensiunit($sitacode,$data);
			$data['sumdimensiunit1']=$this->model_chart2->sumdimensiunit1($sitacode,$data);
			$data['sumdimensiunit2']=$this->model_chart2->sumdimensiunit2($sitacode,$data);
			$data['sumdimensiunit3']=$this->model_chart2->sumdimensiunit3($sitacode,$data);
			$data['sumdimensiunit4']=$this->model_chart2->sumdimensiunit4($sitacode,$data);

			$data['dimensiunit']=$this->model_chart2->dimensiunit($sitacode,$data);
			$data['dimensiunit1']=$this->model_chart2->dimensiunit1($sitacode,$data);
			$data['dimensiunit2']=$this->model_chart2->dimensiunit2($sitacode,$data);
			$data['dimensiunit3']=$this->model_chart2->dimensiunit3($sitacode,$data);
			$data['dimensiunit4']=$this->model_chart2->dimensiunit4($sitacode,$data);

			$data['listnilai']=$this->model_chart2->listnilai($sitacode,$data);	
			$data['listnilaip1']=$this->model_chart2->listnilaip1($sitacode,$data);	
			$data['listnilaip2']=$this->model_chart2->listnilaip2($sitacode,$data);	
			$data['listnilaip3']=$this->model_chart2->listnilaip3($sitacode,$data);	
			$data['listnilaip4']=$this->model_chart2->listnilaip4($sitacode,$data);	

			$data['gaugeunit']=$this->model_chart2->gaugeunit($sitacode,$data);
			$data['gaugeunit1']=$this->model_chart2->gaugeunit1($sitacode,$data);
			$data['gaugeunit2']=$this->model_chart2->gaugeunit2($sitacode,$data);
			$data['gaugeunit3']=$this->model_chart2->gaugeunit3($sitacode,$data);
			$data['gaugeunit4']=$this->model_chart2->gaugeunit4($sitacode,$data);

			$data['nilai_dimensi']= $this->model_chart2->nilai_dimensi1($sitacode,$data);
			$data['nilai_dimensi1']= $this->model_chart2->nilai_dimensip1($sitacode,$data);
			$data['nilai_dimensi2']= $this->model_chart2->nilai_dimensip2($sitacode,$data);
			$data['nilai_dimensi3']= $this->model_chart2->nilai_dimensip3($sitacode,$data);
			$data['nilai_dimensi4']= $this->model_chart2->nilai_dimensip4($sitacode,$data);


			
			$data['cek_top']= $this->model_chart2->ceksm_top($mine,$data);
			$data['cek_top2']= $this->model_chart2->ceksm_top2($mine,$data);
			$data['cek_top3']= $this->model_chart2->ceksm_top3($mine,$data);
			$data['cek_top4']= $this->model_chart2->ceksm_top4($mine,$data);
			$data['cek_bottom']= $this->model_chart2->ceksm_bottom($mine,$data);
			$data['cek_bottom2']= $this->model_chart2->ceksm_bottom2($mine,$data);
			$data['cek_bottom3']= $this->model_chart2->ceksm_bottom3($mine,$data);
			$data['cek_bottom4']= $this->model_chart2->ceksm_bottom4($mine,$data);
			
			$data['listaksi']= $this->model_chart2->listaksism($mine,$data);
			$data['listaksi2']= $this->model_chart2->listaksism2($mine,$data);
			$data['listaksi3']= $this->model_chart2->listaksism3($mine,$data);
			$data['listaksi4']= $this->model_chart2->listaksism4($mine,$data);
			$data['listaksifull']= $this->model_chart2->listaksismfull($mine,$data);
			$data['sumaksi']= $this->model_chart2->sumaksism($mine,$data);
			$data['sumaksi2']= $this->model_chart2->sumaksism2($mine,$data);
			$data['sumaksi3']= $this->model_chart2->sumaksism3($mine,$data);
			$data['sumaksi4']= $this->model_chart2->sumaksism4($mine,$data);
			$data['sumaksifull']= $this->model_chart2->sumaksismfull($mine,$data);

		if ($this->form_validation->run() == FALSE){
			echo '<b>Periksa lagi data yang anda masukkan</b><br />';
		}
		else {
			//eksekusi query insert
			$status='top';
			$data_aksi = array(
				'id_rekomendasi'		=> $this->input->post('id_rekomendasi'),
				'id_nip'				=> $mine,
				'id_direktorat'			=> $this->session->userdata('direktorat'),
				'id_unit'				=> $this->session->userdata('unit'),
				'aksi'					=> $this->input->post('aksi'),
				'penanggung_jawab'		=> $this->session->userdata('nopeg'),
				'frekuensi'				=> $this->input->post('frekuensi'),
				'waktu_pelaksanaan'		=> $this->input->post('waktu_pelaksanaan'),
				'batas_pelaksanaan'		=> $this->input->post('batas_pelaksanaan'),
				'status'				=> $status,
				'tahun'					=> $data['tahun_aktif'],
				'periode'				=> $data['periode_aktif']
			);
			//print_r($data_aksi);exit();
			//echo '<b>Data tindak lanjut 1 berhasil disimpan.</b><br />';
			 $this->model_users->tambah_aksi_sm($data_aksi);
			 echo '<b>Data tindak lanjut 2 berhasil disimpan.</b><br />';
		}
	}
	public function actionsm_top3(){
		$this->form_validation->set_rules('aksi', 'Aksi');
		$this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab');
		$this->form_validation->set_rules('frekuensi', 'Frekuensi');
		$this->form_validation->set_rules('waktu_pelaksanaan', 'Waktu Pelaksanaan');
		$this->form_validation->set_rules('batas_pelaksanaan', 'Batas Pelaksanaan');
		
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
		$unit = $this->session->userdata('unit');
		$sitacode=$this->session->userdata('sitacode');
		$level=$this->session->userdata('level');
		$direktorat=$this->session->userdata('direktorat');
		$data['unit']=$unit;
			$data['corporate']=$this->model_chart2->corporate($data);
			$data['corporate1']=$this->model_chart2->corporate1($data);
			$data['corporate2']=$this->model_chart2->corporate2($data);
			$data['corporate3']=$this->model_chart2->corporate3($data);
			$data['corporate4']=$this->model_chart2->corporate4($data);
			$data['score2']= $this->model_chart2->direktorat($direktorat,$data);
			$data['score21']= $this->model_chart2->direktorat1($direktorat,$data);
			$data['score22']= $this->model_chart2->direktorat2($direktorat,$data);
			$data['score23']= $this->model_chart2->direktorat3($direktorat,$data);
			$data['score24']= $this->model_chart2->direktorat4($direktorat,$data);
			$data['scoresm']= $this->model_chart2->sm($sitacode,$data);
			$data['scoresmp1']= $this->model_chart2->sm1($sitacode,$data);
			$data['scoresmp2']= $this->model_chart2->sm2($sitacode,$data);
			$data['scoresmp3']= $this->model_chart2->sm3($sitacode,$data);
			$data['scoresmp4']= $this->model_chart2->sm4($sitacode,$data);
			$data['score']= $this->model_chart->unit($unit,$data);
			$data['scorep1']= $this->model_chart->unit1($unit,$data);
			$data['scorep2']= $this->model_chart->unit2($unit,$data);
			$data['scorep3']= $this->model_chart->unit3($unit,$data);
			$data['scorep4']= $this->model_chart->unit4($unit,$data);
			$data['listunit']=$this->model_chart2->listnilaism($unit,$data);
			$data['listunit1']=$this->model_chart2->listnilaism1($unit,$data);
			$data['listunit2']=$this->model_chart2->listnilaism2($unit,$data);
			$data['listunit3']=$this->model_chart2->listnilaism3($unit,$data);
			$data['listunit4']=$this->model_chart2->listnilaism4($unit,$data);
			$data['listmanager']=$this->model_chart2->listnilaim($unit,$data);
			$data['listmanager1']=$this->model_chart2->listnilaim1($unit,$data);
			$data['listmanager2']=$this->model_chart2->listnilaim2($unit,$data);
			$data['listmanager3']=$this->model_chart2->listnilaim3($unit,$data);
			$data['listmanager4']=$this->model_chart2->listnilaim4($unit,$data);
			

			$data['sumdimensiunit']=$this->model_chart2->sumdimensiunit($sitacode,$data);
			$data['sumdimensiunit1']=$this->model_chart2->sumdimensiunit1($sitacode,$data);
			$data['sumdimensiunit2']=$this->model_chart2->sumdimensiunit2($sitacode,$data);
			$data['sumdimensiunit3']=$this->model_chart2->sumdimensiunit3($sitacode,$data);
			$data['sumdimensiunit4']=$this->model_chart2->sumdimensiunit4($sitacode,$data);

			$data['dimensiunit']=$this->model_chart2->dimensiunit($sitacode,$data);
			$data['dimensiunit1']=$this->model_chart2->dimensiunit1($sitacode,$data);
			$data['dimensiunit2']=$this->model_chart2->dimensiunit2($sitacode,$data);
			$data['dimensiunit3']=$this->model_chart2->dimensiunit3($sitacode,$data);
			$data['dimensiunit4']=$this->model_chart2->dimensiunit4($sitacode,$data);

			$data['listnilai']=$this->model_chart2->listnilai($sitacode,$data);	
			$data['listnilaip1']=$this->model_chart2->listnilaip1($sitacode,$data);	
			$data['listnilaip2']=$this->model_chart2->listnilaip2($sitacode,$data);	
			$data['listnilaip3']=$this->model_chart2->listnilaip3($sitacode,$data);	
			$data['listnilaip4']=$this->model_chart2->listnilaip4($sitacode,$data);	

			$data['gaugeunit']=$this->model_chart2->gaugeunit($sitacode,$data);
			$data['gaugeunit1']=$this->model_chart2->gaugeunit1($sitacode,$data);
			$data['gaugeunit2']=$this->model_chart2->gaugeunit2($sitacode,$data);
			$data['gaugeunit3']=$this->model_chart2->gaugeunit3($sitacode,$data);
			$data['gaugeunit4']=$this->model_chart2->gaugeunit4($sitacode,$data);

			$data['nilai_dimensi']= $this->model_chart2->nilai_dimensi1($sitacode,$data);
			$data['nilai_dimensi1']= $this->model_chart2->nilai_dimensip1($sitacode,$data);
			$data['nilai_dimensi2']= $this->model_chart2->nilai_dimensip2($sitacode,$data);
			$data['nilai_dimensi3']= $this->model_chart2->nilai_dimensip3($sitacode,$data);
			$data['nilai_dimensi4']= $this->model_chart2->nilai_dimensip4($sitacode,$data);


			
			$data['cek_top']= $this->model_chart2->ceksm_top($mine,$data);
			$data['cek_top2']= $this->model_chart2->ceksm_top2($mine,$data);
			$data['cek_top3']= $this->model_chart2->ceksm_top3($mine,$data);
			$data['cek_top4']= $this->model_chart2->ceksm_top4($mine,$data);
			$data['cek_bottom']= $this->model_chart2->ceksm_bottom($mine,$data);
			$data['cek_bottom2']= $this->model_chart2->ceksm_bottom2($mine,$data);
			$data['cek_bottom3']= $this->model_chart2->ceksm_bottom3($mine,$data);
			$data['cek_bottom4']= $this->model_chart2->ceksm_bottom4($mine,$data);
			
			$data['listaksi']= $this->model_chart2->listaksism($mine,$data);
			$data['listaksi2']= $this->model_chart2->listaksism2($mine,$data);
			$data['listaksi3']= $this->model_chart2->listaksism3($mine,$data);
			$data['listaksi4']= $this->model_chart2->listaksism4($mine,$data);
			$data['listaksifull']= $this->model_chart2->listaksismfull($mine,$data);
			$data['sumaksi']= $this->model_chart2->sumaksism($mine,$data);
			$data['sumaksi2']= $this->model_chart2->sumaksism2($mine,$data);
			$data['sumaksi3']= $this->model_chart2->sumaksism3($mine,$data);
			$data['sumaksi4']= $this->model_chart2->sumaksism4($mine,$data);
			$data['sumaksifull']= $this->model_chart2->sumaksismfull($mine,$data);
		if ($this->form_validation->run() == FALSE){
			echo '<b>Periksa lagi data yang anda masukkan</b><br />';
		}
		else {
			//eksekusi query insert
			$status='top';
			$data_aksi = array(
				'id_rekomendasi'		=> $this->input->post('id_rekomendasi'),
				'id_nip'				=> $mine,
				'id_direktorat'			=> $this->session->userdata('direktorat'),
				'id_unit'				=> $this->session->userdata('unit'),
				'aksi'					=> $this->input->post('aksi'),
				'penanggung_jawab'		=> $this->session->userdata('nopeg'),
				'frekuensi'				=> $this->input->post('frekuensi'),
				'waktu_pelaksanaan'		=> $this->input->post('waktu_pelaksanaan'),
				'batas_pelaksanaan'		=> $this->input->post('batas_pelaksanaan'),
				'status'				=> $status,
				'tahun'					=> $data['tahun_aktif'],
				'periode'				=> $data['periode_aktif']
			);
			//print_r($data_aksi);exit();
			//echo '<b>Data tindak lanjut 1 berhasil disimpan.</b><br />';
			 $this->model_users->tambah_aksi_sm($data_aksi);
			 echo '<b>Data tindak lanjut 3 berhasil disimpan.</b><br />';
		}
	}

	public function smedit()
	{
		$tahun_pilih = $this->input->post('tahun');
		if (!$tahun_pilih)
		{
			$tahun_pilih = $this->session->userdata('tahun_pilih');
		}
		$data['tahun'] = $tahun_pilih;
		$data['tahun_aktif'] = $this->session->userdata('tahun');
		$data['periode_aktif'] = $this->session->userdata('periode');
		$data['_daftar_tahun'] = $this->model_admin->list_tahun();
		$unit = $this->session->userdata('unit');
		$mine = $this->session->userdata('nopeg');
		$data['aksi'] = $this->model_chart2->tampilsm_aksi($mine,$data);
		$data['aksi2'] = $this->model_chart2->tampilsm_aksi2($mine,$data);
		$data['aksi3'] = $this->model_chart2->tampilsm_aksi3($mine,$data);
		$data['aksi4'] = $this->model_chart2->tampilsm_aksi4($mine,$data);
		$data['aksi1'] = $this->model_chart2->tampilsm_aksi_bottom($mine,$data);		
		$data['aksi12'] = $this->model_chart2->tampilsm_aksi_bottom2($mine,$data);		
		$data['aksi13'] = $this->model_chart2->tampilsm_aksi_bottom3($mine,$data);		
		$data['aksi14'] = $this->model_chart2->tampilsm_aksi_bottom4($mine,$data);				
		//print_r($data);
		$this->load->view('user/smedit_aksi',$data);
	}
	public function editsm_action_top($id_aksi) {
		$this->form_validation->set_rules('aksi',"Aksi");
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
		$unit = $this->session->userdata('unit');
		$mine = $this->session->userdata('nopeg');
		$data['aksi'] = $this->model_chart2->tampilsm_aksi($mine,$data);
		$data['aksi2'] = $this->model_chart2->tampilsm_aksi2($mine,$data);
		$data['aksi3'] = $this->model_chart2->tampilsm_aksi3($mine,$data);
		$data['aksi4'] = $this->model_chart2->tampilsm_aksi4($mine,$data);
		$data['aksi1'] = $this->model_chart2->tampilsm_aksi_bottom($mine,$data);		
		$data['aksi12'] = $this->model_chart2->tampilsm_aksi_bottom2($mine,$data);		
		$data['aksi13'] = $this->model_chart2->tampilsm_aksi_bottom3($mine,$data);		
		$data['aksi14'] = $this->model_chart2->tampilsm_aksi_bottom4($mine,$data);	
		if ($this->form_validation->run() == FALSE){
			$this->load->view('user/smedit_aksi',$data);
		}
		else {
				//form submit dengan gambar dikosongkan
				$status='top';
				$data_aksi = array(
				'id_nip'				=> $mine,
				'id_direktorat'			=> $this->session->userdata('direktorat'),
				'id_unit'				=> $this->session->userdata('unit'),
				'aksi'					=> $this->input->post('aksi'),
				'penanggung_jawab'		=> $this->session->userdata('nopeg'),
				'frekuensi'				=> $this->input->post('frekuensi'),
				'waktu_pelaksanaan'		=> $this->input->post('waktu_pelaksanaan'),
				'batas_pelaksanaan'		=> $this->input->post('batas_pelaksanaan'),
				'status'				=> $status,
				'tahun'					=> $data['tahun_aktif'],
				'periode'				=> $data['periode_aktif']
			);
				//print_r($data_aksi);exit();
			 $this->model_users->editsm_aksi_top($id_aksi,$data_aksi);
			 redirect('user/smedit');

			
		}
	}	
	public function editsm_action_bottom($id_aksi) {
		$this->form_validation->set_rules('aksi',"Aksi");
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
		$unit = $this->session->userdata('unit');
		$mine = $this->session->userdata('nopeg');
		$data['aksi'] = $this->model_chart2->tampilsm_aksi($mine,$data);
		$data['aksi2'] = $this->model_chart2->tampilsm_aksi2($mine,$data);
		$data['aksi3'] = $this->model_chart2->tampilsm_aksi3($mine,$data);
		$data['aksi4'] = $this->model_chart2->tampilsm_aksi4($mine,$data);
		$data['aksi1'] = $this->model_chart2->tampilsm_aksi_bottom($mine,$data);		
		$data['aksi12'] = $this->model_chart2->tampilsm_aksi_bottom2($mine,$data);		
		$data['aksi13'] = $this->model_chart2->tampilsm_aksi_bottom3($mine,$data);		
		$data['aksi14'] = $this->model_chart2->tampilsm_aksi_bottom4($mine,$data);	
		if ($this->form_validation->run() == FALSE){
			$this->load->view('user/smedit_aksi',$data);
		}
		else {
				//form submit dengan gambar dikosongkan
				$status='bottom';
				$data_aksi = array(
				'id_nip'				=> $mine,
				'id_direktorat'			=> $this->session->userdata('direktorat'),
				'id_unit'				=> $this->session->userdata('unit'),
				'aksi'					=> $this->input->post('aksi'),
				'penanggung_jawab'		=> $this->session->userdata('nopeg'),
				'frekuensi'				=> $this->input->post('frekuensi'),
				'waktu_pelaksanaan'		=> $this->input->post('waktu_pelaksanaan'),
				'batas_pelaksanaan'		=> $this->input->post('batas_pelaksanaan'),
				'status'				=> $status,
				'tahun'					=> $data['tahun_aktif'],
				'periode'				=> $data['periode_aktif']
			);
			//print_r($data_aksi);exit();
			 $this->model_users->editsm_aksi_bottom($id_aksi,$data_aksi);
			 redirect('user/smedit');
			
		}
	}	

	public function smprogres()
	{
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
		$penanggung_jawab = $this->session->userdata('nopeg');
		$data['progres_aksi'] = $this->model_chart2->progressm_aksi($penanggung_jawab,$data);
		$data['progres_aksi2'] = $this->model_chart2->progressm_aksi2($penanggung_jawab,$data);
		$data['progres_aksi3'] = $this->model_chart2->progressm_aksi3($penanggung_jawab,$data);
		$data['progres_aksi4'] = $this->model_chart2->progressm_aksi4($penanggung_jawab,$data);			
		//print_r($data);
		$this->load->view('user/smprogres_view',$data);
	}
	public function updatesm_progres($id_aksi){
		$this->form_validation->set_rules('progres');
		$this->form_validation->set_rules('keterangan');
		$tahun_pilih = $this->input->post('tahun');
		$s= $this->input->post();
		$y=strtotime($this->input->post('batas_pelaksanaan'));
		$o=strtotime('now');
		/*print_r($y);
		print_r($o);*/
		//jika belum dipilih, maka gunakan tahun aktif
		if (!$tahun_pilih)
		{
			$tahun_pilih = $this->session->userdata('tahun_pilih');
		}
		$data['tahun'] = $tahun_pilih;
		$data['tahun_aktif'] = $this->session->userdata('tahun');
		$data['periode_aktif'] = $this->session->userdata('periode');
		$data['_daftar_tahun'] = $this->model_admin->list_tahun();
		$penanggung_jawab = $this->session->userdata('nopeg');
		$data['progres_aksi'] = $this->model_chart2->progressm_aksi($penanggung_jawab,$data);
		$data['progres_aksi2'] = $this->model_chart2->progressm_aksi2($penanggung_jawab,$data);
		$data['progres_aksi3'] = $this->model_chart2->progressm_aksi3($penanggung_jawab,$data);
		$data['progres_aksi4'] = $this->model_chart2->progressm_aksi4($penanggung_jawab,$data);			

		if ($this->form_validation->run() == FALSE){
			$this->load->view('user/smprogres', $data);
			/*print_r("cok");
			exit();*/
		}
		else {
			/*print_r("cok");
			exit();*/
			if ($this->input->post('progres')==0 && strtotime($this->input->post('batas_pelaksanaan')) > strtotime('now')) {
				$data_progres = array(
						'progres'				=> $this->input->post('progres'),
						'keterangan'			=> $this->input->post('keterangan'),
						'status_progres'		=> 'Not Started'
				);
			} elseif ($this->input->post('progres')<100 && strtotime($this->input->post('batas_pelaksanaan')) > strtotime('now')) {
				$data_progres = array(
						'progres'				=> $this->input->post('progres'),
						'keterangan'			=> $this->input->post('keterangan'),
						'status_progres'		=> 'On Progress'
				);
			} elseif ($this->input->post('progres')<=100 && strtotime($this->input->post('batas_pelaksanaan')) < strtotime('now')) {
				$data_progres = array(
						'progres'				=> $this->input->post('progres'),
						'keterangan'			=> $this->input->post('keterangan'),
						'status_progres'		=> 'Failed'
				);
			} elseif ($this->input->post('progres')==100 && strtotime($this->input->post('batas_pelaksanaan')) >= strtotime('now')) {
				$data_progres = array(
						'progres'				=> $this->input->post('progres'),
						'keterangan'			=> $this->input->post('keterangan'),
						'status_progres'		=> 'Succeed'
				);
				
			}
			/*print_r($data_progres);
			exit();*/
			$this->model_chart2->updatesm_progres($id_aksi, $data_progres);
			redirect('user/smprogres');
		}

}	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */