<?php
    include_once'header.php';
    include_once 'include/database.php';
 ?>
<main>
    <div id="myCarousel" class='carousel slide' data-ride='carousel' data-interval="2000">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="images/carousel1.jpg">
                <div class="carousel-caption">
                    <h1>Start Reading</h1>
                    <br>
                    <a href="#reads">
                    <button type="button" class="btn btn-default" href="#reads">Get Started</button>
                    </a>
                </div>
            </div>
            <div class="item">
                <img src="images/carousel2.jpg">
                <div class="carousel-caption">
                    <h1>Description begins in the writer's imagination but should finish in the reader's mind</h1>
                    <div class="pull-right">
                        <h2>- Stephen King</h2>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="images/carousel3.jpg">
                <div class="carousel-caption">
                    <h1>Wherever I am, if I've got a book with me, I have a place I can go and be happy</h1>
                    <div class="pull-right">
                        <h2>- J.K.Rowling</h2>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="images/carousel4.jpg">
                <div class="carousel-caption">
                    <h1>A little nonsense now and then, is cherished by the wisest men</h1>
                    <div class="pull-right">
                        <h2>- Roald Dahl</h2>
                    </div>
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only"> Previous </span></a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only"> Next </span></a>
    </div>
    
    <div class="text-center container" id='about'>
        <h4>Our Mission</h4>
        <p>Bookio's mission is to allow everyone to be able to easily choose which book they should read next.</p>
        <p>Inspired by Vision & Mission, to provide the best services.</p>
        <br>
        <h4>Our Team</h4>
    </div>
    <div class="main-wrapper">
        <div class="row">
            <div class="col-sm-4">
                <p class="text-center"><strong>SJ</strong></p><br>
                <a>
                    <img src="images/shun_jie_grey.jpeg" class="img-circle person" alt="SJ" width="255" height="255">
                </a>
                <div class="text-center">
                    <p>Senior Engineer</p>
                    <p>Loves reading</p>
                    <p>Member since 2000</p>
                </div>
            </div>
            <div class="col-sm-4">
                <p class="text-center"><strong>Gabriel</strong></p><br>
                <a>
                    <img src="images/gabriel_grey.jpeg" class="img-circle person" alt="Gabriel" width="255" height="255">
                </a>
                <div class="text-center">
                    <p>CEO</p>
                    <p>Loves playing guitar</p>
                    <p>Member since 1999</p>
                </div>
            </div>
            <div class="col-sm-4">
                <p class="text-center"><strong>CJ</strong></p><br>
                <a>
                    <img src="images/choy_jun_grey.jpeg" class="img-circle person" alt="CJ" width="255" height="255">
                </a>
                <div class="text-center">
                    <p>Head of Design</p>
                    <p>Loves taking pictures</p>
                    <p>Member since 2001</p>
                </div>
            </div>
        </div>
    </div>
        <div class="text-center container">
            <h4>Our History</h4>
            <h4>From a dorm room to Bookie HQ</h4>
            <p>Founded in 1999</p>
            <p>Our story starts when Gabriel met SJ in college. The rest we say is <b><i>History</i></b>.</p>
        </div>
    <div class="background-color">    
        <div class="text-center container" id="reads">
            <!-- GALLERY -->
            <h4>Hot Reads</h4>
             <p>Recommended books from our readers!</p> <!-- GALLERY -->
             <div class="col-md-12">
             <?php
             $sql = "SELECT * FROM gallery ORDER BY gallery_order DESC";
             $result = mysqli_query($conn, $sql);
             while($row = mysqli_fetch_assoc($result)) {
                 echo'<a href="images/hotreads/'.$row["gallery_imgfullname"].'">
             <img src="images/hotreads/'.$row["gallery_imgfullname"].'">
             <h4>'.$row["gallery_title"].'</h4>
             <h6>'.$row["gallery_desc"].'</h6>
             </a>';
             }
             ?>
             </div>
        </div>
        <div class="container">
            <?php
            if(isset($_SESSION['a_number'])) {
            ?>
            <div class="row">
                <div class="col-md-8">
                    <form class="form-horizontal" action="include/gallery-upload.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                        <div class="form-group">
                            <input class="form-control" type="text" name="filetitle" placeholder="File Title..." required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="filedesc" placeholder="File Desc..." required>
                        </div>
                        <div class="form-group pull-right">
                            <input type="file" name="file">
                        </div>
                        <button class="btn btn-sm pull-left" type="submit" name="submit">Upload</button>
                    </form>
                </div>
                <div class="col-md-4">
                    <p><span class="glyphicon glyphicon-asterisk"></span> Allowed file types</p>
                    <p>.Png</p>
                    <p>.Jpg</p>
                    <p>.Jpeg</p>
                </div>
                <?php }
                ?>
            </div>
        </div>
    </div>
    <div class="text-center container-top" id="media">
        <h4>Media</h4>
        <p>Come chill along with us with our handpicked tracks</p>
    </div>
    <!--ADD INTERNAL SEARCH HERE-->
    <?php if(isset($_SESSION['search'])) {
        ?> 
            <div class="container">
            <div class="row">
            <div class="scrolling-wrapper">
                <?php
                $search = $_SESSION['search'];
                $sql = "SELECT * FROM media WHERE media_title LIKE '%$search%' OR media_artist LIKE '%$search%'";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {
                    $url = $row['media_url'];
                    echo'
                        <div class="col-md-3 card">
                            <iframe width="200" height="200" frameborder="0" src="'.$url.'"></iframe>
                        </div>';
                }
                ?>
            </div><br> <?php
                echo '<div class="col-md-4">
                    <form class="form-horizontal" action="include/search.php" method="POST">
                        <div class="form-group">
                            <input class="form-control" type="text" name="search" placeholder="Search media...">
                        </div>
                    <button class="btn btn-sm" name="searchsubmit">Submit</button>
                    </form>
                </div>';
                ?>
            </div>
        </div> <?php        
    } else {
?>
    <div class="container text-left">
        <h4>Genre</h4>
        <h6><u>Chill</u></h6>
        <div class="row">
            <div class="scrolling-wrapper">
                <?php
                $genre = "chill";
                $sql = "SELECT * FROM media WHERE media_genre = '$genre'";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {
                    $url = $row['media_url'];
                    echo'
                    <div class="col-md-3 card">
                    <iframe width="200" height="200" frameborder="0" src="'.$url.'"></iframe>
                    </div>';
                }
                ?>
            </div>
        </div>
        <br><br>
    <h6><u>Energetic</u></h6>
        <div class="row">
            <div class="scrolling-wrapper">
                <?php
                $genre = "energetic";
                $sql = "SELECT * FROM media WHERE media_genre = '$genre'";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {
                    $url = $row['media_url'];
                    echo'
                    <div class="col-md-3 card">
                    <iframe width="200" height="200" frameborder="0" src="'.$url.'"></iframe>
                    </div>';
                }
                ?>
            </div>
        </div>
        <br><br>
        <h6><u>Nostalgic</u></h6>
        <div class="row">
            <div class="scrolling-wrapper">
                <?php
                $genre = "nostalgic";
                $sql = "SELECT * FROM media WHERE media_genre = '$genre'";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {
                    $url = $row['media_url'];
                    echo'
                    <div class="col-md-3 card">
                    <iframe width="200" height="200" frameborder="0" src="'.$url.'"></iframe>
                    </div>';
                }
                ?>
            </div>
        </div>
        <br>
        <div class="col-md-4 text-left row">
            <form class="form-horizontal" action="include/search.php" method="POST">
                <div class="form-group">
                    <input class="form-control" type="text" name="search" placeholder="Search media...">
                </div>
            <button class="btn btn-sm" name="searchsubmit">Submit</button>
            </form>
    </div>
        <br><br><br><br>
        <?php if(isset($_SESSION['a_number'])) { ?>
        <br><br>
        <div class="text-left">
            <h4>Edit the media page</h4>
            <h6>Enter the artist, title & url to upload to delete!</h6>
        </div>
        <div class="row">
            <div class="col-md-8">
                <form class="form-horizontal" action="include/media-upload.php" method="POST" autocomplete="off">
                    <div class="form-group">
                        <input class="form-control pull-right" type="text" name="artist" placeholder="Artist..." required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="title" placeholder="Title..." required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="url" placeholder="Embeded URL..." required>
                    </div>
                    <div class="radio pull-right">
                        <label><input type="radio" name="genre" value="chill">Chill</label>
                    </div>
                    <div class="radio pull-right container-right">
                        <label><input type="radio" name="genre" value="energetic">Energetic</label>
                    </div>
                    <div class="radio pull-right container-right">
                        <label><input type="radio" name="genre" value="nostalgic" required>Nostalgic</label>
                    </div>
                    <button class="btn pull-left" type="submit" name="upload">Upload</button>
                    <button class="btn pull-left" style="margin-left: 10px;" type="submit" name="delete">Delete</button>
                </form>
            </div>
        </div>
    <?php } }?>
    </div>
    <div class="background-color">
        <div class="container text-left">
            <h4>Rather listen to your own beats?</h4>
            <h6>Search Youtube right here!</h6>
            <div class="row">
                <div class="col-md-4">
                    <form class="form-horizontal" action="http://www.youtube.com/results" method="get" target="_blank">
                        <div class="form-group">
                            <input class="form-control pull-left" name="search_query" type="text" maxlength="128" placeholder="Search Youtube..." autocomplete="off"/>
                        </div>
                            <input class="btn pull-left" type="submit" value="Search" />
                    </form> 
                </div>
            </div>
        </div>
    </div>
    <div class="container gallery" id="images">
        <div class="text-center">
            <h4>Image Gallery</h4>
            <p>Of people reading</p>
        </div>  
        <div class="col-md-12" style="padding-left: 150px;">
            <a href="images/gallery/1__IfAX_eYZrskgx9y5vQVUg.jpeg"><img src="images/gallery/1__IfAX_eYZrskgx9y5vQVUg.jpeg"></a>
            <a href="images/gallery/children.jpg"><img src="images/gallery/children.jpg"></a>
            <a href="images/gallery/image-2018-07-30.jpg"><img src="images/gallery/image-2018-07-30.jpg"></a>
            <a href="images/gallery/librarychildren.jpg"><img src="images/gallery/librarychildren.jpg"></a>
            <a href="images/gallery/auntyreading.jpg"><img src="images/gallery/auntyreading.jpg"></a>
            <a href="images/gallery/cafelady.jpg"><img src="images/gallery/cafelady.jpg"></a>
            <a href="images/gallery/motherreadingtochild.jpg"><img src="images/gallery/motherreadingtochild.jpg"></a>
            <a href="images/gallery/lady.jpg"><img src="images/gallery/lady.jpg"></a>
            <a href="images/gallery/kidreading.jpg"><img src="images/gallery/kidreading.jpg"></a>
        </div>
    </div>  
    <div class="container background-color" id="contact">
        <h3>Contact</h3>
        <p>Send us some feedback!</p>
        <?php if(isset($_SESSION['u_username'])) {
            $username = $_SESSION["u_username"];
        ?>
        <div class="row">
            <div class="col-md-8">
                <form class="form-horizontal" action="include/setcomment.php" method="POST" autocomplete="off">
                    <!--GET DATE-->
                    <input type='hidden' name='date' value=''>
                    <?php echo"<input type='hidden' name='username' value='$username'>"?>
                    <div class="form-group">
                        <input class="form-control" type="email" placeholder="Email..." name="email" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Comment..." name="comment" required>
                    </div>
                    <div class="form-group">
                        <input class="slider" id="rating" name="rating" type="range" min="1" max="5"><br>
                        <p>Rating: <span id="ratingvalue"></span></p>
                    </div>
                    <button class="btn pull-left" type="submit">Send feedback</button>
                </form>
            </div>
            <div class="col-md-4">
                <p>Business Enquiries?</p>
                <p><span class="glyphicon glyphicon-map-marker"></span> Singapore</p>
                <p><span class="glyphicon glyphicon-phone"></span> Phone: +65 82078089</p>
                <p><span class="glyphicon glyphicon-envelope"></span> Email: bookio@gmail.com</p>
            </div>
        </div>
        <?php } else {
        ?>
        <div class="col-md-8">
            <form class="form-horizontal" action="include/setcomment.php" method="POST" autocomplete="off">
                <!--GET DATE-->
                <input type='hidden' name='date' value=''>
                <div class="form-group" autocomplete="off">
                    <input class="form-control" type="text" placeholder="Please Log in to send feedback." required name="Comment">
                </div>
            </form>
        </div>
        <div class="col-md-4">
                <p>Business Enquiries?</p>
                <p><span class="glyphicon glyphicon-map-marker"></span> Singapore</p>
                <p><span class="glyphicon glyphicon-phone"></span> Phone: +65 82078089</p>
                <p><span class="glyphicon glyphicon-envelope"></span> Email: bookio@gmail.com</p>
        </div>
        <?php }
        ?>
    </div>
    <div>
        <!-- ADD COMMENT SECTION HERE -->
    </div>
    <div class="container" id="donate">
        <div class="text-center">
            <h4>Donate</h4>
            <p>Love our site? Donate to help upkeep the servers!</p>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="container-side col-md-4">
                <div>
                    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_blank">
                    <input type="hidden" name="cmd" value="_s-xclick">
                    <input type="hidden" name="hosted_button_id" value="NA39APWQXN29Y">
                    <input type="image" src="https://www.sandbox.paypal.com/en_GB/SG/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online!">
                    <img alt="" border="0" src="https://www.sandbox.paypal.com/en_GB/i/scr/pixel.gif" width="1" height="1">
                    </form>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</main>
<script type="text/javascript" src="js/animate.js"></script>
<?php
    include_once'footer.php';
?>