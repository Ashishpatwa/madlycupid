<?php 
include("db_connection.php");
session_start();
error_reporting(0);
?>
 <?php
    
    $m_st = '';
   if( $_GET['intrest']==='male')
   {
     $m_st = 'male';
   }
   else
   {
     $m_st = 'female';
   }
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document1</title>
    <meta name="description" content="...">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      </head>
<body>
<header style="z-index:99;">
<ul>          
  <li>
      <div class="logo" >
        <a href="index.html">
           <img  src="fun.png" width="41" height="41" alt="logo">
         </a>
        </div><!--Logo-->
  </li>

<li><div id="chat"><h1>Chat </h1><span id="fly">Fly</span></div></li>

<?php
if($_SESSION["username"]== true)
{
?>
<li style="float:right;">
  
    <button id="hidelog" onclick="return logs()">Logout</button>
</li>
<?php
}
?>


<?php
if($_SESSION["username"]!= true)
{
?>

<li style="float:right;">
    <button id="hidesign" onclick="return displaylogin()">Sign In</button>
</li>
<?php
}
?>

<?php
if($_SESSION["username"]== true)
{
?>

<style>
.badge{
  position:relative;
  top:-12px;
  right:10px;
  padding: 0px 4px 0px 4px;
  margin:0;
  border-radius:40%;
  background-color:#ff390b;
  color:white;
  font-size:16px;
  font-weight:100;
}
.dropdown{
  display:inline-block;
  position:relative;
}
.dropdown-content{
  display:none;
  position: absolute;
  width:400px;
  min-height:200px;
  max-height:400px;
  background-color:white;
  color:black;
  overflow-y:auto;
  margin:15px 5px;
  padding:0px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}
.dropbtn{
  padding:0px 7px 0px 7px;
  border:none;
}
.dropbtn:hover {
  /*background-color: #868484;*/
  border:none;
}
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd}
.show{display:block;}

</style>
<script>
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}
</script>

<div id="icondetails" >
<!--
<li><div id="chat"><img src="inboxs.svg"  width="32" height="32"><b>Inbox<b></div></li>-->

<li><div id="chat">
<div class="dropdown">
<button onclick="myFunction()" class="dropbtn" style="background-color:transparent"><i class="fa fa-bell notifiiupdate" style="font-size:24px;color:#5b5757"></i>




</button>
<div id="myDropdown" class="dropdown-content">
 
</div>
</div>

<b><b></div></li>
<script>
  function accept(profile){
    
    jQuery.ajax({
              url:'accept.php',
              type:'post',
              data:'id='+profile,
              success:function(result){
                
              }
            });

            jQuery.ajax({
              url:'accept2.php',
              type:'post',
              data:'id='+profile,
              success:function(result){
                
              }
            });
  }
  function decline(profile){
    
    jQuery.ajax({
              url:'decline.php',
              type:'post',
              data:'id='+profile,
              success:function(result){
                
              }
            });

          
  }
</script>



<li>
<div id="chat" class="upperlogo">
<img id="userm" src='<?= $_SESSION["pic"]?>' width='42' height='42' onclick=" return userdetails()" style="cursor:pointer">
<b><?= $_SESSION["fname"]?> <b>
</div>
</li>
</div>
<?php 
}
?><!--
<li style="float:right;"><div id="icon1">Chat Only with girls</div></li> -->
</ul>
</header>

<!--
<div class="fieldoptions">

<button class="fieldbutton" style="background-color:#458af7;">Chat with friend</button>
<button class="fieldbutton" style="background-color:#ff5733;">Online Chat room</button>
<button class="fieldbutton" style="background-color:#fdbd33;">2 Way Chat</button>
<button class="fieldbutton" style="background-color:#55de34;">Random</button>

</div>-->
 <!--ffbd33-->
<!--
<div class="oo"></div>

<div id="leftsize">
<div class="leftpanel">
<div class="titlepeople">Discover People</div>
<div class="discoverpeople">

</div>
</div>
</div>
-->
<style>

#ll{
  position: absolute;
  top: 80px;
  left: 50px;
}
#rr{
  position: absolute;
  top: 48px;
  right: 60px;
}
#dd{
  position: absolute;
  top: 560px;
  right: 200px;
}
#biggest{
  font-size:4em;
  color:white;
  text-shadow: 1px 1px #000;
  font-weight:300;
  font-family:sans-serif;

}
.country{
background-color:white;
padding:30px 0px;
width:100%;
height:220px;

}
.port{
  width:50%;
  float:left;
  display:inline-block;
}
.imageport{
  width:40%;
  float:right;
  display:inline-block;
  
}

