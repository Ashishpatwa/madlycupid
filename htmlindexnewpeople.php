<?php 
include("db_connection.php");
session_start();
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document1</title>
    <meta name="description" content="...">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="mainss.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
<header>
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
<div id="icondetails" >



<li><div id="chat"><img src="inboxs.svg"  width="32" height="32"><b>Inbox<b></div></li>

<li><div id="chat"><img src="message.png"  width="32" height="32"><b>Chat(6)<b></div></li>


<li><div id="chat"><img src="setting.png"  width="32" height="32"><b>Setting<b></div></li>


<li>
<div id="chat" class="upperlogo">
<img id="userm" src='<?= $_SESSION["pic"]?>' width='42' height='42' onclick=" return userdetails()" style="cursor:pointer">
<b><?= $_SESSION["username"]?> <b>
</div>
</li>
</div>
<?php 
}
?>
<li style="float:right;"><div id="icon1">Chat Only with girls</div></li> 
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
<?php
if($_SESSION["username"]!= true)
{
?>
<img src="frontpic.jpg" width="100%" height="100%">
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

</div>

<div class="usermainlinks">
<ul  class="userlink">
<li><img src="share.png" width="18" height="18"></li>
<li>Meet New Friends</li>
</ul>
<ul   class="userlink">
<li><img src="share.png" width="18" height="18"></li>
<li>Popular Photos</li>
</ul>
<ul  class="userlink">
<li><img src="share.png" width="18" height="18"></li>
<li>Suggestions</li>
</ul>
<ul  class="userlink">
<li><img src="share.png" width="18" height="18"></li>
<li>Messages</li>
</ul>
<ul  class="userlink">
<li><img src="share.png" width="18" height="18"></li>
<li>Favorites</li>
</ul>
<ul  class="userlink">
<li><img src="share.png" width="18" height="18"></li>
<li>My Friend Requests</li>
</ul>
<ul  class="userlink">
<li><img src="share.png" width="18" height="18"></li>
<li>Visitors</li>
</ul>
<ul  class="userlink">
<li><img src="share.png" width="18" height="18"></li>
<li>Notifications</li>
</ul>
<ul  class="userlink">
<li><img src="share.png" width="18" height="18"></li>
<li>Likes</li>
</ul>
<!--ul  class="userlink">
<li><img src="share.png" width="18" height="18"></li>
<li>Create Group</li>
</ul>
<ul  class="userlink">
<li><img src="share.png" width="18" height="18"></li>
<li>Find Group</li>
</ul>-->
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

</div>
</div>

<div class="maincontent2" style="padding:0px !important;">
   <div class="outer" style="padding:0px !important;">
   <div class="coverdata">
  <button class="tablink" onclick="opencitys('search',this)" id="activecontents">Search</button>
  <button class="tablink" onclick="opencitys('NearBy',this)">Famous</button>
 
  <div class="tabcontent" id="search" >
  <li style="padding-left:80px; padding-right:30px;">Near My Age </li><label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
  </label>
  <select style=" margin:0px 200px; padding:2px 30px; font-size:17px; border:none; border-bottom:1px solid grey;" name="intrest" id="intrest">
    <option value="Men">Men</option>
    <option value="Women">Women</option>
    <option value="Both">Both</option>
    
  </select>


  </div>
  <div class="tabcontent" id="NearBy" >
  <li style="padding-left:80px; padding-right:30px;">Near My Age </li>
  <label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
</label>
<select style=" margin:0px 200px; padding:2px 30px; font-size:17px; border:none; border-bottom:1px solid grey;" name="intrest" id="intrest">
    <option value="Men">Men</option>
    <option value="Women">Women</option>
    <option value="Both">Both</option>
    
  </select>
 
  </div>
  </div>
  </div >
</div>
  <div class="imageportindex">


</div>







<style>

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












































<!--login-->

<div id="1011" class="modal" >
<div class="displayform animate">


    <div class="cancel">
    <span onclick="document.getElementById('1011').style.display='none'" class="cancelbtn" title="Cancel" >&times;</span>
    </div>
    <div class="outer">
   <div class="coverdata">

    <button class="tablink" onclick="opencity('login',this)" id="activecontent">Sign In</button>
    <button class="tablink" onclick="opencity('signin',this)">Login</button>
    
    <div class="tabcontent" id="login" >
    <div class="anyclass"></div>

    

<form  method="post"  name="myform">
     
  <div class="container">
    <label for="name">Username</label>
    <input type="text" id="name" name="name" placeholder="Username"><br>
   
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
<script language="javascript">
    function changeImage() {

        if (document.getElementById("hearts").src.indexOf(642) === -1) 
        {
            document.getElementById("hearts").src = "icons8-heart-642.png";
        }
        else 
        {
            document.getElementById("hearts").src = "icons8-heart-64.png";
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
    $("#city").html(response.city + ", " + response.region + ", " + response.country_name);
    $("#response").html(JSON.stringify(response, null, 4));
}, "jsonp");
</script>