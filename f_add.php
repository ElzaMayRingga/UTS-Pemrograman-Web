<!DOCTYPE html PUBLIC>
<html xmlns>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="includes/main.css" type="text/css" />
<title>Tambah Data Pengajar</title>
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

<div id="text">
	<center><h1><b>Tambah Data Pengajar</b></h1></center>
	<?php session_start();
		if(!empty($_SESSION['message']))
		echo $_SESSION['message'];
		$_SESSION['message'] = "";
	?>
	<form action="f_add.php" method="post">
	<table>
		<tr>
			<td>Nama : </td>
			<td><input type="text" name="name" size="30" /></td>
		</tr>
		<tr>
			<td>Jenis Kelamin : </td>
			<td>
				<input type="radio" name="gender" value="Laki-laki" checked="checked" /> Laki-laki
  				<input type="radio" name="gender" value="perempuan" /> Perempuan
			</td>
		</tr>
		<tr>
			<td>Alamat : </td>
			<td><input type="text" name="address" size="50" /></td>
		</tr>
		<tr>
			<td>No. Tlp : </td>
			<td><input type="text" name="contact_no" /></td>
		</tr>
		<tr>
			<td>Email : </td>
			<td><input type="text" name="email_id"/></td>
		</tr>
		<tr>
			<td>Username : </td>
			<td><input type="text" name="user_name" /></td>
		</tr>
		<tr>
			<td>Password : </td>
			<td><input type="password" name="password" /></td>
		</tr>
		<tr>
			<td>Konfirmasi Password : </td>
			<td><input type="password" name="confirm_password" /></td>
		</tr>
		<tr>
			<td colspan="3" align="center"><input type="submit" name="submit" value="Add">
			</td>
		</tr>
	</table>
	</form>
</div>

<?php
	include "dbconnection.php";
	if($_POST)
	{
		if(!empty($_POST['user_name']))
		{
			$query = "SELECT * FROM login";
			$result =  mysql_query($query,$con) or die();
			$f = 0;
			
			while($row = mysql_fetch_array($result))
			{
				if($row['user_name'] == $_POST['user_name'])
				{
					echo '<html><head><script type="text/javascript">alert("User Name already esist!!!");</script></head></html>';
					$f = 1;
					break;
				}
			}
			
			if($f == 0)
			{
				$fp = 0;
				if($_POST['password'] != $_POST['confirm_password'])
				{
					echo '<html><head><script type="text/javascript">alert("Password incorrect!!!");</script></head></html>';
					$fp = 1;
				}
				
				if($fp == 0)
				{
					$query = "INSERT INTO faculty VALUES ('$_POST[name]', '$_POST[gender]', '$_POST[address]', '$_POST[contact_no]', '$_POST[email_id]', '$_POST[user_name]', '$_POST[password]')";
					mysql_query($query,$con) or die();
					$queryl = "INSERT INTO login VALUES ('$_POST[user_name]', '$_POST[password]', 'faculty')";
					mysql_query($queryl,$con) or die();
					echo '<html><head><script type="text/javascript">alert("Record saved successfully.");</script></head></html>';
				}
			}
		}
	}
	mysql_close($con);
?>