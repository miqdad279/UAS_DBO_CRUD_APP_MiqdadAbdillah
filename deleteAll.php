<?php session_start();
   require 'config.php';
   if (isset($_GET['id'])) {
      $rest = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
   }
   if(isset($_POST['submit'])){
   $mongo = new MongoDB\Driver\Manager("mongodb://localhost:27017");
   $command = new MongoDB\Driver\Command(["drop" => "koperasi"]);
   $mongo->executeCommand("UAS_MiqdadAbdillah", $command);
   echo  "<script> 
            alert('Semua Data Peminjaman berhasil dihapus!');
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
            <div class="row" style="text-align: center;">
               <div class="col">
                  <img src="remove.png" width="80" class="mb-5">
                  <h3 class="text-center mb-4">Delete Semua Data Peminjaman</h3>
                  <h5 class="mb-4"> Apakah anda yakin akan menghapus semua data ? </h5>
               </div>
            </div>
         </div>
         <form method="POST">
            <div class="form-group mb-3" align="center">
               <button type="submit" name="submit" class="btn btn-danger"> Delete </button>
               <a href="index.php" class="btn btn-success"> Cancel </a>
            </div>
         </form>
      </div>
   </div>
</body>
</html>