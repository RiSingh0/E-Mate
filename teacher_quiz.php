<?php  
 //entry.php  
 session_start();  
 if(!isset($_SESSION["login_user"]))  
{  
  header("location:login_teacher.php");  
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
    header("location:login_teacher.php");
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
     .body {
    background-image: url("images/bg.png");
   }
   .table {
     background-image: url("images/bg0.jpg");
    color:#0c0d0e;
   }
    </style>
  <style>
clear_channel{
  title: "Are you sure?",
  text: "Your will not be able to recover this imaginary file!",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Yes, delete it!",
  closeOnConfirm: false
},
function(){
  swal("Deleted!", "Your imaginary file has been deleted.", "success");
});

</style>
  <!-- Custom Theme files -->
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

<link href="sweetalert.min.js" type="text/js" rel="sweetalert" media="all">

  <link href="css/select2.min.css" type="text/css" rel="stylesheet" media="all">
    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>
  <link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
  <link href="css/style.css" type="text/css" rel="stylesheet">
  <link href="css/style1.css" type="text/css" rel="stylesheet">
  <!-- font-awesome icons -->
  <link href="css/fontawesome-all.min.css" rel="stylesheet">
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
    require_once 'te_nav.php';?>
</header>
<!-- //header -->

</div>



  <div class="padding">
    

  <h4 style="margin-bottom: 10px;"><br><br>Create quiz<br><br></h4>
    <div class="box-body">
      <table id="t1" class="table">
     

      <section id="register">
    <div class="container">
    <div id="main">

                        <form action="<?php $_SERVER['PHP_SELF'];?>" METHOD ="POST"">
                                <div class="form-group">
                        <label for="que">QUESTION :</label>
                        <input class="form-control" type="text" name="que" id="que" placeholder="Enter Question ..." required>
                        </div>
                        <div class="form-group">
                            <label for="op1">OPTION 1 :</label>
                            <input class="form-control" type="text" name="op1" id="op1" placeholder="Enter 1st option ..." required>
                        </div>
                        <div class="form-group">
                                <label for="op2">OPTION 2 :</label>
                                <input class="form-control" type="text" name="op2" id="op2" placeholder="Enter 2nd option ..." required>
                        </div>
                        
                        
                        <div class="form-group">
                            <label for="op3">OPTION 3 :</label>
                            <input class="form-control" type="text" name="op3" id="op3" placeholder="Enter 3rd option..." required>
                        </div>
                        <div class="form-group">
                                    <label for="op4">OPTION 4:</label>
                                    <input class="form-control" type="text" name="op4" id="op4" placeholder="Enter 4th option.." required>
                        </div>
                        <div class="form-group">
                                    <label for="ans">CORRECT OPTION :</label>
                                    <input class="form-control" minlength="1" maxlength="4" type="number" name="ans" id="ans" placeholder="Enter Option NO ..." required>
                        </div>
                        <div class="form-group">
                                    <label for="marks">MARKS :</label>
                                    <input class="form-control" minlength="1" maxlength="4" type="number" name="marks" id="marks" placeholder="Enter Marks Of Question ..." required>
                        </div>
                        <div class="form-group">
                                    <label for="marks">TIME :</label>
                                    <input class="form-control" minlength="1" maxlength="4" type="number" name="time" id="time" placeholder="Enter Time In Sec..." required>
                        </div>
                                <div class="form-group">
                                        
                                  <input type="submit" class="btn btn-primary" value="UPDATE QUESTION">
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <a  class="link btn btn-primary" href="teacher_quiz_result.php">MCQ RESULT</a>
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <a  class="btn btn-primary link delete_channel float-right">Restart Quiz</a>
                                </div>
                            </form>
                           
            <!-- MAKING IT STORE TO A DATABASE -->
                            <?php
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $que=$_POST['que'];
            $op1 =$_POST['op1'];
            $op2=$_POST['op2'];
            $op3=$_POST['op3'];
            $op4=$_POST['op4'];
            $ans=$_POST['ans'];
            $marks=$_POST['marks'];
            $time=$_POST['time'];

            
            $servername="localhost";
            $username="root";
            $password="";
            $dbname="studentportal";

            //CREATE CONNECTION
            $conn=mysqli_connect($servername,$username,$password,$dbname);
            //CHECK CONNECTION
            if(!$conn){
                die("connection failed:" . mysqli_connect_error());
            }
            $username1=$_SESSION["full_name"];
            $sql = "SELECT te_id FROM teacherstbl where te_fullname='$username1'";
            $stmt = $conn->stmt_init();
            $stmt->prepare($sql);
            
            $stmt->execute();
            $result = $stmt->get_result();
            $resultArray = $result->fetch_assoc();
          
  if($resultArray)
            {
                $te_id=$resultArray['te_id'];
            }
            $check=mysqli_query($conn,"SELECT * from mcq_test where que='$que'"); 
            $checkrows=mysqli_num_rows($check);
            if($checkrows>0)
            {
                echo '<script type="text/javascript">';
                echo 'swal("question already Exists","updating Failed","error")';
                echo '</script>';
            } 
            else
            {
            $sql=" INSERT INTO mcq_test (que,option1,option2,option3,option4,ans,te_id,qu_marks,qu_time)
                    VALUES ('$que','$op1','$op2','$op3','$op4','$ans','$te_id','$marks','$time')";
            if (mysqli_query($conn,$sql))
            {
                
              echo '<script type="text/javascript">';
              echo 'swal("Good!","Updating successfully","success")';
              echo '</script>';
               
            }
            else
            {
                echo"Error:" .mysqli_error($conn);
            }
            }
            mysqli_close($conn);
        }
    
 
    ?>
                            </div>
    </div>
    </section>
      </table>
    </div>

  
    </div>
    <br>
    <br>

    <!-- Modal for student registration -->
    <div class="modal fade" id="modal">
      <div class="modal-dialog modal-lg">
        <div class="modal-content body">
          <div class="modal-header">
            <div>
              <h4 class="modal-title">Add New Channel</h4>

            </div>

          </div>
          <div class="modal-body">  
            <div class="row">
              <div class="col-md-12">

                <div class="form-group">
                  <label>Channel Name</label>
                  <input type="text" class="form-control" id="txt_Name" placeholder="" />
                </div>
              </div>

            </div>
          </div>
          <div class="modal-footer">
            <input type="submit" name="btn_update" id="btn_update" class="btn btn-success" value="Update" />
            <input type="submit" name="btn_save" id="btn_save" class="btn btn-success" value="Save" />
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal for teacher registration -->
  <div class="modal fade" id="modal1">
    <div class="modal-dialog modal-md">
      <div class="modal-content body">
        <div class="modal-header">
          <div>
            <h4 class="modal-title">Add New Data</h4>

          </div>

        </div>
        <div class="modal-body">  
          <div class="row">
            <div class="col-md-12">



             <div class="form-group">
              <label>Type</label>
              <select class="form-control select2" style="width: 100%;" id="dd_type">
                <option value="0">Select</option>
                <option value="1">Video and Description</option>
                <option value="2">Image and Description</option>
                <option value="3">Description</option>
              </select>
            </div>

            <div class="form-group" id="channel">
               <label>Channel</label>
               <select class="form-control select2" style="width: 100%;" id="dd_channel">
                  <option value="0">Select</option>
                  <?php
                  require_once 'config.php';
                  $select=mysqli_query($con,"SELECT * FROM channelstbl Order By ch_id desc");
                  while($row1=mysqli_fetch_array($select)){
                    ?>  
                    <option value="<?php echo $row1['ch_id'];?>"><?php echo $row1['ch_name'];?></option>
                  <?php }?>
               </select>
            </div>

          <div class="form-group" id="desc">
            <label>Description</label>
            <textarea id="co_description" class="form-control" placeholder="Enter Description"></textarea>
          </div>
          <div class="form-group" id="url">
           <label class="control-label" for="co_url">Upload File</label>
           <input type="file" class="form-control" id="co_url" placeholder="">
         </div>



         <div class="form-group" id="sem">
           <label>Semester</label>
           <select class="form-control select2" style="width: 100%;" id="dd_sem">
            <option value="1">Sem 1</option>
            <option value="2">Sem 2</option>
            <option value="3">Sem 3</option>
            <option value="4">Sem 4</option>
            <option value="5">Sem 5</option>
            <option value="6">Sem 6</option>
          </select>
        </div>


      </div>


    </div>
  </div>
  <div class="modal-footer">
    <input type="submit" name="btn_update_teacher" id="btn_update_data" class="btn btn-success" value="Update" />
    <input type="submit" name="btn_save_teacher" id="btn_save_data" class="btn btn-success" value="Save" />
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  </div>
</div>
</div>
</div>

