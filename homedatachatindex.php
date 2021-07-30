<?php

include("db_connection.php");
session_start();
//$selected = $_POST['selected'];
//$selected = "male";
$query = "Select username,gender,age,status,picsource from user5  ";

$result = mysqli_query($db_connect, $query);
$total = mysqli_num_rows($result);
$genderm = "black";
if($total != 0)
{
   $count = 0;
    while($data = mysqli_fetch_assoc($result))
    {
        $count++;
        if($count <=200 )
        {
            echo "
        <div style='display:inline-block;  padding:0; margin:0; width:200px; height:280px; box-sizing:border-box;'><a href='htmlindex.php?profile=".$data['username']."&username=".$_SESSION['username']."'><img style='margin:0px;box-shadow:1px -0.5px 2px #868586;background-color:pink; padding:0px;' src='".$data['picsource']."' width='190' height='190'>
        </a><div style=' width:190px; height:48px;box-shadow:1px 1px 2px #868586; overflow:hidden; font-size:16px; background-color:white; padding:10px 10px 10px; font-weight:300; margin-top:-5px; box-sizing:border-box;'><p style=' width:190px; height:21px; overflow:hidden;margin:0px;'>".$data['username']."</p></div>
        </div>
        
        
        ";}
    }
}


?>