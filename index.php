<?php
  session_start();
  include_once "./includes/db.php";
?>

<?php include "includes/header.php";?>
<!-- Navigation -->
<?php include "includes/navigation.php";?>


<!-- Page Content -->
<div class="container">
    <div class="row">
        <!-- Blog Entries Column -->

        <!-- displaying posts here begins-->
        <div class="col-md-8">

            <?php
          #checking if the user wanted to search something
          if(isset($_POST['search'])){
            $title = $_POST['search_title'];
            #querying the title to search
            $title_query = "SELECT * FROM posts where title = '$title'";
            $search_result = mysqli_query($db, $title_query);

            #assigning the searched title to a variable to use it in a later query
            if(mysqli_num_rows($search_result) > 0){
              $row_search = mysqli_fetch_assoc($search_result);
              $search_title = $row_search['title'];
              $title = $search_title;
            }
          }
          #clear the search to get all posts again
          if(isset($_POST['clear_search'])){
            unset($search_title);
          }
          #if there's a searched title, we query that title + whatever is attached to it infront
          if(isset($_POST['search'])){
            $title= $title;
            $query = "SELECT id, post_content, image_id, user_id, title, DATE_FORMAT(post_time, '%M %D at %h:%i') AS formatted_time FROM posts WHERE title LIKE '$title%'";
          }
          #query all posts otherwise
          else{
            $query = "SELECT id, post_content, image_id, user_id, title, DATE_FORMAT(post_time, '%M %D at %h:%i') AS formatted_time FROM posts";
          }
          #query posts by chosen category from the nav bar
          if(isset($_GET['category'])){
            #getting the category name & querying it's row from databse
            $cat_name = $_GET['category'];
            $cat_name_query = "SELECT * from categories WHERE cat_name = '$cat_name'";
            $cat_result = mysqli_query($db, $cat_name_query);
            $cat_row = mysqli_fetch_assoc($cat_result);
            $cat_id = $cat_row['id'];
            #using the category id to get all posts that match its id
            $query = "SELECT id, post_content, image_id, user_id, title, DATE_FORMAT(post_time, '%M %D at %h:%i') AS formatted_time FROM posts WHERE cat_id = $cat_id";
          }
          
          $result = mysqli_query($db, $query);
          if(!$result) {
            die("Something went wrong! " . mysqli_error($db));
          }

          #checking if title exists -> show an error message
          if(mysqli_num_rows($result)===0 && isset($title)){
            echo 'There is no posts with the title '.$title.'. Try another title.';
          }
          
          #loop over the queries rows and display posts
          while($row = mysqli_fetch_assoc($result)) {
            $post_id = $row['id'];
            $post_content = $row['post_content'];
            $image_id = $row['image_id'];
            $user_id = $row['user_id'];
            $title = $row['title'];
            $post_time = $row['formatted_time'];
            //query for finding the corresponding user.
            $query_username = "SELECT username FROM users WHERE id = $user_id";
            $result_username = mysqli_query($db, $query_username);
            $row_username = mysqli_fetch_assoc($result_username);
            $username = $row_username['username'];

            //query for finding the corresponding image_url.
            $query_url = "SELECT image_url FROM images WHERE id = $image_id";
            $result_url = mysqli_query($db, $query_url);
            $row_url = mysqli_fetch_assoc($result_url);
            $image_url = $row_url['image_url'];

            ?>

            <!-- Displaying the posts -->
            <div class="well">
                <h2>
                    <a href="#"><?=$title?></a>
                </h2>
                <p class="lead">by <a href="index.php"><?=$username?></a></p>
                <p>
                    <span class="glyphicon glyphicon-time"></span> <?=$post_time?>
                </p>
                <hr style="border:1px solid #D3D3D3;" />
                <img class="img-responsive" src="images/<?=$image_url?>" alt="" />
                <hr style="border:1px solid #D3D3D3;" />
                <p style="word-wrap: break-word;">
                    <?=$post_content?>
                </p>
                <?php
                #check if user is logged in
                if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
                  $id = $_SESSION['id'];
                }
                #check if logged user's id is the same as the posts's user id then show the buttons
                if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true && $id == $user_id){
                ?>
                <!-- Edit post & delete post buttons -->
                <a class="btn btn-primary" href="editpost.php?id=<?php echo $post_id?>"> Edit post </a>
                <a class="btn btn-primary" href="deletepost.php?id=<?php echo $post_id?>"> Delete post </a>
                <?php } ?>
            </div>
            <hr />

            <?php } ?>

        </div>


        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-4">
            <!-- Blog Search starts -->
            <div class="well">
                <h4>Search Blog Title</h4>
                <form action="" method="post">
                    <div class="input-group">
                        <input type="text" name="search_title" class="form-control my-5" />
                        <span class="input-group-btn">
                            <button class="btn btn-default" name="search" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                    <br>
                    <button type="submit" name="clear_search" class="btn btn-primary">Clear search</button>
                    <!-- Blog Search ends -->
                </form>
                <!-- /.input-group -->
            </div>

            <?php
            #showing the "add post" button only to logged in users
            if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
              $user_id = $_SESSION['id'];
            ?>
            <div class="well">
                <a href="add_post.php?id=<?=$user_id?> " class=text-decoration-none btn btn-primary>
                    <button type="button" class="btn btn-primary" btn-primary="" btn-lg="">Add post </button>
                </a>
            </div>
            <?php
            }
            ?>
        </div>
    </div>

<?php include "includes/footer.php"; ?>