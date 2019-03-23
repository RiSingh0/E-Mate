<?php  
 //entry.php  
session_start();  
extract($_POST);
if(!isset($_SESSION["login_user"]))  
{   error_reporting(0);
  header("location:login_admin.php");  
} 

if (@session_status() == PHP_SESSION_NONE) {
  @session_start();
  error_reporting(0);
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
  <title>Admin Page</title>
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
      <nav class="navbar navbar-expand-lg navbar-light bg-gradient-secondary pt-3">
       <h1><a class="navbar-brand" href="admin.php" >E-Mate
         <span><h5>Easy Learning</h5></span>
       </a></h1>

       <button class="navbar-toggler ml-md-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
       aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item link-cursor">
         <a class="nav-link link-cursor" id="register_student">Register Students
         </a>
       </li>
       <li class="nav-item link-cursor">
        <a class="nav-link link-cursor" id="register_teacher">Register Teacher
        </a>
      </li>

      <li class="nav-item">
       <a class="nav-link" href="logout_admin.php">Logout</a>
     </li>
   </ul>
 </div>
</nav>
</header>
<!-- //header -->

</div>

<div class="col-md-12">


  <div class="padding">
    <h4 style="margin-bottom: 10px;">Teachers</h4>
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">

      </table>

    </div>

  </div>


  <div class="padding-1">
    <h4 style="margin-bottom: 10px;">Students</h4>
    <div class="box-body">
      <table id="example" class="table table-bordered table-striped">

      </table>

    </div>

  </div>





  <!-- Modal for student registration -->
  <div class="modal fade" id="modal">
    <div class="modal-dialog modal-lg body">
      <div class="modal-content body">
        <div class="modal-header">
          <div>
            <h4 class="modal-title">Add New Student</h4>

          </div>

        </div>
        <div class="modal-body">  
          <div class="row">
            <div class="col-md-6">

              <div class="form-group">
                <label>Full Name</label>
                <input type="text" class="form-control" id="txt_Name" placeholder="" />
              </div>
              <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" id="txt_username" placeholder="" />
              </div>

              <div class="form-group">
                <label>Password</label>
                <input type="text" class="form-control" id="txt_password" placeholder="" />
              </div>
              
              <div class="form-group">
                <label>Age</label>
                <input type="number" class="form-control" id="txt_Age" placeholder=""/>
              </div>

              <div class="form-group">
                <label>Gender</label>
                <select class="form-control select2" style="width: 100%;" id="dd_gender">
                  <option selected="selected" value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>

              <div class="form-group">
                <label>Date Of Birth</label>
                <input type="date" class="form-control" id="txt_Dob" placeholder="" />
              </div>


              <div class="form-group">
                <label>Email Id</label>
                <input type="text" class="form-control" id="txt_Email" placeholder="" />
              </div> 


            </div>
            <div class="col-md-6">



              <div class="form-group">
                <label>Contact Number 1</label>
                <input type="number" class="form-control" id="txt_Connum" placeholder="" />
              </div>
              <div class="form-group">
                <label>Contact Number 2</label>
                <input type="number" class="form-control" id="txt_Altnum" placeholder="" />
              </div>
              <div class="form-group">
                <label>Address</label>
                <textarea class="form-control" rows="2" id="txt_Address" placeholder=""></textarea>
              </div>

              <div class="form-group">
                <label>Pincode</label>
                <input type="number" class="form-control" id="txt_Pincode" placeholder="" />
              </div>
              

              <div class="form-group">
                <label>Course</label>
                <select class="form-control select2" style="width: 100%;" id="dd_course">
                  <?php
                  require_once 'config.php';
                  $select=mysqli_query($con,"SELECT * FROM coursetbl Order By c_id desc");
                  while($row1=mysqli_fetch_array($select)){
                    ?>  
                    <option value="<?php echo $row1['c_id'];?>"><?php echo $row1['c_name'];?></option>
                  <?php }?>

                </select>
              </div>

              <div class="form-group">
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
  <div class="modal-dialog modal-md body">
    <div class="modal-content body">
      <div class="modal-header">
        <div>
          <h4 class="modal-title">Add New Teacher</h4>
          
        </div>
        
      </div>
      <div class="modal-body">  
        <div class="row">
          <div class="col-md-12">

            <div class="form-group">
              <label>Full Name</label>
              <input type="text" class="form-control" id="te_name" placeholder="" />
            </div>
            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" id="te_username" placeholder="" />
            </div>

            <div class="form-group">
              <label>Password</label>
              <input type="text" class="form-control" id="te_password" placeholder="" />
            </div>



            <div class="form-group">
              <label>Date Of Birth</label>
              <input type="date" class="form-control" id="te_Dob" placeholder="" />
            </div>
            

            <div class="form-group">
              <label>Email Id</label>
              <input type="text" class="form-control" id="te_Email" placeholder="" />
            </div> 

            <div class="form-group">
              <label>Contact Number 1</label>
              <input type="number" class="form-control" id="te_mobile" placeholder="" />
            </div>


          </div>


        </div>
      </div>
      <div class="modal-footer">
        <input type="submit" name="btn_update_teacher" id="btn_update_teacher" class="btn btn-success" value="Update" />
        <input type="submit" name="btn_save_teacher" id="btn_save_teacher" class="btn btn-success" value="Save" />
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

            
            function fetchStudents(){
              var action="Load_Students";
              $.ajax({
                url: "action.php",
                method: "POST",
                data: {action:action}, 
                success:function(data){
                  $('#example').html(data);
                  $('#example').dataTable(); 
                  
                },
                error:function(error){
                  swal("No record found! Add an Membership", "", "error");
                }
              });
            }

            function fetchTeacher(){
              var action="Load_Teacher";
              $.ajax({
                url: "action.php",
                method: "POST",
                data: {action:action}, 
                success:function(data){
                  $('#example1').html(data);
                  $('#example1').dataTable(); 
                  
                },
                error:function(error){
                  swal("No record found! Add an Membership", "", "error");
                }
              });
            }

            fetchTeacher();  
            fetchStudents();


            $().UItoTop({
              easingType: 'easeOutQuart'
            });

            $('#register_student').click(function(){
              $('#modal').modal('show');
              $('#btn_save').removeClass("displaynone");
              $('#btn_update').addClass("displaynone"); 
              $('input[type=text],input[type=number],input[type=date],input[type=file], textarea').val('');    

            });

            $('#register_teacher').click(function(){
              $('#modal1').modal('show');
              $('#btn_save_teacher').removeClass("displaynone");
              $('#btn_update_teacher').addClass("displaynone"); 
              $('input[type=text],input[type=number],input[type=date],input[type=file], textarea').val('');    

            });

            $('#btn_save').click(function(){

              var st_fullname = $('#txt_Name').val();
              var st_username = $("#txt_username").val();
              var st_password = $("#txt_password").val();
              var st_age = $("#txt_Age").val();
              var st_gender = $("#dd_gender option:selected").val();
              var dob = $("#txt_Dob").val();
              var st_dob = moment(dob).format('YYYY-MM-DD');
              var st_email = $("#txt_Email").val();
              var st_mobile1 = $("#txt_Connum").val();
              var st_mobile2 = $("#txt_Altnum").val();
              var st_address = $("#txt_Address").val();
              var st_pincode = $("#txt_Pincode").val();
              var st_course = $("#dd_course option:selected").val();
              var st_sem = $("#dd_sem option:selected").val();

              var action = "Save_Student";

              $.ajax({
                url: "action.php",
                method: "POST",

                data: {st_fullname:st_fullname,st_username:st_username,st_password:st_password,st_age:st_age,st_gender:st_gender,st_dob:st_dob,st_email:st_email,st_mobile1:st_mobile1,st_mobile2:st_mobile2,st_address:st_address,st_pincode:st_pincode,st_course:st_course,st_sem:st_sem,action:action},   
                success:function(data){
                  fetchStudents();
                  $('#modal').modal('hide'); 
                  swal("Data added successfully!!", "", "success");

                },
                error:function(err){

                  console.log(err);
                }
              })

            });

            var st_id;
            $(document).on('click','.update',function(){
              $('#modal').modal('show');
              $('.modal-title').text("Update Details");
              $('#btn_save').addClass("displaynone");
              $('#btn_update').removeClass("displaynone");

              st_id = $(this).attr("id");

              $("#txt_Name").val($(this).closest('tr').find(".st_fullname").text());
              $("#txt_username").val($(this).closest('tr').find(".st_username").text());
              $("#txt_password").val($(this).closest('tr').find(".st_password").text());
              $("#txt_Age").val($(this).closest('tr').find(".st_age").text());
              $("#dd_gender").val($(this).closest('tr').find(".st_gender").text()).prop('selected', true);
              $("#txt_Dob").val($(this).closest('tr').find(".st_dob").text());
              $("#txt_Email").val($(this).closest('tr').find(".st_email").text());
              $("#txt_Connum").val($(this).closest('tr').find(".st_mobile1").text());
              $("#txt_Altnum").val($(this).closest('tr').find(".st_mobile2").text());
              $("#txt_Address").val($(this).closest('tr').find(".st_address").text());
              $("#txt_Pincode").val($(this).closest('tr').find(".st_pincode").text());
              $("#dd_course").val($(this).closest('tr').find(".st_course").text()).prop('selected', true);
              $("#dd_sem").val($(this).closest('tr').find(".st_sem").text());
            });


            $('#btn_update').click(function (){


              var st_fullname = $('#txt_Name').val();
              var st_username = $("#txt_username").val();
              var st_password = $("#txt_password").val();
              var st_age = $("#txt_Age").val();
              var st_gender = $("#dd_gender option:selected").val();
              var dob = $("#txt_Dob").val();
              var st_dob = moment(dob).format('YYYY-MM-DD');
              var st_email = $("#txt_Email").val();
              var st_mobile1 = $("#txt_Connum").val();
              var st_mobile2 = $("#txt_Altnum").val();
              var st_address = $("#txt_Address").val();
              var st_pincode = $("#txt_Pincode").val();
              var st_course = $("#dd_course option:selected").val();
              var st_sem = $("#dd_sem option:selected").val();


              var action = "Update_Student";

              $.ajax({
                url: "action.php",
                method:"POST",

                data:{st_id:st_id,st_fullname:st_fullname,st_username:st_username,st_password:st_password,
                  st_age:st_age,st_gender:st_gender,st_dob:st_dob,st_email:st_email,st_mobile1:st_mobile1,
                  st_mobile2:st_mobile2,st_address:st_address,st_pincode:st_pincode,st_course:st_course,
                  st_sem:st_sem,action:action},
                  success:function(data){
                    fetchStudents();
                    $('#modal').modal('hide'); 
                    swal("Updated successfully", "", "success");
                  },
                  error:function(error){
                    alert(error);
                  }
                });

            });


            $(document).on('click','.delete',function(){
              var st_id = $(this).attr("id");
              var action = "delete_student";

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
                    data: {st_id:st_id,action:action},
                    success:function(data){
                      fetchStudents(); 
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




            $('#btn_save_teacher').click(function(){

              var te_fullname = $('#te_name').val();
              var te_username = $("#te_username").val();
              var te_password = $("#te_password").val();     
              var dob = $("#te_Dob").val();
              var te_dob = moment(dob).format('YYYY-MM-DD');
              var te_email = $("#te_Email").val();
              var te_mobile = $("#te_mobile").val();


              var action = "Save_Teacher";

              $.ajax({
                url: "action.php",
                method: "POST",

                data: {te_fullname:te_fullname,te_username:te_username,te_password:te_password,te_dob:te_dob,te_email:te_email,te_mobile:te_mobile,action:action},   
                success:function(data){
                  fetchTeacher();
                  $('#modal1').modal('hide'); 
                  swal("Data added successfully!!", "", "success");

                },
                error:function(err){

                  console.log(err);
                }
              })

            });



            var te_id;
            $(document).on('click','.update_teacher',function(){
              $('#modal1').modal('show');
              $('.modal-title').text("Update Details");
              $('#btn_save_teacher').addClass("displaynone");
              $('#btn_update_teacher').removeClass("displaynone");

              te_id = $(this).attr("id");

              $("#te_name").val($(this).closest('tr').find(".te_fullname").text());
              $("#te_username").val($(this).closest('tr').find(".te_username").text());
              $("#te_password").val($(this).closest('tr').find(".te_password").text());
              $("#te_Dob").val($(this).closest('tr').find(".te_dob").text());
              $("#te_Email").val($(this).closest('tr').find(".te_email").text());
              $("#te_mobile").val($(this).closest('tr').find(".te_mobile").text());

            });


            $('#btn_update_teacher').click(function (){


             var te_fullname = $('#te_name').val();
             var te_username = $("#te_username").val();
             var te_password = $("#te_password").val();     
             var dob = $("#te_Dob").val();
             var te_dob = moment(dob).format('YYYY-MM-DD');
             var te_email = $("#te_Email").val();
             var te_mobile = $("#te_mobile").val();


             var action = "Update_Teacher";


             $.ajax({
              url: "action.php",
              method:"POST",

              data:{te_id:te_id,te_fullname:te_fullname,te_username:te_username,te_password:te_password,te_dob:te_dob,te_email:te_email,te_mobile:te_mobile,action:action},
              success:function(data){
                fetchTeacher();
                $('#modal1').modal('hide'); 
                swal("Updated successfully", "", "success");
              },
              error:function(error){
                alert(error);
              }
            });

           });


            $(document).on('click','.delete_teacher',function(){
              var te_id = $(this).attr("id");
              var action = "delete_teacher";

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
                    data: {te_id:te_id,action:action},
                    success:function(data){
                      fetchTeacher();
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