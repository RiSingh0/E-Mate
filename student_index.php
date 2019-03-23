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
 
  <script>
    addEventListener("load", function () {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>
  <style>
  .cardx {
  position: relative;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  background-color: #e67e224d;
  background-clip: border-box;
  border: 1px solid rgba(0, 0, 0, 0.125);
  border-radius: 0.25rem;
}
  </style>
  <style>
  .body {
 background-image: url("images/bg.png");
}
* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1100px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
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

<br>
<br>
<br><br>
<br>

<div class="slideshow-container">

<div class="mySlides ">
  <div class="numbertext">1 / 3</div>
  <img src="images/banner.jpg" class="img-fluid" style="width:110%">
 
</div>

<div class="mySlides">
  <div class="numbertext">2 / 3</div>
  <img src="images/banner1.jpg" class="img-fluid" style="width:110%">
  
</div>

<div class="mySlides">
  <div class="numbertext">3 / 3</div>
  <img src="images/banner2.jpg" class="img-fluid" style="width:110%">
  
</div>

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>
<br><hr><br>
<div class="row">
  <div class="col-sm-6">
    <div class="card table" style="width: 40rem;">
      <div class="card-block">
        <h3 class="card-title">Enter Marks</h3>
        <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo">Know More</button>
        <div id="demo" class="collapse">
        <p class="card-text">In this section,the students will enter their marks based on the 6 subjects.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card table" style="width: 40rem;">
      <div class="card-block">
        <h3 class="card-title">Ask Questions</h3>
        <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo1">Know More</button>
        <div id="demo1" class="collapse">
        <p class="card-text">In this section,the students will ask questions and doubts to teachers.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<br>

<div class="row">
  <div class="col-sm-6">
    <div class="card table text-left" style="width: 40rem;">
      <div class="card-block">
        <h3 class="card-title">Uploaded Notes</h3>
        <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo2">Know More</button>
        <div id="demo2" class="collapse">
        <p class="card-text">In this section,the students can view the notes uploaded by the teachers based on the subject they select.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card table" style="width: 40rem;">
      <div class="card-block">
        <h3 class="card-title">Forum</h3>
        <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo3">Know More</button>
        <div id="demo3" class="collapse">
        <p class="card-text">This is a common platform for students to discuss their doubts as well as get it solved either by teachers or students.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<br>

<div class="row" >
  <div class="col-sm-6">
    <div class="card table" style="width: 40rem;">
      <div class="card-block">
        <h3 class="card-title">Result</h3>
        <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo4">Know More</button>
        <div id="demo4" class="collapse">
        <p class="card-text">Students can see the result of PT-1 and PT-2 uploaded by the teachers through this section.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card table" style="width: 40rem;">
      <div class="card-block">
        <h3 class="card-title">Quiz</h3>
        <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo5">Know More</button>
        <div id="demo5" class="collapse">
        <p class="card-text">Students can solve the quiz questions that are set by the teachers and obtain the marks of the quiz after they finish it.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<br>

 <div class="card table" style="width: 40rem;">
    <div class="card-block">
        <h3 class="card-title">Native</h3>
        <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo6">Know More</button>
        <div id="demo6" class="collapse">
        <p class="card-text">Students can compare their marks with 5 students within his/her mark range.</p>
        </div>
    </div>
  </div>
  <br><hr><br>
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