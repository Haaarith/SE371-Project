<?php 
  include "includes/header.php";
  session_start();

?>

<!-- Navigation -->
<?php
  if(!isset($_SESSION) || !isset($_SESSION['id'])) { 
    header('location: index.php');//User isn't logged in.
  }

  else if($_SESSION['type'] === 'admin'){
    header('location: admin/');//If current user is an admin => direct him to admin page
  }


  else if($_SESSION['type'] !== 'user'){//some
    header('location: index.php');//In case the key 'type' doesn't have the value 'user', then the current user isn't permitted to get into this area!
  }
  

?>
<nav class="navbar navbar-inverse navbar-fixed-top container-fluid" role="navigation">
  <div class="container row">
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
    <div
      class="collapse navbar-collapse col-md-8"
      id="bs-example-navbar-collapse-1"
    >
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

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"
              >Something <b class="caret"></b
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
                      <h5 class="media-heading">
                        <strong>Admin</strong>
                      </h5>
                      <p class="small text-muted">
                        <i class="fa fa-clock-o"></i> Yesterday at 4:32 PM
                      </p>
                      <p>Lorem ipsum dolor sit amet, consectetur...</p>
                    </div>
                  </div>
                </a>
              </li>


              
              <li class="message-footer">
                <a href="#">Read All New Messages</a>
              </li>
            </ul>
          </li>





          <!-- CVs drop down-->
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"
              >About <b class="caret"></b
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



        

        
        <li class="float-end">
          <a href="logout.php">Logout</a>
        </li>
  <!-- /.navbar-collapse -->

    </div>
    <!-- <div class="btn-group col-md-4">
      <button class="btn">
        <a href="register.php">Register Here</a>
      </button>
    </div> -->
  </div>
  <!-- /.container -->
</nav>

<!-- Page Content -->
<div class="container">
  <div class="row">
    <!-- Blog Entries Column -->
    <div class="col-md-8">
      <h1 class="page-header">
        WELCOME
        <small><?=$_SESSION['username'];?></small>
      </h1>

      <h2>
        <a href="#">Blog Post Title</a>
      </h2>
      <p class="lead">by <a href="index.php">Test</a></p>
      <p>
        <span class="glyphicon glyphicon-time"></span> Posted on Wednesday, 2022
        at 10:45 PM
      </p>
      <hr />
      <img class="img-responsive" src="http://placehold.it/900x300" alt="" />
      <hr />
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate,
        voluptates, voluptas dolore ipsam cumque quam veniam accusantium
        laudantium adipisci architecto itaque dicta aperiam maiores provident id
        incidunt autem. Magni, ratione.
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
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore,
          perspiciatis adipisci accusamus laudantium odit aliquam repellat
          tempore quos aspernatur vero.
        </p>
      </div>
    </div>
  </div>
  <!-- /.row -->
</div>


<?php 
  include "includes/footer.php";


?>