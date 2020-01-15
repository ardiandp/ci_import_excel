<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_produk extends CI_Model {

	public function tampil()
	{
		return $this->db->get('produk');
	}

	

}

/* End of file Model_produk.php */
/* Location: ./application/models/Model_produk.php */