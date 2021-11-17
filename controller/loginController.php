<?php include("../services/userService.php");
    $user = new User();
    if ($user->session()) header("location:../index.php");
    
    $user = new User();
    if ($_SERVER["REQUEST_METHOD"] == "POST"){  
        $login = $user->login($_REQUEST['email'],$_REQUEST['password']);
        if($login)header('location: ../index.php');
        else header('location: ../login.php');
    }
?>