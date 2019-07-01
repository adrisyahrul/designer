<?php
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
	$sdy = substr($dy, 2, 2);

	$maxdate = $dy.'-'.$dm.'-'.$dd;
	$mindate = $mdy.'-'.$dm.'-'.$dd;

	$expecnn = '001/APP/'.$dm.'/'.$sdy;
?>
<section id="body-database">

	<div class="container">
		<h4 class="title-page">Simpan Data</h4>
		<form id="form-ecn" name="form-ecn" method="post" action="include/ecn-action.php">
			<div class="row">
				<div class="col-md-4 col-md-offset-2">
					<label>Kode Lama :</label>
					<input id="oldkode" name="oldkode" class="form-control" type="text" required='1' placeholder="BR 1234"/>
				</div>
				<div class="col-md-4">
					<label>Kode Baru :</label>
					<input id="newkode" name="newkode" class="form-control" type="text" required='1' placeholder="BS 1234"/>
				</div>
				<div class="col-md-4 col-md-offset-2">
					<label>Customer :</label>
					<input id="csname" name="csname" class="form-control" type="text" required='1' placeholder="Furniplus"/>
				</div>
				<div class="col-md-4">
					<label>Art No. :</label>
					<input id="artno" name="artno" class="form-control" type="text" required='1' placeholder="1234"/>
				</div>
				<div class="col-md-4 col-md-offset-2">
					<label>Tanggal Obsolute :</label>
					<input id="absdate" name="absdate" class="form-control" min="<?php echo $mindate; ?>" max="<?php echo $maxdate; ?>" type="date" required='1' />
				</div>
				<div class="col-md-4">
					<label>ECN No. :</label>
					<input id="ecnno" name="ecnno" class="form-control" type="text" required='1' placeholder="<?php echo $expecnn; ?>"/>
				</div>
				<div class="col-md-8 col-md-offset-2">
					<label>Keterangan :</label>
					<select id="ket" name="ket" class="form-control" required='1'>
						<option value="">Pilih kondisi keterangan</option>
						<option value="ECN (MC di Absolute)">ECN (MC di Absolute)</option>
						<option value="MC di Absolute">MC di Absolute</option>
					</select>
				</div>
				<div class="col-md-8 col-md-offset-2 text-center">
					<input id="submit" name="submit" class="btn btn-success" type="submit" value="Simpan"/>
					<a href="data-show-page.php" class="btn btn-danger">Batal</a>
				</div>
			</div>
		</form>
	</div>
</section>
<?php include "snippets/footer.php";?>