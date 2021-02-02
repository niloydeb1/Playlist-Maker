<?php
    $vName = $_GET['vName'];
    $pName = $_GET['pName'];
    $type = $_GET['type'];
    session_start();
    include 'conn.php';
    if($type == 'playlists')
    {
        $sql = "Delete FROM ".$type." WHERE playlist_name='".$pName."'";
        $result = $mysqli->query($sql);
        $sql = "Delete FROM videos WHERE playlist_name='".$pName."'";
        $result = $mysqli->query($sql);
    }
    else
    {
        $sql = "Delete FROM ".$type." WHERE video_name='".$vName."' AND playlist_name='".$pName."'";
        $result = $mysqli->query($sql);
    }
    header('Location: playlistPanel.php');
?>