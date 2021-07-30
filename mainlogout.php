<?php

include("db_connection.php");
session_start();
$_SESSION["status"] = "inactive";
$inactive = "inactive";
if($_SESSION["username"]!=null)
{

$query = "UPDATE USER5 SET status='$inactive' WHERE username ='$_SESSION[username]' ";

$checks =  mysqli_query($db_connect,$query);
}

session_unset();

?>
<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/search_engine/chat/htmlindex.php">
    <?php

?>
