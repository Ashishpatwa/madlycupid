<?php

include("db_connection.php");
session_start();
$_SESSION["status"] = "inactive";
$inactive = $_POST['inactive'];
if($_SESSION["username"]!=null)
{

$query = "UPDATE USER5 SET status='$inactive' WHERE username ='$_SESSION[username]' ";

$checks =  mysqli_query($db_connect,$query);
 

}

?>