<?php
session_start(); 

$servername="localhost";
                     $username="root";
                     $password="";
                     $dbname="studentportal";

                     $conn=mysqli_connect($servername,$username,$password,$dbname);

                     if(!$conn){
                         die("connection failed:" . mysqli_connect_error());  }
                         $sql ="TRUNCATE TABLE mcq_test;";
                         if(mysqli_query($conn,$sql)) 
                        { 
                            $sql ="TRUNCATE TABLE mcq_result;";
                          if(mysqli_query($conn,$sql)){ header("location:teacher_quiz.php");}
                           
                         }



                         
                         ?>
