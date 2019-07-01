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
	<header id="app-designer-header" role="banner">
		<nav id="header" class="navbar navbar-default navbar-fixed-top navbar-app-designer" role="navigation">
			<div id="header-container" class="container">
				<div class="navbar-header"> 
				<!-- Mobile Toggle Menu Button -->
				<span class="js-app-designer-nav-togle app-designer-nav-togle" data-toggle="collapse" data-target="#app-designer-navbar" aria-expanded="false" aria-controls="navbar"><i></i></span>
				<a class="navbar-brand" href="data-show-page.php"><img src="img/logoappw.png" class="img-responsive img-logo"></a>
				</div>
				<div id="app-designer-navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a data-toggle="tooltip" data-placement="bottom" title="Add new data ECN" href="data-record.php"><span class="fa fa-pencil"></span> <span> Tambah Data ECN</span></a></li>
						<li><a data-toggle="tooltip" data-placement="bottom" title="Show the ECN table" href="data-show-page.php"><span class="fa fa-table"></span> <span> Tabel ECN</span></a></li>
						<li><a data-toggle="tooltip" data-placement="bottom" title="Search Data By" class="jv-search"><span class="fa fa-search "></span> <span> Cari</span></a></li>
						<li class="menu-user"><a data-toggle="tooltip" data-placement="bottom" title="List of User" href="list-user.php"><span class="fa fa-user"></span> <span> Daftar Pengguna</span></a></li>
						<li><a data-toggle="tooltip" data-placement="bottom" title="Sign-out/Log-out" href="logout.php"><span class="fa fa-sign-out"></span> <span> Keluar</span></a></li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="search-box search-admin"  role="navigation">
        <form class="app-input-group search" name="from2" method="get" action="data-search.php">
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
                 