#medium{
  font-size:3.5em;
  color:#e14696;
  text-shadow: 1px 1px white;
  font-weight:300;
  font-family:sans-serif;
  margin:0;
  text-align:center;
}
#bigges{
  font-size:2.5em;
  color:#625a5a;
  text-shadow: 1px 1px #000;
  font-weight:300;
  font-family:sans-serif;
  margin:0;
  text-align:center;
}
#smallest{
  font-size:2em;
  color:#443535;
  text-shadow: 1px 1px white;
  font-weight:300;
  font-family:sans-serif;
  margin:0;
  text-align:center;
}
</style>
<?php
if($_SESSION["username"]!= true)
{
?>

<div class="absol">
<img src="waplog.jpg" width="100%" height="100%">
<div id="rr">
<h1 id="biggest">Everyone has a story,<br> what's yours?</h1>
</div>
<div id="dd">
<img src="appstore.png" style="padding-right:50px" >
<img src="googlepay.png">
</div>
<div id="ll">
<div class="oo"></div>
<div id="leftsize">
<div class="leftpanel">
<div class="titlepeople">Discover People</div>
<div class="discoverpeople">

</div>
</div>
</div>

</div>
</div>

<div class="country">
<div class="port">
<h1 id="bigges">Meet new people in <br>INDIA</h1>
<h1 id="medium">234,030</h1>
<h1 id="smallest">members from your country</h1>
</div>

<div class="imageport">


</div>

</div>
<div style="clear:both;"></div>
<div class="country" style="background-color:black; height:328px">
<div class="port" style="width:50%;">
<img style="padding:28px 20%;"src="bestmatches.png" width="300px">
</div>

<div class="imageport" style="padding:68px 30px;width:50%; box-sizing:border-box;">

<h1 id="medium" style="text-align:left">Best Matches</h1>
<h1 id="smallest" style="text-align:left; color:white; padding-top:10px;">The best matches are waiting for you with our smart friend suggestions feature. Chat For Free, Socialize With People!
</h1>

</div>
</div>

<div style="clear:both;"></div>
<div class="country" style="background-color:white; height:328px">

<div class="imageport" style="padding:68px 30px;width:50%; box-sizing:border-box;">

<h1 id="medium" style="text-align:left">Chat Anywhere</h1>
<h1 id="smallest" style="text-align:left; color:black; padding-top:10px;">
Chat with people from more than 50 countries! Send Photos! Meet new people & explore new cultures.
</h1>
</div>
<div class="port" style="width:50%;">
<img style="padding:28px 20%;"src="freechat.jpg" width="300px">
</div>
</div>

<div style="clear:both;"></div>
<div class="country" style="background-color:black; height:408px">
<div class="port" style="width:50%;">
<img style="padding:28px 20%;"src="havefun.jpg" width="300px" height="360px">
</div>

<div class="imageport" style="padding:92px 30px;width:50%; box-sizing:border-box;">

<h1 id="medium" style="text-align:left">Have Fun</h1>
<h1 id="smallest" style="text-align:left; color:white; padding-top:10px;">
Find new dates fast. Enjoy a good dinner, go to a party, or experience new things together.
</h1>
</div>
</div>
<?php
}
?>
<?php
if($_SESSION["username"]== true)
{
?>
<div class="containers">

<div id="userdetail" >
<div class="section">
<ul id='dispeo' style="border:none;" >

        <li class="profitsee">
          <img onclick="return userdetail()" class="imgs" src='<?=$_SESSION["pic"]?>' width='59' height='59'>
        </li>

        <li id='contentdata'>
          <ul id='disdata'style="margin-left:5px!important;">
            <li id='snames' style="font-size:22px !important;max-width:187px !important;margin-bottom:2px!important;"><?=$_SESSION["fname"]?></li>
            <li id='dage' ><img src='fun.png' width='16' height='16' style='margin-left:4px; margin-right:3px;'><?=$_SESSION["gender"]?>, <?=$_SESSION["age"]?> Year Old</li>
          </ul>
        <img onclick="return userdetail()" src="edits.png" width="15" height="15" >    
        </li>
     <!--  <li id='activepo' style='background-color:".$genderm."'><li>  -->
    
</ul>
<div class="userfollower">
        
        <ul class="usermainul">
        <ul class="usersubul">
        <li class="usersubli" style="padding-bottom:0px !important; color:#241e1e;">0</li>
        <li class="usersubli">fan</li>
        </ul>
        <ul class="usersubul">
        <li class="usersubli" style="padding-bottom:0px !important; color:#241e1e;">0</li>
        <li class="usersubli">like</li>
        </ul>
        <ul class="usersubul">
        <li class="usersubli" style="padding-bottom:0px !important; color:#241e1e;">0</li>
        <li class="usersubli">friend</li>
        </ul>     
        </ul>
         </div>
</div>

<div class="usermainlinks">
<a href="htmlindex.php" style="text-decoration:none;"><ul  class="userlink">
<li ><i class="fa fa-home" style="padding:0px 0px;margin:0px;"></i></li>
<li style=" font-size:16px;font-weight:700;">Meet New Friends</li>
</ul></a>
<a href="htmlindex.php?profile=<?=$_SESSION['username']?>&username=<?=$_SESSION['username']?>"><ul   class="userlink">
<li><i class="fa fa-street-view" style="padding:0px 0px;margin:0px;"></i></li>
<li style=" font-size:16px;font-weight:700;">
View Profile</li></a>
</ul>
<a href="fav.php"><ul  class="userlink">
<li><i class="fa fa-dropbox" style="padding:0px 0px;margin:0px;"></i></li>
<li style=" font-size:16px;font-weight:700;">Favorites</li>
</ul></a>
<a href="req.php"><ul  class="userlink">
<li><i class="fa fa-group" style="padding:0px 0px;margin:0px;"></i></li>
<li style=" font-size:16px;font-weight:600;">My Friend Requests</li>
</ul></a>
<a href="visitor.php"><ul  class="userlink">
<li><i class="fa fa-sign-in" style="padding:0px 0px;margin:0px;"></i></li> 
<li style=" font-size:16px;font-weight:700;">Visitors</li>
</ul></a>
<a href="notifi.php"><ul  class="userlink">
<li><i class="fa fa-envelope-open-o" style="padding:0px 0px;margin:0px;"></i></li>
<li style=" font-size:16px;font-weight:700;">
Notifications</li>
</ul></a>
<a href="slike.php"><ul  class="userlink">
<li><i class="fa fa-hand-peace-o" style="padding:0px 0px;margin:0px;"></i></li>
<li style=" font-size:16px;font-weight:700;">
Likes</li></a>
</ul>
<a href="prcy.php"><ul  class="userlink">
<li><i class="fa fa-info" style="padding:0px; margin:0px;"></i></li>
<li style=" font-size:16px;font-weight:700;">
Terms Of Service</li>
</ul></a>
<a href="tos.php"><ul  class="userlink">
<li><i class="fa fa-lock" style="padding:0px; margin:0px;"></i></li>
<li style=" font-size:16px;font-weight:700;">
Privacy Policy</li>
</ul></a>
<!--ul  class="userlink">
<li><img src="share.png" width="18" height="18"></li>
<li>Create Group</li>
</ul>
<ul  class="userlink">
<li><img src="share.png" width="18" height="18"></li>
<li>Find Group</li>
</ul>-->


</div>
</div>
<?php

  include("db_connection.php");
  $profile = $_REQUEST['profile'];
  $prcy = $_REQUEST['prcy'];
  $slike = $_REQUEST['slike'];
  $tos = $_REQUEST['tos'];
  $visitor = $_REQUEST['visitor'];
  $notifi = $_REQUEST['notifi'];
  $fav = $_REQUEST['fav'];
  $req = $_REQUEST['req'];
  if(!$profile && !$prcy && !$tos && !$visitor && !$slike && !$notifi && !$fav && !$req)
  {
?>
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 50px;
  height: 20px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 20px;
  width: 20px;
  left: 3px;
  bottom: 1px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
.imageportindex{width:calc(100% - 325px - 60px);display:inline-block;padding:0;margin:0px 30px;box-sizing:border-box;
              }

              </style>


<div class="maincontent2" style="margin:40px 30px 30px !important; padding:0px !important;">
   

   <p style="margin:18px; color:#575252; font-size:19px;">Meet New Friends</p>
  <!--   <div class="outer" style="padding:0px !important;">
  <div class="coverdata">
  <button class="tablink" onclick="opencitys('search',this)" id="activecontents">Search</button>
  <button class="tablink" onclick="opencitys('NearBy',this)">Famous</button>
 
  <div class="tabcontent" id="search" >
  <li style="padding-left:80px; padding-right:30px;">Near My Age </li><label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
  </label>
 
  <select onchange="runs()" name="intrest" id="intrest" style=" margin:0px 200px; padding:2px 30px; font-size:17px; border:none; border-bottom:1px solid grey;" >
   
    <option value="male" >male</option>
    <option value="female">female</option>
    <option value="male">male</option>
    
  </select>
 
  </div>
  <div class="tabcontent" id="NearBy" >
  <li style="padding-left:80px; padding-right:30px;">Near My Age </li>
  <label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
</label>
<form action="" method="post">
<select style=" margin:0px 200px; padding:2px 30px; font-size:17px; border:none; border-bottom:1px solid grey;" name="intrests" id="intrests">
    <option value="male">male</option>
    <option value="female">female</option>
    <option value="male">male</option>
    
  </select>
  </form>
 
  </div>
  </div>
  </div>-->
</div>
  <div class="imageportindex">


</div>

<script>

function runs(){
var fun = jQuery("#intrest").val();
  var selected = "<?php echo $m_st?>";
  
 $.post("homedatachatindex.php",{selected:selected},function(data,status){
        
        document.getElementsByClassName('imageportindex')[0].innerHTML = data;

       });
      
}
    
</script>
 <?php    
      }
 else{
          
?>

<?php
include("db_connection.php");
$profile = $_REQUEST['profile'];
$query = "Select * from user5 WHERE username='$profile' ";
$result = mysqli_query($db_connect, $query);
$total = mysqli_num_rows($result);
$genderm = "black";
if($total != 0)
{
?>

<div class="maincontent2">
  <div class="img">
<?php  
  
   $count = 0;
   $f = $data['permrequest'];
   if ($f === "")
   {
    $c = 0;
   }
   else{
$usde = (unserialize($f));
$c = count($usde);
   }
    while($data = mysqli_fetch_assoc($result))
    {
      
      echo"<img src='".$data['picsource']."' width='240' height='240' style='border-top-left-radius:20px; padding:0; margin:0px; border-top-right-radius:20px; border:1px solid black;'>
";
       
 ?>
      <div class="userfollower">
        
        <ul class="usermainul imgdetail">
        
        <ul class="usersubul" style="padding:8px 16px 2px;border:none;width:80px;">
        <li class="usersubli" style="padding-bottom:0px !important; color: 	#FFFFFF; font-size:22px;"><?php echo $data['likeinfo'];
    
      ?></li>
        <li class="usersubli" style="color: #444;">like</li>
        </ul>
        <ul class="usersubul" style="padding:8px 16px 2px;border:none;width:80px;">
        <li class="usersubli" style="padding-bottom:0px !important; color: 	#FFFFFF; font-size:22px;"><?php echo $c;
  
      ?></li>
        <li class="usersubli" style="color: #444;">fan</li>
        </ul>     
        </ul>
         </div>






<?php

include("db_connection.php");
session_start();
$profile = $_REQUEST['profile'];
$username = $_REQUEST['username'];

$query = "Select * from user5 WHERE username ='$profile' ";
$result = mysqli_query($db_connect, $query);


$total = mysqli_num_rows($result);
$genderm = "black";

if($total != 0)
{
   $count = 0;
    while($data = mysqli_fetch_assoc($result))
    {
     
          
          
         
      if($data['fromuser']=="" || $data['fromuser']==0)
      {
      $u = Array($username,"Visited");
      $f = serialize(($u));
      $quer = "UPDATE user5 SET fromuser='$f' WHERE username='$profile'";
      $resul = mysqli_query($db_connect, $quer);
      }
      else{
     $cnt = 0;
      $f = $data['fromuser'];
      $usde = (unserialize($f));
      $c = count($f)+1;
      
      for ($i=0; $i<count($usde); $i++)
      {
        if( $usde[$i]== $username &&  $usde[$i+1]=== "Visited")
        {
           $cnt = 1;
        }
      $fk[$i]=$usde[$i];
      }
      if($cnt == 0)
       {
      $fk[] = $username;
      $fk[] = "Visited";
      $usdes = serialize($fk);
      $quer = "UPDATE user5 SET fromuser='$usdes' WHERE username='$profile'";
      $resul = mysqli_query($db_connect, $quer);
        }
      }
 
    ?>
    </div>
    <?php
      echo "      
<span style='padding:28px 20px 10px; margin:0px;display:inline-block; font-size:22px; font-weight:400; font-family:Verdana, Geneva, Tahoma, sans-serif;'>".$data['fname']."</span></br>
<span style='padding:20px 20px 4px; margin:0px;font-size:16px; font-weight:500;font-family:Verdana, Geneva, Tahoma, sans-serif;'>".$data['age']." year old, ".$data['gender']."</span></br>
<span  style='padding:20px 20px 4px; margin:0px;font-size:16px; font-weight:500;font-family:Verdana, Geneva, Tahoma, sans-serif;'>".$data['information']."</span>
    ";?>
</br>
<div style="display:inline-block; margin:7px 10px;">
<div class="righttologo friendhover" onclick="Friendrequest('<?php echo $data['username']?>');"style=" padding: 9px 8px 4px 11px !important"><img  style="padding:12px 13px 12px 11px"src="
<?php

$f = $data['fromuser'];
$count =0;
$usde = (unserialize($f));

for ($i=0; $i<=count($usde); $i++)
{
if($usde[$i] === $_SESSION['username'] &&  $usde[$i+1]=== "Send")
{
  
  $count = $count+1;
  
}
}
if($count==0)
  echo "user(1).png";
else 
echo "user.png";
?>" width="25" height="25" 
 id='request' ></div>
<div class="righttologo messhover"  style=" box-sizing:border-box; padding: 8px 10px 4px !important;"><img  style="padding:10px 1px" width="45"src="usersmessage.png" onmouseover="this.src='usersmessage2.png'"
onmouseout="this.src='usersmessage.png' "></div>
<div class="righttologo hearthover"   onclick="changeImage('<?php echo $data['username']?>');"><img src="
<?php
$f = $data['likeuser'];
$count =0;
$usde = (unserialize($f));

for ($i=0; $i<=count($usde); $i++)
{
if($usde[$i] === $_SESSION['username'])
{
  
  $count = $count+1;
  
}
}
if($count==0)
  echo "icons8-heart-642.png";
else 
echo "icons8-heart-64.png";
?>

"
 id="hearts"  width="47"></div><!--
<div class="righttologo videohover" style="  padding:7px 10px 5px !important;"><img  width="48"src="videograys.jpg"onmouseover="this.src='videoblues.png'"
onmouseout="this.src='videograys.jpg'"></div>-->
</div>


<div style="width:calc(72%); background-color:white; height:500px;display:inline-block;margin-top:5px;">
<button class="tablink"style="width:25%;"  onclick="opencityss('About',this)" id="activecontent">About</button>
<button class="tablink"style="width:25%;"  onclick="opencityss('Wall',this)">Wall</button>
<button class="tablink" style="width:25%;" onclick="opencityss('Photo',this)" >Photo</button>
<button class="tablink" style="width:25%;" onclick="opencityss('Friends',this)">Friends</button>


       <div class="tabcontent" id="About">
        <div style="padding:10px 20px; font-size:20px; font-weight:100;"> 

        <div style="padding:5px 0px 35px 0px;"> 
        <i class="fa fa-info-circle" style="padding:0px 4px;"></i>
          Basic info
        </div>

        <div style="padding:5px 0px 35px 0px;"> 
        <div><i class="fa fa-user" style="padding:0px 4px;"></i>
        personal info<?php 
        if($_SESSION["username"] == $data["username"])
        {
          echo "<img style='float:right; ' onclick='return userdetail()' src='edits.png' width='15' height='15' > ";
        }
        ?></div>


        <div style="padding:8px 28px; color:#737272; font-size:15px; font-weight:700; font-family:sans-serif; ">
        <?php 
        $grp = $data['groupinfo'];
        $grpfo = unserialize(base64_decode($grp));
        
        echo "
        
        
        <div style='margin:17px 0px 8px;display:inline-block;width:170px; height:auto;'>Gender</div><div style='display:inline-block; width:230px; height:auto; color:black; margin:0px 10px;'> ".$data['fname']."</div> 
        <div style='margin:7px 0px 8px;display:inline-block;width:170px; height:auto;'>Age</div><div style='display:inline-block; width:230px; height:auto; color:black; margin:0px 10px;'> ".$data['age']." </div> 
        <div style='margin:7px 0px 8px;display:inline-block;width:170px; height:auto;'>Lives in</div><div style='display:inline-block; width:230px; height:auto; color:black; margin:0px 10px;'> ".$data['information']." </div> 
        <div style='margin:7px 0px 8px;display:inline-block;width:170px; height:auto;'>Interested In</div><div style='display:inline-block; width:230px; height:auto; color:black; margin:0px 10px;'> ".$grpfo[0]." </div> 
        <div style='margin:7px 0px 8px;display:inline-block;width:170px; height:auto;'>Relationship Status</div><div style='display:inline-block; width:230px; height:auto; color:black; margin:0px 10px;'> ".$grpfo[1]." </div> 
        <div style='margin:7px 0px 8px;display:inline-block;width:170px; height:auto;'>Looking For</div><div style='display:inline-block; width:230px; height:auto; color:black; margin:0px 10px;'> ".$grpfo[2]." </div> 
        <div style='margin:7px 0px 8px;display:inline-block;width:170px; height:auto;'>Height For</div><div style='display:inline-block; width:230px; height:auto; color:black; margin:0px 10px;'> ".$grpfo[3]." </div> 
        <div style='margin:7px 0px 8px;display:inline-block;width:170px; height:auto;'>Eye Color</div><div style='display:inline-block; width:230px; height:auto; color:black; margin:0px 10px;'> ".$grpfo[4]." </div> 
        <div style='margin:7px 0px 8px;display:inline-block;width:170px; height:auto;'>Hair Color Status</div><div style='display:inline-block; width:230px; height:auto; color:black; margin:0px 10px;'> ".$grpfo[5]." </div> 
        <div style='margin:7px 0px 8px;display:inline-block;width:170px; height:auto;'>Education</div><div style='display:inline-block; width:230px; height:auto; color:black; margin:0px 10px;'> ".$grpfo[6]." </div> 

       
       ";


?>
<!--<div style='padding:8px 0px;'>Age <div style='display:inline-block; padding:0px 185px;'>".$data['age']."</div> </div>
        <div style='padding:8px 0px;'>Lives in <div style='display:inline-block; padding:0px 150px;'>".$data['information']."</div> </div>
        <div style='padding:8px 0px;'>Interested In <div style='display:inline-block; padding:0px 150px;'>".$data['gender']."</div> </div>
        
        <div style='padding:8px 0px;'>Relationship Status ".$data['gender']." </div>
        <div style='padding:8px 0px;'>Looking For ".$data['gender']." </div>
        <div style='padding:8px 0px;'>Height ".$data['gender']." </div>
        <div style='padding:8px 0px;'>Eye Color ".$data['gender']." </div>
        <div style='padding:8px 0px;'>Hair Color ".$data['gender']." </div>
        <div style='padding:8px 0px;'>Education ".$data['gender']." </div>-->
        </div>
      
</div>

        <div style="padding:5px 0px 35px 0px;"> 
        <img src="verification_icon.png" width="20" style="padding:0px 2px;">
        Profile Verification 
        </div>
      <?php
      $querys = "Select * from user5 WHERE username ='$_SESSION[username]' ";
      $results = mysqli_query($db_connect, $querys);
      $datas = mysqli_fetch_assoc($results);
      ?>
        </div>
       </div> 
       <div class="tabcontent" id="Wall">
      <p style="margin:10px 0px 10px 6%; color:#4f4f4f;font-size:18px; font-weight:700;">Write Something to <?php echo $profile;?></p>
      <input placeholder="Write Something to <?php echo $profile;?>" style="width:90%; height:18px;margin:10px 0px 10px 6%;padding:12px 9px" type="text" id="message" name="message">
      <img src='<?php echo $datas[picsource];?>' width="28" height="28" style="margin:0px 20px -8px 6%;border:1px solid black;border-radius:50%;">
      <button id="but" name="but" style="padding:6px 19px;background-color:green;color:white;font-weight:100;font-size:17px;">Send</button>
      <div  style="width:90%;height:300px;padding:10px 16px;margin:10px 12% 10px 6%;"><div class="fet"></div></div>
      <script>
      setInterval(run, 1000);
      function run(){
        var profile = "<?php echo $profile;?>";
        $.post("fet.php",{profile:profile},function(data,status){
          document.getElementsByClassName('fet')[0].innerHTML = data;
        });
      }
      var input = document.getElementById("message");
    input.addEventListener("keyup", function(event) {
    if (event.keyCode === 13) {
    event.preventDefault();
      document.getElementById("but").click();
  }
}); 
        $("#but").click(function(){
          var msg = $("#message").val();
          var profile = "<?php echo $profile;?>";
          $.post("postmsg.php",{msg:msg,profile:profile},function(data,status){
            document.getElementsByClassName('fet')[0].innerHTML = data;
          });
          $("#message").val('');
          return false;
        });
      </script>
       </div> 
       <div class="tabcontent" id="Photo">
       hellod 
      </div> 
       <div class="tabcontent" id="Friends">
       <?php 
       $f = $data['permrequest'];
       $usde = (unserialize($f));
       if($data['permrequest']!=""){
       for ($i=0; $i<count($usde); $i++)
       {
         
        $query = "Select * from user5 WHERE username ='$usde[$i]' ";
        $result = mysqli_query($db_connect, $query);
        $dataz = mysqli_fetch_assoc($result);
        echo "
        <div style='display:inline-block;  padding:0; margin:0; width:120px; height:280px; box-sizing:border-box;'><a href='htmlindex.php?profile=".$dataz['username']."&username=".$_SESSION['username']."'><img style='margin:0px;box-shadow:1px -0.5px 2px #868586;background-color:pink; padding:0px;' src='".$dataz['picsource']."' width='120' height='120'>
        </a><div style=' width:120px; height:auto;box-shadow:1px 1px 2px #868586; font-size:14px; background-color:white; padding:10px 10px 10px; font-weight:300; margin-top:-5px; box-sizing:border-box;'>
        <p  style=' width:120px; height:21px; overflow:hidden;margin:0px;'>".$dataz['username']."</p>
        <p style=' width:100px; height:auto;padding:0px 10px 5px 0px;margin:5px 0px 0px 0px; font-size:12px;color:gray;'>".$dataz['gender'].",".$dataz['age']." year old ".$dataz['information']."</p>
        </div>
        </div>
        ";
        
       }}
      }} ?>
      </div> 

</div>

<?php  }}?>
</div>
</div>





<?php
include("db_connection.php");
session_start();
$prcy = $_REQUEST['prcy'];
if($prcy)
{
?>

<div class="maincontent2" style="padding:1.5% 0% 1.5% 2%; margin:40px 30px 20px;">
<div class="img" style="height:auto;">
<p style="margin:0px; color:#575252; font-size:19px;">Terms Of Service</p>
</div>
</div>

<div class="maincontent2" style="padding:1.5% 2% 1.5% 2%; margin:10px 30px 20px;">
<div class="img" style="height:auto;width:auto;">
<p style="margin:0px; color:#444141; font-size:18px; font-weight:500; text-align:justify;">
This agreement ("Agreement") is a contract between you and ("ChatFly", "Date Way", "W-match", "Service", "us" "our" and "we") and governs your use of the ChatFly, Date Way, and W-match mobile application and website services (the "Service"). By using the ChatFly, Date Way and W-match services, you agree to be bound by the following Terms of Service (the "Terms of Service"), whether or not you register as a member ("Member"). We may modify this Agreement occasionally, and such modification shall be effective upon posting by us on the mobile application and website. We may update you on our changes through your email or notify you through the mobile app or website. You agree to be bound by any changes to this Agreement when you use the Service after any such modification is posted. This Agreement includes ChatFly, Date Way and W-match's policy for acceptable use and content posted on the mobile application and website, your rights, obligations, and restrictions regarding your use of the mobile application and website and the Service and ChatFly, Date Way and W-match 's Privacy Policy.

If you are under the age of 18, you may not download or use our Services. We do not knowingly collect or maintain information from children under age 18. If you are under the age of 18, you must get your parent or guardian to read and agree to our Terms of Service and Privacy Policy. Please, choose carefully the information you post on our Services and the information you provide to other Members. Your ChatFly, Date Way and W-match profile may not include the following items: nude, violent or offensive images or texts. Information posted by other ChatFly, Date Way and W-match Members may contain inaccurate, inappropriate or offensive materials, products or services and ChatFly, Date Way and W-match assume no responsibility or liability for this material.

We reserve the right, in its sole discretion, to reject, refuse to post or remove any posts (including email) by you, or to restrict, suspend, or terminate your access to all or any part of the mobile application and website and/or Services at any time, for any or no reason, with or without prior notice, and without liability.
</p>
</div>
</div>
<?php
 }
?>

<?php
include("db_connection.php");
session_start();
$prcy = $_REQUEST['tos'];
if($prcy)
{
?>

<div class="maincontent2" style="padding:1.5% 0% 1.5% 2%; margin:40px 30px 20px;">
<div class="img" style="height:auto;">
<p style="margin:0px; color:#575252; font-size:19px;">Privacy Policy</p>
</div>
</div>

<div class="maincontent2" style="padding:1.5% 2% 1.5% 2%; margin:10px 30px 20px;">
<div class="img" style="height:auto;width:auto;">
<p style="margin:0px; color:#444141; font-size:18px; font-weight:500; text-align:justify;">
Thank you for joining one of the world’s largest online dating platforms. We at ChatFly Social Network  (“ChatFly”, “W-Match”, “Date Way”, "Service" “we”, “us”) respect your privacy and want you to understand how we collect, use, and share data about you. This Privacy Policy covers our data collection practices and describes your rights to access, correct, or restrict our use of your personal data; in plain language, keeping legal and technical jargon to a minimum. Your privacy is at the core of the way we design and build our Services and products you know and love so that you can fully trust them and focus on building meaningful connections.

Unless we link to a different policy or state otherwise, this Privacy Policy applies when you visit or use the ChatFly, W-Match, Date Way website, mobile applications, APIs or related services (the “Services”).

 

By using the Services, you agree to the terms of this Privacy Policy. You shouldn’t use the Services if you don’t agree with this Privacy Policy or any other agreement that governs your use of the Services.</p>
</div>
</div>
<?php
}
?>

<?php
include("db_connection.php");
session_start();
$like = $_REQUEST['slike'];
if($like)
{
?>

<div class="maincontent2" style="padding:1.5% 0% 1.5% 2%; margin:40px 30px 20px;">
<div class="img" style="height:auto;">
<p style="margin:0px; color:#575252; font-size:19px;">Likes</p>
</div>
</div>

<div class="maincontent2" style="padding:1.5% 2% 1.5% 2%; margin:10px 30px 20px;">
<div class="img likeupdate" style="height:auto;width:auto;">


</div>
</div>
<?php
}
?>


<?php
include("db_connection.php");
session_start();
$like = $_REQUEST['visitor'];
if($like)
{
?>

<div class="maincontent2" style="padding:1.5% 0% 1.5% 2%; margin:40px 30px 20px;">
<div class="img" style="height:auto;">
<p style="margin:0px; color:#575252; font-size:19px;">Visitor</p>
</div>
</div>

<div class="maincontent2" style="padding:1.5% 2% 1.5% 2%; margin:10px 30px 20px;">
<div class="img visitorupdate" style="height:auto;width:auto;">


</div>
</div>
<?php
}
?>

<?php
include("db_connection.php");
session_start();
$fav = $_REQUEST['fav'];
if($fav)
{
?>

<div class="maincontent2" style="padding:1.5% 0% 1.5% 2%; margin:40px 30px 20px;">
<div class="img" style="height:auto;">
<p style="margin:0px; color:#575252; font-size:19px;">Favorites</p>
</div>
</div>

<div class="maincontent2" style="padding:1.5% 2% 1.5% 2%; margin:10px 30px 20px;">
<div class="img favupdate" style="height:auto;width:auto;">


</div>
</div>
<?php
}
?>

<?php
include("db_connection.php");
session_start();
$req = $_REQUEST['req'];
if($req)
{
?>

<div class="maincontent2" style="padding:1.5% 0% 1.5% 2%; margin:40px 30px 20px;">
<div class="img" style="height:auto;">
<p style="margin:0px; color:#575252; font-size:19px;">My Friend Request</p>
</div>
</div>

<div class="maincontent2" style="padding:1.5% 2% 1.5% 2%; margin:10px 30px 20px;">
<div class="img requpdate" style="height:auto;width:auto;">


</div>
</div>
<?php
}
?>


<?php
include("db_connection.php");
session_start();
$notifi = $_REQUEST['notifi'];
if($notifi)
{
?>

<div class="maincontent2" style="padding:1.5% 0% 1.5% 2%; margin:40px 30px 20px;">
<div class="img" style="height:auto;">
<p style="margin:0px; color:#575252; font-size:19px;">Notification</p>
</div>
</div>

<div class="maincontent2" style="padding:1.5% 2% 1.5% 2%; margin:10px 30px 20px;">
<div class="img noteupdate" style="height:auto;width:100%;">
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
          $u = $usde[$i];
        $query = "Select * from user5 WHERE username ='$u' ";
        $result = mysqli_query($db_connect, $query);
        $dataz = mysqli_fetch_assoc($result);
        echo "<div class='mes' style='display:block;background-color:#e6dede; height:auto;overflow:hidden; border:1px solid #d0c0c0;border-top-right-radius:30px;border-bottom-left-radius:30px; margin-top:10px;padding:10px 18px 10px;'>
        <img src='".$data['picsource']."' width='51' height='51' style='border-radius:50%;border:1px solid black;margin:0px 0px -4px;'>
        <div style='padding-left:12px;margin-top:0px;display:inline-block;'>".$usde[$i]."<br>";
          echo "<p style='margin:0px; padding:0px;font-weight:100;font-size:15px;width:400px; height:auto;'>".$usde[$i+1]." Your Profile Picture"."</p></div></div>";

        $ct=1;
         $i++;
         
     
      
  }

  if($ct==0)
  {
      
    echo "No Data Available";
  }
    }
  }
