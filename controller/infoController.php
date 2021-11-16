<?php
    include("../services/userService.php");
    $user = $_SESSION['user'];
    $q = $_REQUEST["q"];
    $type = $_REQUEST["type"];
    setInfo($user->id, $q, $type);
?>