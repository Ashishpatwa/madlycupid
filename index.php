<?php
include("db_connection.php");

if(isset($_POST['submit']))
{
   $username = $_POST['name'];
   $gender = $_POST['gender'];
   $password = $_POST['password'];
   if($username!="" && $gender!="" && $password!="")
   {
    
    $querycheck = "SELECT username FROM USER4";
    $check =  mysqli_query($db_connect,$querycheck);
    $total = mysqli_num_rows($check);
    $tr = "true";
    
    if($total != 0)
    {
        while($data = mysqli_fetch_assoc($check))
        {
            if($data['username']==$username)
            {
                mysqli_close($db_connect);
              header("location:htmlindex.php?note=failed");
              $tr = "false";
                exit();
            }
           
        }
    }
      if($tr!="false")
      {
        $query = "INSERT INTO user4(username,userpassword,gender) VALUE ('$username','$password','$gender')";
        $result = mysqli_query($db_connect,$query);
        mysqli_close($db_connect);
        header("location:htmlindex.php?note=success");
      } 
    
}
else
 {   
  header("location:htmlindex.php?note=blank"); 
 }
      
}     
?>