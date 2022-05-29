<?php
  session_start();
  include_once 'includes/db.php';
  
  $id = $_GET['id'];
  $query = "DELETE from posts WHERE id=$id";
  mysqli_query($db, $query);

  header('location: index.php');
?>