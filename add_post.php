<?php ob_start(); ?>
<?php include_once "includes/db.php";?>


<?php
  session_start();
  include "functions.php";
?>

<?php
  if(isset($_GET['id'])) {
    $user_id = $_GET['id'];
  }
  else{
    header("location: index.php");
  }

?>


<form action="" method="post" enctype="multipart/form-data">    
     
     

      <div class="form-group">
        <label for="cat_id">Post Category</label>
        <br>
        <select name="cat_id">
          <?php
            $query = "SELECT * FROM categories";
            $result = mysqli_query($db, $query);
            if(!$result){
              die("something went wrong! " . mysqli_error($db));
            }

            while($row = mysqli_fetch_assoc($result)) {
              $cat_id = $row['id'];
              $cat_title = $row['cat_title'];
              echo "<option value='$cat_id'>$cat_title</option>";
            }
          ?>


        </select>
          <!-- <label for="post_category">Post Category ID</label>
          <input type="text" class="form-control" name="post_category_id"> -->
          
      </div>
      
     
    <div class="form-group">
         <label for="post_image">Post Image</label>
         <input type="file" name="image">
     </div>
   
      
      <div class="form-group">
         <label for="post_content">Post Content</label>
         <textarea name="post_content" id="" cols="30" rows="10" class="form-control"></textarea>
     </div>
     
     <div class="form-group">
     
     <input type="submit" class="btn btn-primary" name="publish_post" value="Publish">
     
     </div>
     
     
     
</form>



<?php 

  if(isset($_POST['publish_post'])) {
    // $post_id = $row['post_id'];
    $cat_id = $_POST['cat_id'];
    $post_image = $_FILES['image']['name'];
    //this is the file name where the image is stored (temporarily)
    $post_image_temp = $_FILES['image']['tmp_name'];

    $post_content = $_POST['post_content'];
    $post_tags = $_POST['post_tags'];
    $post_status = $_POST['post_status'];

    //moving the image from the temporary file into our folder.
    move_uploaded_file($post_image_temp, "images/$post_image");

    $query_image_insertion = "INSERT INTO images (image_url) VALUES ('$post_image')";
    mysqli_query($db, $query_image_insertion);

    $query_image_id = "SELECT id FROM images WHERE image_url = '$post_image'";
    $result = mysqli_query($db, $query_image_id);

    $row = mysqli_fetch_assoc($result);
    $image_id = $row['id'];
    

    $query = "INSERT INTO posts (cat_id, post_content, image_id, user_id) VALUES ($cat_id, '$post_content', $image_id, $user_id)";
    $result = mysqli_query($db, $query);


    header("Location: index.php");

  }
?>
<?php ob_flush(); ?>
