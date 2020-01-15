<!DOCTYPE html>
<html>
<head>
	<title>Data Bank</title>
</head>
<body>
	<h1>Data Bank</h1>
	<a href="<?php echo base_url('bca/form')?>">Import Data</a><br>

	<table border="1">
		<tr>
			<td>Tanggal</td>
			<td>Keterangan</td>
			<td>Cabang</td>
			<td>Jumlah</td>
			<td>Status</td>
			<td>Saldo</td>
		</tr>
	<?php 
	if(!empty($bca))
	{
		foreach ($bca as $key => $data) { ?>
			<tr>
				<td><?php echo $data->tanggal ?></td>
				<td><?php echo $data->keterangan ?></td>
				<td><?php echo $data->cabang ?></td>
				<td><?php echo $data->jumlah ?></td>
				<td><?php echo $data->status ?></td>
				<td><?php echo $data->saldo ?></td>
			</tr>
		<?php }
		} else {
			echo "<tr><td colspan='6'>Data Tidak Ada</td></tr>";
		} ?>
	
	</table>

</body>
</html>