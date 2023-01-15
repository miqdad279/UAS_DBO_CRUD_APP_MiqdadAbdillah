
<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan-koperasi-simpin-syariah.xlsx"); 
?>
<p align="center" style="font-weight:bold;font-size:16pt">Laporan Koperasi Simpan Pinjam</p>
	<div class="table-responsive">
		<table border="1">
			<thead>
				<tr class="text-center">
					<th>No</th>
					<th>Kode Peminjaman</th>
					<th>Nama Lengkap</th>
					<th>Tanggal Peminjaman</th>
					<th>Besar Pinjaman</th>
					<th>Lama Angsuran</th>
					<th>Status</th>
				</tr>
			</thead>
			<?php
				require 'config.php';
				$koperasi = $collection->find();
				foreach ($koperasi as $rest) {
				echo "<tr class='text-center'";
				echo "<td>".$rest->no."</td>";
				echo "<td>".$rest->kode_peminjaman."</td>";
				echo "<td>".$rest->nama_lengkap."</td>";
				echo "<td>".$rest->tgl_peminjaman."</td>";
				echo "<td>".$rest->besar_peminjaman."</td>";
				echo "<td>".$rest->lama_angsuran."</td>";
				echo "<td>".$rest->status."</td>";
				echo "</tr>";
				}
			?>
		</table>
	</div>