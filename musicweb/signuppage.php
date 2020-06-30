<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="main.css">
  </head>
  <body>
    <div class="box">
      <h1>Signup</h1>
      <?php
        if(isset($_GET["error"])){
          if($_GET["error"] == "emptyfield"){
            echo '<p class="signuperror">Fill in all the fields</p>';
          }
          else if($_GET["error"] == "invalidmailuid"){
            echo '<p class="signuperror">Invalid username and email</p>';
          }
          else if($_GET["error"] == "invalidmail"){
            echo '<p class="signuperror">Invalid email</p>';
          }
          else if($_GET["error"] == "invaliduid"){
            echo '<p class="signuperror">Invalid username</p>';
          }
          else if($_GET["error"] == "passwordcheck"){
            echo '<p class="signuperror">Password does not match</p>';
          }
          else if($_GET["error"] == "usertaken"){
            echo '<p class="signuperror">User taken</p>';
          }
        }
        else if(isset($_GET["signup"]) == "success"){
          echo '<p class="signuperror">Signup successful</p>';
        }
       ?>
      <form class="form-signup" action="includes/signup.in.php" method="post">
        <input type="text" name="uid" placeholder="Username">
        <input type="text" name="mail" placeholder="Email">
        <input type="password" name="pwd" placeholder="Password">
        <input type="password" name="pwd-repeat" placeholder="Reapeat password">
        <button type="submit" name="signup-submit">Signup</button>
        <a class="homebtn" href="login.php">Login</a>
      </form>
    </div>
  </body>
</html>
