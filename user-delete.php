<?php
	include "connect.php";
  	$id=$_POST['id'];

  	$koneksi;
  	
  	$query="delete from users where id='$id'";
  	mysql_query($query);
  	header("location:../list-user.php");
?>