<?php 
include("db_connection.php");
session_start();
error_reporting(0);
$admin = $_SESSION["username"];
$query = "Select * from user5 WHERE username='$admin' ";
$result = mysqli_query($db_connect, $query);
$data = mysqli_fetch_assoc($result);
if ($data['fromuser'] != "" )
{
  $fu = $data['fromuser'];
  $grpfo = unserialize(($fu));
 for($i=count($grpfo)-1; $i>=0; $i=$i-2)
{
  $z = $i-1;
  
  $querys = "Select * from user5 WHERE username='$grpfo[$z]' ";
$result = mysqli_query($db_connect, $querys);
$datas = mysqli_fetch_assoc($result);
      
if($grpfo[$i] == "Visited" || $grpfo[$i] == "Like")
{
  $done = " your profile picture";
}
else if($grpfo[$i] == "Become")
{
  $done = " your Friend";
}
else if($grpfo[$i] == "Send"){
$done = " you a Friend Request";
}
  echo "<a style='padding:0px;' href='htmlindex.php?profile=$grpfo[$z]&username=$_SESSION[username]'><div style='display:block;background-color:#f0f1f2; border:1px solid #d0c0c0; margin-top:2px;padding:10px 18px 0px;'><img src='$datas[picsource]' width='51' height='51' style='border-radius:50%;border:1px solid black;'><div style='padding-left:12px;margin-top:-10px;display:inline-block;'>".$grpfo[$z]."</p>";
  echo "<p style='margin:-18px 0px 10px;padding-bottom:2px;display:block;font-weight:100;font-size:15px'>      <b style='font-weight:700;font-size:15px;padding:0;'>".$grpfo[$i]."</b>".$done."<br></div>";
  //".$grpfo[$i-1]." 
    if($done === " you a Friend Request")
    {
      ?><p style='margin:-8px 70px 6px;padding:0px;'>
      <button onclick="accept('<?php echo $grpfo[$i-1]?>');" style='background-color:#00c100; margin:0px 10px; color:white; padding:6px 15px;font-weight:700;'>Accept</button>
      <button onclick="decline('<?php echo $grpfo[$i-1]?>');" style='background-color:#ff4646; color:white; padding:6px 15px; font-weight:700;'>Decline</button>
    </p><?php echo "</div></a>";
    }
    else
    {
      echo "</div></a>";
    }
}
}

?>