?>
</div>
</div>
<?php
}
?>






</div>

</div>

</div>

<?php
}
?>
<style>
.hearthover:hover{background-color:#7ecbf0;
  }

.friendhover:hover{background-color:#7ecbf0;}
.messhover:hover{background-color:#41dd41f2;}
.videohover:hover{background-color:#ff94a6;}
  .righttologo{
    cursor:pointer;
    border-radius:50%;
    margin:20px 0px 20px 9px ;
    padding:9px 10px 5px;
    border:1px solid gray;
    display:inline-block;
  }
@keyframes heartbeat
{
  0%
  {
    transform: scale( .75 );
  }
  20%
  {
    transform: scale( 1 );
  }
  40%
  {
    transform: scale( .75 );
  }
  60%
  {
    transform: scale( 1 );
  }
  80%
  {
    transform: scale( .75 );
  }
  100%
  {
    transform: scale( .75 );
  }
}

.heart
{
  background-color: none;
  width: 50px;
  height: 50px;
  padding-left:32px;
 
  cursor:pointer;
}
  .img{width:242px;
  height:310px;overflow:hidden;display:inline-block;
float:left;}
  .imgdetail{background-color: rgba(240, 101, 228, 0.98); 
  width:240px; margin-top:-6px; border:1px solid black; border-bottom-left-radius:20px;
   border-bottom-right-radius:20px;}
.profileid{
    display: none; 
position: fixed;  
z-index: 1; 
left: 0;
top: 0;
width: 100%; 
height: 100%; 
overflow: auto; 
background-color:rgba(0,0,0,0.3); 
padding-top: 60px;
}
.profilepadding{
    padding:16px;
    background-color:#f6f5f5;
    margin:16px 20px;
}
.profilemiddle{
  width:calc(559px);
height:auto;
overflow:auto;
margin: 3% auto 15% auto; 
box-sizing: border-box;
      background-color:#dfd7d8;
border-radius:4px; 
z-index: 0;
}
.profilecontent{
  width:450px;
    border:1px solid gray;
    padding:16px;
    overflow: hidden;
}
.flt{
  display: flex;
    justify-content: center;

}
.flr{
  display: flex;
    justify-content: center;

}
</style>
<div id="profilechange" class="profileid">

<div class="profilemiddle animate">
<div class="cancel">
    <span onclick="document.getElementById('profilechange').style.display='none'" class="cancelbtn" title="Cancel" >&times;</span>
    </div>
<div class="profilepadding">
<div class="profilecontent">


<form method="post"  enctype="multipart/form-data">
<div class="flt">
<img src="<?=$_SESSION['pic']?>" id="blah" width="200" height="200" name="pic" border="2">
</div>
<div class="flt">
<p><input type="file" onchange="readURL(this);" name="imageupload" /></p>
</div>

<div class="flrt">
 
<label for="name">Username</label>
    <input type="text" id="names" name="name" value="<?=$_SESSION['username']?>"><br>
   
    Male<input type="radio" name="gender" id="gender" value="male"
    <?php
    if($_SESSION['gender']==male)
    {
      echo "checked";
    }

    ?>
    >
    Female<input type="radio" name="gender" id="gender" value="female"
    <?php
    if($_SESSION['gender']==female)
    {
      echo "checked";
    }

    ?>
    >
    <label for="age">Age:</label>
    <input type="number" name="age1" min="13" max="80" id="ages"  list="age13" value="<?=$_SESSION['age']?>" required><br>
    <datalist style="overflow:auto;" id="age13">
   <option value="13"> <option value="14"> <option value="15"> <option value="16"> <option value="17"> <option value="18"> <option value="19"> <option value="20"> <option value="21"> <option value="22"><option value="23"> <option value="24"> <option value="25"> <option value="26">  <option value="27"> <option value="28"> <option value="29"><option value="30"> <option value="31"> <option value="32"><option value="33"> <option value="34"> <option value="35"> <option value="36">  <option value="37"> <option value="38"> <option value="39"><option value="40"> <option value="41"> <option value="42"><option value="43"> <option value="44"> <option value="45"> <option value="46">  <option value="47"> <option value="48"> <option value="49"> <option value="50"> <option value="51"> <option value="52"><option value="53"> <option value="54"> <option value="55"> <option value="56">  <option value="57"> <option value="58"> <option value="59"> <option value="60"> <option value="61"> <option value="62"><option value="63"> <option value="64"> <option value="65"> <option value="66">  <option value="67"> <option value="68"> <option value="69"> <option value="70"> <option value="71"> <option value="72"><option value="73"> <option value="74"> <option value="75"> <option value="76">  <option value="77"> <option value="78"> <option value="79"> <option value="80">  
    </datalist>
    <input type="submit" name="submit"id="updateprofile"  value="Submit">
 
  </form>
    </div>
  
</div>
</div>
</div>

</div>
<script>
    function userdetail(){
        document.getElementById('profilechange').style.display = 'block';
    }
</script>


<?php
}
?>
<style>
.modal {
  display: none; 
position: fixed;  
z-index: 1; 
left: 0;
top: 0;
width: 100%; 
height: 100%; 
overflow: auto; 
background-color:rgba(0,0,0,0.3); 
padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
</style>
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
} 


</script>
<?php
include("db_connection.php");
session_start();
$profile = $_REQUEST['profile'];
$username = $_REQUEST['username'];

$query = "Select * from user5 WHERE username ='$_SESSION[username]' ";
$result = mysqli_query($db_connect, $query);

    while($data = mysqli_fetch_assoc($result))
    {
      if($data['temprequest']!="")
    {  
      $datas = unserialize( $data['temprequest']);
      
      ?>
      <style>
        .modalss {
display: block; 
position: fixed;  
z-index: 1; 
right: 0;
top: 0;
width: auto; 
height: 200px; 
overflow: hidden; 
background-color:rgba(0,0,0,0); 
padding-top: 60px;
}
.display{
margin-left:auto; 
margin-right: 5%; 
margin-top:-70px;
border:1px solid #9d9999;
padding:8px 10px 4px; 
width:290px; height:50px;background-color:#bbb;
border-radius:5px;
}
.bcolor{
  color:#2f2d2d;
  margin:0; 
  font-size:15px; 
  font-weight:700;
}
.animated {
    -webkit-animation: animatezooms 5.6s;
    animation: animatezooms 5.6s
    }
    
    @-webkit-keyframes animatezooms {
      0% {-webkit-transform: translate(0px,-100px)} 
    1% {-webkit-transform: translate(0px,100px))} 
    60% {-webkit-transform: translate(0px,100px)} 
    100% {-webkit-transform: translate(0px,-100px)}
   
    }
    
    @keyframes animatezooms {
      0% {transform: translate(0px,-100px)} 
    1% {transform: translate(0px,100px))} 
    60% {transform: translate(0px,100px)} 
    100% {transform: translate(0px,-100px)}
    }
        </style>
   
<!-- The Modal 
<div id="10110" class="modalss">
<div class="display animated" >

    <p style="margin:0; font-size:15px; font-weight:100;"><b class="bcolor"><?php echo $datas[0] ?></b> Send you a Friend Request</p>
  

</div>
</div>-->

<?php } 
   } ?>










































