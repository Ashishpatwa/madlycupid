<?php
session_start();
?>
<img id="userm" src='<?= $_SESSION["pic"]?>' width='42' height='42' onclick=" return userdetails()" style="cursor:pointer">
<b><?= $_SESSION["fname"]?> <b>
