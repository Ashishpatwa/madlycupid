
<?php
include("db_connection.php");
  session_start();
   $username = $_POST['name'];
   $fname = $_POST['fname'];
   $gender = $_POST['gender'];
   $password = $_POST['password'];
   $age = $_POST['age'];
   $pic = $_POST['pic'];
   $city = $_POST['city'];
   $querycheck = "SELECT username FROM user5";
    $check =  mysqli_query($db_connect,$querycheck);
    $total = mysqli_num_rows($check);
    $tr = "true";
    $xx = Array("N/A","N/A","N/A","N/A","N/A","N/A","N/A");
    $x = base64_encode(serialize($xx));
    
    
    if($total != 0)
    {
        while($data = mysqli_fetch_assoc($check))
        {
            if($data['username']==$username)
            {
                mysqli_close($db_connect);
             //$output = array("msg"=>"Usename Alredy taken, plz choose different name","loggedin"=>"false");
              
             echo "Usename Alredy taken, plz choose different name";             
             $tr = "false";
                exit();
            }
           
        }
    }
      if($tr!="false")
      {
        $query = "INSERT INTO user5(username,userpassword,gender,age,picsource,information,groupinfo,fname) VALUE ('$username','$password','$gender','$age','$pic','$city','$x','$fname')";
        $result = mysqli_query($db_connect,$query);
        mysqli_close($db_connect);
        $_SESSION["username"]= $username;
        $_SESSION["fname"]= $fname;
        $_SESSION["age"]= $age;
        $_SESSION["gender"]= $gender;
        $_SESSION['pic'] = $pic;
        $_SESSION["city"] = $city;
        
        echo "Successfull Login";
      
         
      } 
     
?>
 <?php // close login if user click anywhere outsite of the modal
    // var modl = document.getElementById('1011');
     //var modal = document.getElementById('111');
    // When the user clicks anywhere outside of the modal, close it
     //window.onclick = function(event) {
    // if (event.target == modl) {
      //  modl.style.display = "none";
       // }
    //if (event.target == modal) {
      //  modal.style.display = "none";
       // }
    // }?>