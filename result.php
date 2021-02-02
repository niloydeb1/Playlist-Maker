<?php
    $msg = $_GET['msg'];
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
        <link rel="stylesheet" type="text/css" href="style1.css">
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                <a class="navbar-brand" href=index.php>Playlist Maker</a>
                </div>
                <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href=#howTo>How to use</a></li>
                </ul>
            </div>
        </nav> 
        <div class = main_panel>
            <div class = inner_panel>
                <?php echo "<p style='color:RGB(255, 37, 0); padding:35px; font-size:46px; text-align:center;'>" .$msg. "</p>"; ?>
            </div>
        </div>
        <div class = howTo id = howTo>
            <p>How to use: <br>
                1. Sign-up/Sign-In <br>
                2. Create playlist <br>
                3. Add videos to playlist from Youtube using embeded code <br>
                4. Watch videos <br>
                5. Delete playlists or videos <br>
            </p>
        </div>
    </body>
<html>
