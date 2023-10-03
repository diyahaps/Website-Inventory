<?php

session_start();

    if (!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }

require 'functions_sup.php';

//ambil data dari url
$ids=$_GET["ids"];

//query data siswa base nis
$sw=query("select * from supplier where ids=$ids")[0];

if(isset($_POST["ubah"])){
	//cek berhasil diubah/tidak
	if(ubah($_POST) > 0){
		echo "
			<script>
				alert('Data berhasil diubah!');
				document.location.href='supplier.php';
			</script>
		";
	}else{
		echo "
			<script>
				alert('Data gagal diubah!');
			</script>
		";
	}
}
?>

<!DOCTYPE html>
<html> 
	<head>
		<title>Ubah Data Supplier</title>
		<link rel="shortcut icon" href="logo1.png">
		<style type="text/css">
			*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

			body {
				background-image: url(bg.jpg);
    			background-repeat: no-repeat;
    			background-size: cover;
			}

			.body-w {
				height: 100vh;
    			width: 100%;
    			display: flex;
    			justify-content: center;
    			align-items: center;
				background-color: #177ca78a;
			}

			.container{
    max-width: 700px;
    width: 100%;
    background-color: #fff;
    padding: 25px 30px;
    border-radius: 5px;
    box-shadow: 0 5px 10px rgba(0,0,0,0.15);
  }

  			.container .title{
    font-size: 25px;
    font-weight: 500;
    position: relative;
  }
  .container .title::before{
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    height: 3px;
    width: 30px;
    border-radius: 5px;
    background: #177ca7;
  }

  			.content .user-details{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin: 20px 0 12px 0;
  }

  			.user-details .input-box{
    margin-bottom: 15px;
    width: calc(100% / 2 - 20px);
  }

  			.input-box label.details{
    display: block;
    font-weight: 500;
    margin-bottom: 5px;
  }

  			.user-details .input-box input{
    height: 45px;
    width: 100%;
    outline: none;
    font-size: 16px;
    border-radius: 5px;
    padding-left: 15px;
    border: 1px solid #ccc;
    border-bottom-width: 2px;
    transition: all 0.3s ease;
  }
  .user-details .input-box input:focus{
    border-color: #5fbae9;
  }

			label{
				display: block;
			}
			ul{
				list-style: none;
			}
			button{
				margin-top: 10px;
			}
			
			 .tamb-primary {
            display: inline-block;
            width: 625px;
            font-weight: 400;
            text-align: center;
            border: 1px solid transparent;
            padding: .375rem .75rem;
            font-size: 20px;
            line-height: 1.4;
            border-radius: .35rem;
            /*transition: all 0.5s ease;*/
            color: #fff;
            text-decoration: none;
            background-color: #56baed;
        }
        .tamb-primary:hover {
            background: #00BFFF;
            text-decoration: none;
            cursor: pointer;
        }
		</style>
	</head> 

	<body> 
	<div class="body-w">
<div class="container">
		<form method="POST" action="" enctype="multipart/form-data">

				<div class="title">Ubah Data Supplier</div>
				<div class="content">
			<ul>
				<div class="user-details">
				<div class="input-box">
				<li>
					<label for="ids">ID Supplier :</label>
					<input type="text" name="ids" id="ids" required value="<?= $sw["ids"]; ?>">
				</li>
				</div>
				<div class="input-box">
				<li>
					<label for="namasp">Supplier :</label>
					<input type="text" name="namasp" id="namasp" value="<?= $sw["namasp"]; ?>">
				</li>
			</div>
			<div class="input-box">
				<li>
					<label for="no_telp">No Telphone :</label>
					<input type="text" name="no_telp" id="no_telp" value="<?= $sw["no_telp"]; ?>">
				</li>
			</div>
				<div class="input-box">
				<li>
					<label for="alamat">Alamat :</label>
					<input type="text" name="alamat" id="alamat" value="<?= $sw["alamat"]; ?>">
				</li>
				</div>
				<li>
					<button type="submit" name="ubah" class="tamb-primary">Ubah</button>
				</li>
				</div>
			</ul>
			</div>
		</form> 
		</div>
		</div>
	</body> 
</html>