<!--login-->

<div id="1011" class="modal" >
<div class="displayform animate">


    <div class="cancel">
    <span onclick="document.getElementById('1011').style.display='none'" class="cancelbtn" title="Cancel" >&times;</span>
    </div>
    <div class="outer">
   <div class="coverdata">

    <button class="tablink" style="width: 50%;" onclick="opencity('login',this)" id="activecontent">Sign In</button>
    <button class="tablink" style="width: 50%;" onclick="opencity('signin',this)">Login</button>
    
    <div class="tabcontent" id="login" >
    <div class="anyclass"></div>

    

<form  method="post"  name="myform">
     
  <div class="container">
    <label for="name">Username</label>
    <label for="fname" style="margin:0px 0px 0px 28%;">Name</label>
    <br>
    <input type="text" id="name" name="name" placeholder="Username">

    
    <input type="text" id="fname" name="fname" placeholder="Name"><br>
   
    Male<input type="radio" name="gender" id="gender" value="male">
    Female<input type="radio" name="gender" id="gender" value="female">
   

    <label for="age">Age:</label>
    <input type="number" name="age1" min="13" max="80" id="age"  list="age13" value="13" required><br>
    <datalist style="overflow:auto;" id="age13">
   <option value="13"> <option value="14"> <option value="15"> <option value="16"> <option value="17"> <option value="18"> <option value="19"> <option value="20"> <option value="21"> <option value="22"><option value="23"> <option value="24"> <option value="25"> <option value="26">  <option value="27"> <option value="28"> <option value="29"><option value="30"> <option value="31"> <option value="32"><option value="33"> <option value="34"> <option value="35"> <option value="36">  <option value="37"> <option value="38"> <option value="39"><option value="40"> <option value="41"> <option value="42"><option value="43"> <option value="44"> <option value="45"> <option value="46">  <option value="47"> <option value="48"> <option value="49"> <option value="50"> <option value="51"> <option value="52"><option value="53"> <option value="54"> <option value="55"> <option value="56">  <option value="57"> <option value="58"> <option value="59"> <option value="60"> <option value="61"> <option value="62"><option value="63"> <option value="64"> <option value="65"> <option value="66">  <option value="67"> <option value="68"> <option value="69"> <option value="70"> <option value="71"> <option value="72"><option value="73"> <option value="74"> <option value="75"> <option value="76">  <option value="77"> <option value="78"> <option value="79"> <option value="80">  
    </datalist>
     
    <label for="password">Password</label>
    <input type="password" name="password" id="password" placeholder="password"><br>
    

    <label for="password1">Re-enter Password</label>

    <input type="password" name="password1" id="password1" placeholder="Re-enter password"><br>
    <div  id="citys"></div>

    <button id="sub" >Sign In</button>
  </div>
   
