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
                            $sql ="TRUNCATE TABLE pt2;";
                          if(mysqli_query($conn,$sql)){ header("location:te_pt2.php");}
                           
                         }



                         
                         ?>
