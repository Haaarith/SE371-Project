<?php
  session_start();
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
            <li>
              <a href="#">Contact</a>
            </li>

            <li>
              <a href="javascript:;" data-toggle="collapse" data-target="#demo"
                ><i class="fa fa-fw fa-arrows-v"></i> About us
                <i class="fa fa-fw fa-caret-down"></i
              ></a>
              <ul id="demo" class="collapse">
                <li>
                  <a href="CVs/Abdulaziz.html">Abdulaziz's CV</a>
                </li>
                <li>
                  <a href="CVs/Abdullah.html">Abdullah's CV</a>
                </li>

                <li>
                  <a href="CVs/Faisal.html">Faisal's CV</a>
                </li>

                <li>
                  <a href="CVs/Harith.html">Harith's CV</a>
                </li>

                <li>
                  <a href="CVs/Moath.html">Moath's CV</a>
                </li>
              </ul> 
            </li>

            <?php
            #show admin pannel option if the logged in user is an admin
            if(isset($_SESSION['type']) && $_SESSION['type'] == 'admin'){
              echo '<li> <a href="./admin"> Admin Dashboard</a> </li>';
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
        <div class="col-md-8">
          <h1 class="page-header">
            Page Heading
            <small>Secondary Text</small>
          </h1>

          <h2>
            <a href="#">Blog Post Title</a>
          </h2>
          <p class="lead">by <a href="index.php">Test</a></p>
          <p>
            <span class="glyphicon glyphicon-time"></span> Posted on Wednesday,
            2022 at 10:45 PM
          </p>
          <hr />
          <img
            class="img-responsive"
            src="http://placehold.it/900x300"
            alt=""
          />
          <hr />
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            Cupiditate, voluptates, voluptas dolore ipsam cumque quam veniam
            accusantium laudantium adipisci architecto itaque dicta aperiam
            maiores provident id incidunt autem. Magni, ratione.
          </p>
          <a class="btn btn-primary" href="#"
            >Read More <span class="glyphicon glyphicon-chevron-right"></span
          ></a>

          <hr />

          <!-- Pager -->
          <ul class="pager">
            <li class="previous">
              <a href="#">&larr; Older</a>
            </li>
            <li class="next">
              <a href="#">Newer &rarr;</a>
            </li>
          </ul>
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

          <!-- Blog Categories Well -->
          <div class="well">
            <h4>Blog Categories</h4>
            <div class="row">
              <div class="col-lg-6">
                <ul class="list-unstyled">
                  <li><a href="#">Category Name</a></li>
                  <li><a href="#">Category Name</a></li>
                  <li><a href="#">Category Name</a></li>
                  <li><a href="#">Category Name</a></li>
                </ul>
              </div>
              <!-- /.col-lg-6 -->
              <div class="col-lg-6">
                <ul class="list-unstyled">
                  <li><a href="#">Category Name</a></li>
                  <li><a href="#">Category Name</a></li>
                  <li><a href="#">Category Name</a></li>
                  <li><a href="#">Category Name</a></li>
                </ul>
              </div>
              <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
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
