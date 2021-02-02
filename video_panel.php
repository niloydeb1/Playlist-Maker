<?php
    $name = $_GET['name'];
    $desc = $_GET['desc'];
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
                <?php 
                    // echo '<li><a  href="add_video.php?name='.$name.'&desc='.$desc.'">Add Video</a></li>'; 
                    echo '<li><a  href="delete_video.php?name='.$name.'&desc='.$desc.'">Delete Video</a></li>'; 
                ?>
                <!-- <li><a href="add_video.php?vName=".$name."&desc='".$desc."'>Add Video</a></li>
                <li><a href="delete_video.php">Delete Video</a></li> -->
                <li><a href=#howTo>How to use</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php"><span class="glyphicon glyphicon-user"></span> Logout</a></li>
                </ul>
            </div>
        </nav> 
        <div class = main_panel>
            <div class = inner_panel>
                Playlist
            </div>
            <div class = playlists>
                <?php
                    session_start();
                    include 'conn.php';
                    $sql = "SELECT * FROM videos WHERE user='".$_SESSION['email']."' and playlist_name = '".$name."'";
                    $result = $mysqli->query($sql);
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $vName = $row['video_name'];
                        $vDesc = $row['video_description'];
                        echo '<a style="margin: 20px" href="video.php?vName='.$vName.'&pName='.$name.'&vDesc='.$vDesc.'">'.$vName.'</a>';
                    }
                ?>
                <p><?php echo $desc; ?></p>
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
