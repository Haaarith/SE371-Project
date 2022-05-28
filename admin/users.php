<?php ob_start(); ?>

<?php 

  include "includes/header.php";
  include_once "../includes/db.php";
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
            Welcome<small><?=$_SESSION['username']?></small>
          </h1>


          <!-- Checking the url for source's value -->

          <?php
                  if(isset($_GET['source'])) {
                    $source = $_GET['source'];
                  }
                  else{
                    //No source was found in the url.
                    $source = 1;
                  }


                  switch($source) {
                    case 'view_all_users': include "includes/view_all_users.php" ; break;
                    default: include "includes/view_all_users.php"; break;
                  }
                
                ?>



        </div>
      </div>
      <!-- /.row -->

    </div>
  </div>
  <!-- /#wrapper -->
  <?php include "includes/footer.php";?>
  <?php ob_flush(); ?>