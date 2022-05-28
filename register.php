
<?php 
  include "includes/header.php";
  include_once "includes/db.php";
  session_start();
?>


<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>






                <form class="mx-1 mx-md-4" method="POST">

                  <div class="d-flex flex-row align-items-center mb-5">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name="username" placeholder="username" id="form3Example1c" required class="form-control" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" name="email" placeholder="email" id="form3Example1c" required class="form-control" />
                    </div>
                  </div>



                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <input type="password" name="password" placeholder="password" id="form3Example1c" required class="form-control" />
                    </div>
                  </div>




                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" placeholder="repeat your password" name="re_password" required id="form3Example4cd" class="form-control" />
                    </div>
                  </div>

                  <div class="form-check d-flex justify-content-center mb-5">
                    <input class="form-check-input me-2"  type="checkbox" value="" id="form2Example3c" />
                    <label class="form-check-label" for="form2Example3">
                      I agree all statements in daslkdhsadasda <a href="#!">Terms of service</a>
                    </label>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" name="register" class="btn btn-primary btn-lg">Register</button>
                  </div>

                </form>


                <?php

                    if(isset($_POST['register'])) {
                      $username = $_POST['username'];
                      $email = $_POST['email'];
                      $password = $_POST['password'];
                      $re_password = $_POST['re_password'];
                      $type = "user";

                      #checking if the username already exists in the database
                      $check_user_exists = "SELECT username from users where username='$username'";
                      $res = mysqli_query($db, $check_user_exists);
                      #if the username already exists it shows "username is taken" message
                      if(mysqli_num_rows($res) > 0){
                        echo '<p class="text-danger"> Username is taken </p>';
                      }
                      #if the username doesn't exists, we check if the passwords match
                      else{
                        if($password === $re_password) {
                          #Passwords match! --> add the user info to the database
                          $username = $_POST['username'];
                          $hashedPass = hash('sha256', $password);
                          $query = "INSERT INTO users (username, email, password, type) VALUES ('$username', '$email', '$hashedPass', '$type')";
                          $result = mysqli_query($db, $query);
                          echo "YES!";
                          #return the user to the homepage & log him in
                          $login_query = "SELECT id from users where username='$username'";
                          $result = mysqli_query($db, $login_query);
                          $row = mysqli_fetch_assoc($result);
                          //this a new comment
                          $_SESSION['id'] = $row['id'];
                          $_SESSION['username'] = $username;
                          $_SESSION['logged_in'] = true;
                          header("location: index.php");
                        }
                        #Passwords don't match --> show "passwords don't match" message
                        else{
                          echo "<p class='text-danger'> Passwords don't match! </p>";
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