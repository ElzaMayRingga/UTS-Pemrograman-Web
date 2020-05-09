<!DOCTYPE html PUBLIC>
<html xmlns>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="includes/main.css" type="text/css" />
<title>Lihat Data Pegajar</title>
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

<div class="row">
          <div class="col-lg-12">
            <center><h1><b>Data Pengajar</b></h1></center>
            <ol class="breadcrumb">
            </ol>
          </div>
        </div>

<div>
	<div class="row">
        	<div class="col-lg-12">
              <div class="table-respomsive">
                <table border = "1"; class="table table-bordered table-hover table-striped" id="datatables">
                  <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>No. Telp</th>
                    <th>Email</th>
                    <th>Username</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Elza May Ringga</td>
                    <td>Female</td>
                    <td>Tulangan, Sidoarjo, Jatim</td>
                    <td>12345</td>
                    <td>elza@gmail.com</td>
                    <td>elza</td>
                  </tr>
                  
<?php
				include "dbconnection.php";
				$query = "SELECT * FROM faculty";
				$result=  mysql_query($query,$con) or die();
				echo '<table border="1" id="mid">';
				echo '<tr><th>Name</th><th>Gender</th><th>Address</th><th>Contact No.</th><th>Email ID</th><th>User Name</th></tr>';
			while($row = mysql_fetch_array($result))
			{
			  echo '<tr><td>'.$row['name'] . " </td><td> " . $row['gender']. " </td><td> " . $row['address']. " </td><td> " . $row['contact_no']. " </td><td> " . $row['email_id']. " </td><td> " . $row['user_name'].'</td></tr>';
			}
			echo '</table>';
?>