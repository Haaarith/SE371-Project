
<?php 
  session_start();
  include "includes/header.php";
  include_once "includes/db.php";


?>


<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign in</p>






                <form class="mx-1 mx-md-4" method="POST">

                  <div class="d-flex flex-row align-items-center mb-5">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name="username" placeholder="username" id="form3Example1c" required class="form-control" />
                    </div>
                  </div>

                 


                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <input type="password" name="password" placeholder="password" id="form3Example1c" required class="form-control" />
                    </div>
                  </div>

                  <div class="form-check d-flex justify-content-center mb-5">
                    <label class="form-check-label" for="form2Example3">
                    </label>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" name="login" class="btn btn-primary btn-lg">Login</button>
                  </div>

                </form>
                <p>Don't have an account? <a href="register.php">Register here</a></p>


                <?php

                    if(isset($_POST['login'])) {
                      $username = $_POST['username'];
                      $password = $_POST['password'];
                      //Hashing the inserted password to compare it with the password hashed in the database.
                      $hashedPassword = hash('sha256', $password);

                      $query = "SELECT id, username, type, password FROM users WHERE username = '$username'";

                      $result = mysqli_query($db, $query);//username, email, password
                      
                      if(!$result) die("Something is wrong with the query!");
                      else{


                        if(mysqli_num_rows($result) == 0){
                          echo "<p class='text-danger'> Username/Password is incorrect! </p>";
                        }

                        else{
                          //There is a row returned from the query.
                          //username, password
                          $row = mysqli_fetch_assoc($result);
                          $usernameDatabase = $row['username'];
                          $passwordDatabase = $row['password'];
                          $id = $row['id'];
                          $type = $row['type'];
                          if($passwordDatabase !== $hashedPassword){
                              echo "<p class='text-danger'> Username/Password is incorrect! </p>";
                          }
                          else{
                            $_SESSION['type'] = $type;//either admin or user
                            $_SESSION['id'] = $id;
                            $_SESSION['username'] = $username;
                            $_SESSION['logged_in'] = true;
                            // header("location: dashboard.php");
                            header("location: index.php");
                          }
                        }

                      }

                    }

              ?>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



<?php 
  include "includes/footer.php";


?>