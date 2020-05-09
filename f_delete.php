<!DOCTYPE html PUBLIC>
<html xmlns>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="includes/main.css" type="text/css" />
<title>Hapus Data Pengajar</title>
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
	<center><h1><b>Hapus Data Pengajar</b></h1></center>
	<?php session_start();
		if(!empty($_SESSION['message']))
		echo $_SESSION['message'];
		$_SESSION['message'] = "";
	?>
	<form action="f_delete.php" method="post">
	<table>
		<tr>
			<td>Username : </td>
			<td><input type="text" name="user_name" size="30"/></td>
			<td colspan="2" align="center"><input type="submit" name="submit" value="Hapus">
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
				if(($row['user_name'] == $_POST['user_name']) && ($row['category'] == 'faculty'))
				{
					$f = 1;
					$n = $_POST['user_name'];
					$q = 'DELETE FROM faculty WHERE user_name='.'"'.$n.'"';
					mysql_query($q, $con) or die();
					$ql = 'DELETE FROM login WHERE user_name='.'"'.$n.'"';
					mysql_query($ql, $con) or die();
					echo '<html><head><script type="text/javascript">alert("Deleted.");</script></head></html>';
					break;
				}
				else
				{
					$f =0;
				}
			}
			
			if($f == 0)
			{
				echo '<html><head><script type="text/javascript">alert("Username Tidak Ditemukan!!!");</script></head></html>';
			}
		}
		else
		{
			echo '<html><head><script type="text/javascript">alert("Masukkan Username.");</script></head></html>';
		}
	}
	mysql_close($con);
?>