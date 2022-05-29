<?php 
  session_start();
  ob_start();
  include "includes/header.php";
  include_once "includes/db.php";
  include "includes/navigation.php";
  include "functions.php";
?>

<?php
  if(isset($_GET['id'])) {
    $user_id = $_GET['id'];
  }
  else{
    header("Location: index.php");
  }
?>

<div id="page-wrapper">
    <div class="container text-center">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <h1>Account management</h1>
                <?php
                $id = $_GET['id'];
                $user_query = "SELECT * from users where id = $id";
                $user_result = mysqli_query($db, $user_query);
                $user = mysqli_fetch_assoc($user_result);
                $user_name = $user['username'];
                $email = $user['email'];
                ?>
                <div class="well">
                    <label style="font-size:18px" for="username">Edit user name</label> <br>
                    <input class="input-lg" style="width:50%;" type="text" name="username"
                        value="<?php echo $user_name ?>"> <br>
                    <br>
                    <label style="font-size:18px" for="email">Edit email</label> <br>
                    <input class="input-lg" style="width:50%;" type="text" name="email" value="<?php echo $email ?>">
                    <br> <br>
                    <label style="font-size:18px" for="password">Edit password</label> <br>
                    <input class="input-lg" style="width:50%;" type="password" name="password"> <br> <br>
                    <label style="font-size:18px" for="re_password">Retype password</label> <br>
                    <input class="input-lg" style="width:50%;" type="password" name="re_password"> <br> <br>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="Submit" value="Sumbit">
                </div>
            </div>
        </form>
    </div>
</div>

<?php
    #display success message if the account has been updated
    if(isset($_SESSION['updated']) && $_SESSION['updated'] == true){

      echo "<p class='text-success'> Account updated! </p>";
      $_SESSION['updated'] = false;
      $id = $_SESSION['id'];
      $query = "SELECT username FROM users WHERE id = $id";
      $result = mysqli_query($db, $query);
      $row = mysqli_fetch_assoc($result);
      $_SESSION['username'] = $row['username'];
      echo "The new username is " . $_SESSION['username'];

      
      // echo "The updated username is " . $_POST['username'];
      
    }
    #back button heading to homepage
    if(isset($_POST['back'])){
      unset($_SESSION['updated']); #unset the variable to not show the message when going back
      header("Location: index.php");
    }
    #submitting the update info
    if(isset($_POST['Submit'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $re_password = $_POST['re_password'];

        #checking if the username already exists in the database
        $check_user_exists = "SELECT * from users where username='$username'";
        $res = mysqli_query($db, $check_user_exists);
        $row = mysqli_fetch_assoc($res);
        #if the username already exists it shows "username is taken" message
        $id = $_SESSION['id'];
        if($row['username'] == $username && $row['id'] !== $id){
            echo '<p class="text-danger"> Username is taken! </p>';
        }
        #if the username doesn't exists, we check if the passwords match
        else{
            if($password === $re_password) {
            #Passwords match! --> Edit user info in database
            $hashedPass = hash('sha256', $password);
            $id = $_SESSION['id'];
            $query = "UPDATE users SET username = '$username', email = '$email', password = '$hashedPass' WHERE id = $id";
            $result = mysqli_query($db, $query);
            #Set session variable updated to true to show message after header
            $_SESSION['updated'] = true;
            header("Location: manage_account.php?id=$id");
            }
        #Passwords don't match --> show "passwords don't match" message
        else{
            echo "<p class='text-danger'> Passwords don't match! </p>";
            }
        }
        // header("Location: index.php");
    }
?>
<?php include "includes/footer.php";?>
<?php ob_flush(); ?>