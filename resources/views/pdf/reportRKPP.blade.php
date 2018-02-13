<?php
// Tentukan path yang tepat ke mPDF
$nama_dokumen='REPORT RKPP'; //Beri nama file PDF hasil.
//define('_MPDF_PATH','MPDF57/'); // Tentukan folder dimana anda menyimpan folder mpdf
// Arahkan ke file mpdf.php didalam folder mpdf
$mpdf	=	new mPDF('utf-8', 'F4-L',10.5, 'arial'); // Membuat file mpdf baru

//Memulai proses untuk menyimpan variabel php dan html
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php ini_set('max_execution_time', 300); ?>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>PDF</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<style>
		html {
			/* font-family: sans-serif; */
		}

		/* table.table-laporan {
			border-collapse: collapse;
			color: #444;
			border: 1px solid #000;
		} */

		thead tr th {
			text-align:center;

		}

		h3 {
			font-weight: bold;
			text-align:center;
		}

		table tr th{
			font-size: 14px;
			background: #35A9DB;
			color: #fff;
			font-weight: normal;
		}


		.table-responsive-md tr td {
			text-align: center;
			border-collapse: collapse;
			font-size: 14px;
		}

		.lampiran tr td {
			font-size: 12px;

		}

		hr {
			margin-top: 1px;
		}
	</style>

</head>
<body>
<div class="main-laporan page-break">
	<?php foreach($laporan as $desa => $des): ?>
	<?php foreach($des as $kecamatan => $kec): ?>
	<?php $subtotalArray = [0]; ?>
	<h3>
		RENCANA KERJA PEMERINTAH DESA<br>
		TAHUN 2018
	</h3>
	<hr>
	<table class="lampiran">
		<tr>
			<td>DESA</td>
			<td>:</td>
			<td><?php echo $desa; ?></td>
		</tr>
		<tr>
			<td>KECAMATAN</td>
			<td>:</td>
			<td><?php echo $kecamatan; ?></td>
		</tr>
		<tr>
			<td>KABUPATEN/KOTA</td>
			<td>:</td>
			<td>KABUPATEN BATANG</td>
		</tr>
		<tr>
			<td>PROVINSI</td>
			<td>:</td>
			<td>PROVINSI JAWA TENGAH</td>
		</tr>
	</table>
	<div class="table-responsive-md">
		<table class="table table-bordered table-dark">
			<thead>
			<tr>
				<th rowspan="2">NO</th>
				<th colspan="2">JENIS BIDANG</th>
				<th rowspan="2">
					LOKASI
					(RT/RW
					DUSUN)
				</th>
				<th rowspan="2">
					PERKIRAAN VOLUME
				</th>
				<th rowspan="2">
					SASARAN / MANFAAT
				</th>
				<th rowspan="2">
					WAKTU PELAKSANAAN
				</th>
				<th colspan="2">
					PERKIRAAN BIAYA & SMBER
				</th>
				<th colspan="3">
					POLA PELAKSANAAN
				</th>
				<th rowspan="2">
					RENCANA PELAKSANAAN
				</th>
			</tr>
			<tr>
				<th>BIDANG/SUB BIDANG</th>
				<th>JENIS KEGIATAN</th>
				<th>
					JUMLAH
					(RUPIAH)
				</th>
				<th>SUMBER</th>
				<th>SWA KELOLA</th>
				<th>KERJASAMA</th>
				<th>PIHAK KETIGA</th>
			</tr>
			<tr>
				<th>1</th>
				<th>2</th>
				<th>3</th>
				<th>4</th>
				<th>5</th>
				<th>6</th>
				<th>7</th>
				<th>8</th>
				<th>9</th>
				<th>10</th>
				<th>11</th>
				<th>12</th>
				<th>13</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($kec as $key => $value): ?>
		<?php foreach($value as $bidang => $value): ?>
			<?php $rowspan = count($value) + 1; ?>
			<tr>
				<!-- Dummy Sample Laporan -->
				<!-- Rowspan di isi sesuai jumlah count data +1  jika data ada 6 maka rowspan akan otomatis jadi 6+1-->
				<td rowspan="<?php echo $rowspan ?>">{{ $key }}</td>
				<td rowspan="<?php echo $rowspan ?>">{{ $bidang }}</td>
			</tr>
			<?php $subtotal = 0; ?>
			<?php foreach($value as $data => $value): ?>
			<?php $subtotal += $value['biaya']; ?>
			<tr>
				<td><?php echo $value['nama_kegiatan']; ?></td>
				<td><?php echo $value['lokasi']; ?></td>
				<td><?php echo $value['Perkiraan_Volum']; ?></td>
				<td><?php echo $value['sasaran']; ?></td>
				<td><?php echo $value['waktu']; ?></td>
				<td><?php echo $value['biaya']; ?></td>
				<td><?php echo $value['kd_sumber']; ?></td>
				<td><?php echo $value['swakelola']; ?></td>
				<td><?php echo $value['kerjasama']; ?></td>
				<td><?php echo $value['pihak_ketiga']; ?></td>
				<td><?php echo $value['pelaksana']; ?></td>
			</tr>
			<?php endforeach; ?>
			<tr>
				<td align="center" colspan="6">JUMLAH PER BIDANG</td>
				<td><?php echo $subtotalArray[] = $subtotal; ?></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<?php endforeach; ?>
			<?php endforeach; ?>
			<tr>
				<td align="center" colspan="6">JUMLAH TOTAL</td>
				<td><?php echo array_sum($subtotalArray); ?></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</tbody>
	</table>
	<?php endforeach; ?>
	<?php endforeach; ?>

<?php echo "<p align='right'>Batang, ".date('d-m-Y')."<br>KEPALA DESA KEPUH<br><br><br>( Ahmad Mubarok )</p>"; ?>
</div>

</body>
</html>
<?php

// $mpdf->setFooter('{PAGENO}');
//penulisan output selesai, sekarang menutup mpdf dan generate kedalam format pdf
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Disini dimulai proses convert UTF-8, kalau ingin ISO-8859-1 cukup dengan mengganti $mpdf->WriteHTML($html);

$mpdf->SetDisplayMode('fullpage');
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>
