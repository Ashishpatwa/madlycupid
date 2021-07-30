<?php
include("db_connection.php");
session_start();

?>
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