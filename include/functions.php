<?php
function user_logged_in() {
    return (isset($_SESSION['u_username'])) ? true : false;
}

function admin_logged_in() {
    return (isset($_SESSION['a_number'])) ? true : false;
}

function protect_page() {
    if(user_logged_in() === false) {
        header("Location: login.php");
        exit();
    }
}

function protect_page_admin() {
    if(admin_logged_in() === false) {
        header("Location: index.php");
        exit();
    }
}

function getcomment($conn) {
    $sql = "SELECT * FROM comments";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {
        echo "<div class='container commentbox'><p>";
            echo $row['comment_username']."<br>";
            echo $row['comment_date']."<br>";
            echo nl2br($row['comment_text']);
            echo "</p>";
        echo "<form class='deleteform' method='POST' action='include/deletecomment.php'>
                    <input type='hidden' name='commentid' value='".$row['comment_id']."'>
                    <button type='submit' name='commentdelete'>Delete</button>
                    </form>";
        echo "</div>";
    }
}   
