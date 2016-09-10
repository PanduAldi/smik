<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function index(){
		$data = array(
			'title'		=>'Home',
			'sidebar' 	=> $this->sidebar());
		$this->template->load('main/v_template','main/v_home',$data);
	}

	function sidebar(){
		$data = array(
			'informasi' => $this->db->query('SELECT * FROM content WHERE kategori = "informasi" GROUP BY id DESC LIMIT 3'),
			'berita' 	=> $this->db->query('SELECT * FROM content WHERE kategori = "berita" GROUP BY id DESC LIMIT 7'),
			'gallery' 	=> $this->db->query('SELECT * FROM gallery GROUP BY id DESC LIMIT 1')->row_array(),
			'sambutan' 	=> $this->db->get_where('halaman',array('url'=>'sambutan'))->row_array(),
			'banner' 	=> $this->db->get('banner') 	
		);
		return $this->load->view('main/v_sidebar',$data,true);
	}

	function login_page()
	{
		$data['title'] = "Login Page";

		$this->load->view('admin/v_login', $data);
	}

	function login(){
		$user = $this->input->post('user');
		$pass = md5($this->input->post('pass'));

		$hasil	  = $this->db->get_where('admin',array(
			'username'	=> $user,
			'password'	=> $pass));

		if($hasil->num_rows()>0){
			$this->session->set_userdata(array('status_login'=>'admin', 'islogin' => true));
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert">
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													  <strong>Selamat!</strong> Anda berhasil login.
													</div>');
			redirect('dashboard');
		}else{
			$this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible" role="alert">
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													  <strong>Maaf!</strong> Userama atau Password tidak ditemukan.
													</div>');
			redirect('home/login_page');
		}
	}

	function detail_berita($id){
		$ex = explode('_', $id);
		
		$id_berita = $ex[0];

		$data['title'] = str_replace("-", " ", $ex[1]);
		$data['sidebar'] = $this->sidebar();
		$data['record'] = $this->db->get_where('content',array('id'=>$id_berita))->row_array();
		$this->template->load('main/v_template','main/v_berita_detail',$data);
	}

	function informasi($id)
	{
		$get = $this->db->get_where('content',array('id'=>$id))->row_array();

		$data['title'] = $get['judul_content'];
		$data['sidebar'] = $this->sidebar();
		$data['record'] = $get;
		$this->template->load('main/v_template','main/v_informasi',$data);
	}
}
