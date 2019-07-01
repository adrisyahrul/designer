
<?php
	include "connect.php";
	
	$oldcode=$_POST['oldkode'];
	$newcode=$_POST['newkode'];
	$artno=$_POST['artno'];
	$csname=$_POST['csname'];
	$absdate=$_POST['absdate'];
	$ecnno=$_POST['ecnno'];
	$ket=$_POST['ket'];
  	
	$koneksi;
  $queryselect="select * from tb_ecn where old_kode = '$oldcode'";
  $hasil=mysql_query($queryselect);
    while ($data=mysql_fetch_row($hasil))
    {
      $oldcodex=$data[1];
      $newcodex=$data[2];
      $artnox=$data[3];
      $csnamex=$data[4];
      $absdatex=$data[5];
      $ecnnox=$data[6];
      $ketx=$data[7];
    }
  $queryselect1="select * from tb_ecn ORDER BY `no` ASC";
  $hasil=mysql_query($queryselect1);
    while ($data=mysql_fetch_row($hasil))
    {
      $no=$data[0];
    }
  $n = $no + 1;

  // create auto input $no + 1 with php, because auto increment at database is off
  // please clear done at nextday thanks

 	$query="insert into tb_ecn values('$n','$oldcode','$newcode','$artno','$csname','$absdate','$ecnno','$ket')";
	$queryinput = mysql_query($query);	

  if (!$queryinput) {
      die ("Kode $oldcodex sudah di Obsolute pada $absdatex dengan keterangan $ketx <a href='javascript:history.back(1);'>Kembali</a>");
  }

	header("location:../data-show-page.php");
?>
