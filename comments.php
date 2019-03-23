<?php  
 //entry.php  
session_start();  
if(!isset($_SESSION["login_user"]))  
{  
  header("location:student.php");  
} 

if (@session_status() == PHP_SESSION_NONE) {
  @session_start();
} 
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
  <title>Comments</title>
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
  <!-- font-awesome icons -->
  <link href="css/fontawesome-all.min.css" rel="stylesheet">
  <!-- //Custom Theme files -->
  <!-- online-fonts -->
  <link href="//fonts.googleapis.com/css?family=Roboto:100i,400,500,700" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800" rel="stylesheet">
  <!-- //online-fonts -->
  <style type="text/css">
    
#login { display: none; }
.login,
.logout { 
    position: absolute; 
    top: -3px;
    right: 0;
}
.page-header { position: relative; }
.reviews {
    color: #555;    
    font-weight: bold;
    margin: 10px auto 20px;
}
.notes {
    color: #999;
    font-size: 12px;
}


.media .media-object { max-width: 120px; }
.media-body { position: relative; }
.media-date { 
    position: absolute; 
    right: 25px;
    top: 25px;
}
.media-date li { padding: 0; }
.media-date li:first-child:before { content: ''; }
.media-date li:before { 
    content: '.'; 
    margin-left: -2px; 
    margin-right: 2px;
}
.media-comment { margin-bottom: 20px; }
.media-replied { margin: 0 0 20px 50px; }
.media-replied .media-heading { padding-left: 6px; }

.btn-circle {
    font-weight: bold;
    font-size: 12px;
    padding: 6px 15px;
    border-radius: 20px;
}
.btn-circle span { padding-right: 6px; }
.embed-responsive { margin-bottom: 20px; }
.tab-content {
    padding: 10px 15px;
    border: 1px solid #ddd;
    border-top: 0;
    border-bottom-right-radius: 4px;
    border-bottom-left-radius: 4px;
}
.custom-input-file {
    overflow: hidden;
    position: relative;
    width: 120px;
    height: 120px;
    background: #eee url('https://s3.amazonaws.com/uifaces/faces/twitter/walterstephanie/128.jpg');    
    background-size: 120px;
    border-radius: 120px;
}
input[type="file"]{
    z-index: 999;
    line-height: 0;
    font-size: 0;
    position: absolute;
    opacity: 0;
    filter: alpha(opacity = 0);-ms-filter: "alpha(opacity=0)";
    margin: 0;
    padding:0;
    left:0;
}
.uploadPhoto {
    position: absolute;
    top: 25%;
    left: 25%;
    display: none;
    width: 50%;
    height: 50%;
    color: #fff;    
    text-align: center;
    line-height: 60px;
    text-transform: uppercase;    
    background-color: rgba(0,0,0,.3);
    border-radius: 50px;
    cursor: pointer;
}
.custom-input-file:hover .uploadPhoto { display: block; }
  </style>
</head>

<body class="body">
  <!-- banner -->
  <div class="">
    <!-- header -->
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-gradient-secondary pt-3">
      <h1><a class="navbar-brand" href="student_index.php" >E-Mate
         <span><h5>Easy Learning</h5></span>
       </a></h1>

      <button class="navbar-toggler ml-md-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
       <!--  <li class="nav-item link-cursor">
          <a class="nav-link link-cursor" id="register_student">Register Students
          </a>
        </li> -->
        <li class="nav-item link-cursor">
          <a class="nav-link link-cursor" href="student_notes.php" id="register_teacher">Go Back
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="logout_student.php">Logout</a>
        </li>
      </ul>
    </div>
  </nav>
</header>
<!-- //header -->

</div>

