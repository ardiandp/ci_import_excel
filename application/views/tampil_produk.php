<!DOCTYPE html>
<html>
<head>
	<title>Tampil Produk</title>
</head>
<body> <h2><?php echo $judul ?> </h2>
	<a href="<?php echo base_url('produk/input')?>">Input Produk</a>
	<table border="2">
		<tr>
			<td>No</td>
			<td>Kode Produk</td>
			<td>Nama Produk</td>
			<td>Harga</td>
			<td>Stok</td>
			<td>Aksi</td>
		</tr>
		
		<?php $no=1;foreach ($produk as $key => $value) { ?>			
			
		<tr>
			<td><?php echo $no?></td>
			<td><?php echo $value->kode_produk ?></td>
			<td><?php echo $value->nama_produk ?></td>
			<td><?php echo $value->harga ?></td>
			<td><?php echo $value->stok ?></td>
			<td><a href="<?php echo base_url('produk/hapus/'.$value->kode_produk)?>">Hapus</a> </td>
		</tr>
		<?php $no++; } ?>
	</table>

</body>
</html>