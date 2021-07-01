<?php
 //connecting databse
        $servername="localhost";
        $username="root";
        $password="";
        $database="task";

        $conn=mysqli_connect($servername,$username,$password,$database);

        if(!$conn){
            die("sorry".mysqli_connect_error());
        }
       // else{
         //   echo"success";
        //}



?>