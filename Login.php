<?php
include("db.php");
session_start();
if(isSet($_POST['username']) && isSet($_POST['password']))
{
// variabel dari username dan password dari form
$username=mysqli_real_escape_string($db,$_POST['username']); 
$password=mysqli_real_escape_string($db,$_POST['password']); 

$result=mysqli_query($db,"SELECT uid FROM users WHERE username='$username' and password='$password'");
$count=mysqli_num_rows($result);

$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
// jika hasil dari variabel  $username and $password sama / ada maka membuat session dan mengambil uid
if($count==1)
{
$_SESSION['login_user']=$row['uid'];
echo $row['uid'];
}
//jika tidak ada maka data yang dikirimkan berupa null dan akan di catch sebagai pesan eror di index.php

}
?>