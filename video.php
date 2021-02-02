<?php
    $vName = $_GET['vName'];
    $pName = $_GET['pName'];
    $vDesc = $_GET['vDesc'];
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
        <link rel="stylesheet" type="text/css" href="style2.css">
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                <a class="navbar-brand" href=playlistPanel.php>Playlist Maker</a>
                </div>
                <ul class="nav navbar-nav">
                <li class="active"><a href="playlistPanel.php">Home</a></li>
                <!-- <li><a href="#">Create Playlist</a></li>
                <li><a href="#">Delete Playlist</a></li> -->
                <?php 
                    // echo '<li><a  href="add_video.php?vName='.$vName.'&desc='.$vDesc.'">Add Video</a></li>'; 
                    // echo '<li><a  href="delete_video.php?vName='.$vName.'&desc='.$vDesc.'">Delete Video</a></li>'; 
                ?>
                <li><a href=#howTo>How to use</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php"><span class="glyphicon glyphicon-user"></span> Logout</a></li>
                </ul>
            </div>
        </nav> 
        <div class = main_panel>
            <div class = inner_panel>
                Video
            </div>
            <div class = playlists>
                <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/OK_JCtrrv-c" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </iframe> -->
                <!-- <p>This is my note in this video.</p> -->
                <?php
                    session_start();
                    include 'conn.php';
                    $sql = "SELECT embed FROM videos WHERE video_name='".$vName."' AND playlist_name='".$pName."' AND user='".$_SESSION['email']."'";
                    $result = $mysqli->query($sql);
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $embeded = $row['embed'];
                        echo $embeded;
                        echo "<p>".$vDesc."</p>";
                    }
                ?>
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
