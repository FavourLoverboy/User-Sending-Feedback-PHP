<?php 

    include('config/dataBaseLink.php');
    $collect = new Solution();

    session_start();

    if($_POST['signUp']){
        extract($_POST);

        $tblquery = "INSERT INTO users VALUES(:id, :name, :email, :username, :password, :date)";
        $tblvalue = array(
            ':id' => null,
            ':name' => htmlspecialchars($name),
            ':email' => htmlspecialchars($email),
            ':username' => htmlspecialchars($username),
            ':password' => htmlspecialchars($password),
            ':date' => date("Y-m-d")
        );
        // print_r($tblvalue);
        $insert = $collect->tbl_insert($tblquery, $tblvalue);
        if($insert){
            echo "
                <div class='alert alert-success text-center text-muted' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                    <strong>Your account</strong> has been created.
                </div>
            ";
        }
    }
    if($_POST['login']){
        extract($_POST);

        $tblquery = "SELECT * FROM users WHERE username = :username && password = :password";
        $tblvalue = array(
            ':username' => htmlspecialchars($username),
            ':password' => htmlspecialchars($password)
        );
        $select = $collect->tbl_select($tblquery, $tblvalue);
        if($select){
            $_SESSION['username'] = $username;
            echo "
                <div class='alert alert-success text-center text-muted' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                    Your are logged in.
                </div>
            ";
        }else{
            echo "
                <div class='alert alert-danger text-center text-muted' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                    This account doesn't exit, Please Sign Up to create an account thank you.
                </div>
            ";
        }
    }
    if($_POST['msg']){

        extract($_POST);

        if($_SESSION['username'] != ''){
            $tblquery = "INSERT INTO msg VALUES(:id, :name, :email, :head, :msg, :date)";
            $tblvalue = array(
                ':id' => null,
                ':name' => htmlspecialchars($name),
                ':email' => htmlspecialchars($email),
                ':head' => htmlspecialchars($head),
                ':msg' => htmlspecialchars($body),
                ':date' => date("Y-m-d")
            );
            // print_r($tblvalue);
            $insert = $collect->tbl_insert($tblquery, $tblvalue);
            if($insert){
                echo "
                    <div class='alert alert-success text-center text-muted' role='alert'>
                        <button type='button' class='close' data-dismiss='alert' aria-label='close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                        <strong>Your message</strong> has been sent, we will reply you shortly.
                    </div>
                ";
            }
        }else{
            echo "
                <div class='alert alert-danger text-center text-muted' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                    Please you need to login before you can leave us a message.
                </div>
            ";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="css/font-awesome.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="owl-carousel/assets/owl.carousel.min.css" type="text/css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <title>Fae Solution - Responsive Complaint Web Application</title>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light bg-transparent" id="gtco-main-nav">
            <div class="container"><a class="navbar-brand">Fae Solutions</a>
                <button class="navbar-toggler" data-target="#my-nav" onclick="myFunction(this)" data-toggle="collapse"><span
                        class="bar1"></span> <span class="bar2"></span> <span class="bar3"></span></button>
                <div id="my-nav" class="collapse navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <a class="btn btn-outline-dark my-2 my-sm-0 mr-3 text-uppercase" 
                        data-toggle="modal" data-target="#loginModal" aria-hidden="true">login</a> 
                        <a class="btn btn-outline-dark my-2 my-sm-0 mr-3 text-uppercase" 
                        data-toggle="modal" data-target="#signUpModal" aria-hidden="true">Sign Up</a> 
                    </form>
                </div>
            </div>
        </nav>

        <!-- Modal PopUp for Login and SignUp Section -->
        <!-- Login Modal -->
        <div class="modal fade" id="loginModal" tabindex="1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
            <form action="index.php" method="POST" id="login-form">
                <div class="modal-dialog" role="document">
                    <div class="modal-content style">
                        <div class="modal-header">
                            <h4 class="modal-title" id="loginModal">Please Login</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <label for="user">Username:</label>
                            <input type="text" name="username" id="user" placeholder="Enter username..." required>

                            <label for="passw">Password:</label>
                            <input type="password" name="password" id="passw" placeholder="Enter password..." required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="close-btn" data-dismiss="modal">Close</button>
                            <input type="submit" name="login" value="Login">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- Sign Up Modal -->
        <div class="modal fade" id="signUpModal" tabindex="1" role="dialog" aria-labelledby="signUpModal" aria-hidden="true">
            <form action="index.php" method="POST" id="login-form">
                <div class="modal-dialog" role="document">
                    <div class="modal-content style">
                        <div class="modal-header">
                            <h4 class="modal-title" id="signUpModal">Please Sign Up</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <label for="fullname">FullName:</label>
                            <input type="text" name="name" id="fullname" placeholder="Enter Fullname..." required>

                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" placeholder="Enter email..." required>

                            <label for="userName">Username:</label>
                            <input type="text" name="username" id="userName" placeholder="Enter username..." required>

                            <label for="password">Password:</label>
                            <input type="password" name="password" id="password" placeholder="Enter password..." required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="close-btn" data-dismiss="modal">Close</button>
                            <input type="submit" name="signUp" value="Sign Up">
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="container-fluid gtco-banner-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1>We Offer the Best <span>Solutions</span> to Our Customers.</h1>
                        <br><br>
                        <a href="#contact">Contact Us <i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
                    <div class="col-md-6">
                        <div class="card"><img class="card-img-top img-fluid" src="images/banner-img.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid gtco-feature" id="services">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="cover">
                            <div class="card">
                                <svg class="back-bg" width="100%" viewBox="0 0 900 700" style="position:absolute; z-index: -1">
                                    <defs>
                                        <linearGradient id="PSgrad_01" x1="64.279%" x2="0%" y1="76.604%" y2="0%">
                                            <stop offset="0%" stop-color="rgb(1,230,248)" stop-opacity="1"/>
                                            <stop offset="100%" stop-color="rgb(29,62,222)" stop-opacity="1"/>
                                        </linearGradient>
                                    </defs>
                                    <path fill-rule="evenodd" opacity="0.102" fill="url(#PSgrad_01)" d="M616.656,2.494 L89.351,98.948 C19.867,111.658 -16.508,176.639 7.408,240.130 L122.755,546.348 C141.761,596.806 203.597,623.407 259.843,609.597 L697.535,502.126 C748.221,489.680 783.967,441.432 777.751,392.742 L739.837,95.775 C732.096,35.145 677.715,-8.675 616.656,2.494 Z"/>
                                </svg>
                                <svg width="100%" viewBox="0 0 700 500">
                                    <clipPath id="clip-path">
                                        <path d="M89.479,0.180 L512.635,25.932 C568.395,29.326 603.115,76.927 590.357,129.078 L528.827,380.603 C518.688,422.048 472.661,448.814 427.190,443.300 L73.350,400.391 C32.374,395.422 -0.267,360.907 -0.002,322.064 L1.609,85.154 C1.938,36.786 40.481,-2.801 89.479,0.180 Z"></path>
                                    </clipPath>
                                    <image clip-path="url(#clip-path)" xlink:href="images/learn-img.jpg" width="100%" height="465" class="svg__image"></image>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <h2>We are a Creative Digital Agency & Marketing Experts</h2>
                        <p>We provide the best services that our customers deserve.</p>
                        <p>We are experts in handling issues, and providing possible solution to fix the issues.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid gtco-features" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <h2>Explore The Services<br/>We Offer To You </h2>
                        <p> We provide unique services in Web Development, Markting, SEO and Graphics Design. </p>
                        <a href="#">Our Services <i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
                    <div class="col-lg-8">
                        <svg id="bg-services"
                            width="100%"
                            viewBox="0 0 1000 800">
                            <defs>
                                <linearGradient id="PSgrad_02" x1="64.279%" x2="0%" y1="76.604%" y2="0%">
                                    <stop offset="0%" stop-color="rgb(1,230,248)" stop-opacity="1"/>
                                    <stop offset="100%" stop-color="rgb(29,62,222)" stop-opacity="1"/>
                                </linearGradient>
                            </defs>
                            <path fill-rule="evenodd" opacity="0.102" fill="url(#PSgrad_02)" d="M801.878,3.146 L116.381,128.537 C26.052,145.060 -21.235,229.535 9.856,312.073 L159.806,710.157 C184.515,775.753 264.901,810.334 338.020,792.380 L907.021,652.668 C972.912,636.489 1019.383,573.766 1011.301,510.470 L962.013,124.412 C951.950,45.594 881.254,-11.373 801.878,3.146 Z"/>
                        </svg>
                        <div class="row">
                            <div class="col">
                                <div class="card text-center">
                                    <div class="oval"><img class="card-img-top" src="images/web-design.png" alt=""></div>
                                    <div class="card-body">
                                        <h3 class="card-title">Web Development</h3>
                                    </div>
                                </div>
                                <div class="card text-center">
                                    <div class="oval"><img class="card-img-top" src="images/marketing.png" alt=""></div>
                                    <div class="card-body">
                                        <h3 class="card-title">Digital Marketing</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card text-center">
                                    <div class="oval"><img class="card-img-top" src="images/seo.png" alt=""></div>
                                    <div class="card-body">
                                        <h3 class="card-title">SEO Services</h3>
                                    </div>
                                </div>
                                <div class="card text-center">
                                    <div class="oval"><img class="card-img-top" src="images/graphics-design.png" alt=""></div>
                                    <div class="card-body">
                                        <h3 class="card-title">Graphics Design</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid gtco-testimonials">
            <div class="container">
                <h2>What our customers say about us.</h2>
                <div class="owl-carousel owl-carousel1 owl-theme">
                    <div class="customer-style">
                        <div class="card text-center"><img class="card-img-top" src="images/precious.jpg" alt="Customer Picture">
                            <div class="card-body">
                                <h5>Precious Victor</h5>
                                <p class="card-text">“ Indeed you offer the best web services in Port Harcourt ” </p>
                            </div>
                        </div>
                    </div>
                    <div class="customer-style">
                        <div class="card text-center"><img class="card-img-top" src="images/miracle.jpg" alt="Customer Picture">
                            <div class="card-body">
                                <h5>Miracle Ibe<br/>
                                <p class="card-text">“ Your SEO services are awesome... Keep it up ” </p>
                            </div>
                        </div>
                    </div>
                    <div class="customer-style">
                        <div class="card text-center"><img class="card-img-top" src="images/favour.png" alt="Customer Picture">
                            <div class="card-body">
                                <h5>Nwokamma Favour<br/>
                                <p class="card-text">“ Never seen such cool graphics designs anywhere ” </p>
                            </div>
                        </div>
                    </div>
                    <div class="customer-style">
                        <div class="card text-center"><img class="card-img-top" src="images/comfort.jpg" alt="Customer Picture">
                            <div class="card-body">
                                <h5>Comfort Douglas<br/>
                                <p class="card-text">“ Your services are really cool ” </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <form action="index.php" method="POST" class="container-fluid" id="gtco-form">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6" id="contact">
                        <h4> SEND YOUR MESSAGES TO US</h4>
                        <input type="text" name="name" class="form-control" placeholder="Full Name" required>
                        <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                        <input type="text" name="head" class="form-control" placeholder="Message Heading" required>
                        <textarea class="form-control" name="body" placeholder="Message" required></textarea>
                        <input type="submit" name="msg" class="msg-btn" value="Send">
                    </div>
                </div>
            </div>
        </form>

        <footer class="container-fluid" id="gtco-footer">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-12">
                        <p>&copy; 2021. All Rights Reserved. Design by <a href="http://www.feasolutions.com" target="_blank">Fae Solutions</a>.</p>
                    </div>
                </div>
            </div>
        </footer>


    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="owl-carousel/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    </body>
</html>
