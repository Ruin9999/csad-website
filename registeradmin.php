<?php
    include_once 'header.php';
?>

    <section>
        <div class="container">
            <div class="text-center">
                <h2>Administrator Sign Up</h2>
                <form class="register form-horizontal" method="POST" action="include/registeradmin.php" autocomplete="off">
                    <div class="form-group">
                    <input class="form-control" type="text" name="adminname" placeholder="Username" required>
                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                    <input class="form-control" type="number" name="number" placeholder="Employee Number" onkeypress="return isNumberKey(event)" required>
                    <input class="form-control" type="password" name="authcode" placeholder="Authcode" onkeypress="return isNumberKey(event)" required>
                    </div>
                    <button class="btn" type="submit" name="submit">Sign Up</button>
                </form>
            </div>
        </div>
    </section>
<br><br><br>
<?php
    include_once 'footer.php';
?>

