<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Music Web</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

  </head>
  <body>
      <!-- navigation -->
      <section id="nav-bar">
      <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="index.php">Wave for artist</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>

            <?php
              session_start();
              if(isset($_SESSION['userId'])){
                echo "<li class='nav-item'><a class='nav-link' href='userinfo.php'>User</a></li>";
                echo "<li class='nav-item'><a class='nav-link' href='song.php'>Your songs</a></li>";
                echo "<li class='nav-item'><a class='nav-link' href='includes/logout.inc.php'>Logout</a></li>";
              }else{
                echo "<li class='nav-item'><a class='nav-link' href='signuppage.php'>Sign up</a></li>
                <li class='nav-item'><a class='nav-link' href='login.php' tabindex='-1' aria-disabled='true'>Login</a>
                </li>";
              }
            ?>

          </ul>
        </div>
      </nav>
      </section>

      <!-- slider -->
      <div id="slider">
        <div id="headerSlider" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#headerSlider" data-slide-to="0" class="active"></li>
            <li data-target="#headerSlider" data-slide-to="1"></li>
            <li data-target="#headerSlider" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="images/slider3.jpg" class="d-block img-fluid" alt="pic1">
            </div>
            <div class="carousel-item">
              <img src="images/slider1.jpg" class="d-block img-fluid" alt="pic2">
            </div>
            <div class="carousel-item">
              <img src="images/slider2.jpg" class="d-block img-fluid" alt="pic3">
            </div>
          </div>
        </div>
      </div>

      <!-- footer -->
      <section id="about">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <h2>About us</h2>
              <div class="about-content">
                  -Our mission is to unlock the potential of human creativity—by giving a million creative artists
                  the opportunity to live off their art and billions of fans the opportunity to enjoy and be inspired by it.
              </div>
            </div>
            <div class="col-md-6">
              <h2>Customer service</h2>
              <div class="contact-content">
                  -Check out our help site for answers to your questions and to learn how to get the most out of your music.
                  <br>
                  -Feeling sociable? Simply tweet the team and they'll do all they can to help.
              </div>
            </div>
          </div>
        </div>
      </section>
  </body>
</html>
