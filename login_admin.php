<?php
   include("config.php");
   session_start();
   extract($_POST);
   if(isset($_SESSION['login_user'])){
       if($_SESSION['login_user'] == $_POST['username']){
    header("location:admin_index.php");
       }
 }
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($con,$_POST['username']);
      $mypassword = mysqli_real_escape_string($con,$_POST['password']); 
      
      $sql = "SELECT * FROM admintbl WHERE a_username = '$myusername' and a_password = '$mypassword'";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
    
      if($count == 1) {
         //session_register("myusername");
         session_start();  
          $_SESSION['login_user'] = $myusername;  
          $_SESSION['full_name'] = $row['a_fullname'];  
          $_SESSION['user_id'] = $row['a_fullname'];
         
         header("location: admin.php");
      }else {
         echo "Your Login Name or Password is invalid";
      }
   }
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <meta name="keywords" content="Subject Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
   SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Custom Theme files -->
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/style.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/select2.min.css" type="text/css" rel="stylesheet" media="all">
   <!-- Testimonials-Css -->
   <link rel="stylesheet" href="css/owl.theme.css" type="text/css" media="all">
   <link rel="stylesheet" href="css/owl.carousel.css" type="text/css" media="screen" property="" />
    <!-- font-awesome icons -->
    <link href="css/fontawesome-all.min.css" rel="stylesheet">
   <!-- //Custom Theme files -->
    <!-- online-fonts -->
   <link href="//fonts.googleapis.com/css?family=Roboto:100i,400,500,700" rel="stylesheet">
   <link href="//fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800" rel="stylesheet">
   <!-- //online-fonts -->
   <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
</head>

<body>
    <!-- banner -->
    <div class="banner">
        <!-- header -->
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-gradient-secondary pt-3">
            <h1><a class="navbar-brand" href="index.php">E-Mate
                            <span><h5>Easy  learning</h5></span>
                        </a></h1>

                <button class="navbar-toggler ml-md-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                  <li class="nav-item active">
                     <a class="nav-link" href="index.php">Home
                        <span class="sr-only">(current)</span>
                     </a>
                  </li>
                  <li class="nav-item mx-xl-4 mx-lg-3 my-lg-0 my-3">
                     <a class="nav-link" href="about.html">About Us</a>
                  </li>
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                         aria-expanded="false">
                        Registration
                     </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" id="register_hospital" >Hospital</a>
                        <a class="dropdown-item" id="register_receiver">Receiver</a>
                     </div>
                  </li>
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                         aria-expanded="false">
                        Login
                     </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="login_hospital.php">Hospital</a>
                        <a class="dropdown-item" href="login_receiver.php">Receiver</a>
                     </div>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="contact.html">Contact Us</a>
                  </li>
               </ul>
            </div> -->
         </nav>
        </header>
        <!-- //header -->
        <div class="container">
            <!-- banner-text -->
            <div class="banner-text">
               <div class="slider-info">
               <div class="form-group text-center">
                        <img src="images/login.png" alt="login" width="100" height="100">
                     </div>
                  <form action = "" method = "post">
                     <div class="form-group text-center">
                        <input id="username" class="form-control form-white" style="width: 40%; display: inline-block; align-items: center; justify-content: center;" placeholder="Username" type="text" name="username" required=""/> 
                     </div>
                     <div class="form-group">
                        <input id="password" class="form-control form-white" style="width: 40%; display: inline-block; align-items: center; justify-content: center;" placeholder="Password" type="password" name="password" required="" /> 
                     </div>
                     <div class="form-group">
                        <input type="submit" name="btn_login_admin" id="btn_login_admin" class="btn btn-success" value="Login" />
                     </div>
                  </form>
               </div>
            </div>
        </div>
    </div>
    <!-- //banner-text -->
    <!--banner form-->
   

   <div class="copyright py-3">
      <div class="container">
         <div class="row">
            <div class="col-md-12 text-center">      
               <p class="copy-right mt-2" style="color: white;">&#169; 2019.
               </p>
            </div>
            
         </div>
      </div>
   </div>
    <!--//newsletter-->






<!-- js -->
    <script src="js/jquery-2.2.3.min.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <script type="text/javascript" src="js/select2.full.min.js"></script>
     <script type="text/javascript" src="js/select2.min.js"></script>
<!-- //js -->
<!-- carousel(for feedback) -->
   <script src="js/owl.carousel.js"></script>
   <script>
      $(document).ready(function () {
         $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            responsive: {
               0: {
                  items: 1,
                  nav: true
               },
               600: {
                  items: 2,
                  nav: false
               },
               1000: {
                  items: 3,
                  nav: true,
                  loop: false,
                  margin: 20
               }
            }
         });

         
      });
   </script>
   
   <!-- //carousel(for feedback) -->
<!-- stats -->
   <script src="js/jquery.waypoints.min.js"></script>
   <script src="js/jquery.countup.js"></script>
      <script>
         $('.counter').countUp();
      </script>
<!-- //stats -->

    <!-- start-smooth-scrolling -->
    <script src="js/move-top.js"></script>
    <script src="js/easing.js"></script>
    <script>
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();

                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
    <!-- //end-smooth-scrolling -->
    <!-- smooth-scrolling-of-move-up -->
    <script>
        $(document).ready(function () {
            /*
            var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear' 
            };
            */

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <script src="js/SmoothScroll.min.js"></script>
    <!-- //smooth-scrolling-of-move-up -->
    <!-- Bootstrap core JavaScript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"></script>
</body>
</html>