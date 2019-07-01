<!DOCTYPE html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Database Designer</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="Adri Syahrul, Designer, Frontend Web Developer, Web Design, Web Unik, Web Programmer" />
<meta name="author" content="Adri Syahrul" />

<style type="text/css">
	h2, h4 {
    	margin: 0;
	}
	table, td {
		text-align: center;
	}
	thead tr td {
		border: 1px solid black;
		font-size: 14px;
	}
	tbody tr td {
		border: 1px dotted black;
	}
	
</style>
</head>
<body>
	<?php
	  	error_reporting(0);
		$lookkey=$_GET['export'];
		$lookmonth=substr($lookkey, 5, 2);
		$lookyear=substr($lookkey, 0, 4);

		if ($lookmonth == 01) {
			$lookmonths = 'Januari';
		}
		else if ($lookmonth == 02) {
			$lookmonths = 'Februari';
		}
		else if ($lookmonth == 03) {
			$lookmonths = 'Maret';
		}
		else if ($lookmonth == 04) {
			$lookmonths = 'April';
		}
		else if ($lookmonth == 05) {
			$lookmonths = 'Mei';
		}
		else if ($lookmonth == 06) {
			$lookmonths = 'Juni';
		}
		else if ($lookmonth == 07) {
			$lookmonths = 'Juli';
		}
		else if ($lookmonth == 8) {
			$lookmonths = 'Agustus';
		}
		else if ($lookmonth == 9) {
			$lookmonths = 'September';
		}
		else if ($lookmonth == 10) {
			$lookmonths = 'Oktober';
		}
		else if ($lookmonth == 11) {
			$lookmonths = 'November';
		}
		else if ($lookmonth == 12) {
			$lookmonths = 'Desember';
		}
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=MC Obsolute & ECN $lookmonths $lookyear.xls");
	?>
	<center>
		<h2>PT. ASIA PAPERINDO PERKASA</h2>
		<h4>REPORT OBSOLUTE & ECN PRINTING LAY-OUT</h4>
		<h4>'<?php echo $lookmonths; ?> <?php echo $lookyear; ?>'</h4>
	</center>
    <table>
		<thead>
			<center>  
				<tr>
					<td><b>No.</b></td>
					<td><b>Kode Lama</b></td>
					<td><b>Kode Baru</b></td>
					<td><b>Art No.</b></td>
					<td><b>Customer</b></td>
				    <td><b>Tanggal Obsolute</b></td>
				    <td><b>ECN No.</b></td>
				    <td><b>Keterangan</b></td>
				</tr>
			</center>
		</thead>  
		<tbody>
			<?php
				include "include/connect.php";
				
				$n = 0;
			  	$koneksi;
				mysql_select_db("app-designer");
			  	$query="select * from tb_ecn where abs_date like '%".$lookkey."%' ORDER BY `abs_date` ASC";
			  	$hasil=mysql_query($query);
			  	while ($data=mysql_fetch_row($hasil)) {
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

					$showabsdate = $dates.' '.$lookmonths.' '.$years;
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
				</tr>
					<?php
				     }
					?>	  
				</tbody>
			</table>
		</div>

	<center>
		<p>Copyright © 2019 Database Designer APP Batam. All Rights Reserved.</p>
	</center>