<table class="table table-hover table-bordered">
  <thead>
    <tr>
      <th>ID</th>
      <th>Username</th>
      <th>Email</th>
      <th>Type</th>
      <th>Make Admin</th>
      <th>Make User</th>
      <th>Delete</th>
    </tr>
  </thead>

  <tbody>
    <?php

        #querying the current admin's ID so that it's NOT displayed during users diaplay
        $id_current_admin = $_SESSION['id'];
        $query = "SELECT * FROM users WHERE id != $id_current_admin";
        $result = mysqli_query($db, $query);

        #looping over the users to fill the table
        while($row = mysqli_fetch_assoc($result)) {
          $id = $row['id'];
          $username = $row['username'];
          $email = $row['email'];
          $type = $row['type'];
         
          #displaying the table row in addition to using the user's id to be able to use the options
          echo "<tr>
          <td>$id</td>
          <td>$username</td>
          <td>$email</td>
          <td>$type</td>
          <td><a href=users.php?make_admin=$id>Apply</a></td>
          <td><a href=users.php?make_user=$id>Apply</a></td>
          <td> <a href=users.php?delete_user=$id> delete</a></td>
        </tr>";
       
        
        }
        #deleting the user
         if(isset($_GET['delete_user'])) {
           $id = $_GET['delete_user'];
           $query = "DELETE FROM users WHERE id = $id";
           mysqli_query($db, $query);
           header('Location: users.php');
         }

         #making the user an admin
        if(isset($_GET['make_admin'])) {
          $id = $_GET['make_admin'];

          $query = "UPDATE users SET type = 'admin' WHERE id = $id";
          $result = mysqli_query($db, $query);
          if(!$result) {
            die("Something went wrong! " . mysqli_error($db));
          }
          else{
            header('Location: users.php');
          }
        }

        #making the user a user (from admin to user)
        if(isset($_GET['make_user'])) {
          $id = $_GET['make_user'];

          $query = "UPDATE users SET type = 'user' WHERE id = $id";
          $result = mysqli_query($db, $query);
          if(!$result) {
            die("Something went wrong! " . mysqli_error($db));
          }
          else{
            header('Location: users.php');
          }
        }

        // if(isset($_GET['make_user'])) {
        //   $id = $_GET['make_user'];
        //   $query = "UPDATE users SET role='User' WHERE id = $id";
        //   mysqli_query($connection, $query);
        //   header('Location: users.php');
        // }

        

       
        ?>

  </tbody>
</table>