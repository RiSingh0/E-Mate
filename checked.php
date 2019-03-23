
<link href="sweetalert.min.js" type="text/js" rel="sweetalert" media="all">
<?php
session_start(); 

$servername="localhost";
                     $username="root";
                     $password="";
                     $dbname="studentportal";
                     $total_marks=0;
                     $OutOff=0;

                     $conn=mysqli_connect($servername,$username,$password,$dbname);

                     if(!$conn){
                         die("connection failed:" . mysqli_connect_error());  }
                        $radio_result=$_POST['quizcheck'];
                        
                        // echo $radio_result['1'];2
                        // echo $radio_result['2'];4
                        // if(!empty($_POST['quizcheck'])) {
                        
                        // $checked_count = count($_POST['quizcheck']);
                        // }
                        $sql = "SELECT * from mcq_test ORDER BY mcq_id ASC";

                    $result = mysqli_query($conn,$sql) or die("Error: " . mysqli_error($conn));
                  while( $resultArray = mysqli_fetch_array($result))
                  { 
                     
                    $ans=$resultArray['ans'];$marks=$resultArray['qu_marks'];$mcq_id=$resultArray['mcq_id'];
                    $OutOff=$OutOff+$marks;
                      if($ans==$radio_result[$mcq_id])
                      {
                          $total_marks=$total_marks+$marks;
                      }
                     
                  }
                  $st_ID=$_SESSION['st_id'];
                  $name=$_SESSION['full_name'];
                  
                  $sql=" INSERT INTO mcq_result (st_id,tot_marks,sname,out_off)
                    VALUES ('$st_ID','$total_marks','$name','$OutOff')";



            if (mysqli_query($conn,$sql))
            {
                echo 'done';
             }

             header("location:student_quiz_result.php");

                        
                        
                    
?>