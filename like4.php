<?php

include("db_connection.php");
session_start();
error_reporting(0);
$w =1;
$z = 0;
$type = $_POST['type'];
$id =  $_POST['id'];
if($type == 'like')
{
    $query = "SELECT * from user5 WHERE username ='$_SESSION[username]' ";
    $result = mysqli_query($db_connect, $query);

    while($data = mysqli_fetch_assoc($result))
    {
    if($data['favorites']=="0" || $data['favorites']=="")
    {
    $u = Array($id);
    $f = serialize(($u));
    $quer = "UPDATE user5 SET favorites='$f' WHERE username='$_SESSION[username]'";
    $resul = mysqli_query($db_connect, $quer);
  
    }
    else if($data['favorites']!="0" || $data['favorites']!="")
    {
   
    $f = $data['favorites'];
    $usde = (unserialize($f));
   
    for ($i=0; $i<count($usde); $i++)
    $fk[$i]=$usde[$i];
    $fk[] = $id;
    $usdes = serialize($fk);
    $quer = "UPDATE user5 SET favorites='$usdes' WHERE username='$_SESSION[username]'";
    $resul = mysqli_query($db_connect, $quer);
    }
}
    

    $query = "UPDATE user5 SET likeinfo=likeinfo+1 WHERE username='$id' ";
     $result = mysqli_query($db_connect, $query);
   
} 
?>


