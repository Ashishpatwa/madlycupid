<?php

include("db_connection.php");
session_start();
error_reporting(0);
$msg =  $_POST['msg'];
$profile =  $_POST['profile'];

$query = "Select * from user5 WHERE username ='$profile' ";
$result = mysqli_query($db_connect, $query);
$data = mysqli_fetch_assoc($result);

$querys = "Select * from user5 WHERE username ='$_SESSION[username]' ";
$results = mysqli_query($db_connect, $querys);
$datas = mysqli_fetch_assoc($results);

if($data['messagess']=="0" || $data['messagess']=="")
    {
$u = Array($msg,$_SESSION['username']);
$f = serialize($u);
$quer = "UPDATE user5 SET messagess='$f' WHERE username='$profile'";
$resul = mysqli_query($db_connect, $quer);
}
else{

$f = $data['messagess'];
$usde = (unserialize($f));

for ($i=0; $i<count($usde); $i++)
$fk[$i]=$usde[$i];
$fk[] = $msg;
$fk[] = $_SESSION['username'];
$usdes = serialize($fk);

$quer = "UPDATE user5 SET messagess='$usdes' WHERE username='$profile'";
$resul = mysqli_query($db_connect, $quer);
}


?>