</form>

</div>



    <div class="tabcontent" id="signin">
    <div class="lanyclass"></div>

   
    <form  method="post" name="myregister"><br>
    <div class="container">

       <label for="name">Username</label>
       <input type="text" id="namel" name="name" placeholder="Username"><br>
       
       <label for="password">Password</label>
       <input type="password" name="password" id="passwordl" placeholder="password"><br>

       <button id="sublg" >Login</button>

       </div>
    </form>
     </div>

  </div>
  </div>

</div>
</div>

<!--login-->

<!--<script src="https://code.jquery.com/jquery-3.5.0.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="updateprofile.js" type="text/javascript"></script>
<script src="onunload.js" type="text/javascript"></script>
<script src="readURL.js" type="text/javascript"></script>
<script src="click.js" type="text/javascript"></script>
<script src="ready.js" type="text/javascript"></script>
<script src="sub.js" type="text/javascript"></script>
<script src="displayloginorsign.js" type="text/javascript"></script>
<script src="opencity.js" type="text/javascript"></script>
<script src="logs.js" type="text/javascript"></script>
<script src="runfunction.js" type="text/javascript"></script>
<script src="userdetails.js" type="text/javascript"></script>
<script>
function Friendrequest(username)
  {
    var image =document.getElementById("request");
    if ( image.src === "http://localhost/search_engine/chat/user(1).png") 
        {
            
            jQuery.ajax({
              url:'request.php',
              type:'post',
              data:'type=send&id='+username,
              success:function(result){
                image.src = "user.png";
                
                
              }
            });
            
        }
        else 
        {

          jQuery.ajax({
              url:'request.php',
              type:'post',
              data:'type=notsend&id='+username,
              success:function(result){
                image.src = "user(1).png";
                
              }
            });
            
        
           
        }
  }

