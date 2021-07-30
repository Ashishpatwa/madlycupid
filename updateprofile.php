<?php

include("db_connection.php");
session_start();


$pic = $_REQUEST['pic'];
$name = $_REQUEST['name'];
$age = $_REQUEST['age'];
$gender = $_REQUEST['gender'];
$user = $_SESSION['username'];
if($pic !="")
{
$query = "UPDATE user5  SET username='$name',age='$age',gender='$gender',picsource='$pic' where username='$user' ";
$check = mysqli_query($db_connect,$query);
if($check)
{
    $_SESSION['username'] = $name;
    $_SESSION['age'] = $age;
    $_SESSION['gender']= $gender;
    $_SESSION['pic'] = $pic;
}
else
echo "error".mysqli_error();
}
else
{
$query = "UPDATE user5  SET username='$name',age='$age',gender='$gender' where username='$user' ";
$check = mysqli_query($db_connect,$query);
if($check)
{
    $_SESSION['username'] = $name;
    $_SESSION['age'] = $age;
    $_SESSION['gender']= $gender;
}
else
echo "error".mysqli_error();
}
?>