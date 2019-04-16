<?php
    session_start();
    date_default_timezone_set('Singapore');
    include 'include/functions.php';
?>

<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" initial-scale="1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <head>
        <link rel="apple-touch-icon" sizes="57x57" href="images/icon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="images/icon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="images/icon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="images/icon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="images/icon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="images/icon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="images/icon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="images/icon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="images/icon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="images/icon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="images/icon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="images/icon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="images/icon/favicon-16x16.png">
        <link rel="manifest" href="images/icon/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="images/icon/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <title>Bookio</title>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>                        
                </button>
                  <a class="navbar-brand" href="index.php"><img src="images/icon/white/favicon-32x32.png"></a>
              </div>
              <div class="collapse navbar-collapse" id="myNavbar">
                <?php if(isset($_SESSION['a_number'])) {?>
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="index.php#myCarousel">HOME</a></li>
                    <li><a href="index.php#reads">HOT READS</a></li>
                    <li><a href="index.php#media">MEDIA</a></li>
                    <li><a href="index.php#images">IMAGES</a></li>
                    <li><a href="comments.php">FEEDBACK</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">MORE
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="index.php#about">About us</a></li>
                            <li><a href="index.php#contact">Contact us</a></li>
                            <li><a href="index.php#donate">Donate</a></li> 
                        </ul>
                    </li>
                  </ul> <?php } else {?>
                  <ul class="nav navbar-nav navbar-left">
                    <li><a href="index.php#myCarousel">HOME</a></li>
                    <li><a href="index.php#reads">HOT READS</a></li>
                    <li><a href="index.php#media">MEDIA</a></li>
                    <li><a href="index.php#images">IMAGES</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">MORE
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="index.php#about">About us</a></li>
                            <li><a href="index.php#contact">Contact us</a></li>
                            <li><a href="index.php#donate">Donate</a></li> 
                        </ul>
                    </li>
                  </ul> <?php } ?>
                  <ul class="nav navbar-nav navbar-right">
                      <div class="login">
                        <?php
                            if(isset($_SESSION['u_username'])) { ?>
                                <form class="login" action="include/logout.php" method="POST">
                                    <button type="submit" name="submit">Logout</button>
                                </form> <?php
                            } else { ?>
                            <form class="form-inline my-2 my-lg-0" method="POST" action="include/login.php" autocomplete="off">
                                <input class="form-control mr-sm-1" type="text" name="username" placeholder="Username/Email" required>
                                <input class="form-control mr-sm-1" type="password" name="password" placeholder="Password" required>
                                <button type="submit" name="submit">Login</button>
                            </form>
                            <a href="register.php">Sign Up</a> <?php
                            }?> 
                    </div>
                  </ul>
              </div>
            </div>
        </nav>
    </header>