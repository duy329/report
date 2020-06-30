<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="upload.css">
</head>
<body>
    <form class="box" action="addsong.php" method="post" enctype="multipart/form-data">
        <label for="song">Song</label>
        <input class="fileinput" type="file" id="song" name="song" ><br>
        <label for="banner">Banner</label>
        <input class="fileinput" type="file" id="banner" name="banner"><br>
        <input type="submit" value="Upload Song" name="uploadsong">
        <a class="homebtn" href="song.php">Cancel</a>
    </form>
</body>
</html>
