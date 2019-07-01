<?php
  error_reporting(0);
  // Initialize the session
  session_start();
   
  // Check if the user is already logged in, if yes then redirect him to welcome page
  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: data-show-page.php");
    exit;
  }
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Database Designer</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="Adri Syahrul, Designer, Frontend Web Developer, Web Design, Web Unik, Web Programmer" />
<meta name="author" content="Adri Syahrul" />

<!-- favicon -->
<link rel="icon" type="image/png" href="img/icon.png">
<!-- favicon -->

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css">

</head>
<body>
   <?php
      $dy = date('Y');
      $datem = date('m');

      if ($datem == 08) {
        $dm = 8;
      }
      else if ($datem == 09) {
        $dm = 9;
      }
      else {
        $dm = $datem;
      }

      $dropyear = $dy - 1;
      $dropyear1 = $dy - 2;
      $dropyear2 = $dy - 3;
   ?>
   <header id="app-login-header" role="banner">
      <nav id="header" class="navbar navbar-default navbar-fixed-top navbar-app-designer" role="navigation">
         <div id="header-container" class="container">
            <div class="navbar-header"> 
            <!-- Mobile Toggle Menu Button -->
            <span class="js-app-designer-nav-togle app-designer-nav-togle" data-toggle="collapse" data-target="#app-designer-navbar" aria-expanded="false" aria-controls="navbar"><i></i></span>
            <a class="navbar-brand" href="index.php"><img src="img/logoappw.png" class="img-responsive img-logo"></a>
            </div>
            <div id="app-designer-navbar" class="navbar-collapse collapse">
               <ul class="nav navbar-nav navbar-right">
                  <li><a data-toggle="tooltip" data-placement="bottom" title="Search by" class="jv-search"><span class="fa fa-search "></span> <span> Cari</span></a></li>
                  <li><a data-toggle="tooltip" data-placement="bottom" title="Sign-in/Login" href="page-login.php"><span class="fa fa-sign-in"></span> <span> Masuk</span></a></li>
               </ul>
            </div>
         </div>
      </nav>
      <div class="search-box"  role="navigation">
        <form class="app-input-group search" name="from2" method="get" action="data-search-all-user.php">
          <div class="input-group app-input-grouping">
            <select class="form-control app-form-select" name="column">
              <option value="old_kode">Kode Lama</option>
              <option value="new_kode">Kode Baru</option>
              <option value="art_no">Art No.</option>
              <option value="cs_name">Customer</option>
              <option value="ecn_no">ECN No.</option>
              <option value="ket">Keterangan</option>
            </select>
          <input type="text" name="value" class="form-control app-form-grouping" required="1"/>
          <input type="submit" name="submit" value="Cari" class="btn btn-default btn-search app-btn-grouping">
          </div>
        </form>
      </div>
   </header>
   <section id="data-show-all-user">
   <div class="container">
   <form class="show-month" name="from" method="get" action="data-page-month-user.php">
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
   <!-- table data-->
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
   			</tr>
   		</thead>  
   		<tbody>
            <?php
               $datayear = $dy;
               $datamonth = $dm - 1;

               if ($datamonth >= 10) {
                  $lookkey = $datayear.'-'.$datamonth;
               }
               else if ($datamonth == 0) {
                  $datamonth = 12;
                  $datayear = $dy - 1;
                  $lookkey = $datayear.'-'.$datamonth;
               }
               else {
                  $lookkey = $datayear.'-0'.$datamonth;
               }
               $n = 0;
               $dmtext = '';
               include "include/connect.php";
               $koneksi;

               $query="select * from tb_ecn where abs_date like '%".$lookkey."%' ORDER BY `abs_date` ASC";
              $hasil=mysql_query($query);
              while ($data=mysql_fetch_row($hasil))
              {
               $no=$data[0];
              }

              if(empty($no)) {
                $nodata = "<div class='nodata'>Data ECN pada bulan $datamonth belum direkam oleh admin.</div>";
              }

              else {

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
                <td><?php echo $n;?></td>
                <td><?php echo $oldcode;?></td>
                <td><?php echo $newcode;?></td>
                <td><?php echo $artno;?></td>
                <td><?php echo $csname;?></td>
                <td><?php echo $showabsdate;?></td> 
                <td><?php echo $ecnno;?></td>
                <td><?php echo $ket;?></td>
            </tr>

            <?php
              }
              }
            ?>   
         </tbody>
      </table>
      <?php echo $nodata; ?>  
      <div class="button-report">
        <form class="button-export" name="from3" method="get" action="data-export.php">
           <input type="hidden" name="export" value="<?php echo $lookkey;?>">
           <input type="submit" name="submit" value="Jadikan file Excell MC Obsolute & ECN <?php echo $dmtext; ?> <?php echo $years; ?>" class="btn btn-primary btn-export">
        </form>
        <form class="button-export" name="from4" method="get" target="_blank" action="data-print-out.php">
           <input type="hidden" name="print" value="<?php echo $lookkey;?>">
           <input type="submit" name="submit" value="Cetak MC Obsolute & ECN <?php echo $dmtext; ?> <?php echo $years; ?>" class="btn btn-warning btn-print">
        </form>
      </div>
</section>
<?php include "snippets/footer.php";?>