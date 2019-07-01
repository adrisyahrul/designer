<?php
$no=$_GET['edit'];

// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: page-login.php");
    exit;
}
else if(!isset($_SESSION["id"]) || $_SESSION["id"] !== 1){
    include "snippets/heading.php";
}
else {
    include "snippets/heading-admin.php";
}

	$dy = date('Y');
	$dm = date('m');
	$dd = date('d');

	$mdy = $dy - 1;

	$maxdate = $dy.'-'.$dm.'-'.$dd;
	$mindate = $mdy.'-'.$dm.'-'.$dd;

  include "include/connect.php";
  $query="select * from tb_ecn where no='$no'";
  $hasil=mysql_query($query);
  $data=mysql_fetch_row($hasil);
  $oldcode=$data[1];
  $newcode=$data[2];
  $artno=$data[3];
  $csname=$data[4];
  $absdate=$data[5];
  $ecnno=$data[6];
  $ket=$data[7];
?>
<section id="body-database-page">
	
	<div class="container">
		<h4 class="title-page">Ubah Data</h4>
		<form id="form-edit" name="form-edit" method="post" action="include/ecn-edit.php">
			<div class="row">
				<input id="no" name="no" type="hidden" value="<?php echo "$no";?>"/>
				<div class="col-md-4 col-md-offset-2">
					<label>Kode Lama :</label>
					<input id="oldkode" name="oldkode" class="form-control" type="text" required='1' value="<?php echo "$oldcode";?>"/>
				</div>
				<div class="col-md-4">
					<label>Kode Baru :</label>
					<input id="newkode" name="newkode" class="form-control" type="text" required='1' value="<?php echo "$newcode";?>"/>
				</div>
				<div class="col-md-4 col-md-offset-2">
					<label>Customer :</label>
					<input id="csname" name="csname" class="form-control" type="text" required='1' value="<?php echo "$csname";?>"/>
				</div>
				<div class="col-md-4">
					<label>Art No. :</label>
					<input id="artno" name="artno" class="form-control" type="text" required='1' value="<?php echo "$artno";?>"/>
				</div>
				<div class="col-md-4 col-md-offset-2">
					<label>Tanggal Obsolute :</label>
					<input id="absdate" name="absdate" class="form-control" min="<?php echo $mindate; ?>" max="<?php echo $maxdate; ?>" type="date" required='1' value="<?php echo "$absdate";?>" />
				</div>
				<div class="col-md-4">
					<label>ECN No. :</label>
					<input id="ecnno" name="ecnno" class="form-control" type="text" value="<?php echo "$ecnno";?>"/>
				</div>
				<div class="col-md-8 col-md-offset-2">
					<label>Keterangan :</label>
					<select id="ket" name="ket" class="form-control" required='1'>
						<option class="current" value="<?php echo "$ket";?>"><?php echo "$ket";?></option>
						<option value="ECN (MC di Absolute)">ECN (MC di Absolute)</option>
						<option value="MC di Absolute">MC di Absolute</option>
					</select>
				</div>
				<div class="col-md-8 col-md-offset-2 text-center">
					<input id="submit" name="submit" class="btn btn-success" type="submit" value="Ubah"/>
					<a href="javascript:history.back(1);" class="btn btn-danger">Batal</a>
				</div>
			</div>
		</form>
	</div>
</section>
<?php include "snippets/footer.php";?>