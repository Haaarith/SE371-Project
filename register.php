<?php 
  session_start();
  ob_start();
  include "includes/header.php";
  include_once "includes/db.php";
  include "includes/navigation.php";
  
?>

<div class="well">
    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign Up</p>
    <form class="" method="POST">
        <div class="align-items-center ">
            <!--Div for centring the form  -->
            <div style="display: flex; align-items:center; flex-direction:column; gap:15px">
                <div class="form-outline" style="width: 35%;">
                    <input type="text" name="username" placeholder="username" id="form3Example1c" required
                        class="form-control" />
                </div>
                <!--  -->

                <!--  -->
                <div class="form-outline " style="width: 35%;">
                    <input type="email" name="email" placeholder="email" id="form3Example1c" required
                        class="form-control" />
                </div>
                <!--  -->

                <!--  -->
                <div class="form-outline" style="width: 35%;">
                    <input type="password" name="password" placeholder="password" id="form3Example1c" required
                        class="form-control" />
                </div>
                <!--  -->

                <!--  -->
                <div class="form-outline" style="width: 35%;">
                    <input type="password" placeholder="repeat your password" name="re_password" required
                        id="form3Example4cd" class="form-control" />
                </div>
                <!--  -->

                <!--  -->
                <div class="form-check " style="width: 35%;">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                    <label class="form-check-label" for="form2Example3">
                        I agree to all the Terms and Conditions <a href="#!">Terms of service</a>
                    </label>
                </div>
                <!--  -->

                <!--  -->
                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" name="register" class="btn btn-primary btn-lg">Register</button>
                </div>
                <!--  -->
            </div>
        </div>

    </form>
</div>


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

<?php 
  include "includes/footer.php";
  ob_flush();
?>