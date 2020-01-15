<!DOCTYPE html>
<html>
<head>
	<title>Input BCA</title>
	<script type="text/javascript" src="<?php echo base_url('js/jquery.min.js')?>"></script>
	<script>
		$(document).ready(function(){
			$("#kosong").hide();
		});
	</script>
</head>
<body>
	<h3>Form Inport</h3>
<a href="<?php echo base_url('excel/bca.xlsx')?>">Download Format </a><br>

<form method="post" action="<?php echo base_url('bca/form') ?>" entype="multipart/form-data">
	<input type="file" name="file">
	<input type="submit" name="preview" value="preview">
</form>

<?php
if(isset($_POS['preview']))
{
	if(isset($upload_error)){
	echo "<div style['color:red;'>".$upload_error."</div>";
	die;
}

echo "<form method='post' action='".base_url("siswa/import")."'>";
// Buat sebuah div untuk alert validasi kosong
		echo "<div style='color: red;' id='kosong'>
		Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
		</div>";

		echo "<table border='1' cellpadding='8'>
		<tr>
			<th colspan='5'>Preview Data</th>
		</tr>
		<tr>
		<th>Tanggal</th>
		<th>Keterangan</th>
		<th>Cabang</th>
		<th>Jumlah</th>
		<th>Status</th>
		<th>Saldo</th>
		</tr>";
		$numrow = 1;
		$kosong = 0;	

		foreach ($sheet as $row) {
				$tanggal = $row['A'];
				$keterangan = $row['B'];
				$cabang = $row['C'];
				$jumlah = $row['D'];
				$status = $row['E'];
				$saldo  = $row['F'];

			if($tanggal=="" && $Keterangan =="" && $jumlah =="")
				continue;

			if($numrow >1){
				$tanggal_td = ( ! empty($tanggal))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
				$keterangan_td = ( ! empty($keterangan))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
				$cabang_td = ( ! empty($cabang))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
				$jumlah_td = ( ! empty($jumlah))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
				$status_td = ( ! empty($status))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
				$saldo_td = ( ! empty($saldo))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah

			if($tanggal =="" or $keterangan =="" or $jumlah=="" or $cabang=="" or $status=="" or $saldo=="")
			{
				$kosong++;
			}

			echo "<tr>";
			echo "<td".$tanggal_td.">".$tanggal."</td>";
			echo "<td".$keterangan_td.">".$keterangan."</td>";
			echo "<td".$cabang_td.">".$cabang."</td>";
			echo "<td".$jumlah_td.">".$jumlah."</td>";
			echo "<td".$status_td.">".$status."</td>";
			echo "<td".$saldo_td.">".$saldo."</td>";
			echo "</tr>";
			}
			$numrow++;
			}
			echo "</table>";	


			if($kosong > 0){
				?>
				<script>
					$(document).ready(function)
					{
						$("jumlah_kosong").html('<?php echo $kosong; ?>');
						$("#kosong").show();
					});
				</script>
				<?php
			} else {
				echo "<hr>";
				echo "<button type='submit' name='import'>Import</button>";
				echo "<a href='".base_url('bca')."'>Cancel </a>";
			}
			echo "</form";
		} ?>
</body>
</html>