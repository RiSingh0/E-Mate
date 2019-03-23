<?php  
 //entry.php  
session_start();  
 if(!isset($_SESSION["login_user"]))  
 {  
   header("location:login_student.php");  
} 

 if (@session_status() == PHP_SESSION_NONE) {
   @session_start();
} 
$time = $_SERVER['REQUEST_TIME'];
$timeout_duration = 1800;
if (isset($_SESSION['LAST_ACTIVITY']) && 
   ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
    session_unset();
    session_destroy();
    header("location:login_student.php");
}
$_SESSION['LAST_ACTIVITY'] = $time;
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
  <title>Quiz</title>
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
  <style>
   #sticky_bar {
    padding: 8px 5px;
    background: #222;
    position: sticky;
    position: -webkit-sticky;
    top: 0;
    z-index: 999;
    text-align: center;
    box-shadow: 0px 1px 11px #888888;
    color: #fff;
    font-family: 'Viga', sans-serif;
    font-size: 1.1em;
}
#sticky_bar_text, #sticky_bar_btn {
    display: inline-block;
}
#sticky_bar_btn a {
  background:red;
  color:#fff;
  padding:2px 5px;
  text-decoration:none;
  border-radius:3px;
}
.body {
 background-image: url("images/bg.png");
}
.table {
  background-image: url("images/bg0.jpg");
 color:#0c0d0e;
}
.info {
  background-color: #ffffcc;
  border-left: 6px solid #ffeb3b;
  width: 1325px; margin: 0 auto;
}
  </style>
  <script type="text/javascript">
var message="If you have made any changes to the fields without clicking the Save button, your changes will be lost.";
function ConfirmClose(e)
{
	var evtobj=window.event? event : e;
	if(evtobj == e)
      {
		//firefox
		  if (!evtobj.clientY)
		  {
        document.getElementById("jsform").submit();
				evtobj.returnValue = message;
		  }
	  }
	  else
	  {
	  //IE
		if (evtobj.clientY < 0)
		  {
        document.getElementById("jsform").submit();
				evtobj.returnValue = message;
		  }
	  }
}
</script>
  <!-- Custom Theme files -->
  <script src="js/sweetalert.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>

<!-- Contact Form JavaScript -->
<script src="js/jqBootstrapValidation.js"></script>
<script src="js/contact_me.js"></script>

<!-- Theme JavaScript -->
<script src="js/agency.min.js"></script>
  <link href="css/select2.min.css" type="text/css" rel="stylesheet" media="all">
  <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>
  <link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
  <link href="css/style.css" type="text/css" rel="stylesheet">
  <link href="css/style1.css" type="text/css" rel="stylesheet">
  <!-- font-awesome icons -->
  <link href="css/fontawesome-all.min.css" rel="stylesheet">
  <link href="sweetalert.min.js" type="text/js" rel="sweetalert" media="all">
  <!-- //Custom Theme files -->
  <!-- online-fonts -->
  <link href="//fonts.googleapis.com/css?family=Roboto:100i,400,500,700" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800" rel="stylesheet">
  <!-- //online-fonts -->
</head>

<body class="body" onbeforeunload="ConfirmClose(event)">
  <!-- banner -->
  <div class="">
    <!-- header -->
    <header>
    <?php
    // require_once 'st_nev_quiz.php';?>
</header>
<!-- //header -->

</div>

