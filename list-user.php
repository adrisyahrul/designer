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

?>
<section id="body-database">

	<div class="container">
    <a class='btn btn-add-user' href="register.php"><span class='fa fa-user'> +</span></a>
		<h4 class="title-page">Daftar Pengguna</h4>
    <a class='btn btn-add-user at-right' href="reset-password.php"><span class='fa fa-user'></span></a>
		<table class="table table-user">
   		<thead>  
   			<tr class="user-head-table">
            	<td width="45">No.</td>
   				<td>Nama Pengguna</td>
   				<td>Tanggal Pendaftaran</td>
   			  <td>Aksi</td>
   			</tr>
   		</thead>  
   		<tbody>
            <?php
               include "include/connect.php";
               $n=0;  
               $koneksi;
               mysql_select_db("app-designer");

               $query="select * from users ORDER BY `id` ASC";
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
                <td width="40"><?php echo "<a class='btn btn-remove $user' href=user-remove.php?remove=$id><span class='fa fa-remove'></span></a>";?></td>
            </tr>

            <?php
              }
             
            ?>   
         </tbody>
      </table>
	</div>
</section>
<?php include "snippets/footer.php";?>