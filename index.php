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
          if(isset($_POST['search'])){
            $title = $_POST['search_title'];

            $title_query = "SELECT * FROM posts where title = '$title'";
            $search_result = mysqli_query($db, $title_query);
            if(mysqli_num_rows($search_result) > 0){
              $row_search = mysqli_fetch_assoc($search_result);
              $search_title = $row_search['title'];
              $title = $search_title;
            }
          }
          if(isset($_POST['clear_search'])){
            unset($search_title);
          }
          if(isset($search_title)){
            $query = "SELECT post_content, image_id, user_id, title, DATE_FORMAT(post_time, '%M %D at %h:%i') AS formatted_time FROM posts WHERE title = '$title'";
          }else{
            $query = "SELECT post_content, image_id, user_id, title, DATE_FORMAT(post_time, '%M %D at %h:%i') AS formatted_time FROM posts";
          }
          $result = mysqli_query($db, $query);

          if(!$result) {
            die("Something went wrong! " . mysqli_error($db));
          }
          

          
          while($row = mysqli_fetch_assoc($result)) {
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


      <!-- <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
              </h1> -->

      <h2>
        <a href="#"><?=$title?></a>
      </h2>
      <p class="lead">by <a href="index.php"><?=$username?></a></p>
      <p>
        <span class="glyphicon glyphicon-time"></span> <?=$post_time?>
      </p>
      <hr />
      <img class="img-responsive" src="images/<?=$image_url?>" alt="post images" />
      <hr />
      <p>
        <?=$post_content?>
      </p>
      <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

      <hr />

      <!-- Pager -->
      <!-- <ul class="pager">
                <li class="previous">
                  <a href="#">&larr; Older</a>
                </li>
                <li class="next">
                  <a href="#">Newer &rarr;</a>
                </li>
              </ul> -->




      <?php

          }
        
        ?>
    </div>


    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">
      <!-- Blog Search Well -->
      <div class="well">
        <h4>Search Blog Title</h4>
        <form action="" method="post">
          <div class="input-group">
            <input type="text" name="search_title" class="form-control" />
            <span class="input-group-btn">
              <button class="btn btn-default" name="search" type="submit">
                <span class="glyphicon glyphicon-search"></span>
              </button>
            </span>
          </div>
          <button type="submit" name="clear_search" class="btn btn-primary">Clear search</button>
        </form>
        <!-- /.input-group -->
      </div>

      <div class="well">
        <?php
            if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
              $user_id = $_SESSION['id'];
            ?>


        <a href="add_post.php?id=<?=$user_id?> " class=text-decoration-none btn btn-primary>
          <button type="button" class="btn btn-primary" btn-primary="" btn-lg="">Add post </button>
        </a>

        <?php
            }
            ?>
      </div>

      <!-- Side Widget Well -->
      <!-- <div class="well">
        <h4>Side Widget Well</h4>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit.
          Inventore, perspiciatis adipisci accusamus laudantium odit aliquam
          repellat tempore quos aspernatur vero.
        </p>
      </div> -->
    </div>
  </div>









  <?php include "includes/footer.php"; ?>