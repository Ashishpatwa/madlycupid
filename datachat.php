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
        if($count <=10 )
        {
            if($data['status'] == "active" && $data['gender'] == "female")
            {
            $genderm = "#f047e6";   //29b929--green e84cde--pink
            }
            else if($data['status'] == "active" && $data['gender'] == "male")
            {
            $genderm = "#565ed9";   //29b929--green e84cde--pink
            }
            else
            {
            $genderm = "none";
            }

        echo "
        <ul id='dispeo'>
          <li><a href='htmlindex.php?profile=".$data['username']."'><img src='".$data['picsource']."' width='50' height='50'></a></li>
          <li id='contentdata'>
        <ul id='disdata'>
          <li id='snames'>".$data['username']."</li>
          <li id='dage' ><img src='fun.png' width='12' height='12' style='margin-left:4px; margin-right:3px;'>".$data['age']."</li>
        </ul>    
        </li>
      
      <li id='activepo' style='background-color:".$genderm."'><li>  
      <li id='chatdis'><a style='text-decoration:none;' href='htmlindex.php?profile=".$data['username']."'>Chat</a></li>
      
        </ul>";
        }

        
    }
}
?>