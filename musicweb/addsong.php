<?php
   require_once('./conn.php');

   session_start();

   if(isset($_POST["uploadsong"])) {
         // save file to uploads folder
        move_uploaded_file($_FILES['song']['tmp_name'], 'uploads/'. $_FILES['song']['name']);
        move_uploaded_file($_FILES['banner']['tmp_name'], 'images/'. $_FILES['banner']['name']);

        $file =  $_FILES["song"]["name"];

        $name = substr($file, 0, strpos($file, "."));
        $banner =  $_FILES["banner"]["name"];

        if($banner === ""){
          $banner = 'default.jpg';
        }
        $sql = "insert into song(songname, banner, userid) values('$name', '$banner', $_SESSION[user])";

         if ($conn->query($sql) === TRUE) {
            header("Location: http://localhost/musicweb/song.php");
         } else {
             echo "Error creating table: " . $conn->error;
         }


   }
?>




<audio src="./uploads/$result">
