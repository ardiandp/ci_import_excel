<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_produk');
	}

	public function index()
	{
		$data['judul']="Tampil Produk";
		$data['produk']=$this->Model_produk->tampil()->result();
		$this->load->view('tampil_produk', $data, FALSE);
		
	}

	public function input()
	{
		$data['judul']="Tambah Produk";
		$this->load->view('input_produk', $data, FALSE);

	}

}

/* End of file Produk.php */
/* Location: ./application/controllers/Produk.php */