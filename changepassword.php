<?php
    include_once 'header.php';
    protect_page();
?>

<section class="main-container">
    <div class="main-wrapper">
        <h2>Change password</h2>
        <form class="changepassword" action="include/changepassword.php" method="POST" autocomplete="off">
            <input type="password" name="current_password" placeholder="Current Password" required>
            <input type="password" name="new_password" placeholder="New Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</section>

<?php
    include_once 'footer.php';
?>