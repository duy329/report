<?php require_once('./conn.php'); ?>
<?php require_once('./authentication.php'); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css"
    />
    <link rel="stylesheet" href="style.css" />
    <title>Your songs</title>
    <script src="https://kit.fontawesome.com/b536ba5d3d.js" crossorigin="anonymous"></script>
  </head>
  <body>

    <a href='index.php' class='homeBtn'>Home</a>

    <!-- Search form-->
    <form class="search-form" method="GET">
      <input id="searchfield" type="text" name="search" value="" placeholder="Search">
    </form>

    <!-- Add song -->
    <div class="addSongBtn"><a href="form.php">+</a></div>
    <div class="songs">
      <?php require_once('./pagination.php') ?>
    </div>

    <!-- Pagination -->
    <div class="pagination">
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href=
            "<?php
              if($pageno <= 1){ echo '#'; }
              else {
                if(isset($_GET['search'])){
                  echo "?pageno=" .($pageno - 1) . "&search=$_GET[search]";
                }else{
                  echo "?pageno=" .($pageno - 1);
                }
              }
            ?>">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php
            if($pageno >= $total_pages){ echo '#'; }
            else {
              if(isset($_GET['search'])){
                echo "?pageno=" .($pageno + 1) . "&search=$_GET[search]";
              }else{
                echo "?pageno=" .($pageno + 1);
              }
            }
            ?>">Next</a>
        </li>
    </div>

    <!-- Music player -->
    <div class="music-container" id="music-container">
      <div class="music-info">
        <h4 id="title">No song is playing</h4>
        <div class="progress-container" id="progress-container">
          <div class="progress" id="progress"></div>
        </div>
      </div>

      <audio id="audio"></audio>

      <div class="img-container">
        <img alt="music-cover" src="./images/background2.jpg" id="cover"/>
      </div>
      <div class="navigation">
        <button id="prev" class="action-btn">
          <i class="fas fa-backward"></i>
        </button>
        <button id="play" class="action-btn action-btn-big">
          <i class="fas fa-play"></i>
        </button>
        <button id="next" class="action-btn">
          <i class="fas fa-forward"></i>
        </button>
      </div>
      <div class="volume">
        <i class="fas fa-volume-up"></i>
        <input type="range" id="vol" min="0" max="100" step="1" value="100" />
      </div>
    </div>

    <script src="script.js"></script>
  </body>
</html>
