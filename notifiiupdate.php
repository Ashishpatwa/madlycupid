<?php

include("db_connection.php");
session_start();
$admin = $_SESSION["username"];
$query = "Select * from user5 WHERE username='$admin' ";
$result = mysqli_query($db_connect, $query);
$data = mysqli_fetch_assoc($result);
if ($data['fromuser'] != "" )
{
  $fu = $data['fromuser'];
  $grpfo = unserialize(($fu));
  $z = count($grpfo)/2;
  echo "<span  class='badge'>".$z."</span>";
}
?>