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

  if(isset($_GET['delete'])) {
    $id_to_delete = $_GET['delete'];
    $query = "DELETE FROM posts WHERE id = $id_to_delete";
    $result = mysqli_query($db, $query);
    if(!$result) {
      die("Something went wrong! " . mysqli_error($db));
    }                         
    header("location: posts.php");   
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

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Post content</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Username</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                #query posts table
                                $query = "SELECT * FROM posts";
                                $result = mysqli_query($db, $query);

                                #loop over table rows
                                while($row = mysqli_fetch_assoc($result)) {
                                  $id = $row['id']; #post id
                                  $content = $row['post_content']; #post content

                                  #query category name
                                  $cat_query = "SELECT cat_name from categories where id = $row[cat_id]";
                                  $cat_result = mysqli_query($db, $cat_query);
                                  $category = mysqli_fetch_assoc($cat_result);
                                  $cat_name = $category['cat_name'];

                                  #query image url
                                  $image_query = "SELECT image_url from images where id = $row[image_id]";
                                  $image_result = mysqli_query($db, $image_query);
                                  $image = mysqli_fetch_assoc($image_result);
                                  $image_url = $image['image_url'];

                                  #query username
                                  $user_query = "SELECT username from users where id = $row[user_id]";
                                  $user_result = mysqli_query($db, $user_query);
                                  $user = mysqli_fetch_assoc($user_result);
                                  $user_name = $user['username'];

                                  #displaying query information in a row
                                  echo "<tr>";
                                  echo "<td> " . $id . "</td>";
                                  echo '<td style="word-wrap: break-word; max-width: 400px; overflow: hidden;"> ' . $content . '</td>';
                                  echo "<td> " . $cat_name . "</td>";
                                  echo '<td> <img src="' . $image_url . '" alt="" style"width: 4px; height: 8px;"> </td>';
                                  echo "<td> " . $user_name . "</td>";
                                  echo "<td> <a href=posts.php?delete=".$id.">Delete</a></td>";
                                  echo "</tr>"; 
                                }
                              ?>
                        </tbody>
                    </table>            
                </div>
            </div>
            <!-- /.row -->

        </div>
    </div>
    <!-- /#wrapper -->
    <?php include "includes/footer.php";?>