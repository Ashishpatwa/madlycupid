<?php 
include("db_connection.php");
session_start();
error_reporting(0);
$id =  $_POST['id'];

$query = "Select * from user5 WHERE username ='$_SESSION[username]' ";
$result = mysqli_query($db_connect, $query);

while($data = mysqli_fetch_assoc($result))
{
 if($data['permrequest']=="0" || $data['permrequest']=="")
    {
$u = Array($id);
$f = serialize($u);
$quer = "UPDATE user5 SET permrequest='$f' WHERE username='$_SESSION[username]'";
$resul = mysqli_query($db_connect, $quer);
}
else{

$f = $data['permrequest'];
$usde = (unserialize($f));

for ($i=0; $i<count($usde); $i++)
$fk[$i]=$usde[$i];
$fk[] = $id;
$usdes = serialize($fk);

$quer = "UPDATE user5 SET permrequest='$usdes' WHERE username='$_SESSION[username]'";
$resul = mysqli_query($db_connect, $quer);
}
}
?>