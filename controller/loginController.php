<?php include("../services/userService.php");

$errors = array();
$email = $_POST['email'];
$result = findUserByEmail($email);
if (empty($result) || empty($email)){
    array_push($errors, "Wrong email.");
    $_SESSION['errors'] = $errors;
    header('location: ../login.php');
} else {
    $userEmail = $result[1];
    $userFname = $result[2];
    $userLname = $result[3];
    $userPassword = $result[4];
    
    if (!password_verify($_POST['password'], $userPassword)) {
        array_push($errors, "Wrong password.");
        header('location: ../login.php');
    } 
    
    $_SESSION['errors'] = $errors;
    if (count($errors) == 0) {
        $user = new User($result[0], $userEmail, $userFname, $userLname);
        $_SESSION['user'] = $user;
        header('location: ../index.php');
    } else {
        header('location: ../login.php');    
    }
    
}




?>