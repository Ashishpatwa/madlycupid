<html>
    <head>   <link rel="stylesheet" href="main.css"></head>
<body>
<form action="" method="post"  enctype="multipart/form-data">
<input type="file" name="uploadfile" >
<input type="submit" name="submit" value="Submit">
</form>
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


<li style="float:right;">
    <button id="hidesign" onclick="return displaylogin()">Sign In</button>
</li>


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
</body>
</html>
<?php
if($_POST['submit'])
{
$filename = $_FILES["uploadfile"] ["name"];
$tempname = $_FILES["uploadfile"] ["tmp_name"];
$folder = "image/".$filename;
move_uploaded_file($tempname,$folder);
}
?>
