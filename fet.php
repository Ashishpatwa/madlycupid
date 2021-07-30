<?php 
include("db_connection.php");
session_start();
error_reporting(0);
$profile =  $_POST['profile'];
$query = "Select * from user5 WHERE username ='$profile' ";
$result = mysqli_query($db_connect, $query);

if(mysqli_num_rows($result)>0){
while($data = mysqli_fetch_assoc($result))
{
    $f = $data['messagess'];
$usde = (unserialize($f));
$o = 1;
for ($i=count($usde)-1; $i>=0; $i=$i-2)
{
if($usde[$i] != "")
{
  $xx= $usde[$i];
  $querys = "Select * from user5 WHERE username ='$xx' ";
$results = mysqli_query($db_connect, $querys);
$datas = mysqli_fetch_assoc($results);
  $o = 2;
  if($xx != $_SESSION['username'])
  {
echo "<div class='mes' style='display:block;background-color:#5c65e6; height:auto;overflow:hidden; border:1px solid #d0c0c0;border-top-right-radius:30px;border-bottom-left-radius:30px; margin-top:10px;padding:10px 18px 10px;'>
<img src='$datas[picsource]' width='51' height='51' style='border-radius:50%;border:1px solid black;margin:0px 0px -4px;'>
<div style='padding-left:12px;margin-top:0px;display:inline-block;'>".$usde[$i]."<br>";
  echo "<p style='margin:0px; padding:0px;font-weight:100;font-size:15px;width:400px; height:auto;'>".$usde[$i-1]."</p></div></div>";
  }
  else
  {
  echo "<div class='mes' style='display:block;background-color:#db57cc; height:auto;overflow:hidden; border:1px solid #d0c0c0;border-top-left-radius:30px;border-bottom-right-radius:30px; margin-top:10px;padding:10px 18px 10px;'>
<img src='$datas[picsource]' width='51' height='51' style='border-radius:50%;border:1px solid black;margin:0px 0px -4px;'>
<div style='padding-left:12px;margin-top:0px;display:inline-block;'>".$usde[$i]."<br>";
  echo "<p style='margin:0px; padding:0px;font-weight:100;font-size:15px;width:400px; height:auto;'>".$usde[$i-1]."</p></div></div>";
  }

} 
}
if($o===1){
  echo "<div style='padding-left:12px;width:550px;text-align:center; font-size:19px; font-weight:600;color:#6a6969;font-family:sans-serif;height:auto;margin-top:100px;display:block;'>Share your mood on your wall! Or encourge your friends to put messages on it!
  </div>";
}

}
}
?>
<!--#db57cc-->