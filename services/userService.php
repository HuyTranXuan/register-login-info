<?php 
session_start();
function executeQuery($query){
  $host = "abul.db.elephantsql.com";
  $user = "ycjkdniy";
  $pass = "BfshSpGq9OHOVQ9cFqm0n-6vHnj27HwX";
  $db = "ycjkdniy";
  $con = pg_connect("host=$host dbname=$db user=$user password=$pass")
    or die ("Could not connect to server\n");
  $results = pg_query($con, $query) or die('Query failed: ' . pg_last_error());

  $row = pg_fetch_row($results);
  return $row;
  pg_close($con);
}

function addUser($email, $fname, $lname, $password){
    executeQuery("INSERT INTO users (email, fname, lname, password) VALUES ('$email', '$fname', '$lname', '$password')");
    $id = findUserByEmail($email)[0];
    executeQuery("INSERT INTO info (user_id) VALUES ('$id')");
}
function findUserById($id){
    $result = executeQuery("SELECT * FROM users WHERE id = '$id'");
    return $result;
}
function findUserByEmail($email){
    $result = executeQuery("SELECT * FROM users WHERE email = '$email'");
    return $result;
}

function setInfo($user_id, $q, $type){
    executeQuery("UPDATE info SET $type = '$q' WHERE user_id = '$user_id'");
}

function findInfoByUserId($user_id){
    $result = executeQuery("SELECT * FROM info WHERE user_id = '$user_id'");
    return $result;
}

class User {
    var $id;
    var $email;
    var $fname;
    var $lname;
    
    function __construct($id, $email, $fname, $lname){
        $this->id = $id;
        $this->email = $email;
        $this->fname = $fname;
        $this->lname = $lname;
    }
    
}
?>


