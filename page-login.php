<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: data-show-page.php");
  exit;
}

// Include config file
require_once "include/config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Mohon masukan Nama Pengguna anda.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Mohon masukan Kata Sandi anda.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: data-show-page.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "Kata Sandi yang anda masukan salah.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "Akun yang anda gunakan tidak terdaftar / sudah diblokir oleh admin.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
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
	<header id="app-login-header" role="banner">
		<nav id="header" class="navbar navbar-default navbar-fixed-top navbar-app-designer" role="navigation">
			<div id="header-container" class="container">
				<div class="navbar-header"> 
				<!-- Mobile Toggle Menu Button -->
				<span class="js-app-designer-nav-togle app-designer-nav-togle" data-toggle="collapse" data-target="#app-designer-navbar" aria-expanded="false" aria-controls="navbar"><i></i></span>
				<a class="navbar-brand" href="index.php"><img src="img/logoappw.png" class="img-responsive img-logo"></a>
				</div>
			</div>
		</nav>
	</header>
	<section id="landing-login">
		<div class="container text-center">
			<h3>Database Designer APP</h3>
			<div class="login-box login-section">
		        <p>Silahkan masuk untuk mengakses aplikasi.</p>
		        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
		                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" placeholder="Nama Pengguna">
		                <span class="help-block"><?php echo $username_err; ?></span>
		            </div>    
		            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
		                <input type="password" name="password" class="form-control" placeholder="Kata Sandi">
		                <span class="help-block"><?php echo $password_err; ?></span>
		            </div>
		            <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Masuk">
		                <a href="javascript:history.back(1);" class="btn btn-default">Batal</a>
		            </div>
                    <p><a href="mailto:Adri_Syahrul@app.co.id?subject=Forgot account ECN Database">Lupa password ?</a> | <a href="mailto:Adri_Syahrul@app.co.id?subject=Register account ECN Database">Buat akun baru ?</a></p>
		        </form>
			</div>
		</div>
	</section>
	<footer id="footer-login-page">
		<div class="container">
			<p>Copyright © 2019 Database Designer APP Batam. All Rights Reserved.</p>
		</div>
	</footer>
</body>
</html>

	