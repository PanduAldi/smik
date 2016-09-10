<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Direktori extends CI_Controller {


	function __construct(){
		parent::__construct();
		$this->load->library('datatables');

		
	}

	function index(){
		$data = array(
			'title'		=>'FORUM',
			'sidebar' 	=> $this->sidebar(),
			'record'	=> $this->db->query('SELECT * FROM forum GROUP BY id DESC'));
		$this->template->load('main/v_template','main/v_forum',$data);
	}

	function sidebar(){
		$data = array(
			'informasi' => $this->db->query('SELECT * FROM content WHERE kategori = "informasi" GROUP BY id DESC LIMIT 3'),
			'berita' 	=> $this->db->query('SELECT * FROM content WHERE kategori = "berita" GROUP BY id DESC LIMIT 7'),
			'banner' 	=> $this->db->get('banner'),
			'gallery' 	=> $this->db->query('SELECT * FROM gallery GROUP BY id DESC LIMIT 1')->row_array(),
		);
		return $this->load->view('main/v_sidebar',$data,true);
	}

	function siswa(){
		$data = array(
			'title'		=>'Akademik',
			'sidebar' 	=> $this->sidebar(),
			'record'	=> $this->db->get('dir_siswa'),
		);
		$this->template->load('main/v_template','main/v_siswa',$data);
	}

	function alumni(){
		$data = array(
			'title'		=>'Akademik',
			'sidebar' 	=> $this->sidebar(),
			'record'	=> $this->db->get('dir_alumni'),
		);
		$this->template->load('main/v_template','main/v_alumni',$data);
	}

	function guru(){
		$data = array(
			'title'		=>'Akademik',
			'sidebar' 	=> $this->sidebar(),
			'record'	=> $this->db->query('SELECT * FROM dir_guru GROUP BY id DESC'),
		);
		$this->template->load('main/v_template','main/v_guru',$data);
	}

	function guru_detail(){
		$id = $this->uri->segment(3);
		$data = array(
			'title'		=>'Akademik',
			'sidebar' 	=> $this->sidebar(),
			'record'	=> $this->db->get_where('dir_guru',array('id'=>$id))->row_array(),
		);
		$this->template->load('main/v_template','main/v_guru_detail',$data);
	}

	function staf(){
		$data = array(
			'title'		=>'Akademik',
			'sidebar' 	=> $this->sidebar(),
			'record'	=> $this->db->query('SELECT * FROM dir_staf GROUP BY id DESC'),
		);
		$this->template->load('main/v_template','main/v_staf',$data);
	}

	public function staf_json()
	{
		$this->datatables->select('nip');
	}

	public function siswa_json()
	{
		$no = 1;

		$this->datatables->select('nis, nama, alamat, jk, agama, ttl, kelas');
		$this->datatables->from('dir_siswa');
		echo $this->datatables->generate();
	}

	function halaman($url){
		$data = array(
			'title'		=>'Prestasi',
			'sidebar' 	=> $this->sidebar(),
			'record'	=> $this->db->get_where('halaman',array('url'=>$url))->row_array(),
		);
		$this->template->load('main/v_template','main/v_prestasi',$data);
	}
}
