  <?php
    require_once('./conn.php');

    if(isset($_POST['songid'])){
        $sql = "SELECT * FROM song WHERE songid=$_POST[songid]";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo $row['songname'] . "&&". $row['banner'];
        }else {
            echo "0 results";
        }
    }
?>
