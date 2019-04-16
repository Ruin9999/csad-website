<?php

include 'database.php';

$username = mysqli_escape_string($conn, $_POST['username']);
$date = mysqli_escape_string($conn, $_POST['date']);
$comment = mysqli_escape_string($conn, $_POST['comment']);
$email = mysqli_escape_string($conn, $_POST['email']);
$rating = mysqli_escape_string($conn, $_POST['rating']);

$sql = "INSERT INTO comments (comment_username, comment_date, comment_text, comment_email, comment_rating) VALUES ('$username', '$date', '$comment', '$email', '$rating')";
$result = mysqli_query($conn, $sql);
header("Location:  ../index.php#contact?comment=success");
exit();