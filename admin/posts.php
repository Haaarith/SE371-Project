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
        <p>WELCOME TO POSTS!</p>
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="row">
              <div class="col-lg-12">
                  
                
              <?php 
              
                if(isset($_GET['source'])) {
                  $source = $_GET['source'];
                }
                else{
                  $source = 1;
                }
                // switch($source) {
                //   // case 'add_post': include "includes/add_post.php"; break;
                //   // case 'edit_post': include "includes/edit_post.php"; break;
                //   // default: include "includes/view_all_posts.php";
                // }
              ?>

              
              </div>
          </div>
          <!-- /.row -->

            </div>
      </div>
    <!-- /#wrapper -->
    <?php include "includes/footer.php";?>
