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
    $query = "SELECT * from user5 WHERE username ='$id' ";
    $result = mysqli_query($db_connect, $query);

    while($data = mysqli_fetch_assoc($result))
    {
    if($data['likeuser']=="0" || $data['likeuser']=="")
    {
    $u = Array($_SESSION['username']);
    $f = serialize(($u));
    $quer = "UPDATE user5 SET likeuser='$f' WHERE username='$id'";
    $resul = mysqli_query($db_connect, $quer);
  
    }
    else if($data['likeuser']!="0" || $data['likeuser']!="")
    {
   
    $f = $data['likeuser'];
    $usde = (unserialize($f));
   
    for ($i=0; $i<count($usde); $i++)
    $fk[$i]=$usde[$i];
    $fk[] = $_SESSION['username'];
    $usdes = serialize($fk);
    $quer = "UPDATE user5 SET likeuser='$usdes' WHERE username='$id'";
    $resul = mysqli_query($db_connect, $quer);
    }
}
    

    $query = "UPDATE user5 SET likeinfo=likeinfo+1 WHERE username='$id' ";
     $result = mysqli_query($db_connect, $query);
   
} 
else{
    $f = $data['likeuser'];
    $usde = (unserialize($f));
    if($index = array_search($_SESSION['username'],$f))
    {
        unset($f[$index]);
    }  
    $query = "UPDATE user5 SET likeinfo=likeinfo-1,likeuser='$f' WHERE username='$id' ";
     $result = mysqli_query($db_connect, $query);

    
}

?>
