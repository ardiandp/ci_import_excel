<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bca extends CI_Model {

	public function view()
	{
		return $this->db->get('bca')->result();
	}

	public function upload_file($filename)
	{
		$this->load->library('upload');
		$config['upload_path'] = './excel/';
		$config['allowed_types'] = 'xlsx';
		$config['max_size']  = '2048';
		$config['overwrite'] = true;
		$config['file_name'] = $filename;

		$this->upload->initialize($config);
		if($this->upload->do_upload('file'))
		{
			$return =array('result' => 'success','file' => $this->upload->data(), 'error' => '');
			return $return;
		}
		else
		{
			$return = array ('result' => 'failed','file' => '', 'error' =>$this->upload->display_errors());
			return $return;
		}		
		
	}

	public function insert_multiple($data)
	{
		$this->db->insert_batch('bca', $data);
	}

	

}

/* End of file M_bca.php */
/* Location: ./application/models/M_bca.php */