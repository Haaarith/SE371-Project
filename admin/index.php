<?php 
  include "includes/header.php";
  session_start();

?>

<!-- Navigation -->
<?php
  if(!isset($_SESSION) || $_SESSION['type'] !== 'admin') { 
    header("location: ../index.php");
  }

?>


<div id="wrapper">
  <!-- Navigation -->
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <?php include "includes/navigation.php";?>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <?php include "includes/sidebar.php";?>
    <!-- /.navbar-collapse -->
  </nav>

  <div id="page-wrapper">
    <div class="container-fluid">
      <!-- Page Heading -->
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">
            Welcome
            <small><?=$_SESSION['username']?></small>
          </h1>
          <ol class="breadcrumb">
            <li>
              <i class="fa fa-dashboard"></i>
              <a href="index.html">Dashboard</a>
            </li>
            <li class="active"><i class="fa fa-file"></i> Blank Page</li>
          </ol>
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<?php include "includes/footer.php";?>