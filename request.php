<?php

include("db_connection.php");
session_start();
error_reporting(0);
$w =1;
$z = 0;
$type = $_POST['type'];
$id =  $_POST['id'];

    $query = "Select * from user5 WHERE username ='$id' ";
    $result = mysqli_query($db_connect, $query);

    while($data = mysqli_fetch_assoc($result))
    {
        if($type === 'send')
        {
     if($data['fromuser']=="0" || $data['fromuser']=="")
        {
    $u = Array($username,"send");
    $u = Array($_SESSION['username']);
    $f = serialize($u);
    $quer = "UPDATE user5 SET temprequest='$f' WHERE username='$id'";
    $resul = mysqli_query($db_connect, $quer);
    }
    else{

   $cnt =0;
    $f = $data['fromuser'];
    $usde = (unserialize($f));
   
    for ($i=0; $i<count($usde); $i++)
    {
        if( $usde[$i] == $_SESSION['username'] &&  $usde[$i+1]=== "Send")
        {
           $cnt = 1;
        }
    $fk[$i]=$usde[$i];
    }
    if($cnt == 0)
    {
    $fk[] = $_SESSION['username'];
    $fk[] = "Send";
    $usdes = serialize($fk);
    $quer = "UPDATE user5 SET fromuser='$usdes' WHERE username='$id'";
    $resul = mysqli_query($db_connect, $quer);
    }
    
    }
}
else{

    $f = $data['fromuser'];
    $usde = (unserialize($f));
   $ct=0;
    for ($i=0; $i<count($usde); $i++)
    {
        if( $usde[$i] == $_SESSION['username'] &&  $usde[$i+1]=== "Send")
        {
           $ct=1;
           $i++;
        }
        else
        $fk[$i]=$usde[$i];
       
    }
    if($ct==1)
    {
        
        $usdes = serialize($fk);
        $query = "UPDATE user5 SET fromuser='$usdes' WHERE username='$id'";
        $result = mysqli_query($db_connect, $query);
    }

}
    }

?>
