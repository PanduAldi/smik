<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Controller {

	function index()
	{
	
	}

	function muncul($id)
	{
		$ex = explode("_", $id);
		$id_jur = $ex[0];

		$data = array(
					'title'=> str_replace("-", " ", $ex[1]),
					'informasi' => $this->db->query('SELECT * FROM content WHERE kategori = "informasi" GROUP BY id DESC LIMIT 3'),
					'gallery' 	=> $this->db->query('SELECT * FROM gallery GROUP BY id DESC LIMIT 1')->row_array(),
					'record' 	=> $this->db->query("SELECT * FROM jurusan WHERE id='$id_jur'")->row_array(),
					'banner' 	=> $this->db->get('banner')
				);

		$this->template->load('main/v_template','main/v_jurusan',$data);
	}

}

/* End of file  Program.php */
/* Location: ./application/controllers/ Program.php */