<div class="col-md-12">
              <div class="box-body  ">
              <form action="checked.php" method="POST" id="jsform"  >
              <!-- <div class="time" id="navbar">Time left :<span id="display"></span></div> -->
              <div id="sticky_bar">
	            <div id="sticky_bar_text">
                   Time left :
	                    </div>
	                 <div id="sticky_bar_btn">
		              <a  class="btn" id="display"></a>
	                </div>
                   </div>
                <table id="t1" class="table table-bordered table-striped ">
                <?php        
                error_reporting(0);
                
                    $servername="localhost";
                    $username="root";
                    $password="";
                    $dbname="studentportal";
                    $total_marks=0;

                    $conn=mysqli_connect($servername,$username,$password,$dbname);

                    if(!$conn){
                        die("connection failed:" . mysqli_connect_error());
                    }

                    
                  $st_id=$_SESSION['st_id'];
                  $check=mysqli_query($conn,"SELECT * from mcq_result where st_id='$st_id'"); 
                  $checkrows=mysqli_num_rows($check);
                  if($checkrows>0)
                  {
                    echo '<script type="text/javascript">';
                     echo 'swal("well Done","Quiz Complete","success")';
                     echo '</script>';
                     echo '<a class="link btn btn-warning" href="student_quiz_result.php">result</a>';
                  }
                  else{
                    $sql = "SELECT * from mcq_test ORDER BY RAND();";

                    $result = mysqli_query($conn,$sql) or die("Error: " . mysqli_error($conn));
                    if($checkrows=mysqli_num_rows($result))
                    {
                    $t_time=0;
                  while( $resultArray = mysqli_fetch_array($result))
                  { 
                   $id=$resultArray['mcq_id'];$que=$resultArray['que']; $op1=$resultArray['option1'];$op2=$resultArray['option2'];
                  $op3=$resultArray['option3'];$op4=$resultArray['option4'];$ans=$resultArray['ans'];$marks=$resultArray['qu_marks'];$n_time=$resultArray['qu_time'];
                  $t_time=$t_time+$n_time;
                  echo  "<tr><td><h3><br> *&nbsp;$que</h3></td></tr>"; 
                  echo  "<tr><td><input required type='radio' name='quizcheck[$id]' value='1'>&nbsp;$op1<br>";
                  echo  "<tr><td><input required type='radio' name='quizcheck[$id]' value='2'>&nbsp;$op2</td></tr>";
                  echo  "<tr><td><input required type='radio' name='quizcheck[$id]' value='3'>&nbsp;$op3</td></tr>";
                  echo  "<tr><td><input required type='radio' name='quizcheck[$id]' value='4'>&nbsp;$op4<br><br><br></td></tr>";
                  }
                  echo "<input class='displaynone' type='text' id='time' name='time' value='$t_time' >";
                  echo  "<tr><td><button class='button btn-info' type='submit' name='click' >Submit</button></td></tr>"; 
                }
                else{
                  echo  "<tr><td><label class='button'  name='nodata' >NO DATA FOUND!</label></td></tr>"; 
                } 
                  }
                  ?>
                </table>
                <!-- </div> -->
                </form>
              </div>
            
       

        <!-- js -->
        <script src="js/jquery-2.2.3.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="js/select2.full.min.js"></script>
        <script type="text/javascript" src="js/select2.min.js"></script>
        <script src="js/sweetalert.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
        <!-- //js -->
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
        function CountDown(duration, display) {
            if (!isNaN(duration)) {
                var timer = duration, minutes, seconds;
              var interVal=  setInterval(function () {
                    minutes = parseInt(timer / 60, 10);
                    seconds = parseInt(timer % 60, 10);

                    minutes = minutes < 10 ? "0" + minutes : minutes;
                    seconds = seconds < 10 ? "0" + seconds : seconds;

                    $(display).html("<b>" + minutes + "m : " + seconds + "s" + "</b>");
                    if (--timer < 0) {
                        timer = duration;
                       SubmitFunction();
                       $('#display').empty();
                       clearInterval(interVal)
                    }
                    },1000);
            }
        }
        
        function SubmitFunction(){
      document.getElementById('jsform').submit();
        
        }
         CountDown($('#time').val(),$('#display'));      
   function submit(){
    SubmitFunction();
    return null;
}
        </script>
       <!-- <script>
window.onbeforeunload = closingCode;
function closingCode(){
  console.log('form will be submited');
   document.getElementById("jsform").submit();
   return null;
}
</script> -->
        <!-- //end-smooth-scrolling -->
        
        <script src="js/SmoothScroll.min.js"></script>
        <!-- //smooth-scrolling-of-move-up -->
    <!-- Bootstrap core JavaScript
      ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script src="js/bootstrap.js"></script>
    </body>
    </html>