<?php ob_start(); ?>
<?php include "includes/header.php";?>
<?php include_once "includes/db.php";?>


<?php
  session_start();
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
  <div class="container-fluid">
    <form action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <?php
                $id = $_GET['id'];
                $user_query = "SELECT * from users where id = $id";
                $user_result = mysqli_query($db, $user_query);
                $user = mysqli_fetch_assoc($user_result);
                $user_name = $user['username'];
                $email = $user['email'];
                echo '<label for="cat_id">Edit user name</label> <br>';
                echo '<input type="text" name="username" value="'.$user_name.'"> <br> <br>';
                echo '<label for="cat_id">Edit email</label> <br>';
                echo '<input type="text" name="email" value="'.$email.'"> <br> <br>';
                echo '<label for="cat_id">Edit password</label> <br>';
                echo '<input type="password" name="password"> <br> <br>';
                echo '<label for="cat_id">Retype password</label> <br>';
                echo '<input type="password" name="re_password"> <br> <br>';
                ?>

        <!-- <label for="post_category">Post Category ID</label>
<input type="text" class="form-control" name="post_category_id"> -->

      </div>



      <div class="form-group">

        <input type="submit" class="btn btn-primary" name="Submit" value="Sumbit">

      </div>



    </form>


  </div>
  <!-- /.container-fluid -->

</div>

<?php 
    if(isset($_POST['Submit'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $re_password = $_POST['re_password'];

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
            #Passwords match! --> Edit user info in database
            $hashedPass = hash('sha256', $password);
            $id = $_SESSION['id'];
            $query = "UPDATE users SET username = '$username', email = '$email', password = '$hashedPass' WHERE id = $id";
            $result = mysqli_query($db, $query);
            header("location: manage_account.php");
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