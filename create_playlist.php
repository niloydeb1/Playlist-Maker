<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
        <link rel="stylesheet" type="text/css" href="style3.css">
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                <a class="navbar-brand" href=playlistPanel.php>Playlist Maker</a>
                </div>
                <ul class="nav navbar-nav">
                <li class="active"><a href="playlistPanel.php">Home</a></li>
                <li><a href=#howTo>How to use</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php"><span class="glyphicon glyphicon-user"></span> Logout</a></li>
                </ul>
            </div>
        </nav> 
        <form name = "createPlaylist" method = "POST" action = "create_playlist.php">
            <div class = main_panel>
                <div class = inner_panel>
                    Create Playlists
                </div>
                <div class = playlists>
                    <label for="pName">Playlist Name:</label>
                    <input type="string" id="pName" name="pName" required> <br>
                    <label for="description">Description:</label>
                    <input type="string" id="description" name="description" required> <br>
                    <button type="submit" name='submit' id="create">Create</button>
                </div>
            </div>
        </form> 
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
    <?php
        session_start();
        include 'conn.php';
        if(isset($_POST["submit"])) {
            if(!empty($_POST['pName']) && !empty($_POST['description']))
            {
                $sql = "select * from playlists where playlist_name='".$_POST['pName']."' AND user='".$_SESSION['email']."'";
                $result = $mysqli->query($sql);
                if (mysqli_num_rows($result)!=0) {
                    header('Location: result2.php?msg=Playlist already exists!');
                }
                else
                {
                    $sql = "INSERT INTO playlists VALUES ('". $_POST['pName']."', '".$_POST['description']."', '".$_SESSION['email']."')";
                    $result = $mysqli->query($sql);
                    header('Location: playlistPanel.php');
                }
            }
        }
    ?>
<html>
