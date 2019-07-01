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

   $dy = date("Y");
   $dm = date("m");
   $dropyear = $dy - 1;
   $dropyear1 = $dy - 2;
   $dropyear2 = $dy - 3;
?>
<?php
	$column=$_GET['column'];
	$value=$_GET['value'];
	if ($column == 'old_kode')
	{
		$nameofcolumn= 'Old Code';
	}
	else if ($column == 'new_kode')
	{
		$nameofcolumn= 'New Code';
	}
	else if ($column == 'art_no')
	{
		$nameofcolumn= 'Art No.';
	}
	else if ($column == 'cs_name')
	{
		$nameofcolumn= 'Customer';
	}
	else if ($column == 'abs_date')
	{
		$nameofcolumn= 'Obsolute Date';
	}
	else if ($column == 'ecn_no')
	{
		$nameofcolumn= 'ECN No.';
	}
	else
	{
		$nameofcolumn= 'Keterangan';
	}
	
?>
<section id="body-database">

	<div class="container">
		<form class="show-month" name="from" method="get" action="data-page-month.php">
		   <div class="select-years">
		      <select class="form-control app-form-select-years" name="years">
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
				  	
					$n=0;
					$dmtext = '';
				  	$koneksi;
					mysql_select_db("app-designer");

				  	$query="select * from tb_ecn where $column like '%".$value."%' ORDER BY `abs_date` ASC";
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
					 $month=substr ($absdate, 5, 2);

                if ($month == 01) {
                    $dmtext = 'Januari';
                  }
                  else if ($month == 02) {
                    $dmtext = 'Februari';
                  }
                  else if ($month == 03) {
                    $dmtext = 'Maret';
                  }
                  else if ($month == 04) {
                    $dmtext = 'April';
                  }
                  else if ($month == 05) {
                    $dmtext = 'Mei';
                  }
                  else if ($month == 06) {
                    $dmtext = 'Juni';
                  }
                  else if ($month == 07) {
                    $dmtext = 'Juli';
                  }
                  else if ($month == 8) {
                    $dmtext = 'Agustus';
                  }
                  else if ($month == 9) {
                    $dmtext = 'September';
                  }
                  else if ($month == 10) {
                    $dmtext = 'Oktober';
                  }
                  else if ($month == 11) {
                    $dmtext = 'November';
                  }
                  else if ($month == 12) {
                    $dmtext = 'Desember';
                  }

                  $years=substr ($absdate, 0, 4);
                  $dates=substr ($absdate, 8, 2);

                  $showabsdate = $dates.' '.$dmtext.' '.$years;
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
	</div>
</section>
<?php include "snippets/footer.php";?>