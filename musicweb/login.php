<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="main.css">
  </head>
  <body>
      <form class="box" action="includes/login.inc.php" method="post">
        <h1>Login</h1>

        <?php
          if(isset($_GET["error"])){
            if($_GET["error"] == "wrongpawd"){
              echo '<p class="signuperror">Wrong password</p>';
            }
            else if($_GET["error"] == "nouser"){
              echo '<p class="signuperror">Invalid username</p>';
            }
            else if($_GET["error"] == "emptyfields"){
              echo '<p class="signuperror">Please fill in the fields</p>';
            }
          }
        ?>

        <input type="text" name="mailuid" placeholder="Email/Username">
        <input type="password" name="pwd" placeholder="Password">
        <button type="submit" name="login-submit">Login</button>
        <a class="signupbtn" href="signuppage.php">Signup</a>
        <a class="homebtn" href="index.php">Cancel</a>
      </form>
  </body>
</html>
