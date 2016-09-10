<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __Construct(){
		parent::__Construct();

		if ($this->session->userdata('islogin') == false) 
		{
			echo  '<script> alert("Anda Harus Login Dulu") </script>';
			redirect('home/login_page','refresh');

		}
		
	}

	function index(){
		$this->template->load('admin/v_template','admin/v_dashboard');
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('home');
	}


	// PROSESS DATA BERITA

	function berita(){
		$data['record'] = $this->db->get('berita');
		$this->template->load('admin/v_template','admin/v_berita',$data);
	}

	function halaman(){
		$data['record'] = $this->db->get('halaman');
		$this->template->load('admin/v_template','admin/v_halaman',$data);
	}

	function halaman_edit(){

		$get = $this->db->get_where('halaman',array('id'=>$id))->row_array();
		if(isset($_POST['update'])){
			if ($_FILES['gambar']['error'] <> 4) {

	            $config['upload_path'] = './upload/gambar';
	            $config['allowed_types'] = 'jpg|png|gif|bmp';
	            $this->load->library('upload', $config);
	 
	            if (!$this->upload->do_upload('gambar')) {
	                $error = array('error' => $this->upload->display_errors());
	                $this->index($error);
	            } else {
	                unlink('./upload/gambar/'.$get['gambar']);

	                $hasil 	= $this->upload->data();
					$data = array(
						'judul_halaman' => $this->input->post('judul',true),
						'isi_halaman'	=> $this->input->post('isihalaman',true),
						'url'			=> $this->input->post('url',true),
						'gambar'		=> $hasil['file_name'],
						'tanggal'		=> date("Y-m-d h:i:s"));
					
					$this->db->where('id',$this->input->post('id',true));
					$this->db->update('halaman',$data);
					redirect('dashboard/halaman');
		        }
	        } else {
			        $data = array(
						'judul_halaman' => $this->input->post('judul',true),
						'url'			=> $this->input->post('url',true),
						'isi_halaman'	=> $this->input->post('isihalaman',true),
						'tanggal'		=> date("Y-m-d h:i:s"),
					);
				$this->db->where('id',$this->input->post('id',true));
				$this->db->update('halaman',$data);
				redirect('dashboard/halaman');
	        }
		}else{
			$data['title'] = 'Modul Halaman';
			$id = $this->uri->segment(3);
			$data['record'] = $get;
			$this->template->load('admin/v_template','admin/v_halaman_edit',$data);
		}
	}

	// PROSESS DATA CONTENT

	function content(){
		$data['title'] = 'Modul Content';
		$param = $this->uri->segment(3);
		$data['record'] = $this->db->get_where('content',array('kategori'=>$param));
		$this->template->load('admin/v_template','admin/v_content',$data);
	}

	function contentpost(){
		if(isset($_POST['simpan'])){
			if ($_FILES['gambar']['error'] <> 4) {

	            $config['upload_path'] = './upload/gambar';
	            $config['allowed_types'] = 'jpg|png|gif|bmp';
	            $this->load->library('upload', $config);
	 
	            if (!$this->upload->do_upload('gambar')) {
	                $error = array('error' => $this->upload->display_errors());
	                $this->index($error);
	            } else {
	                $hasil 	= $this->upload->data();
					$data = array(
						'judul_content' => $this->input->post('judul',true),
						'isi_content'	=> $this->input->post('isi',true),
						'kategori'		=> $this->input->post('kategori',true),
						'gambar'		=> $hasil['file_name']);
					$this->db->insert('content',$data);
					redirect('dashboard/content/'.$this->input->post('kategori',true));
		        }
	        } else {
			        $data = array(
						'judul_content' => $this->input->post('judul',true),
						'isi_content'	=> $this->input->post('isi',true),
						'kategori'		=> $this->input->post('kategori',true),
						// 'tanggal'		=> date("Y-m-d h:i:s"),
					);
				$this->db->insert('content',$data);
				redirect('dashboard/content/'.$this->input->post('kategori',true));
	        }
		}else{
			$data['title'] = 'Modul Halaman';
			$this->template->load('admin/v_template','admin/v_content_post',$data);
		}
	}

	function contentedit($id){
		if(isset($_POST['simpan'])){
			if ($_FILES['gambar']['error'] <> 4) {
				$nmfile = "file_".time();
	            $config['upload_path'] 		= './upload/gambar';
	            $config['allowed_types'] 	= 'jpg|png|gif|bmp';
	            $config['file_name'] 		= $nmfile;

	            $this->load->library('upload', $config);
	 
	            if (!$this->upload->do_upload('gambar')) {
	                $error = array('error' => $this->upload->display_errors());
	                $this->index($error);
	            } else {
	                $hasil 	= $this->upload->data();
					$data = array(
						'judul_content' => $this->input->post('judul',true),
						'isi_content'	=> $this->input->post('isi',true),
						'kategori'		=> $this->input->post('kategori',true),
						'gambar'		=> $hasil['file_name'],
						'tanggal'		=> date("Y-m-d h:i:s"));
					$this->db->where('id',$this->input->post('id',true));
					$this->db->update('content',$data);
					redirect('dashboard/content/'.$this->input->post('kategori',true));
		        }
	        } else {
			        $data = array(
						'judul_content' => $this->input->post('judul',true),
						'isi_content'	=> $this->input->post('isi',true),
						'kategori'		=> $this->input->post('kategori',true),
						'tanggal'		=> date("Y-m-d h:i:s"),
					);
				$this->db->where('id',$this->input->post('id',true));
				$this->db->update('content',$data);
				redirect('dashboard/content/'.$this->input->post('kategori',true));
	        }
		}else{
			$data['title'] = 'Modul Halaman';
			$data['record'] = $this->db->get_where('content',array('id'=>$id))->row_array();
			$this->template->load('admin/v_template','admin/v_content_edit',$data);
		}
	}

	function contenthapus($id){
		$this->db->where('id',$id);
	    $query = $this->db->get('content');
	    $row = $query->row();

	    unlink("./upload/gambar_content/$row->gambar");

	    $this->db->delete('content', array('id' => $id));
		redirect('dashboard/content/'.$this->uri->segment(4));
	}


	// PROSESS DATA GURU

	function guru(){
		$data['record'] = $this->db->get('dir_guru');
		$this->template->load('admin/v_template','admin/v_guru',$data);
	}

	function tambahdataguru(){
		if(isset($_POST['simpan'])){
			if ($_FILES['gambar']['error'] <> 4) {

	            $config['upload_path'] = './upload/photo';
	            $config['allowed_types'] = 'jpg|png|gif|bmp';
	            $this->load->library('upload', $config);
	 
	            if (!$this->upload->do_upload('gambar')) {
	                $error = array('error' => $this->upload->display_errors());
	                $this->index($error);
	            } else {
	                $hasil 	= $this->upload->data();
					$data = array(
						'nip'				=> $this->input->post('nis'),
						'nama'				=> $this->input->post('nama'),
						'golongan'			=> $this->input->post('golongan'),
						'jk'				=> $this->input->post('jk'),
						'agama'				=> $this->input->post('agama'),
						'bidang_studi'		=> $this->input->post('bidangstudi'),
						'kelas'				=> $this->input->post('kelas'),
						'alamat'			=> $this->input->post('alamat'),
						'ijazah_trakhir'	=> $this->input->post('ijazah'),
						'photo'	=> $hasil['file_name']);
					$this->db->insert('dir_guru',$data);
					redirect('dashboard/guru');
		        }
	        } else {
				$data = array(
					'nip'				=> $this->input->post('nis'),
					'nama'				=> $this->input->post('nama'),
					'golongan'			=> $this->input->post('golongan'),
					'jk'				=> $this->input->post('jk'),
					'agama'				=> $this->input->post('agama'),
					'bidang_studi'		=> $this->input->post('bidangstudi'),
					'kelas'				=> $this->input->post('kelas'),
					'alamat'			=> $this->input->post('alamat'),
					'ijazah_trakhir'	=> $this->input->post('ijazah'));
				$this->db->insert('dir_guru',$data);
				redirect('dashboard/guru');
	        }
		}else{
			$data['title'] = 'Direktori Guru';
			$this->template->load('admin/v_template','admin/v_guru_add',$data);
		}
	}

	function guru_edit($id){

		if(isset($_POST['simpan'])){
			if ($_FILES['gambar']['error'] <> 4) {

	            $config['upload_path'] = './upload/photo';
	            $config['allowed_types'] = 'jpg|png|gif|bmp';
	            $this->load->library('upload', $config);
	 
	            if (!$this->upload->do_upload('gambar')) {
	                $error = array('error' => $this->upload->display_errors());
	                $this->index($error);
	            } else {
	                $hasil 	= $this->upload->data();
					$data = array(
						'nip'				=> $this->input->post('nis'),
						'nama'				=> $this->input->post('nama'),
						'golongan'			=> $this->input->post('golongan'),
						'jk'				=> $this->input->post('jk'),
						'agama'				=> $this->input->post('agama'),
						'bidang_studi'		=> $this->input->post('bidangstudi'),
						'kelas'				=> $this->input->post('kelas'),
						'alamat'			=> $this->input->post('alamat'),
						'ijazah_trakhir'	=> $this->input->post('ijazah'),
						'photo'				=> $hasil['file_name']);
					$this->db->where('id',$this->input->post('id'));
					$this->db->update('dir_guru',$data);
					redirect('dashboard/guru');
		        }
	        } else {
				$data = array(
					'nip'				=> $this->input->post('nis'),
					'nama'				=> $this->input->post('nama'),
					'golongan'			=> $this->input->post('golongan'),
					'jk'				=> $this->input->post('jk'),
					'agama'				=> $this->input->post('agama'),
					'bidang_studi'		=> $this->input->post('bidangstudi'),
					'kelas'				=> $this->input->post('kelas'),
					'alamat'			=> $this->input->post('alamat'),
					'ijazah_trakhir'	=> $this->input->post('ijazah'));
				$this->db->where('id',$this->input->post('id'));
				$this->db->update('dir_guru',$data);
				redirect('dashboard/guru');
	        }
		}else{
			$data['title'] = 'Direktori Guru';
			$data['record'] = $this->db->get_where('dir_guru',array('id'=>$id))->row_array();
			$this->template->load('admin/v_template','admin/v_guru_edit',$data);
		}
	}

	function guru_hapus($id){
		
		$this->db->where('id',$id);
	    $query = $this->db->get('dir_guru');
	    $row = $query->row();

	    unlink("./upload/photo/$row->photo");

	    $this->db->delete('dir_guru', array('id' => $id));
		redirect('dashboard/guru/');
	}


	// PROSESS DATA STAF

	function staf(){
		$data['record'] = $this->db->get('dir_staf');
		$this->template->load('admin/v_template','admin/v_staf',$data);
	}

	function tambahdatastaf(){
		if(isset($_POST['simpan'])){
			$data = array(
				'nip'				=> $this->input->post('nis'),
				'nama'				=> $this->input->post('nama'),
				'golongan'			=> $this->input->post('golongan'),
				'jk'				=> $this->input->post('jk'),
				'agama'				=> $this->input->post('agama'),
				'bidang_studi'		=> $this->input->post('bidangstudi'),
				'kelas'				=> $this->input->post('kelas'),
				'alamat'			=> $this->input->post('alamat'),
				'ijazah_trakhir'	=> $this->input->post('ijazah'));
			$this->db->insert('dir_staf',$data);
			redirect('dashboard/staf');
		}else{
			$data['title'] = 'Modul Data Staf';
			$this->template->load('admin/v_template','admin/v_staf_add',$data);
		}
	}

	function staf_edit($id){
		if(isset($_POST['simpan'])){
			$data = array(
				'nip'				=> $this->input->post('nis'),
				'nama'				=> $this->input->post('nama'),
				'golongan'			=> $this->input->post('golongan'),
				'jk'				=> $this->input->post('jk'),
				'agama'				=> $this->input->post('agama'),
				'bidang_studi'		=> $this->input->post('bidangstudi'),
				'kelas'				=> $this->input->post('kelas'),
				'alamat'			=> $this->input->post('alamat'),
				'ijazah_trakhir'	=> $this->input->post('ijazah'));
			$this->db->where('id',$this->input->post('id'));
			$this->db->update('dir_staf',$data);
			redirect('dashboard/staf');
		}else{
			$data['title'] = 'Modul Data Staf';
			$data['record'] = $this->db->get_where('dir_staf',array('id'=>$id))->row_array();
			$this->template->load('admin/v_template','admin/v_staf_edit',$data);
		}
	}

	function staf_hapus($id){
		$this->db->delete('dir_staf',array('id'=>$id));
		redirect('dashboard/staf');
	}

	// PROSESS DATA SISWA

	function siswa(){
		$data['title'] = 'Modul Data Siswa';
		$data['record'] = $this->db->get('dir_siswa');
		$this->template->load('admin/v_template','admin/v_siswa',$data);
	}

	function siswa_add(){
		if(isset($_POST['simpan'])){
			$data = array(
				'nis'				=> $this->input->post('nis'),
				'nama'				=> $this->input->post('nama'),
				'jk'				=> $this->input->post('jk'),
				'agama'				=> $this->input->post('agama'),
				'alamat'			=> $this->input->post('alamat'),
				'ttl'				=> $this->input->post('ttl'),
				'kelas'				=> $this->input->post('kelas'));
			$this->db->insert('dir_siswa',$data);
			redirect('dashboard/siswa');
		}else{
			$data['title'] = 'Modul Data Siswa';
			$this->template->load('admin/v_template','admin/v_siswa_add',$data);
		}
	}

	function siswa_edit($id){
		if(isset($_POST['simpan'])){
			$data = array(
				'nis'				=> $this->input->post('nis'),
				'nama'				=> $this->input->post('nama'),
				'jk'				=> $this->input->post('jk'),
				'agama'				=> $this->input->post('agama'),
				'alamat'			=> $this->input->post('alamat'),
				'ttl'				=> $this->input->post('ttl'),
				'kelas'				=> $this->input->post('kelas'));
			$this->db->where('id',$this->input->post('id'));
			$this->db->update('dir_siswa',$data);
			redirect('dashboard/siswa');
		}else{
			$data['title'] = 'Modul Data Siswa';
			$data['record']=$this->db->get_where('dir_siswa',array('id'=>$id))->row_array();
			$this->template->load('admin/v_template','admin/v_siswa_edit',$data);
		}
	}

	function siswa_hapus($id){
		$this->db->delete('dir_siswa',array('id'=>$id));
		redirect('dashboard/siswa');
	}

	// PROSESS DATA ALUMNI

	function alumni(){
		$data['title'] = 'Modul Data Alumni';
		$data['record'] = $this->db->get('dir_alumni');
		$this->template->load('admin/v_template','admin/v_alumni',$data);
	}

	function alumni_add(){
		if(isset($_POST['simpan'])){
			$data = array(
				'nis'				=> $this->input->post('nis'),
				'nama'				=> $this->input->post('nama'),
				'jk'				=> $this->input->post('jk'),
				'agama'				=> $this->input->post('agama'),
				'alamat'			=> $this->input->post('alamat'),
				'ttl'				=> $this->input->post('ttl'),
				'angkatan'			=> $this->input->post('angkatan'));
			$this->db->insert('dir_alumni',$data);
			redirect('dashboard/alumni');
		}else{
			$data['title'] = 'Modul Data Alumni';
			$this->template->load('admin/v_template','admin/v_alumni_add',$data);
		}
	}

	function alumni_edit($id){
		if(isset($_POST['simpan'])){
			$data = array(
				'nis'				=> $this->input->post('nis'),
				'nama'				=> $this->input->post('nama'),
				'jk'				=> $this->input->post('jk'),
				'agama'				=> $this->input->post('agama'),
				'alamat'			=> $this->input->post('alamat'),
				'ttl'				=> $this->input->post('ttl'),
				'angkatan'			=> $this->input->post('angkatan'));
			$this->db->where('id',$this->input->post('id'));
			$this->db->update('dir_alumni',$data);
			redirect('dashboard/alumni');
		}else{
			$data['title'] = 'Modul Data Alumni';
			$data['record']=$this->db->get_where('dir_alumni',array('id'=>$id))->row_array();
			$this->template->load('admin/v_template','admin/v_alumni_edit',$data);
		}
	}

	function alumni_hapus($id){
		$this->db->delete('dir_alumni',array('id'=>$id));
		redirect('dashboard/alumni');
	}

	// PROSESS DATA FORUM

	function forum(){
		$data['record'] = $this->db->get('forum');
		$this->template->load('admin/v_template','admin/v_forum',$data);
	}

	function forum_detail($id){
		if(isset($_POST['simpan'])){
			$data = array(
				'id_forum' 	=> $this->input->post('id'),
				'komen' 	=> $this->input->post('komen'),
				'oleh' 		=> 'Administrator');
			$this->db->insert('forum_komen',$data);
			redirect('dashboard/forum_detail/'.$this->input->post('id'));
		}else{
			$data['forum'] = $this->db->get_where('forum',array('id'=>$id))->row_array();
			$data['komen'] = $this->db->get_where('forum_komen',array('id_forum'=>$id));
			$this->template->load('admin/v_template','admin/v_forum_detail',$data);
		}
	}

	function forum_hapus($id){
		$this->db->delete('forum',array('id'=>$id));
		redirect('dashboard/forum');
	}

	function komenhapus(){
		$id = $this->uri->segment(4);
		$id_forum = $this->uri->segment(3);
		$this->db->delete('forum_komen',array('id'=>$id));
		redirect('dashboard/forum_detail/'.$id_forum);
	}

	// PROSESS DATA GALLERY

	function gallery(){
		if(isset($_POST['upload'])){
				$this->load->library('upload');

	            $config['upload_path'] = './upload/gallery';
	            $config['allowed_types'] = 'jpg|png|gif|bmp';
	            $this->upload->initialize($config);
	 
	            if (!$this->upload->do_upload('gambar')) {
	                $error = array('error' => $this->upload->display_errors());
	                $this->index($error);
	            } else {
	                $hasil 	= $this->upload->data();
					$data = array(
						'nama'		=> $this->input->post('nama'),
						'gambar'	=> $hasil['file_name'],
						'embed'		=> $this->input->post('embed')
						);
					// $this->db->where('id',$this->input->post('id',true));
					$this->db->insert('gallery',$data);
					redirect('dashboard/gallery');
		        }
	         
		}else{
			$data['gallery']=$this->db->get('gallery');
			$this->template->load('admin/v_template','admin/v_gallery',$data);
		}
	}

	function galleryhapus($id){
		$this->db->where('id',$id);
	    $query = $this->db->get('gallery');
	    $row = $query->row();

	    unlink("./upload/gallery/".$row->gambar);

	    $this->db->delete('gallery', array('id' => $id));
		redirect('dashboard/gallery');
	}

	// PROSESS DATA BANNER

	function banner(){
		if(isset($_POST['simpan'])){
			$config['upload_path'] 		= './assets/images';
			$config['allowed_types'] 	= 'jpg|jpeg|png|gif';

			$this->load->library('upload',$config);
			$this->upload->do_upload();
			$hasil 	= $this->upload->data();
			$data	= array(
				'judul'		=> $this->input->post('judul'),
				'link'		=> $this->input->post('url'),
				'gambar'	=> $hasil['file_name']
				);
			$this->db->insert('banner',$data);
			redirect('dashboard/banner');
		}else{
			$data['title'] = 'Banner';
			$data['record']=$this->db->get('banner')->result();
			$this->template->load('admin/v_template','admin/v_banner',$data);
		}
	}

	function banner_add(){
		$data['title'] = 'Banner';
		$this->template->load('admin/v_template','admin/v_banner_add',$data);
	}

	function banner_edit($id){
		if(isset($_POST['update'])){
			$data	= array(
				'judul'		=> $this->input->post('judul'),
				'url'		=> $this->input->post('url'),
				);
			$this->db->where('id',$this->input->post('id',true));
			$this->db->update('banner',$data);
			redirect('dashboard/banner');
		}else{
			$data['title'] = 'Banner';
			$data['record'] = $this->db->get_where('banner',array('id'=>$id))->row_array();
			$this->template->load('admin/template','admin/v_banner_edit',$data);
		}
	}

	function banner_hapus($id){
		$this->db->where('id',$id);
	    $query = $this->db->get('banner');
	    $row = $query->row();

	    unlink("./assets/images/$row->nama_file");

	    $this->db->delete('banner', array('id' => $id));
		redirect('dashboard/banner');
	}

	// PROSESS DATA HEADER

	function header(){
		$get = $this->db->query('SELECT * FROM gambar WHERE kategori = "header" GROUP BY id DESC LIMIT 1')->row_array();
		if(isset($_POST['upload'])){

			unlink('./assets/images/'.$get['gambar']);
			$config['upload_path'] 		= './assets/images';
			$config['allowed_types'] 	= 'jpg|jpeg|png|gif';

			$this->load->library('upload',$config);
			$this->upload->do_upload('userfile');
			$hasil 	= $this->upload->data();
			$data	= array(
				'gambar'	=> $hasil['file_name']
				);
			$this->db->where('kategori', 'header');
			$this->db->update('gambar',$data);
			redirect('dashboard/header');
		}else{
			$data['title'] = 'Background';
			$data['record'] = $get;
			$this->template->load('admin/v_template','admin/v_header',$data);
		}
	}

	// PROSESS DATA BACKGROUND

	function background(){
		$get = $this->db->query('SELECT * FROM gambar WHERE kategori = "background" GROUP BY id DESC LIMIT 1')->row_array();

		if(isset($_POST['upload'])){

			unlink('./assets/images/'.$get['gambar']);
			$config['upload_path'] 		= './assets/images';
			$config['allowed_types'] 	= 'jpg|jpeg|png|gif';

			$this->load->library('upload',$config);
			$this->upload->do_upload();
			$hasil 	= $this->upload->data();
			$data	= array(
				'kategori'	=> 'background',
				'gambar'	=> $hasil['file_name']
				);
			$this->db->where('kategori', 'background');
			$this->db->update('gambar',$data);
			redirect('dashboard/background');
		}else{
			$data['title'] = 'Background';
			$data['record'] = $get;
			$this->template->load('admin/v_template','admin/v_background',$data);
		}
	}

	// PROSESS DATA EXTERNAL LINK

	function external_link(){
		if(isset($_POST['simpan'])){
			$data = array(
				'judul' => $this->input->post('judul'),
				'url' => $this->input->post('url'),
				'target' => $this->input->post('target'),
				);
			$this->db->insert('external_link',$data);
			redirect('dashboard/external_link');
		}else{
			$data['title'] = 'External Link';
			$data['record'] = $this->db->get('external_link');
			$this->template->load('admin/v_template','admin/v_external_link',$data);
		}
	}

	function external_link_hapus($id){
		$this->db->where('id',$id);
		$this->db->delete('external_link');
		redirect('dashboard/external_link');
	}

	function prog_keahlian()
	{
		$data = array(
						"title" => "Program Keahlian",
						"get_keahlian" => $this->db->get('jurusan')->result()
					);
		$this->template->load('admin/v_template', 'admin/v_jurusan', $data);
	}

	function add_prog_keahlian()
	{
		if (isset($_POST['simpan'])) 
		{
			$record = array(
								"id" => '',
								'nama' => $this->input->post('nama'),
								'isi' => $this->input->post('isi'),
								'tgl_update' => date('Y-m-d H:i:s')
							);
			$insert = $this->db->insert('jurusan', $record);

			if ($insert) 
			{
				$this->session->set_flashdata('info', '<div class="alert alert-success"><i class="fa fa-info"></i> Add Data Sukses</div>');
				redirect('dashboard/prog_keahlian', 'refresh');
			}else
			{
				$this->session->set_flashdata('info', '<div class="alert alert-danger"><i class="fa fa-info"></i> Add Data Gagal : '.$this->db->_error_message().'</div>');
			}
		}

		$data['title'] = "Tambah Program Keahlian";

		$this->template->load('admin/v_template', 'admin/v_jurusan_add', $data);
	}

	function edit_prog_keahlian($id)
	{
		$this->db->where('id', $id);
		$get = $this->db->get_where('jurusan')->row();
		if (isset($_POST['edit'])) 
		{
			$record = array(
								"nama" => $this->input->post('nama'),
								"isi" => $this->input->post('isi'),
								"tgl_update" => date('Y-m-d H:i:s')
							);
			$this->db->where('id', $id);
			$update = $this->db->update('jurusan', $record);

			if ($update) 
			{
				$this->session->set_flashdata('info', '<div class="alert alert-success"><i class="fa fa-info"></i> Edit Data Sukses</div>');
				redirect('dashboard/prog_keahlian', 'refresh');
			}else
			{
				$this->session->set_flashdata('info', '<div class="alert alert-danger"><i class="fa fa-info"></i> Edit Data Gagal : '.$this->db->_error_message().'</div>');
			}
		}

		$data['title'] = "Edit Program Keahlian";
		$data['view'] = $get;

		$this->template->load('admin/v_template', 'admin/v_jurusan_edit', $data);
	}

	function delete_prog_keahlian($id)
	{
		$this->db->where('id', $id);
		$delete = $this->db->delete('jurusan');

			if ($delete) 
			{
				$this->session->set_flashdata('info', '<div class="alert alert-success"><i class="fa fa-info"></i> Delete Data Sukses</div>');
				redirect('dashboard/prog_keahlian', 'refresh');
			}else
			{
				$this->session->set_flashdata('info', '<div class="alert alert-danger"><i class="fa fa-info"></i> Delete Data Gagal : '.$this->db->_error_message().'</div>');
				redirect('dashboard/prog_keahlian','refresh');
			}
	}
}
