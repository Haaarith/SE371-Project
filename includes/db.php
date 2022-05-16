<?php
$servername = "localhost"; # server name where my SQL is running
$username = "root"; # user name of MYSQL
$password = ""; # password of mySQL server
$dbname = "web_app"; # database that is created 


$db = new Mysqli; # Create an object of MYSQL
$db->connect($servername, $username, $password, $dbname);

if(!$db){
  echo "error dbecting to MYSQL";
}
?>