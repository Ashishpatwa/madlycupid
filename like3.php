<?php

include("db_connection.php");
session_start();
error_reporting(0);
$w =1;
$z = 0;
$type = $_POST['type'];
$id =  $_POST['id'];

    $querys = "Select * from user5 WHERE username ='$id' ";
    $result = mysqli_query($db_connect, $querys);

    while($data = mysqli_fetch_assoc($result))
    {
        $f = $data['fromuser'];
        $usde = (unserialize($f));
       $ct=0;

       for ($i=0; $i<count($usde); $i++)
       {
        if( $usde[$i] == $id &&  $usde[$i+1]=== "Like")
        {
           $ct=1;
           $i++;
        }
        else
        $fk[]=$usde[$i];
       
    }

    if($ct==1)
    {
        
        $usdes = serialize($fk);
        $querys = "UPDATE user5 SET fromuser='$usdes' WHERE username='$id'";
        $result = mysqli_query($db_connect, $querys);
    }
}

      
    
?>