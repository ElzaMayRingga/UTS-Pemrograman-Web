<!DOCTYPE html PUBLIC>
<html xmlns>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="includes/main.css" type="text/css" />
<title>Edit Data Pengajar</title>
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

<div id="text">
	<center><h1><b>Edit Data Pengajar</b></h1></center>
	<?php session_start();
		if(!empty($_SESSION['message']))
		echo $_SESSION['message'];
		$_SESSION['message'] = "";
	?>
	<form action="f_edit.php" method="post">
	<table>
		<tr>
			<td>Username: </td>
			<td><input type="text" name="user_name" size="30"/></td>
			<td><input type="submit" name="edit" value="Edit"></td>
		</tr>
	</table>
	<?php
		include "dbconnection.php";
		if($_POST)
		{
			if(!empty($_POST['change']))
			{
				$query = "UPDATE faculty SET name = '".$_POST['name']."', address = '".$_POST['address']."',gender = '".$_POST['gender']."', contact_no = '".$_POST['contact_no']."', email_id = '".$_POST['email_id']."' WHERE user_name =  '".$_POST['user_name']."'";
					mysql_query($query,$con) or die();
					echo '<html><head><script type="text/javascript">alert("Perubahan Tersimpan");</script></head></html>';
			}
			else
			{
			if(!empty($_POST['user_name']))
			{
				$query = "SELECT * FROM faculty";
				$result =  mysql_query($query,$con) or die();
				$f = 0;
			
				while($row = mysql_fetch_array($result))
				{
					if($row['user_name'] == $_POST['user_name'])
					{
						$un = $row['user_name'];
						$f = 0;
						echo '<table>
		<tr>
			<td>Name : </td>
			<td><input type="text" name="name" size="50" value="'.$row['name'].'" /></td>
		</tr>
	</table>
	<table>
		<tr>
			<td>Gender : </td>
			<td>
				<input type="radio" name="gender" value="male"';
						if($row['gender'] == "male"){ echo 'checked="checked"'; }
						echo ' /> Male
  				<input type="radio" name="gender" value="female"';
						if($row['gender'] == "female"){ echo 'checked="checked"'; }
						echo ' /> Female
			</td>
		</tr>
	</table>
	<table>
		<tr>
			<td>Address : </td>
			<td><input type="text" name="address" value="'.$row['address'].'" /></td>
		</tr>
	</table>
	<table>
		<tr>
			<td>Contact No. : </td>
			<td><input type="text" name="contact_no" value="'.$row['contact_no'].'" /></td>
		</tr>
	</table>
	<table>
		<tr>
			<td>Email ID : </td>
			<td><input type="text" name="email_id" size="40" value="'.$row['email_id'].'"/></td>
		</tr>
	</table>
	<table>
		<tr>
			<td><input type="submit" name="change" value="Change" /></td>
		</tr>
	</table>';
	break;
					}
					else
					{
						$f = 1;
					}
				}
				if($f == 1)
				{
					echo '<html><head><script type="text/javascript">alert("User Name does not esist!!!");</script></head></html>';
				}
			}
			else
			{
				echo '<html><head><script type="text/javascript">alert("Masukkan User Name.");</script></head></html>';
			}
			}
		}
	?>