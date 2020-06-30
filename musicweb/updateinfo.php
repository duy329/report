<?php
  session_start();
  if(isset($_POST['update-submit'])){
    require 'includes/dbh.in.php';

    $username = $_POST['username'];
    $email = $_POST['email'];
    $uid = $_SESSION['userId'];
    $sql = "UPDATE users set uidUsers='$username' , emailUsers='$email' where idUsers=$uid";
    $conn->query($sql);

    $_SESSION['userUId'] = $username;
    $_SESSION['email'] = $email;

    header('Location: userinfo.php');
  }
 ?>
