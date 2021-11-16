<?php 
include("../services/userService.php");
$errors = array();
$email = $_POST['email'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$password = $_POST['password'];

$notAllowList = findUserByEmail($email);
if(empty($email))array_push($errors, "Email is required");
if(empty($fname))array_push($errors, "First name is required");
if(empty($lname))array_push($errors, "Last name is required");
if(empty($password))array_push($errors, "Password is required");
if (($notAllowList && count($notAllowList) > 0))array_push($errors, "Email address not available");

$_SESSION['errors'] = $errors;

if (count($errors) == 0) {
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    addUser($email, $fname, $lname, $password);
    header('location: ../login.php');
} else {
    header('location: ../register.php');
}



?>