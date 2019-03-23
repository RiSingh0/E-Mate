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
  <title>Student Teacher Portal</title>
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
  .info {
  background-color: #ffffcc;
  border-left: 6px solid #ffeb3b;
  width: 1325px; margin: 0 auto;
}
.center{
    text-align: center;
    width: 150px;
}
.body {
 background-image: url("images/bg.png");
}
  </style>
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

<body class="body">
  <!-- banner -->
  <div class="">
    <!-- header -->
    <header>
    <?php
    require_once 'st_nev_quiz.php';?>
</header>
<!-- //header -->

</div>

<div class="col-md-12">
              <div class="box-body"><br><br><br><br><br>
              <form action="student_quiz.php" method="POST" >
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
                     echo '<a class="link center btn btn-warning" href="student_quiz_result.php">result</a>';
                  }
                  else{
                    $sql = "SELECT * from mcq_test ORDER BY RAND();";

                    $result = mysqli_query($conn,$sql) or die("Error: " . mysqli_error($conn));
                    if($checkrows=mysqli_num_rows($result))
                    {
                        echo "<label name='about ' class='info' >Note: </label><br>";
                        echo "<label name='about ' class='info' >a) You can only give the assigned quiz once.  </label><br>";
                        echo "<label name='about ' class='info' >b) You can view the result once u submit the Quiz. </label><br>";
                        echo "<label name='about ' class='info' >c) The quiz is of limited time.</label><br>";
                       echo "<label name='about ' class='info' >Number Of  Questions : $checkrows</label><br>";
                       echo  "<br>";
                 
                     }
                else{
                  echo  "<table><tr><td><label class='button'  name='nodata' >NO DATA FOUND!</label></td></tr></table>"; 
                } 
                  }?>

                <input type="submit" class="btn btn-warning center" value="Start Quiz">
                </form>
              </div>
            
            <!-- Modal for student registration -->

          </div>

          <!-- Modal for teacher registration -->
          <div class="modal fade" id="modal1" class="padding">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header">
                  <div>
                    <h4 class="modal-title" id="modal_title">Enter Marks</h4>

                  </div>

                </div>
                <div class="modal-body">  
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Semester</label>
                        <select class="form-control select2" style="width: 100%" id="dd_sem_modal">
                          <option value="0">Select</option>
                          <option value="1">Sem 1</option>
                          <option value="2">Sem 2</option>
                          <option value="3">Sem 3</option>
                          <option value="4">Sem 4</option>
                          <option value="5">Sem 5</option>
                          <option value="6">Sem 6</option>

                        </select>
                      </div>
                      <div class="form-group">
                        <label>Subject 1 Marks</label>
                        <input type="text" class="form-control" id="sub1" placeholder="" />
                      </div>


                      <div class="form-group">
                        <label>Subject 2 Marks</label>
                        <input type="text" class="form-control" id="sub2" placeholder="" />
                      </div>



                      <div class="form-group">
                        <label>Subject 3 Marks</label>
                        <input type="text" class="form-control" id="sub3" placeholder="" />
                      </div>


                      <div class="form-group">
                        <label>Subject 4 Marks</label>
                        <input type="text" class="form-control" id="sub4" placeholder="" />
                      </div>


                      <div class="form-group">
                        <label>Subject 5 Marks</label>
                        <input type="text" class="form-control" id="sub5" placeholder="" />
                      </div>


                      <div class="form-group">
                        <label>Subject 6 Marks</label>
                        <input type="text" class="form-control" id="sub6" placeholder="" />
                      </div>

                    </div>


                  </div>
                </div>
                <div class="modal-footer">
                  <input type="submit" name="btn_update_marks" id="btn_update_marks" class="btn btn-success" value="Update" />
                  <input type="submit" name="btn_save_marks" id="btn_save_marks" class="btn btn-success" value="Save" />

                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" id="modal" class="padding">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header">
                  <div>
                    <h4 class="modal-title" id="modal_title">Ask Questions</h4>

                  </div>

                </div>
                <div class="modal-body">  
                  <div class="row">
                    <div class="col-md-12">

                      <div class="form-group">
                        <label>Question</label>
                        <textarea class="form-control" rows="1" id="question" placeholder="" required ></textarea>
                      </div>

                    </div>


                  </div>
                </div>
                <div class="modal-footer">
                  <input type="submit" name="btn_update_question" id="btn_update_question" class="btn btn-success" value="Update" />
                  <input type="submit" name="btn_save_question" id="btn_save_question" class="btn btn-success" value="Save" />
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
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
        </script>
        <!-- //end-smooth-scrolling -->
        
        <script src="js/SmoothScroll.min.js"></script>
        <!-- //smooth-scrolling-of-move-up -->
    <!-- Bootstrap core JavaScript
      ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script src="js/bootstrap.js"></script>
    </body>
    </html>