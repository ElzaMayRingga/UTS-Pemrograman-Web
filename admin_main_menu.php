<!DOCTYPE html PUBLIC>
<html xmlns>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="includes/main.css" type="text/css" />
<title>Main Menu</title>
<body style="background-image: url(images/pastel2.jpg); background-repeat: repeat-x;">
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
</head>

<body>

<div id="top">
	<div id="inner_top">
			<img src="images/tts1.png"/>
      <hr size="7 px" color="black" />
	</div>
</div>

<div id="line">
</div>

<style >
	.mainmenubtn {
		background-color: black;
		color: white;
		border: none;
		padding: 20px;
		margin-top: 20px;
	}
	.dropdown {
		position: relative;
		display: inline-block;
	}
	.dropdown-child {
		display: none;
		background-color: white;
		min-width: 200px;
	}
	.dropdown-clild a {
		color: white;
		padding: 20px;
		text-decoration: none;
		display: block;
	}
	.dropdown:hover .dropdown-child {
		display: block;
	}
</style>
<div class="dropdown">
	<button class="mainmenubtn"> Main Menu</button>
	<div class="dropdown-child">
		<h3><b><a href="f_view.php">Lihat Data Pengajar | </a></b>
		<b><a href="f_add.php">Tambah Data Pengajar | </a></b>
		<b><a href="f_delete.php">Hapus Data Pengajar | </a></b>
		<b><a href="f_edit.php">Edit Data Pengajar | </a></b>
		<b><a href="f_change_password.php">Ubah Password</a></b></h3>
	</div>
</div>
<div id="text">
	<center><p><h1>Hallo Admin!!</p></h1></center>
	<p><h3>Pada halaman "Pengajar", terdapat beberapa Menu yang bisa diakses, seperti: Lihat Data Pengajar, Tambah Data Pengajar, Hapus Data Pengajar, Edit Data Pengajar, dan Ubah Password. Untuk dapat mengakses menu tersebut, silahkan arahkan kursor pada "Main Menu" untuk memunculkan menu utama. </p></h3>
	<p><h2>Selamat Bekerja :)</h2></p>
</div>
</body>
</html>
