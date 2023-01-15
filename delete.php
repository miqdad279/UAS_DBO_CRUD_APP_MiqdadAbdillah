<?php session_start();
   require 'config.php';
   if (isset($_GET['id'])) {
      $rest = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
   }
   if(isset($_POST['submit'])){
   require 'config.php';
   $collection->deleteOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
   echo  "<script> 
            alert('Data Pesanan berhasil dihapus!');
            document.location.href = 'index.php';
         </script>";
   }
?>
<!DOCTYPE html>
<html>
<head>
   <title>TOKO</title>
   <link rel="stylesheet" href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>
<!-- Style -->
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
    h3 {
		font-family: Cheeky Rabbit;
		font-weight: bold;
		color: #34364A;
		font-size: 40px;
	}
    h5{
    font-family: Tekton Pro;
    color: #34364A;
    text-align: center;
    font-size: 20px;
    }
</style>
<body>
   <div class="container col-md-8">
      <div class="row justify-content-center">
         <div class="col">
            <h3 class="text-center mb-4">Delete Data Peminjaman</h3>
            <h5 class="mb-4"> Apakah anda yakin akan menghapus data no <?php echo "$rest->no"; ?> dengan nama <?php echo "$rest->nama_lengkap"; ?> ? </h5>
         </div>
         <form method="POST">
            <div class="form-group mb-3" align="center">
               <button type="submit" name="submit" class="btn btn-danger"> Delete </button>
               <input type="hidden" value="<?php echo "$rest->id_anggota"; ?>" class="form-control" name="id_anggota">
               <a href="index.php" class="btn btn-success"> Cancel </a>
            </div>
         </form>
      </div>
   </div>
</body>
</html>