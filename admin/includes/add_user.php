<div id="page-wrapper">
  <h1 class="text-center">Add User</h1>
  <div class="container well">
    <form action="" method="post" enctype="multipart/form-data">

      <div class="form-group">
        <label for="username">Username</label>
        <br>
        <input type="text" name="username" id="username" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <br>

        <input type="email" name="email" id="email" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <br>

        <input type="password" name="password" id="password" required>
      </div>
      <div class="form-group">
        <label for="re_password">Re-enter password</label>
        <br>

        <input type="password" name="re_password" id="re_password" required>
      </div>

      <div class="form-group">
        <label for="type">Type</label>
        <br>
        <select name="type" id="type">
          <option value='user'>user</option>

          <option value='admin'>admin</option>
        </select>
      </div>


      <div class="form-group">
        <input type="submit" class="btn btn-primary" name="add_user" value="Add user">
      </div>
    </form>


    <?php
      if(isset($_POST['add_user'])) {
        $username = mysqli_escape_string($db, $_POST['username']);
        $password = mysqli_escape_string($db, $_POST['password']);
        $re_password = mysqli_escape_string($db, $_POST['re_password']);
        $email = mysqli_escape_string($db, $_POST['email']);
        $type = mysqli_escape_string($db, $_POST['type']);
        $query = "SELECT username FROM users WHERE username = '$username'";
        $result = mysqli_query($db, $query);

        if(mysqli_num_rows($result) > 0) {
          echo "<p class=text-danger> Username is already taken!</p>";
        }

        else if($password !== $re_password) {
          echo "<p class=text-danger> Passwords don't match!</p>";
        }

        else{
          $hashedPassword = hash('sha256', $password);
          $query = "INSERT INTO users (username, email, password, type) VALUES ('$username', '$email', '$hashedPassword', '$type')";
          $result = mysqli_query($db, $query);
          echo "<p class=text-success> user successfully added!</p>";
        }
        



      }
    
    
    ?>
  </div>
</div>