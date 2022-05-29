<?php ob_start(); ?>
<?php include "includes/header.php";?>
<?php include_once "includes/db.php";?>

<?php
  session_start();
  include "functions.php";
?>

<div id="page-wrapper">
    <h1 class="text-center">Edit post</h1>
    <div class="container well">
        <form action="" method="post" enctype="multipart/form-data">

            <?php
        $post_id = $_GET['id'];
        $post_query = "SELECT * FROM posts WHERE id= $post_id";
        $query_result = mysqli_query($db, $post_query);
        $row = mysqli_fetch_assoc($query_result);
        $post_title = $row['title'];
        $post_content = $row['post_content'];
    ?>
            <div class="form-group">
                <label for="title">Post Title</label>
                <input type="text" name="title" id="title" value="<?php echo $post_title ?>">
            </div>
            <div class="form-group">
                <label for="cat_id">Post Category</label>
                <br>
                <select name="cat_id" id="cat_id">
                    <?php

              $query = "SELECT * FROM categories";
              $result = mysqli_query($db, $query);
              if(!$result){
                die("something went wrong! " . mysqli_error($db));
              }

              while($row = mysqli_fetch_assoc($result)) {
                $cat_id = $row['id'];
                $cat_title = $row['cat_name'];
                echo "<option value='$cat_id'>$cat_title</option>";
              }
              ?>

                </select>
                <!-- <label for="post_category">Post Category ID</label>
<input type="text" class="form-control" name="post_category_id"> -->

            </div>


            <!-- <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
      </div> -->


            <div class="form-group">
                <label for="post_content">Post Content</label>
                <textarea name="post_content" id="" cols="30" rows="10"
                    class="form-control"><?php echo $post_content?></textarea>
            </div>

            <div class="form-group">

                <input type="submit" class="btn btn-primary" name="publish_post" value="Update">
                <input type="submit" class="btn btn-primary" name="Homepage" value="Back to Homepage">

            </div>



        </form>


    </div>
    <!-- /.container-fluid -->

</div>

<?php 
if(isset($_POST['Homepage'])){
    header('location: index.php');
}
if(isset($_POST['publish_post'])) {
  // $post_id = $row['post_id'];
  $cat_id = $_POST['cat_id'];
//   $post_image = $_FILES['image']['name'];
  //this is the file name where the image is stored (temporarily)
//   $post_image_temp = $_FILES['image']['tmp_name'];
  
  $post_content = $_POST['post_content'];
  $title = $_POST['title'];
  
  //moving the image from the temporary file into our folder.
//   move_uploaded_file($post_image_temp, "images/$post_image");
//   $query_image_insertion = "INSERT INTO images (image_url) VALUES ('$post_image')";
//   mysqli_query($db, $query_image_insertion);
  
//   $query_image_id = "SELECT id FROM images WHERE image_url = '$post_image'";
//   $result = mysqli_query($db, $query_image_id);



  
  $row = mysqli_fetch_assoc($result);
//   $image_id = $row['id'];
  
//   echo "Image id is " . $image_id;
  
  $query = "UPDATE posts SET post_content = '$post_content', title = '$title', cat_id = $cat_id WHERE id = $post_id";
  $result = mysqli_query($db, $query);
  echo "SO FAR EVERYTHING IS GOOD!";


    header("Location: index.php");

  }
?>
<?php include "includes/footer.php";?>
<?php ob_flush(); ?>