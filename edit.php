<?php session_start();
  require 'config.php';
    if (isset($_GET['id'])) {
      $rest = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
    }
   if(isset($_POST['submit'])){
      $collection->updateOne(
        ['_id' => new MongoDB\BSON\objectID($_GET['id'])],
        ['$set' => [
          'no' => $_POST['no'], 
          'id_anggota' => $_POST['id_anggota'], 
          'nama_lengkap' => $_POST['nama_lengkap'],
          'tgl_peminjaman' => $_POST['tgl_peminjaman'],
          'tgl_tempo' => $_POST['tgl_tempo'],
          'besar_pinjaman' => $_POST['besar_pinjaman'],
          'lama_angsuran' => $_POST['lama_angsuran'],
          'status' => $_POST['status'],
        ]
        ]
      );
      echo  "<script> 
              alert('Data Pesanan berhasil diupdate!');
              document.location.href = 'index.php';
            </script>";
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>Miqdad Abdillah</title>
</head>

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
                    <h3 class="text-center">Tambahkan Data Nasabah</h3>
                    <br/>
                </div>
            </div>
            
      <form method="POST">
        <table class="table table-hover">
          <div class="container2">
            <tr>
              <td for="no">N0</td>
              <td><input type="text" class="form-control" name="no" required="required" placeholder="1 - 100" value="<?php echo "$rest->no"; ?>"></td>
            </tr>
             
            <tr>
              <td for="id_anggota">ID Anggota</td>
              <td><input type="text" class="form-control" name="id_anggota" required="required" placeholder="P01" value="<?php echo "$rest->id_anggota"; ?>"></td>
            </tr>
             
             <tr>
              <td for="nama_lengkap">Nama Lengkap</td>
              <td><input type="text" class="form-control" name="nama_lengkap" required="required" placeholder="Nama Lengkap Nasabah" value="<?php echo "$rest->nama_lengkap"; ?>"></td>
            </tr>
             
            <tr>
              <td for="tgl_peminjaman">Tanggal Peminjaman</td>
              <td><input type="text" class="form-control" name="tgl_peminjaman" required="required" placeholder="1 Januari 2023" value="<?php echo "$rest->tgl_peminjaman"; ?>"></td>
            </tr>

            <tr>
              <td for="tgl_peminjaman">Tanggal Tempo</td>
              <td><input type="text" class="form-control" name="tgl_tempo" required="required" placeholder="Desember 2023" value="<?php echo "$rest->tgl_tempo"; ?>"></td>
            </tr>

            <tr>
              <td for="besar_peminjaman">Besar Peminjaman</td>
              <td><input type="text" class="form-control" name="besar_pinjaman" required="required" placeholder="1000000" value="<?php echo "$rest->besar_pinjaman"; ?>"></td>
            </tr>
             
            <tr>
              <td for="lama_angsuran">Lama Angsuran</td>
              <td><input type="text" class="form-control" name="lama_angsuran" required="required" placeholder="12 Bulan" value="<?php echo "$rest->lama_angsuran"; ?>"></td>
            </tr>

            <tr>
              <td for="status">Status</td>
              <td>
                <div class="form-group">
                    <select class="form-control" name="status" required="required" value="<?php echo "$rest->status"; ?>">
                        <option>Belum Lunas</option>
                        <option>Lunas</option>
                    </select>
                </div>
              </td>
            </tr>
          </div>
        </table> 
        <div align="right">
          <button type="submit" name="submit" class="btn btn-success" style="font-family: Tekton Pro"> Submit </button>
          <a href="index.php" class="btn btn-danger" style="font-family: Tekton Pro"> Cancel </a>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>