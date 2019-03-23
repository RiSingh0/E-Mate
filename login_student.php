<?php
   include("config.php");
   session_start();
   extract($_POST);
   if(isset($_SESSION['login_user'])){
     
         header("location:Student_index.php");
               }
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($con,$_POST['username']);
      $myusernames = hash('gost', $myusername,'TRUE');
      $mypassword = mysqli_real_escape_string($con,$_POST['password']); 
      $mypasswords = hash('gost', $mypassword,'TRUE');
      $sql = "SELECT * FROM studentstbl WHERE st_username = '$myusernames' and st_password = '$mypasswords'";
      
      $result = mysqli_query($con,$sql);
      if (!$result) {
         printf("Error: %s\n", mysqli_error($con));
         exit();
     }
      error_reporting(0);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   //    if (!$row) {
   //       printf("Error: %s\n", mysqli_error($con));
   //       exit();
   //   }
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
          $_SESSION['login_user'] = $myusername;  
          $_SESSION['full_name'] = $row['st_fullname'];  
          $_SESSION['st_id'] = $row['st_id'];
         
         header("location: student_index.php");
      }else {
         $error = '<div class="alert alert-info alert-dismissable">
         <a class="panel-close close" data-dismiss="alert">×</a> 
         <i class="fa fa-coffee"></i>
         Invalid<strong>.UserName or Password</strong>..
       </div>';
         echo $error;
      }
   }
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Student Login</title>
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
							<span><h5>Easy  Learning</h5></span>
                  </a></h1>

                <button class="navbar-toggler ml-md-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
               
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
                  <br>
                  <form action = "" method = "post">
                     <div class="form-group text-center">
                        <input id="username" class="form-control form-white" style="width: 40%; display: inline-block; align-items: center; justify-content: center;" placeholder="Username" type="text" name="username" required=""/> 
                     </div>
                     <div class="form-group">
                        <input id="password" class="form-control form-white" style="width: 40%; display: inline-block; align-items: center; justify-content: center;" placeholder="Password" type="password" name="password" required=""/> 
                     </div>
                     <div class="form-group">
                        <input type="submit" name="btn_login_student" id="btn_login_student" class="btn btn-success" value="Login" />
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