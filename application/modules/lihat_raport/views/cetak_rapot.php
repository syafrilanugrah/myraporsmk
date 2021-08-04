<!DOCTYPE html>
<html>
<head>
	<title>Cetak Raport</title>
	<style type="text/css">
		body {font-family: arial; font-size: 11pt; width: 8.5in}
		.table {border-collapse: collapse; border: solid 1px #999; width:100%}
		.table tr td, .table tr th {border:  solid 1px #000; padding: 3px;}
		.table tr th {font-weight: bold; text-align: center}
		.rgt {text-align: right;}
		.ctr {text-align: center;}
		.tbl {font-weight: bold}

		table tr td {vertical-align: middle;}
		.font_kecil {font-size: 12px}
	</style>
</head>
<body>
	<pre><?php //echo var_dump($wali_kelas); ?></pre>
	<table>
		<thead><!-- biar bisa ganti lembar otomatis --></thead>

		<tbody>
		<tr>
			<td width="20%">Nama Sekolah</td><td width="1%">:</td><td width="39%" class="tbl"><?php echo $this->config->item('nama_sekolah'); ?></td>	
		</tr>
		<tr>
			<td>Alamat Sekolah</td><td>:</td><td class="tbl"><?php echo $this->config->item('alamat_sekolah'); ?></td>
			
		</tr>
		<tr>
			<td>Nama Siswa</td><td>:</td><td class="tbl"><?php echo $det_siswa['nama']; ?></td>
			<td width="20%">Kelas</td><td width="1%">:</td><td width="19%" class="tbl"><?php echo strtoupper($wali_kelas['nama_kelas']); ?></td>
		</tr>
		<tr>
			<td>Bidang Keahlian</td><td>:</td><td class="tbl"><?php echo $this->config->item('bidang_keahlian'); ?></td>
			<td>Semester</td><td>:</td><td class="tbl"><?php echo $semester; ?></td>
		</tr>
		<tr>
			<td>Program Keahlian</td><td>:</td><td class="tbl"></td>
			<td>Tahun Pelajaran</td><td>:</td><td class="tbl"><?php echo $ta; ?></td>
		</tr>
		<tr>
			<td>NIS / NISN</td><td>:</td><td class="tbl"><?php echo $det_siswa['nis']." / ".$det_siswa['nisn']; ?></td>
			<td colspan="3"></td>
		</tr>
		
		<tr>

			<td colspan="6" style="text-align: center; font-weight: bold"><hr color="black"><p><h3>PENCAPAIAN HASIL BELAJAR</h3></p></td>
		</tr>
		<tr><td colspan="6"></td></tr>
		<tr><td colspan="6"><b>A. Sikap</b></td></tr>
		<tr><td colspan="6">
			<table style="border: solid 1px">
				<tr>
					<td><b>Deskripsi Sikap Spiritual</b></td>
				</tr>
				<tr>
					<td><?php echo $nilai_sikap_spiritual; ?></td>
					
				</tr>
				
				<tr>
					<td><b>Deskripsi Sikap Sosial</b></td>
				</tr>
				<tr>
					<td><?php echo $nilai_sikap_sosial; ?></td>

				</tr>
			</table>
		</td></tr>
		<tr><td colspan="6"><b>B. Pengetahuan dan Keterampilan</b></td></tr>
		<tr><td colspan="6">
			<table class="table">
				<thead>
				<tr>
					<th colspan="2" rowspan="2" width="30%">Mata Pelajaran</th>
					<th colspan="4">Pengetahuan</th>
					<th colspan="4">Keterampilan</th>
				</tr>
				<tr>
					<th width="5%">KKM</th>
					<th width="5%">Nilai</th>
					<th width="5%">Predikat</th>
					<th width="20%">Deskripsi</th>
					<th width="5%">KKM</th>
					<th width="5%">Nilai</th>
					<th width="5%">Predikat</th>
					<th width="20%">Deskripsi</th>
				</tr>
				
				</thead>
				<tbody>
				<?php echo $nilai_utama; ?>
				</tbody>
			</table>
		</td></tr>
		<tr><td colspan="6"><br><b>C. Ekstrakurikuler</b></td></tr>
		<tr><td colspan="6">
			<table class="table">
				<thead>
					<tr>
						<th width="5%">No</th>
						<th width="30%">Nama Kegiatan</th>
						<th width="10%">Nilai</th>
						<th width="55%">Keterangan</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					if (!empty($nilai_ekstra)) {
						$no = 1;
						foreach ($nilai_ekstra as $ne) {
							$desk = "";
							if ($ne['nilai'] == "A") {
								$desk = "Memuaskan, aktif mengikuti kegiatan ".$ne['nama']." mingguan";
							} else if ($ne['nilai'] == "B") {
								$desk = "Cukup Memuaskan, aktif mengikuti kegiatan ".$ne['nama']." mingguan";
							} else if ($ne['nilai'] == "C") {
								$desk = "Kurang Memuaskan, pasif mengikuti kegiatan ".$ne['nama']." mingguan";
							} else if ($ne['nilai'] == "D") {
								$desk = "Kurang Memuaskan, pasif mengikuti kegiatan ".$ne['nama']." mingguan";
							} else {
								$desk = "-";
							}
					?>
						<tr>
							<td class="ctr"><?php echo $no; ?></td>
							<td><?php echo $ne['nama']; ?></td>
							<td class="ctr"><?php echo $ne['nilai']; ?></td>
							<td><?php echo $desk; ?></td>
						</tr>
					<?php 
							$no++;
						}
					} else {
						echo '<tr><td colspan="4">-</td></tr>';
					}
					?>
				</tbody>
			</table>
		</td></tr>
		<tr><td colspan="6"><b>D. KETIDAKHADIRAN</b></td></tr>
		<tr>
			<td colspan="6">
				<table width="100%">
					<tr>
						<td width="40%">
							<table class="table" width="100%">
								<tr><td width="60%">Sakit</td><td width="40%" class="ctr"><?php echo $nilai_absensi['s']; ?> &nbsp; hari</td></tr>
								<tr><td>Izin</td><td class="ctr"><?php echo $nilai_absensi['i']; ?> &nbsp; hari</td></tr>
								<tr><td>Tanpa Keterangan</td><td class="ctr"><?php echo $nilai_absensi['a']; ?> &nbsp; hari</td></tr>
							</table>
						</td>
						<td width="60%">
						</td>
					</tr>
				</table>
			</td>
		</tr>

		<!-- <tr>
			<td colspan="6">
				<br><br>
				<table width="100%">
					<tr>
						<td width="5%"></td>
						<td width="20%">
							Mengetahui : <br>
							Orang Tua/Wali, <br>
							<br><br><br><br>
							<u>..........................</u>
						</td>
						<td width="10%"></td>
						<td width="30%">
							<br>
							Wali Kelas <br>
							<br><br><br><br>
							<u><b><?php echo $wali_kelas['nama_wali']; ?></b></u><br>
							NIP. <?php echo $wali_kelas['nip_wali']; ?>
						</td>
						<td width="10%"></td>
						<td width="30%">
							Sidoharjo, <?php echo $this->config->item('tgl_cetak'); ?><br>
							Kepala MTs Negeri Sidoharjo <br>
							<br><br><br><br>
							<u><b>Drs. Sukarlan</b></u><br>
							NIP. 19650422 200012 1 001
						</td>
					</tr>
				</table>

			</td>
		</tr> -->

		</tbody>
	</table>
</body>
</html>