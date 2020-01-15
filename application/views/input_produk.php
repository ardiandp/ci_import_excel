<!DOCTYPE html>
<html>
<head>
	<title>Input Produk</title>
</head>
<body>
	<a href="<?php echo base_url('produk')?>">tampil</a>
<table border="2">
	<tr><td>Kode Produk</td><td><input type="text" name="kode_produk"></td></tr>
	<tr><td>Nama Produk</td><td><input type="text" name="nama_produk"></td></tr>
	<tr><td>Harga</td><td><input type="text" name="harga"></td></tr>
	<tr><td>Stok</td><td><input type="text" name="stok"></td></tr>
	<tr><td><input type="submit" name="simpan" value="Simpan"></td>
		<td><input type="reset" name="batal" value="Batal"></td></tr>
</table>
</body>
</html>