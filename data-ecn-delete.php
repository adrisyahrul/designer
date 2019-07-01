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

$no=$_GET['remove'];
?>
<section id="body-database">

	<div class="container">
		<h4 class="title-page">Hapus Data</h4>
		<form id="form-delete" name="form-delete" method="post" action="include/ecn-delete.php">
			<div class="row">
				<input id="no" name="no" type="hidden" value="<?php echo "$no";?>"/>
				<div class="col-md-12 text-center">
					<table class="table table-ecn">
						<thead>  
							<tr>
								<td>Kode Lama</td>
								<td>Kode Baru</td>
								<td>Art No.</td>
								<td>Customer</td>
							    <td>Tanggal Obsolute</td>
							    <td>ECN No.</td>
							    <td>Keterangan</td>
							</tr>
						</thead>  
						<tbody>
							<?php
							 
							  {	 
  							  include "include/connect.php";
							  $query="select * from tb_ecn where no='$no'";
							  $hasil=mysql_query($query);
							  while ($data=mysql_fetch_row($hasil))
							  {
							     $no=$data[0];
								 $oldcode=$data[1];
								 $newcode=$data[2];
								 $artno=$data[3];
								 $csname=$data[4];
								 $absdate=$data[5];
								 $ecnno=$data[6];
								 $ket=$data[7];
							?>
							<tr>
							    <td><?php echo "$oldcode";?></td>
							    <td><?php echo "$newcode";?></td>
							    <td><?php echo "$artno";?></td>
							    <td><?php echo "$csname";?></td>
							    <td><?php echo "$absdate";?></td> 
							    <td><?php echo "$ecnno";?></td>
							    <td><?php echo "$ket";?></td>
							</tr>

							<?php
						     }
							 }
							?>	  
						</tbody>
					</table>
					<input id="submit" name="submit" class="btn btn-success" type="submit" value="Hapus"/>
					<a href="javascript:history.back(1);" class="btn btn-danger">Batal</a>
				</div>
			</div>
		</form>
	</div>
</section>
<?php include "snippets/footer.php";?>