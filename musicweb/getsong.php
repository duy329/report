<?php
    require_once('./conn.php');

      $sql = "SELECT * FROM song";

      $result = $conn->query($sql);
      $content = "";
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()){
            $content .= $row['songid'] . "||";
          }
          echo $content;
      }else {
          echo "0 results";
      }
?>
