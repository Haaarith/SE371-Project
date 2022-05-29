<?php 
  session_start();
  ob_start();
  include "includes/header.php";
  include_once "includes/db.php";
  include "includes/navigation.php";
?>

<div class="well">
    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign in</p>
    <form class="" method="POST">
        <div class="align-items-center ">
            <!--Div for centring the form  -->
            <div style="display: flex; align-items:center; flex-direction:column; gap:15px">
                <!-- Username field div Start -->
                <div class="form-outline text-center" style="width: 35%;">
                    <input type="text" name="username" placeholder="username" id="form3Example1c" required
                        class="form-control" />
                </div>
                <!-- Username field div End -->

                <!-- Password field div Start -->
                <div class="form-outline flex-fill  " style="width: 35%; ">
                    <input type="password" name="password" placeholder="password" id="form3Example1c" required
                        class="form-control" />
                </div>
                <!-- Password field div End -->

                <!-- Login Button Div Start -->
                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" name="login" class="btn btn-primary btn-lg">Login</button>
                </div>
                <!-- Login Button Div End -->
                
                <!-- Register Button if you dont have an account -->
                <p>Don't have an account? <a href="register.php">Register here</a></p>
            </div>
        </div>
    </form>
</div>

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

<?php 
  include "includes/footer.php";
  ob_flush();
?>