<!-- edit ecn -->
<?php
  	include "connect.php";
  	$no=$_POST['no'];
	$oldcode=$_POST['oldkode'];
	$newcode=$_POST['newkode'];
	$artno=$_POST['artno'];
	$csname=$_POST['csname'];
	$absdate=$_POST['absdate'];
	$ecnno=$_POST['ecnno'];
	$ket=$_POST['ket'];
  	
  	$koneksi;

  	$query="update tb_ecn set old_kode='$oldcode',new_kode='$newcode',art_no='$artno',cs_name='$csname',abs_date='$absdate',ecn_no='$ecnno',ket='$ket' where no='$no'";
	mysql_query($query);
  	header("location:../data-show-page.php");
?>
<!-- edit ecn -->