<!--to answer the question -->
<div class="modal fade" id="modal3" class="padding">
  <div class="modal-dialog modal-md">
    <div class="modal-content body">
      <div class="modal-header">
        <div>
          <h4 class="modal-title" id="modal_title">Answer Questions</h4>

        </div>

      </div>
      <div class="modal-body">  
        <div class="row">
          <div class="col-md-12">

            <div class="form-group">
              <label>Question</label><br>
              <strong class="control-label" id="question"></strong>
            </div>


            <div class="form-group">
              <label>Answer</label>
              <textarea class="form-control" rows="2" id="answer" placeholder=""></textarea>
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

            $('.select2').select2();

            
            function fetchChannels(){
              var action="Load_Channel";
              $.ajax({
                url: "action.php",
                method: "POST",
                data: {action:action}, 
                success:function(data){
                  $('#example').html(data);
                  $('#example').dataTable(); 
                  
                },
                error:function(error){
                  swal("No record found!", "", "error");
                }
              });
            }

            function fetchData(){
              var action="Load_Data";
              var te_id = $('#te_id').val();
              $.ajax({
                url: "action.php",
                method: "POST",
                data: {te_id:te_id,action:action}, 
                success:function(data){
                  $('#example1').html(data);
                  $('#example1').dataTable(); 
                  
                },
                error:function(error){
                  swal("No record found! Add an Membership", "", "error");
                }
              });
            }

            function fetchQuestions(){
              var action="Load_Questions_Teacher";
              
              $.ajax({
                url: "action.php",
                method: "POST",
                data: {action:action}, 
                success:function(data){
                  $('#example2').html(data);
                  $('#example2').dataTable(); 
                  
                },
                error:function(error){
                  swal("No record found!", "", "error");
                }
              });
            }


            fetchQuestions();

            fetchData();  
            fetchChannels();


            $().UItoTop({
              easingType: 'easeOutQuart'
            });

            $('#create_channel').click(function(){
              $('#modal').modal('show');
              $('#btn_save').removeClass("displaynone");
              $('#btn_update').addClass("displaynone"); 
              $('input[type=text],input[type=number],input[type=date],input[type=file], textarea').val('');    

            });


            $('#btn_save').click(function(){

              var ch_name = $('#txt_Name').val();

              var action = "Save_Channel";

              $.ajax({
                url: "action.php",
                method: "POST",

                data: {ch_name:ch_name,action:action},   
                success:function(data){
                  fetchChannels();
                  $('#modal').modal('hide'); 
                  swal("Channel added successfully!!", "", "success"); 
                },
                error:function(err){

                  console.log(err);
                }
              })

            });




            $(document).on('click','.delete_channel',function(){
              var ch_id = $(this).attr("id");
              var action = "delete_channel";

              swal({
                title: "Are you sure?",
                text: "You will not be able to recover this record!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, reset it!",
                cancelButtonText: "No, cancel!",
                closeOnConfirm: false,
                closeOnCancel: false
              },
              function(isConfirm){
                if (isConfirm) {
                  $.ajax({
                    url: "new_quiz.php", 
                    method: "POST", 
                    data: {ch_id:ch_id,action:action},
                    success:function(data){
                      fetchChannels();
                      swal("Reset!", "Your entry has been Reset.", "success");
                    },
                    error:function(err){
                      alert(err);
                    } 
                  });
                } else {
                  swal("Cancelled", "Your entry is safe !)", "error");
                }
              });
            });



            $('#upload_data').click(function(){
              $('#modal1').modal('show');
              $('#btn_save_data').removeClass("displaynone");
              $('#btn_update_data').addClass("displaynone");
              $('#desc').addClass("displaynone");
              $('#channel').addClass("displaynone");
              $('#url').addClass("displaynone");
              $('#sem').addClass("displaynone");  
                // $('input[type=number],input[type=date],input[type=file], textarea').val('');    

              });


            $('#dd_type').change(function(){

              var dd_type = $(this).val();

              if(dd_type == "1"){
                $('#desc').removeClass("displaynone");
                $('#channel').removeClass("displaynone");
                $('#url').removeClass("displaynone");
                $('#sem').removeClass("displaynone"); 
              }

              if(dd_type == "2"){
                $('#desc').removeClass("displaynone");
                $('#channel').removeClass("displaynone");
                $('#url').removeClass("displaynone");
                $('#sem').removeClass("displaynone"); 
              }

              if(dd_type == "3"){
                $('#desc').removeClass("displaynone");
                $('#channel').removeClass("displaynone");
                $('#url').addClass("displaynone");
                $('#sem').removeClass("displaynone"); 
              }

            });



            $('#btn_save_data').click(function(){

              var te_id = $('#te_id').val();
              var dd_type = $("#dd_type option:selected").val();
              var co_description = $('textarea#co_description').val();
              var dd_channel = $('#dd_channel option:selected').val();
              var co_url = $("#co_url").prop("files")[0];
              var dd_sem = $("#dd_sem option:selected").val();     



              var fd = new FormData();
              fd.append("dd_type",dd_type);
              fd.append("te_id",te_id);
              fd.append("co_description",co_description);
              fd.append("ch_id",dd_channel);
              fd.append("co_url",co_url);
              fd.append("co_sem",dd_sem);

              fd.append("action","Save_Data");

              $.ajax({
                url: "action.php",
                method: "POST",
                contentType: false,
                processData:false,
                data: fd,   
                success:function(data){
                 fetchData();
                 $('#modal1').modal('hide'); 
                 swal("Data added successfully!!", "", "success");

               },
               error:function(err){

                console.log(err);
              }
            })

            });


            $(document).on('click','.delete_uploads',function(){
              var co_id = $(this).attr("id");
              var action = "delete_uploads";

              swal({
                title: "Are you sure?",
                text: "You will not be able to recover this record!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                closeOnConfirm: false,
                closeOnCancel: false
              },
              function(isConfirm){
                if (isConfirm) {
                  $.ajax({
                    url: "action.php", 
                    method: "POST", 
                    data: {co_id:co_id,action:action},
                    success:function(data){
                      fetchData();
                      swal("Deleted!", "Your entry has been deleted.", "success");
                    },
                    error:function(err){
                      alert(err);
                    } 
                  });
                } else {
                  swal("Cancelled", "Your entry is safe !)", "error");
                }
              });
            });



            var q_id;
            $(document).on('click','.answer_question',function(){
              $('#modal3').modal('show');
              $('#btn_update_question').addClass('displaynone');
              $('#btn_save_question').removeClass('displaynone');

              q_id = $(this).attr("id");

              $("#question").text($(this).closest('tr').find(".q_question").text());



            });


            $('#btn_save_question').click(function(){


             var q_answer= $('#answer').val();

             var action = "Answer_Question";

             $.ajax({
              url: "action.php",
              method: "POST",

              data: {q_id:q_id,q_answer:q_answer,action:action},   
              success:function(data){
                fetchQuestions();
                $('#modal').modal('hide'); 
                swal("Data Updated successfully!!", "", "success");

              },
              error:function(err){

                console.log(err);
              }
            })

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