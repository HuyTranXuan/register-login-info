<?php 
include("../services/userService.php");

$user = new User();  
if ($_SERVER["REQUEST_METHOD"] == "POST"){
   $register = $user->register($_REQUEST['email'],$_REQUEST['fname'],$_REQUEST['lname'],$_REQUEST['password']);  
   if($register) header('location: ../login.php');
   else header('location: ../register.php');
}
?>