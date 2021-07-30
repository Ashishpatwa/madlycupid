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
      if(  $usde[$i]=== "Send")
      {
        $u = $usde[$i];
        $query = "Select * from user5 WHERE username ='$u' ";
        $result = mysqli_query($db_connect, $query);
        $dataz = mysqli_fetch_assoc($result);
        echo "<div class='mes' style='display:block;background-color:#e6dede; height:auto;overflow:hidden; border:1px solid #d0c0c0;border-top-right-radius:30px;border-bottom-left-radius:30px; margin-top:10px;padding:10px 18px 10px;'>
        <img src='".$data['picsource']."' width='51' height='51' style='border-radius:50%;border:1px solid black;margin:0px 0px -4px;'>
        <div style='padding-left:12px;margin-top:0px;display:inline-block;'>".$usde[$i-1]."<br>";
          echo "<p style='margin:0px; padding:0px;font-weight:100;font-size:15px;width:400px; height:auto;'>".$usde[$i-1]." ".$usde[$i]." You a Friend Request"."</p></div></br>";

        $ct=1;
         $i++;
         ?><p style='margin:8px 70px 6px;padding:0px;'>
      <button onclick="decline('<?php echo $usde[$i-1]?>');" style='background-color:#00c100; margin:0px 10px; color:white; padding:6px 15px;font-weight:700;'>Accept</button>
      <button onclick="decline('<?php echo $usde[$i-1]?>');" style='background-color:#ff4646; color:white; padding:6px 15px; font-weight:700;'>Decline</button>
    </p><?php echo "</div>";
      }
      
  }

  if($ct==0)
  {
      
    echo "No Data Available";
  }
    }
  }
?>
