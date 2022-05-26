<?php 
  include "includes/header.php";


?>

<!-- Navigation -->
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

        <li>
          <a href="javascript:;" data-toggle="collapse" data-target="#demo"
            ><i class="fa fa-fw fa-arrows-v"></i> CVs
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

        
        <li class="float-end">
          <a href="register.php">Register Here</a>
        </li>

        <li class="float-end">
          <a href="login.php">Login Here</a>
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
        Page Heading
        <small>Secondary Text</small>
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