<?php
include_once 'header.php';
include_once 'include/database.php';
include_once 'include/functions.php';
?>
<div class="container">
    <?php
    getcomment($conn);
    ?>
</div>
<div class="container">
    <?php
    include_once 'include/database.php';
    $sql = "SELECT AVG(comment_rating) comment_ratingavg FROM comments";
    $result = mysqli_query($conn, $sql);
    if($row = mysqli_fetch_assoc($result)) {
        $avg = $row['comment_ratingavg'];
    }
    ?>
    <div class="text-center">
        <h4>Ratings</h4>
        <h6>Average ratings for the site</h6>
        <?php
        if($avg == 0) {
        ?>
        <span class="fa fa-star icon-a"></span>
        <span class="fa fa-star icon-a"></span>
        <span class="fa fa-star icon-a"></span>
        <span class="fa fa-star icon-a"></span>
        <span class="fa fa-star icon-a"></span>
        <?php 
        } else if($avg <= 1) {
        ?>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star icon-a"></span>
        <span class="fa fa-star icon-a"></span>
        <span class="fa fa-star icon-a"></span>
        <span class="fa fa-star icon-a"></span>
        <?php 
        } else if ($avg <= 2) {
        ?>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star icon-a"></span>
        <span class="fa fa-star icon-a"></span>
        <span class="fa fa-star icon-a"></span>
        <?php
        } else if($avg <= 3) {
        ?>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star icon-a"></span>
        <span class="fa fa-star icon-a"></span>
        <?php
        } else if($avg <= 4) {
        ?>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star icon-a"></span>
        <?php
        } else if($avg <= 5) {
        ?>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <?php } ?>
    </div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
include_once 'footer.php';
?>