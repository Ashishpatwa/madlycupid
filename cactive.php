<?php

include("db_connection.php");
session_start();
$_SESSION["status"] = "active";
$active = $_POST['active'];
if($_SESSION["username"]!=null)
{

$query = "UPDATE USER5 SET status='$active' WHERE username ='$_SESSION[username]' ";

$checks =  mysqli_query($db_connect,$query);

}

?>