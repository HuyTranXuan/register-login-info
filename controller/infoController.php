<?php
    include("../services/userService.php");
    $user = new User();

    $q = $_REQUEST["q"];
    $type = $_REQUEST["type"];
    $user->setInfo($_SESSION['id'], $q, $type);
?>