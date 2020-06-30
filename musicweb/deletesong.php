<?php
    require_once("./conn.php");
    if(isset($_POST['songid'])){
        $sql = "DELETE FROM song WHERE songid = '$_POST[songid]';";
    }
    $conn->query($sql);
?>
