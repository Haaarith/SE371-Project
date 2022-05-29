<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
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
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categories <b class="caret"></b></a>
          <ul class="dropdown-menu message-dropdown"
            style="overflow: hidden; max-height:400px; max-width:600px; overflow: auto;">
            <li class="message-preview">
                  <?php
                  #query categories
                  $cat_query = "SELECT * from categories";
                  $result = mysqli_query($db, $cat_query);

                  #loop over the catogries and add them to the dropdown menu
                  while($row = mysqli_fetch_assoc($result)){
                    $cat_name = $row['cat_name'];
                  ?>
                    <a href="index.php?category=<?php echo $cat_name ?>">
                      <div class="media">
                        <div class="media-body">
                          <h5 class="media-heading">
                            <strong> <?php echo $cat_name ?> </strong>
                          </h5>
                        </div>
                      </div>
                    </a>
                  <?php } ?>
            </li>
          </ul>
        </li>






        <!-- About us drop down-->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">About us<b class="caret"></b></a>
          <ul class="dropdown-menu message-dropdown"
            style="overflow: hidden; max-height:300px; max-width:200px; overflow: auto;">

            <li class="message-preview">
              <a href="#">
                <div class="media">
                  <span class="pull-left">
                    <img class="media-object" src="http://placehold.it/50x50" alt="" />
                  </span>
                  <div class="media-body">
                    <!-- <h5 class="media-heading">
                        <strong>Admin</strong>
                      </h5> -->

                    <p style="text-align:center; font-size:20px;"><a style="text-decoration: none; color:black;"
                        href="CVs/Abdulaziz.html">Abdulaziz's CV</a></p>
                  </div>
                </div>
              </a>
            </li>

            <li class="message-preview">
              <a href="#">
                <div class="media">
                  <span class="pull-left">
                    <img class="media-object" src="http://placehold.it/50x50" alt="" />
                  </span>
                  <div class="media-body">
                    <!-- <h5 class="media-heading">
                        <strong>Admin</strong>
                      </h5> -->

                    <p style="text-align:center; font-size:20px;"><a style="text-decoration: none; color:black;"
                        href="CVs/Faisal.html">Faisal's CV</a></p>
                  </div>
                </div>
              </a>
            </li>

            <li class="message-preview">
              <a href="#">
                <div class="media">
                  <span class="pull-left">
                    <img class="media-object" src="http://placehold.it/50x50" alt="" />
                  </span>
                  <div class="media-body">
                    <!-- <h5 class="media-heading">
                        <strong>Admin</strong>
                      </h5> -->

                    <p style="text-align:center; font-size:20px;"><a style="text-decoration: none; color:black;"
                        href="CVs/Harith.html">Harith's CV</a></p>
                  </div>
                </div>
              </a>
            </li>

            <li class="message-preview">
              <a href="#">
                <div class="media">
                  <span class="pull-left">
                    <img class="media-object" src="http://placehold.it/50x50" alt="" />
                  </span>
                  <div class="media-body">
                    <!-- <h5 class="media-heading">
                        <strong>Admin</strong>
                      </h5> -->

                    <p style="text-align:center; font-size:20px;"><a style="text-decoration: none; color:black;"
                        href="CVs/Moath.html">Moath's CV</a></p>
                  </div>
                </div>
              </a>
            </li>


            <li class="message-preview">
              <a href="#">
                <div class="media">
                  <span class="pull-left">
                    <img class="media-object" src="http://placehold.it/50x50" alt="" />
                  </span>
                  <div class="media-body">
                    <!-- <h5 class="media-heading">
                        <strong>Admin</strong>
                      </h5> -->

                    <p style="text-align:center; font-size:20px;"><a style="text-decoration: none; color:black;"
                        href="CVs/Abdullah.html">Abdullah's CV</a></p>
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
            ?>
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                  <li> <a href="logout.php">Logout</a> </li>
                </ul>
              </div>
            <?php }
            #show login / register options if user isn't logged in
            else{ 
            ?>
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                  <li> <a href="login.php">Login</a> </li>
                  <li> <a href="register.php">Register</a> </li>
                </ul>
              </div>
            <?php } ?>
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container -->
</nav>