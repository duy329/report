<?php
    if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
        $pageno = 1;
      }

    // songs per page
    if (isset($_GET['search'])) {
        $no_of_records_per_page = 2;
    } else {
        $no_of_records_per_page = 5;
    }

    $offset = ($pageno-1) * $no_of_records_per_page;

    $conn = mysqli_connect("localhost","root","","music");
    $conn -> set_charset("utf8");

    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        die();
    }

    if(isset($_GET['search'])){
        $total_pages_sql = "SELECT count(*) FROM song where songname like '%$_GET[search]%'";
    }else{
        $total_pages_sql = "SELECT count(*) FROM song";
    }

    $result = mysqli_query($conn,$total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $no_of_records_per_page);

    echo "<p class='totalSongs' data-total=$total_rows>Total Songs: $total_rows </p>";

    if(isset($_GET['search'])){
        $sql = "SELECT * FROM song WHERE songname LIKE '%$_GET[search]%' limit $offset, $no_of_records_per_page;";
    }else{
        $sql = "CALL getSongsWithLimit($offset,$no_of_records_per_page)";
    }
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()){
          echo "<div class='song' data-id='$row[songid]'><p data-id='$row[songid]'>$row[songname]</p><div class='songs__utils'>";
          if(!isset($_GET['playlist'])){
            // echo "<i class='fas fa-heart favorite' data-id='$row[songid]'></i>";
          }
          echo "<i class='fas fa-trash delete' data-id='$row[songid]'></i></div></div>";
    }
    mysqli_close($conn);
?>
