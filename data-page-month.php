<?php
error_reporting(0);
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
	$years=$_GET['years'];
	$months=$_GET['month'];

	$dy = date("Y");
	$dm = date("m");
	$dropyear = $dy - 1;
	$dropyear1 = $dy - 2;
	$dropyear2 = $dy - 3;
?>
   <section id="data-show-all-user">
		<div class="container">
		    <form class="show-month" name="from" method="get" action="data-page-month.php">
		      <div class="select-years">
		         <select class="form-control app-form-select-years" name="years">
		          <option class="current" value="<?php echo $years; ?>"><?php echo $years; ?></option>
		          <option value="<?php echo $dy; ?>"><?php echo $dy; ?></option>
		          <option value="<?php echo $dropyear; ?>"><?php echo $dropyear; ?></option>
		          <option value="<?php echo $dropyear1; ?>"><?php echo $dropyear1; ?></option>
		          <option value="<?php echo $dropyear2; ?>"><?php echo $dropyear2; ?></option>
		         </select>
		      </div>
		      <div class="group-button-month">
		         <input type="submit" name="month" value="Januari" class="btn btn-default btn-month">
		         <input type="submit" name="month" value="Februari" class="btn btn-default btn-month">
		         <input type="submit" name="month" value="Maret" class="btn btn-default btn-month">
		         <input type="submit" name="month" value="April" class="btn btn-default btn-month">
		         <input type="submit" name="month" value="Mei" class="btn btn-default btn-month">
		         <input type="submit" name="month" value="Juni" class="btn btn-default btn-month">
		         <input type="submit" name="month" value="Juli" class="btn btn-default btn-month">
		         <input type="submit" name="month" value="Agustus" class="btn btn-default btn-month">
		         <input type="submit" name="month" value="September" class="btn btn-default btn-month">
		         <input type="submit" name="month" value="Oktober" class="btn btn-default btn-month">
		         <input type="submit" name="month" value="November" class="btn btn-default btn-month">
		         <input type="submit" name="month" value="Desember" class="btn btn-default btn-month">
		      </div>
		   </form>
		   <table class="table table-ecn">
				<thead>  
					<tr>
						<td width="45">No.</td>
						<td>Kode Lama</td>
						<td>Kode Baru</td>
						<td>Art No.</td>
						<td>Customer</td>
					    <td>Tanggal Obsolute</td>
					    <td>ECN No.</td>
					    <td>Keterangan</td>
					    <td colspan="2">Aksi</td>
					</tr>
				</thead>  
				<tbody>
					<?php
						include "include/connect.php";
					  	$koneksi;
					  	
						if ($months == 'Januari') {
							$month = '01';
						}
						else if ($months == 'Februari') {
							$month = '02';
						}
						else if ($months == 'Maret') {
							$month = '03';
						}
						else if ($months == 'April') {
							$month = '04';
						}
						else if ($months == 'Mei') {
							$month = '05';
						}
						else if ($months == 'Juni') {
							$month = '06';
						}
						else if ($months == 'Juli') {
							$month = '07';
						}
						else if ($months == 'Agustus') {
							$month = '08';
						}
						else if ($months == 'September') {
							$month = '09';
						}
						else if ($months == 'Oktober') {
							$month = '10';
						}
						else if ($months == 'November') {
							$month = '11';
						}
						else if ($months == 'Desember') {
							$month = '12';
						}

						$lookkey = $years.'-'.$month;
						$n = 0;

					  	$query="select * from tb_ecn where abs_date like '%".$lookkey."%' ORDER BY `abs_date` ASC";
					  	$hasil=mysql_query($query);
					  	while ($data=mysql_fetch_row($hasil))
					  	{
					  	 $n=$n+1;
					     $no=$data[0];
						 $oldcode=$data[1];
						 $newcode=$data[2];
						 $artno=$data[3];
						 $csname=$data[4];
						 $absdate=$data[5];
						 $ecnno=$data[6];
						 $ket=$data[7];

		                  $years=substr ($absdate, 0, 4);
		                  $dates=substr ($absdate, 8, 2);

		                  $showabsdate = $dates.' '.$months.' '.$years;
					?>
					<tr>
					    <td><?php echo "$n";?></td>
					    <td><?php echo "$oldcode";?></td>
					    <td><?php echo "$newcode";?></td>
					    <td><?php echo "$artno";?></td>
					    <td><?php echo "$csname";?></td>
					    <td><?php echo "$showabsdate";?></td> 
					    <td><?php echo "$ecnno";?></td>
					    <td><?php echo "$ket";?></td>
					    <td width="40"><?php echo "<a class='btn btn-edit' href=data-ecn-edit.php?edit=$no><span class='fa fa-edit'></span></a>";?></td>
                		<td width="40"><?php echo "<a class='btn btn-remove' href=data-ecn-delete.php?remove=$no><span class='fa fa-remove'></span></a>";?></td>
					</tr>

					<?php
				     }
					 
					?>	  
				</tbody>
			</table>
			<div class="button-report">
				<form class="button-export" name="from3" method="get" action="data-export.php">
					<input type="hidden" name="export" value="<?php echo $lookkey;?>">
			        <input type="submit" name="submit" value="Jadikan file Excell MC Obsolute & ECN <?php echo $months; ?> <?php echo $years; ?>" class="btn btn-primary btn-export">
			    </form>
			    <form class="button-export" name="from4" method="get" target="_blank" action="data-print-out.php">
		           <input type="hidden" name="print" value="<?php echo $lookkey;?>">
		           <input type="submit" name="submit" value="Cetak MC Obsolute & ECN <?php echo $months; ?> <?php echo $years; ?>" class="btn btn-warning btn-print">
		        </form>
			</div>
		</div>
   </section>
<?php include "snippets/footer.php";?>