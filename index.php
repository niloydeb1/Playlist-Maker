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
                <ul class="nav navbar-nav navbar-right">
                <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Sign Up</button>
                <button onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Login</button>
                </ul>
            </div>
        </nav> 
        <div class = main_panel>
            <div class = inner_panel>
                Welcome <br> To <br> Playlist Maker
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

        <div id="id02" class="modal">
            <form class="modal-content animate" action="index.php" method="post">
                <div class="container">
                <label for="email2"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email2" required>

                <label for="password2"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password2" required>
                    
                <button type="submit" value="Login">Login</button>
                </div>

                <div class="container" style="background-color:#f1f1f1">
                <button type="button" style="width:100%" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
                </div>
            </form>
        </div>

        <div id="id01" class="modal">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            <form class="modal-content" method = "POST" action="index.php">
                <div class="container">
                <h1>Sign Up</h1>
                <p>Please fill in this form to create an account.</p>
                <hr>
                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" required>

                <label for="password"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>

                <label for="password-repeat"><b>Repeat Password</b></label>
                <input type="password" placeholder="Repeat Password" name="password-repeat" required>

                <div class="clearfix">
                    <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                    <button type="submit" value="sign-up" class="signupbtn">Sign Up</button>
                </div>
                </div>
            </form>
        </div>
        <script>
            // Get the modal
            var modal = document.getElementById('id01');

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }

            // Get the modal
            var modal = document.getElementById('id02');

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>
        <?php
            session_start();
            include 'conn.php';
            if(isset($_POST["email"])) {
                if($_POST['password'] == $_POST['password-repeat'])
                {
                    $sql = "select * from users where email='".$_POST['email']."'";
                    $result = $mysqli->query($sql);
                    if (mysqli_num_rows($result)!=0) {
                        // header('Location: result.php?msg=User already exists!');
                        // exit();
                        echo "<script>location='result.php?msg=User already exists!'</script>";
                    }
                    else
                    {
                        $sql = "INSERT INTO users VALUES ('". $_POST['email']. "', '".sha1($_POST['password'])."')";
                        $result = $mysqli->query($sql);

                        if(!$result){
                            // header('Location: result.php?msg=Sign-Up Failed!');
                            // exit();
                            echo "<script>location='result.php?msg=Sign-Up Failed!'</script>";
                        }
                        else{
                            $_SESSION['is_login'] = true;
                            $_SESSION['email'] =  $_POST['email'];
                            // header('Location: playlistPanel.php');
                            // exit();
                            echo "<script>location='playlistPanel.php'</script>";
                        }
                    }
                }
                else{
                    // header('Location: result.php?msg=Password does not match!');
                    // exit();
                    echo "<script>location='result.php?msg=Password does not match!'</script>";
                }
            }
            else if(isset($_POST["email2"]))
            {
                $sql = "SELECT * FROM users WHERE email='".$_POST['email2']."' and password='".sha1($_POST['password2'])."'";
                $result = $mysqli->query($sql);

                if(is_object($result) && $row= $result->fetch_assoc()){
                    $_SESSION['is_login'] = true;
                    $_SESSION['email'] =  $_POST['email2'];
                    // header('Location: playlistPanel.php');
                    echo "<script>location='playlistPanel.php'</script>";
                }
                else{
                    // header('Location: result.php?msg=Login Failed!');
                    // exit();
                    echo "<script>location='result.php?msg=Login Failed!'</script>";
                }
            }
        ?>
    </body>
<html>
