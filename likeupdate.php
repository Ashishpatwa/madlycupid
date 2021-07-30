<?php
include("db_connection.php");
session_start();

$query = "Select * from user5 WHERE username ='$_SESSION[username]' ";
$result = mysqli_query($db_connect, $query);

    while($data = mysqli_fetch_assoc($result))
    {
      if($data['fromuser']!="")
    { 
      $f = $data['fromuser'];
      $usde = (unserialize($f));
     $ct=0;

     for ($i=0; $i<count($usde); $i++)
     {
      if(  $usde[$i]=== "Like")
      {
          $u = $usde[$i-1];
        $query = "Select * from user5 WHERE username ='$u' ";
        $result = mysqli_query($db_connect, $query);
        $dataz = mysqli_fetch_assoc($result);
        echo "
        <div style='display:inline-block;  padding:0; margin:0; width:160px; height:280px; box-sizing:border-box;'><a href='htmlindex.php?profile=".$dataz['username']."&username=".$_SESSION['username']."'><img style='margin:0px;box-shadow:1px -0.5px 2px #868586;background-color:pink; padding:0px;' src='".$dataz['picsource']."' width='140' height='140'>
        </a><div style=' width:140px; height:auto;box-shadow:1px 1px 2px #868586; font-size:14px; background-color:white; padding:10px 10px 10px; font-weight:300; margin-top:-5px; box-sizing:border-box;'>
        <p  style=' width:140px; height:21px; overflow:hidden;margin:0px;'>".$dataz['username']."</p>
        <p style=' width:100px; height:auto;padding:0px 10px 5px 0px;margin:5px 0px 0px 0px; font-size:12px;color:gray;'>".$dataz['gender'].",".$dataz['age']." year old ".$dataz['information']."</p>
        </div>
        </div>
        ";

        $ct=1;
         $i++;
         
      }
      
  }

  if($ct==0)
  {
      
    echo "No Data Available";
  }
    }
  }
?>