<?php
  session_start();
  include_once "./includes/db.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Blog Home - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <link href="css/blog-home.css" rel="stylesheet" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button
            type="button"
            class="navbar-toggle"
            data-toggle="collapse"
            data-target="#bs-example-navbar-collapse-1"
          >
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Start Bootstrap</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li>
              <a href="#">About</a>
            </li>
            <li>
              <a href="#">Services</a>
            </li>
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"
              >Categories <b class="caret"></b
            ></a>
            <ul class="dropdown-menu message-dropdown"  style="overflow: hidden; max-height:400px; max-width:600px; overflow: auto;">
              <li class="message-preview">
                <?php
                  #query categories
                  $cat_query = "SELECT * from categories";
                  $result = mysqli_query($db, $cat_query);

                  #loop over the catogries and add them to the dropdown menu
                  while($row = mysqli_fetch_assoc($result)){
                    $cat_name = $row['cat_name'];
                    
                    echo "<a href=index.php?category=". $cat_name .">";
                    echo  '<div class="media">';
                    echo    '<div class="media-body">';
                    echo      '<h5 class="media-heading">';
                    echo        '<strong>'. $cat_name .'</strong>';
                    echo      '</h5>';
                    echo    '</div>';
                    echo  '</div>';
                    echo '</a>';
                  }
                ?>
              </li>
            </ul>
          </li>






          <!-- About us drop down-->
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"
              >About us<b class="caret"></b
            ></a>
            <ul class="dropdown-menu message-dropdown"  style="overflow: hidden; max-height:300px; max-width:200px; overflow: auto;">

              <li class="message-preview">
                <a href="#">
                  <div class="media">
                    <span class="pull-left">
                      <img
                        class="media-object"
                        src="http://placehold.it/50x50"
                        alt=""
                      />
                    </span>
                    <div class="media-body">
                      <!-- <h5 class="media-heading">
                        <strong>Admin</strong>
                      </h5> -->
                      
                      <p style="text-align:center; font-size:20px;"><a style="text-decoration: none; color:black;" href="CVs/Abdulaziz.html">Abdulaziz's CV</a></p>
                    </div>
                  </div>
                </a>
              </li>

              <li class="message-preview">
                <a href="#">
                  <div class="media">
                    <span class="pull-left">
                      <img
                        class="media-object"
                        src="http://placehold.it/50x50"
                        alt=""
                      />
                    </span>
                    <div class="media-body">
                      <!-- <h5 class="media-heading">
                        <strong>Admin</strong>
                      </h5> -->
                      
                      <p style="text-align:center; font-size:20px;"><a style="text-decoration: none; color:black;" href="CVs/Faisal.html">Faisal's CV</a></p>
                    </div>
                  </div>
                </a>
              </li>

              <li class="message-preview">
                <a href="#">
                  <div class="media">
                    <span class="pull-left">
                      <img
                        class="media-object"
                        src="http://placehold.it/50x50"
                        alt=""
                      />
                    </span>
                    <div class="media-body">
                      <!-- <h5 class="media-heading">
                        <strong>Admin</strong>
                      </h5> -->
                      
                      <p style="text-align:center; font-size:20px;"><a style="text-decoration: none; color:black;" href="CVs/Harith.html">Harith's CV</a></p>
                    </div>
                  </div>
                </a>
              </li>

              <li class="message-preview">
                <a href="#">
                  <div class="media">
                    <span class="pull-left">
                      <img
                        class="media-object"
                        src="http://placehold.it/50x50"
                        alt=""
                      />
                    </span>
                    <div class="media-body">
                      <!-- <h5 class="media-heading">
                        <strong>Admin</strong>
                      </h5> -->
                      
                      <p style="text-align:center; font-size:20px;"><a style="text-decoration: none; color:black;" href="CVs/Moath.html">Moath's CV</a></p>
                    </div>
                  </div>
                </a>
              </li>


              <li class="message-preview">
                <a href="#">
                  <div class="media">
                    <span class="pull-left">
                      <img
                        class="media-object"
                        src="http://placehold.it/50x50"
                        alt=""
                      />
                    </span>
                    <div class="media-body">
                      <!-- <h5 class="media-heading">
                        <strong>Admin</strong>
                      </h5> -->
                      
                      <p style="text-align:center; font-size:20px;"><a style="text-decoration: none; color:black;" href="CVs/Abdullah.html">Abdullah's CV</a></p>
                    </div>
                  </div>
                </a>
              </li>


            </ul>
          </li>

            <?php
            #show admin pannel option if the logged in user is an admin
            if(isset($_SESSION['type']) && $_SESSION['type'] == 'admin'){
              echo '<li> <a href="./admin"> Admin Dashboard</a> </li>';
            }
            ?>
            <?php
            #show admin pannel option if the logged in user is an admin
            if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
              echo '<li> <a href="manage_account.php?id='. $_SESSION['id'] . '"> Manage account</a> </li>';
            }
            ?>
          </ul>
          <?php
            #show logout option if user is logged in
            if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
              echo '<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">';
              echo '<ul class="nav navbar-nav">';
              echo    '<li> <a href="logout.php">Logout</a> </li>';
              echo '</ul>';
              echo '</dv>';
            }
            #show login / register options if user isn't logged in
            else{
              echo '<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">';
              echo '<ul class="nav navbar-nav">';
              echo    '<li> <a href="login.php">Login</a> </li>';
              echo    '<li> <a href="register.php">Register</a> </li>';
              echo '</ul>';
              echo '</dv>';
            }
          ?>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <!-- Blog Entries Column -->

        <!-- displaying posts here begins-->
        <div class="col-md-8">

        <?php
          $query = "SELECT post_content, image_id, user_id, title, DATE_FORMAT(post_time, '%M %D at %h:%i') AS formatted_time FROM posts";
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
              <img
                class="img-responsive"
                src="images/<?=$image_url?>"
                alt="post images"
              />
              <hr />
              <p>
                <?=$post_content?>
              </p>
              <a class="btn btn-primary" href="#"
                >Read More <span class="glyphicon glyphicon-chevron-right"></span
              ></a>

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
            <h4>Blog Search</h4>
            <div class="input-group">
              <input type="text" class="form-control" />
              <span class="input-group-btn">
                <button class="btn btn-default" type="button">
                  <span class="glyphicon glyphicon-search"></span>
                </button>
              </span>
            </div>
            <!-- /.input-group -->
          </div>

          <div class="well">
          <?php
            if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
              $user_id = $_SESSION['id'];

              echo "<button type=\"button\" class=\"btn btn-primary btn-lg\">";
              echo   "<a href=\"add_post.php?id=" . $user_id . "\" class=\"text-decoration-none\"> Add post </a>";
              echo "</button>";
            }
          ?>
          </div>

          <!-- Side Widget Well -->
          <div class="well">
            <h4>Side Widget Well</h4>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit.
              Inventore, perspiciatis adipisci accusamus laudantium odit aliquam
              repellat tempore quos aspernatur vero.
            </p>
          </div>
        </div>
      </div>








      
      <!-- /.row -->

      <hr />

      <!-- Footer -->
      <footer>
        <div class="row">
          <div class="col-lg-12">
            <p>Copyright &copy; SE371 2022</p>
          </div>
          <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
      </footer>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>