</script>
<script >
  
    function changeImage(profile) {
       var image =document.getElementById("hearts");
      
      
        if ( image.src === "http://localhost/search_engine/chat/icons8-heart-642.png") 
        {
            
            jQuery.ajax({
              url:'like.php',
              type:'post',
              data:'type=like&id='+profile,
              success:function(result){
                image.src = "icons8-heart-64.png";
                
              }
            });

            jQuery.ajax({
              url:'like4.php',
              type:'post',
              data:'type=like&id='+profile,
              success:function(result){
          
                
              }
            });

            jQuery.ajax({
              url:'like2.php',
              type:'post',
              data:'type=like&id='+profile,
              success:function(result){
                image.src = "icons8-heart-64.png";
                
              }
            });
            
        }
        else 
        {

          jQuery.ajax({
              url:'like.php',
              type:'post',
              data:'type=dislike&id='+profile,
              success:function(result){
                image.src = "icons8-heart-642.png";
                
              }
            });

            jQuery.ajax({
              url:'like3.php',
              type:'post',
              data:'type=dislike&id='+profile,
              success:function(result){
                image.src = "icons8-heart-642.png";
                
              }
            });
            
        
           
        }
    }
</script>
</body>
</html>

<?php
if($_POST['submit'])
{
$filename = $_FILES["imageupload"] ["name"];
$tempname = $_FILES["imageupload"] ["tmp_name"];
$user = $_SESSION["username"];
$folder = "image/".$filename;
move_uploaded_file($tempname,$folder);
  }

if($filename != "")
{
  $query = "UPDATE user5 SET picsource='$folder' WHERE username='$user'";
  $data = mysqli_query($db_connect,$query);
  $_SESSION["pic"] = $folder; 

}

?>
<script>
$.get("https://api.ipdata.co?api-key=test", function (response) {
    $("#ip").html("IP: " + response.ip);
    $("#citys").val(response.city + ", " + response.region + ", " + response.country_name);
    $("#response").html(JSON.stringify(response, null, 4));
    
}, "jsonp");
</script>