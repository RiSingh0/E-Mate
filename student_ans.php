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
  <title>Student Answer</title>
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
  <!-- Custom Theme files -->

  <link href="css/select2.min.css" type="text/css" rel="stylesheet" media="all">
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
    require_once 'st_nav.php';?>
</header>
<!-- //header -->

</div>

<div class="col-md-12">
            <div class="padding-1">
              <h4 style="margin-bottom: 10px;">Questions Asked</h4>
              <div class="box-body">
                <table id="example2" class="table table-bordered table-striped">

                </table class="table">
              </div>
            </div>
           <div class="form-group">

              <input type="text" class="displaynone" name="st_id" id="st_id" value=<?php
              if(isset($_SESSION['st_id']))  
              {  
                echo $_SESSION['st_id'];
              }  


              ?>>

              <input type="text" class="displaynone" name="co_url" id="co_url" value="">

              
              <input type="text" class="displaynone" name="co_description" id="co_description" value="">

            </div>


            <!-- Modal for student registration -->

          </div>

          <!-- Modal for teacher registration -->
          <div class="modal fade" id="modal1" class="padding">
            <div class="modal-dialog modal-md">
              <div class="modal-content body">
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
              <div class="modal-content body">
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

            
            function fetchStudentsData(){
              var action="Load_Student_Content";
              var co_sem = $('#dd_sem option:selected').val();
              var ch_id = $('#dd_channel option:selected').val();
              $.ajax({
                url: "action.php",
                method: "POST",
                data: {co_sem:co_sem,ch_id:ch_id,action:action}, 
                success:function(data){
                  $('#example').html(data);
                  $('#example').dataTable(); 
                  
                },
                error:function(error){
                  swal("No record found!", "", "error");
                }
              });
            }

            function fetchMarks(){
              var action="Load_Marks";
              var st_id = $('#st_id').val();
              $.ajax({
                url: "action.php",
                method: "POST",
                data: {st_id:st_id,action:action}, 
                success:function(data){
                  $('#example1').html(data);
                  $('#example1').dataTable(); 
                  
                },
                error:function(error){
                  swal("No record found!", "", "error");
                }
              });
            }


            function fetchComparedMarks(){
              var action="Load_Compared_Marks";
              var st_id = $('#st_id').val();
              $.ajax({
                url: "action.php",
                method: "POST",
                data: {st_id:st_id,action:action}, 
                success:function(data){
                  $('#example3').html(data);
                  $('#example3').dataTable({
                   "order": [[ 3, "desc" ]]
                 }); 
                  
                },
                error:function(error){
                  swal("No record found!", "", "error");
                }
              });
            }


            function fetchQuestions(){
              var action="Load_Questions";
              var st_id = $('#st_id').val();
              $.ajax({
                url: "action.php",
                method: "POST",
                data: {st_id:st_id,action:action}, 
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
            fetchMarks();
            fetchStudentsData();
            fetchComparedMarks();


            $().UItoTop({
              easingType: 'easeOutQuart'
            });

            $('#btn_submit').click(function(){
              fetchStudentsData();

            });


            $('#enter_marks').click(function(){
              $('#modal1').modal('show');
              $('#btn_save_marks').removeClass('displaynone');
              $('#btn_update_marks').addClass('displaynone');
            });

            $('#btn_save_marks').click(function(){

             var m_sem = $('#dd_sem_modal option:selected').val(); 
             var st_id = $('#st_id').val();
             var m_sub1= $('#sub1').val();
             var m_sub2= $('#sub2').val();
             var m_sub3= $('#sub3').val();
             var m_sub4= $('#sub4').val();
             var m_sub5= $('#sub5').val();
             var m_sub6= $('#sub6').val();

             var action = "Save_Marks";

             $.ajax({
              url: "action.php",
              method: "POST",

              data: {st_id:st_id,m_sem:m_sem,m_sub1:m_sub1,m_sub2:m_sub2,m_sub3:m_sub3,m_sub4:m_sub4,m_sub5:m_sub5,m_sub6:m_sub6,action:action},   
              success:function(data){
                fetchMarks();
                $('#modal1').modal('hide'); 
                swal("Data added successfully!!", "", "success");

              },
              error:function(err){

                console.log(err);
              }
            })
           });

            var m_id;
            $(document).on('click','.update',function(){
              $('#modal1').modal('show');
              $('.modal-title').text("Update Marks");
              $('#btn_update_marks').removeClass('displaynone');
              $('#btn_save_marks').addClass('displaynone');

              m_id = $(this).attr("id");
              $('#dd_sem_modal').select2("val", $(this).closest('tr').find(".m_sem").text(),true);
               // $("#dd_sem_modal").val($(this).closest('tr').find(".m_sem").text()).prop('selected', true);
               $("#sub1").val($(this).closest('tr').find(".m_sub1").text());
               $("#sub2").val($(this).closest('tr').find(".m_sub2").text());
               $("#sub3").val($(this).closest('tr').find(".m_sub3").text());
               $("#sub4").val($(this).closest('tr').find(".m_sub4").text());
               $("#sub5").val($(this).closest('tr').find(".m_sub5").text());
               $("#sub6").val($(this).closest('tr').find(".m_sub6").text());



             });


            $('#btn_update_marks').click(function(){

             var m_sem = $('#dd_sem_modal option:selected').val(); 
             var m_sub1= $('#sub1').val();
             var m_sub2= $('#sub2').val();
             var m_sub3= $('#sub3').val();
             var m_sub4= $('#sub4').val();
             var m_sub5= $('#sub5').val();
             var m_sub6= $('#sub6').val();

             var action = "Update_Marks";

             $.ajax({
              url: "action.php",
              method: "POST",

              data: {m_id:m_id,m_sem:m_sem,m_sub1:m_sub1,m_sub2:m_sub2,m_sub3:m_sub3,m_sub4:m_sub4,m_sub5:m_sub5,m_sub6:m_sub6,action:action},   
              success:function(data){
                fetchMarks();
                $('#modal1').modal('hide'); 
                swal("Data updated successfully!!", "", "success");

              },
              error:function(err){

                console.log(err);
              }
            })

           });




            var co_id;
            $(document).on('click','.add_comment',function(){
              co_id = $(this).attr("id");
              $("#co_url").val($(this).closest('tr').find(".url").text());
              $("#co_description").val($(this).closest('tr').find(".co_description").text());
              var co_url = $("#co_url").val();
              var cm_desc = $("#co_description").val();
              window.location.href = "comments.php?co_id="+co_id+"&co_url="+co_url+"&cm_desc="+cm_desc;
            });


            $('#ask_questions').click(function(){
              $('#modal').modal('show');
              $('#q_question').val("");
              $('#btn_save_question').removeClass('displaynone');
              $('#btn_update_question').addClass('displaynone');
            });




            $('#btn_save_question').click(function(){

             var st_id = $('#st_id').val();
             var q_question= $('#question').val();

             var action = "Save_Questions";

             $.ajax({
              url: "action.php",
              method: "POST",

              data: {st_id:st_id,q_question:q_question,action:action},   
              success:function(data){

                $('#modal').modal('hide'); 
                swal("Data added successfully!!", "", "success");

              },
              error:function(err){

                console.log(err);
              }
            })
           });



            var q_id;
            $(document).on('click','.update_question',function(){
              $('#modal').modal('show');
              $('.modal-title').text("Update Question");
              $('#btn_update_question').removeClass('displaynone');
              $('#btn_save_question').addClass('displaynone');

              q_id = $(this).attr("id");

              $("#question").val($(this).closest('tr').find(".q_question").text());



            });


            $('#btn_update_question').click(function(){


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