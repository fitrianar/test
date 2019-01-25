<!DOCTYPE html>
<html>
<head>
	<title>Input Banyak Data Ke Database Dengan PHP | www.malasngoding.com</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>Input Banyak Data Ke Database Dengan PHP | www.malasngoding.com</h1>
	<h2>Data Makanan</h2>
	<table border="1">
		<tr>
			<th>No</th>
			<th>Jenis Hewan Peliharaan</th>
		</tr>
		<?php 
		include "database.php";
		$data = mysql_query("select * from JHP");
		$no = 1;
		while($d = mysql_fetch_array($data)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $d['JHP']; ?></td>		
		</tr>
		<?php } ?>
	</table>
	<br/>
	<h2>Input Banyak Data</h2>
	
	<form method="post" action="input.php">		
	<table>
		<tr>
			<td>
				<input type="checkbox" name="JHP[]" value="kucing">
			</td>
			<td>
				Kucing
			</td>
		</tr>
		<tr>
			<td>
				<input type="checkbox" name="JHP[]" value="anjing">
			</td>
			<td>
				Anjing
			</td>
		</tr>
		<tr>
			<td>
				<input type="checkbox" name="JHP[]" value="burung">
			</td>
			<td>
				Burung
			</td>
		</tr>
		<tr>
			<td>
				<input type="checkbox" name="JHP[]" value="ikan">
			</td>
			<td>
				Ikan
			</td>
		</tr>
		<tr>
			<td>				
			</td>
			<td>
				<input type="submit" value="Input">
			</td>
		</tr>
	</table>
	</form>
 
</body>
</html>

<?php 
include 'database.php';
$JHP = $_POST['JHP'];
$jumlah_dipilih = count($JHP);
 
for($x=0;$x<$jumlah_dipilih;$x++){
	mysql_query("INSERT INTO makanan values('','$JHP[$x]')");
}
 
header("location:index.php");
 
?>