<?php
    include_once 'header.php';
?>
<section>
    <div class="container">
        <div class="text-center">
            <h2>Login</h2>
            <form class="loginpage form-horizontal" method="POST" action="include/login.php" autocomplete="off">
                <div class="form-group">
                    <input class="form-control" type="text" name="username" placeholder="Username/Email" required>
                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                    <button type="submit" name="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
</section>
<br><br><br><br><br><br>
<?php
    include_once 'footer.php';
?>