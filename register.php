 <?php
    include_once 'header.php';
 ?>

<section class="main-container">
    <div class="container">
        <div class="text-center">
            <h2>Sign Up</h2>
            <div class="row">
                <form class="register form-horizontal" method="POST" action="include/register.php" autocomplete="off">
                    <div class="form-group">
                    <input class="form-control" type="text" name="name" placeholder="Name">
                    <input class="form-control" type="text" name="mail" placeholder="Mailing Address">
                    <input class="form-control" type="text" name="username" placeholder="Username" required>
                    <input class="form-control" type="email" name="email" placeholder="Email">
                    <input class="form-control" type="password" name="password" placeholder="Password">
                    </div>
                    <button class="btn" type="submit" name="submit">Register</button>
                </form>
            </div>
        </div>
    </div>
</section>
<br>
<?php
    include_once 'footer.php';
?>
