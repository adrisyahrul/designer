<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: page-login.php");
    exit;
}
else if(!isset($_SESSION["id"]) || $_SESSION["id"] !== 1){
    header("location: data-show-page.php");
}
include "snippets/heading-admin-user.php";

$id=$_GET['remove'];

?>

<section id="body-database">

	<div class="container">
		<h4 class="title-page">Hapus Pengguna</h4>
		<form id="form-delete2" name="form-delete2" method="post" action="include/user-delete.php">
			<input id="id" name="id" type="hidden" value="<?php echo "$id";?>"/>
			<table class="table table-user table-remove">
				<thead>  
		   			<tr class="user-head-table">
		            	<td width="45">No.</td>
		   				<td>Nama Pengguna</td>
		   				<td>Tanggal Pendaftaran</td>
		   			</tr>
		   		</thead>  
		   		<tbody>
		            <?php

		            	include "include/connect.php";
		            	$n=0;  
		            	$koneksi;
		            	mysql_select_db("app-designer");

		               $query="select * from users where id='$id'";
		               $hasil=mysql_query($query);
		               while ($data=mysql_fetch_row($hasil))
		               {
		                $n=$n+1;
		                $id=$data[0];
		                $user=$data[1];
		                $crtdate=$data[3];

		            ?>
		            <tr>
		                <td><?php echo $n;?></td>
		                <td><?php echo $user;?></td>
		                <td><?php echo $crtdate;?></td>
		            </tr>

		            <?php
		              }
		             
		            ?>   
				</tbody>
			</table>
			<div class="button-control-remove">
				<input id="submit" name="submit" class="btn btn-success" type="submit" value="Hapus"/>
				<a href="javascript:history.back(1);" class="btn btn-danger">Batal</a>
			</div>
		</form>
	</div>
</section>
<?php include "snippets/footer.php";?>