<div class="col-md-12">


  <div class="padding">
    <form  method="get" action="student_index.php">
      <label id="co_id" name="co_id" class="displaynone">
        <?php echo $_GET["co_id"];$co=$_GET["co_id"];?>

      </label> 
    </form>
    <div id="video_player" class="text-center">
      <input type="text" name="url" id="url" class="displaynone" value="<?php echo $_GET["co_url"]?>">
    <video id="video_source" class="displaynone" controls  autoplay="autoplay"  loop="loop" width="980" height="680">
      <source  src="<?php echo $_GET["co_url"] ?>" type="video/mp4">
      </video>
      </div>
      <div id="img" class="text-center">
      <img  id="img_data" class="displaynone" src="<?php echo $_GET["co_url"];?>" width="640" height="580"/>
      </div>

      <div class="text-left" style="padding-top: 10px; padding-left: 12px;">
        <label style="font-weight: bold">Description :</label><br>
        <label id="cm_desc" name="cm_desc" class="aria-label">
          <?php echo $_GET["cm_desc"];?>
        </label>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-sm-10 col-sm-offset-1" id="logout"> 
              <div class="comment-tabs table">
                  <ul class="nav nav-tabs" role="tablist">
                      <li class="active"><a href="#comments-logout" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize" style="margin-right: 19px;">Comments</h4></a></li>
                      <li><a href="#add-comment" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Add comment</h4></a></li> 
                  </ul>            
                  <div class="tab-content">
                      <div class="tab-pane active" id="comments-logout">                
                          <ul class="media-list">
                            <?php
                            require_once 'config.php';
                            $select=mysqli_query($con,"SELECT * FROM commentstbl c left join studentstbl s on c.st_id = s.st_id where co_id ='$co'");
                            while($row1=mysqli_fetch_array($select)){
                              ?>   
                              <li class="media">
                                <div class="media-body">
                                  <div class="well well-lg">
                                      <h4 class="media-heading text-uppercase reviews"><?php echo $row1['st_fullname'];?> </h4>
                                      <ul class="media-date text-uppercase reviews list-inline">
                                        <li class="dd"><?php echo $row1['cm_date'];?></li>
                                      </ul>
                                      <p class="media-comment">
                                        <?php echo $row1['cm_desc'];?>
                                      </p>
                                      <hr/>
                                  </div>              
                                </div> 
                              </li> 
                            <?php }?>
                          </ul> 
                      </div>
                      <div class="tab-pane" id="add-comment"> 
                          <div class="form-group">
                              <label for="email" class="col-sm-2 control-label">Comment</label>
                              <div class="col-sm-10">
                                <textarea class="form-control" name="commentdesc" id="commentdesc" rows="5"></textarea>
                              </div>
                          </div> 
                          <div class="form-group">
                              <div class="col-sm-offset-2 col-sm-10">                    
                                  <span class="btn btn-success btn-circle text-uppercase" id="btn_save">Submit Comment</span>
                              </div>
                          </div>  
                      </div>
                  </div>
              </div>
        </div>
        </div>  
      </div>

      <!-- <div class="col-md-12 text-left">
        <br>
      <br>
        <label>Add Comment</label>
        <textarea class="form-control" rows="2" id="cm_desc" placeholder=""></textarea>
      </div>
      <div class="text-right">
        <button class="btn btn-success" type="button" id="btn_save">Submit</button>
      </div> -->
      <br>
    </div>         

  </div>




  <div class="form-group">

    <input type="text" class="displaynone" name="st_id" id="st_id" value=<?php
    if(isset($_SESSION['st_id']))  
    {  
      echo $_SESSION['st_id'];
    }  


    ?>>
  </div>


  <!-- Modal for student registration -->

</div>

<!-- Modal for teacher registration -->


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
  $(document).ready(function (){
              var url = $('#url').val();

              if(url.includes("mp4")){

                  $('#video_source').removeClass("displaynone");
                  $('#img_data').addClass("displaynone");
              }
              if(url.includes("jpg") || url.includes("gif") || url.includes("png") || url.includes("jpge")){
                $('#img_data').removeClass("displaynone");
                $('#video_source').addClass("displaynone");
              }
              if(url == ""){
                $('#img_data').addClass("displaynone");
                $('#video_source').addClass("displaynone");
              }


            $('.select2').select2();

           

            //fetchStudentsData();


            $().UItoTop({
              easingType: 'easeOutQuart'
            });

              


            $('#btn_save').click(function(){ 

              var st_id = $('#st_id').val();
              var co_id = $('#co_id').text().trim();
              var cm_desc = $('#commentdesc').val();
              
              var fd = new FormData();
              fd.append("st_id",st_id);
              fd.append("co_id",co_id);
              fd.append("cm_desc",cm_desc);

              fd.append("action","Add_Comment");

              $.ajax({
                url: "action.php",
                method: "POST",
                contentType: false,
                processData:false,
                data: fd,   
                success:function(data){

                 $('#modal').modal('hide'); 
                 swal("Data added successfully!!", "", "success");

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