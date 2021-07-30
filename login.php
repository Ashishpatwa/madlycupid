<?php

include("db_connection.php");
  session_start();
   $username = $_POST['name'];
   $password = $_POST['password'];

   $querycheck = "SELECT username,userpassword,gender,age,picsource,fname FROM USER5";
   $check =  mysqli_query($db_connect,$querycheck);
   $total = mysqli_num_rows($check);
   $tr = "true";
   
   if($total != 0)
   {
       while($data = mysqli_fetch_assoc($check))
       {
           if($data['username']==$username && $data['userpassword']==$password)
           {
               
            mysqli_close($db_connect);
            //$output = array("msg"=>"Usename Alredy taken, plz choose different name","loggedin"=>"false");
           echo "Login Successfull";             
           $_SESSION["username"]= $username;
           $_SESSION["fname"]= $data['fname'];
           $_SESSION["age"]= $data['age'];
           $_SESSION["gender"]= $data['gender']; 
           $_SESSION["pic"] = $data['picsource'];  
           $tr = "false";
               exit();
              
           }
        }
    }
    if($tr!="false")
    {
        echo "Invalid Username and  Password";
    }
?>