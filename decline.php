<?php

include("db_connection.php");
session_start();
error_reporting(0);
$w =1;
$z = 0;
$id =  $_POST['id'];

    $query = "Select * from user5 WHERE username ='$_SESSION[username]' ";
    $result = mysqli_query($db_connect, $query);

    while($data = mysqli_fetch_assoc($result))
    {
$f = $data['fromuser'];
    $usde = (unserialize($f));
   $ct=0;
    for ($i=0; $i<count($usde); $i++)
    {
        if( $usde[$i] == $id &&  $usde[$i+1]=== "Send")
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
        $query = "UPDATE user5 SET fromuser='$usdes' WHERE username='$_SESSION[username]'";
        $result = mysqli_query($db_connect, $query);
    }
    }
    ?>