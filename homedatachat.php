<?php

include("db_connection.php");

$query = "Select username,gender,age,status,picsource from user5 ";
$result = mysqli_query($db_connect, $query);
$total = mysqli_num_rows($result);
$genderm = "black";
if($total != 0)
{
   $count = 0;
    while($data = mysqli_fetch_assoc($result))
    {
        $count++;
        if($count <=6 )
        {
            echo "
        <img style='padding-right:50px;' src='".$data['picsource']."' width='90' height='90'>
        ";
        }
    }
}


?>