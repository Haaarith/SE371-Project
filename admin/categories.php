

<?php
  ob_start();
  session_start();
  include "includes/header.php";
  include_once "../includes/db.php";

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
                            Welcome to admin
                            <small>Author</small>
                        </h1>


                        <div class="col-xs-6">

                        <?php ?>
                          <!-- Form of adding category starts:-->
                          <form action="" method="post">
                            <div class="form-group">
                              <label for="cat_title">Add category</label>
                              <input type="text" class="form-control" name="cat_title">
                            </div>

                            <div class="form-group">
                              <input class="btn btn-primary" type="submit" name="submit" value="Add category">
                            </div>
                          </form>
                          <!-- Form of adding category ends:-->

                          <?php 
                          
                            if(isset($_POST['submit'])) {
                              $cat_to_insert = $_POST['cat_title'];
                              if(!$cat_to_insert){
                                echo "<p class= " . "text-danger" . ">Please insert something</p>";
                              }
                              else{
                                $query = "SELECT cat_name FROM categories WHERE cat_name = '$cat_to_insert'";
                                $result = mysqli_query($db, $query);
                                if(mysqli_num_rows($result) > 0) {
                                  echo "<p class= " . "text-danger" . ">Category already exists!</p>";
                                }
                                else{
                                  //In this case, the category isn't in the database, so we insert it.
                                  $query = "INSERT INTO categories (cat_name) VALUES ('$cat_to_insert')";
                                  $result = mysqli_query($db, $query);
                                  if(!$result) {
                                    die("Something went wrong! " . mysqli_error($db));
                                  }
                                  else{
                                    echo "<p class= " . "text-success" . ">Category added!</p>";

                                  }
  
                                }
                              }
                            }


                            if(isset($_GET['delete'])) {
                              $id_to_delete = $_GET['delete'];
                              $query = "DELETE FROM categories WHERE id = $id_to_delete";
                              $result = mysqli_query($db, $query);
                              if(!$result) {
                                die("Something went wrong! " . mysqli_error($db));
                              }                         
                              header("location: categories.php");   
                            }



                            if(isset($_GET['edit'])) {
                              $id_to_edit = $_GET['edit'];
                              $query = "SELECT * FROM categories WHERE id = $id_to_edit";
                              $result = mysqli_query($db, $query);
                              if(!$result) {
                                die("Something went wrong! " . mysqli_error($db));
                              }                    
                              $row = mysqli_fetch_assoc($result);        
                              $cat_title_to_edit = $row['cat_name'];


                              ?>
                              <form action="" method="post">
                              <div class="form-group">
                                <label for="cat_title">Edit category</label>
                                <input type="text" class="form-control" value="<?=$cat_title_to_edit?>" name="cat_name">
                              </div>

                            <div class="form-group">
                              <input class="btn btn-primary" type="submit" name="submit_edit" value="Update">
                            </div>
                          </form>

                          <?php
                            }
                          ?>


                            <?php
                              if(isset($_POST['submit_edit'])) {
                                $new_cat = $_POST['cat_name'];
                                $query = "UPDATE categories SET cat_name='$new_cat' WHERE cat_name = '$cat_title_to_edit'";
                                $result = mysqli_query($db, $query);
                                if(!$result) {
                                  die("Something went wrong! " . mysqli_error($db));
                                }       
                                header("location: categories.php");
                              }
                            
                            
                            ?>

                        </div>

                        <div class="col-xs-6">
                          <table class="table table-bordered table-hover">
                            <thead>
                              <tr><th>ID</th><th>Category Name</th><th>Delete</th><th>Edit</th></tr>
                            </thead>

                            <tbody>
                              <?php
                                $query = "SELECT * FROM categories";
                                $result = mysqli_query($db, $query);

                                while($row = mysqli_fetch_assoc($result)) {
                                  $id = $row['id'];
                                  $cat_name = $row['cat_name'];
                                  echo "<tr>";
                                  echo "<td> " . $id . "</td>";
                                  echo "<td> " . $cat_name . "</td>";
                                  echo "<td> <a href=categories.php?delete=".$id.">Delete</a></td>";
                                  echo "<td> <a href=categories.php?edit=".$id.">Edit</a></td>";

                                  echo "</tr>"; 
                                }
                              
                              ?>
                            </tbody>
                          </table>
                        </div>
                       
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
    <?php ob_flush(); ?>;
