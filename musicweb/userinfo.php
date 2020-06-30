<?php
  session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>User's infomation</title>
    <link rel="stylesheet" href="info.css">
  </head>
  <body>
    <div class="box">
      <form class="userinfo" action="updateinfo.php" method="post">
        <ul>
          <li class="info">
            <p>Username</p>
          </li>
          <input type="text" name="username" value=<?php echo $_SESSION['userUId']?>>
          <li class="info">
            <p>Email</p>
          </li>
          <input type="text" name="email" value=<?php echo $_SESSION['email']?>>
          <br>
          <input class="updatebtn" type="submit" value="Update" name="update-submit">
          <a class="homebtn" href="index.php">Home</a>
        </ul>
      </form>
    </div>
  </body>
</html>
