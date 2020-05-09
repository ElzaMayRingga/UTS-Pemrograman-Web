<!DOCTYPE html PUBLIC>
<html xmlns>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="includes/main.css" type="text/css" />
<title>Ubah Password</title>
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
	<center><h1><b>Ubah Password</b></h1></center>
	<?php session_start();
		if(!empty($_SESSION['message']))
		echo $_SESSION['message'];
		$_SESSION['message'] = "";
	?>
	<form action="f_change_password.php" method="post">
	<table>
		<tr>
			<tr>
				<td>Username: </td>
				<td><input type='text' name='user_name' id='username'  maxlength="50" /></td>
			</tr>
		
			<tr>
				<td>Password Lama: </td>
				<td><input type='password' name='old_password' id='password' maxlength="50" /></td>
			</tr>
			<tr>
				<td>Password Baru: </td>
				<td><input type='password' name='new_password' maxlength="50" /></td>
			</tr>
			<tr>
				<td>Konfirmasi Password: </td>
				<td><input type='password' name='confirm_password' maxlength="50" /></td>
			</tr>
			<td colspan="3" align="center"><input type="submit" name="change" value="Hapus"></td>
		</tr>
	</table>
	<?php
		include "dbconnection.php";
		if($_POST)
		{
			if(!empty($_POST['user_name']))
			{
				$query = "SELECT * FROM login";
				$result =  mysql_query($query,$con) or die();
				$f = 0;
				$f1 = 0;
			
				while($row = mysql_fetch_array($result))
				{
					if(($row['user_name'] == $_POST['user_name']) && ($row['password'] == $_POST['old_password']))
					{
						$f = 0;
						if($_POST['new_password'] == $_POST['confirm_password'])
						{
							$f1 = 0;
							$query = "UPDATE login SET password = '".$_POST['new_password']."' WHERE user_name =  '".$_POST['user_name']."'";
							mysql_query($query,$con) or die();
							$que = "UPDATE faculty SET password = '".$_POST['new_password']."' WHERE user_name =  '".$_POST['user_name']."'";
							mysql_query($que,$con) or die();
							echo '<html><head><script type="text/javascript">alert("Password Diubah");</script></head></html>';
							break;
						}
					}
					else
					{
						$f = 1;
					}
				}
				if($f == 1)
				{
					echo '<html><head><script type="text/javascript">alert("User Name atau Password Lama Salah!!!");</script></head></html>';
				}
			}
			else
			{
				echo '<html><head><script type="text/javascript">alert("Masukkan User Name.");</script></head></html>';
			}
		}
	?>