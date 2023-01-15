<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>Miqdad Abdillah</title>
</head>
<body>

<style>
    body {
        background-color: #F6FDF7;
    }
	.bl{
		padding: 10px;
	}
	.container{
		width: 100%;
		margin-top: 2%;
		padding: 5%;
        background-color: white;
	}
	table {
		font-family: Tekton Pro;
		text-align: center;
	}
	h3 {
		font-family: Cheeky Rabbit;
		font-weight: bold;
		color: #34364A;
		font-size: 40px;
	}
</style>
<body>
	<div class="container col-md-8">
	<div class="row justify-content-center">
		<div class="col">
            <div class="row" style="text-align: center;">
                <div class="col">
                    <img src="loan.png" width="150" class="mb-5">
                    <h3 class="text-center">Koperasi SIMPIN Syariah</h3>
                    <br/>
                </div>
            </div>

            <a href="create.php" class="btn btn-success bi bi-plus mb-3" style="font-family: Tekton Pro"> Tambah Data Nasabah </a>
            <input type="button" class="btn btn-success mb-3" value="Buat Laporan" onclick="window.open('laporan-excel.php')">

			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr class="text-center" style="background-color: #198754; color: white">
							<th>No</th>
							<th>ID Anggota</th>
							<th>Nama Lengkap</th>
							<th>Tanggal Peminjaman</th>
							<th>Tanggal Tempo</th>
							<th>Besar Pinjaman</th>
							<th>Lama Angsuran</th>
							<th>Status</th>
							<th colspan="2">Action</th>
						</tr>
					</thead>
					<?php
					    require 'config.php';
					    $koperasi = $collection->find();
					    foreach ($koperasi as $rest) {
                        echo "<tr class='text-center'";
                        echo "<td>";
					    echo "<td>".$rest->no."</td>";
					    echo "<td>".$rest->id_anggota."</td>";
					    echo "<td>".$rest->nama_lengkap."</td>";
					    echo "<td>".$rest->tgl_peminjaman."</td>";
					    echo "<td>".$rest->tgl_tempo."</td>";
					    echo "<td>".$rest->besar_pinjaman."</td>";
					    echo "<td>".$rest->lama_angsuran."</td>";
					    echo "<td>".$rest->status."</td>";
					    echo "<td>";
					    echo "<a href ='edit.php?id=".$rest->_id."'class='btn btn-warning' onclick = 'return confirm('Yakin Data Akan DiUpdate ?');''> Update </a>";
					  	echo "</td>";
					    echo "<td>";
					    echo "<a href ='delete.php?id=".$rest->_id."'class='btn btn-danger' onclick = 'return confirm('Yakin Data Akan Dihapus ?');''> Delete </a>";
					  	echo "</td>";
					    echo "</tr>";
					    }
				    ?>
				</table>
			</div>
		</div>
	</div>
</div>
</body>
</html>