<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bca extends CI_Controller {
	private $filename = "import_data"; //nama file

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_bca');
	}

	public function index()
	{
		$data['bca'] = $this->M_bca->view();
		$this->load->view('view_bca', $data, FALSE);		
	}

	public function form()
	{
		$data= array();
		if(isset($_POST['preview']))
		{
			$upload = $this->M_bca->upload_file($this->filename);

			if($upload['result'] == "success")
			{
				include APPPATH.'third_party/PHPExcel/PHPExcel.php';
				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
				
				// Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
				// Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
				$data['sheet'] = $sheet; 
				}else
				{
					$data['upload_error'] = $upload['error'];
				}

			}
		
		$this->load->view('bca_form', $data, FALSE);
	}

	public function import()
	{
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
		
		// Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
		$data = array();

		$numrow = 1;
		foreach ($sheet as $row) {
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1)
			{
				array_push($data, array(
					'tanggal'=>$row['A'],
					'keterangan'=>$row['B'],
					'cabang'=>$row['C'],
					'jumlah'=>$row['D'],
					'status'=>$row['E'],
					'saldo'=>$row['F'],
				));
			}
			$numrow++;
		}

		$this->M_bca->insert_multiple($data);
		redirect('bca','refresh');

	}

}

/* End of file Bca.php */
/* Location: ./application/controllers/Bca.php */