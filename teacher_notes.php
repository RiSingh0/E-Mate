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
    require_once 'te_nav.php';?>
</header>
<!-- //header -->

</div>

<div class="col-md-12">
  
      <input id="te_id" value=<?php 
      if(isset($_SESSION['te_id']))  
      {  
        echo $_SESSION['te_id'];
      }  
      ?> >
 


  <div class="padding">
    <h4 style="margin-bottom: 10px;">Uploaded Files<br><br></h4>
    <div class="box-body">
      <table id="example1" class="table">

      </table>
    </div>
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
                    data: {ch_id:ch_id,action:action},
                    success:function(data){
                      fetchChannels();
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