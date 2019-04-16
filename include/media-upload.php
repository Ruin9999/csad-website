<?php

if(isset($_POST['upload'])) {
    
    include_once 'database.php';
    
    $artist = mysqli_escape_string($conn, $_POST['artist']);
    $title = mysqli_escape_string($conn, $_POST['title']);
    $url = mysqli_escape_string($conn, $_POST['url']);
    $genre = mysqli_escape_string($conn, $_POST['genre']);
    
    $sql = "SELECT * FROM media WHERE media_url = '$url'";
    $result = mysqli_query($conn, $sql);
    $checkresult = mysqli_num_rows($result);
    if($checkresult > 0) { //url already posted
        header("Location: ../index.php?media=notavail");
        exit();
    } else { //url not posted yet
        $sql = "INSERT INTO media (media_url, media_genre, media_title, media_artist) VALUES ('$url', '$genre', '$title', '$artist')";
        mysqli_query($conn, $sql);
        header("Location: ../index.php#media");
        exit();
    }
} else if(isset($_POST['delete'])) {
        
    include_once 'database.php';
    
    $artist = mysqli_escape_string($conn, $_POST['artist']);
    $title = mysqli_escape_string($conn, $_POST['title']);
    $url = mysqli_escape_string($conn, $_POST['url']);
    
    $sql = "DELETE FROM media WHERE media_title LIKE '%$title%' OR media_artist LIKE '%$artist%' OR media_url LIKE '%$url%'";
    mysqli_query($conn, $sql);
    header("Location: ../index.php#media");
    exit();    
} else {
    header("Location:index.php");
    exit();
}