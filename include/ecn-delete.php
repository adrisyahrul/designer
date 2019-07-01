<?php
	include "connect.php";
  	$no=$_POST['no'];

  	$koneksi;
  	
  	$query="delete from tb_ecn where no='$no'";
  	mysql_query($query);
  	header("location:../data-show-page.php");
?>