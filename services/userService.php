<?php 
session_start();

class DB {
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
}
class User {
    var $db;
    public function __construct() {$this->db = new DB;      }

    private function findUserByEmail($email){
        $result = $this->db->executeQuery("SELECT * FROM users WHERE email = '$email'");
        return $result;
    }
    private $info;

    function getInfo(){
        return $this->info;
    }
    public function register($email, $fname, $lname, $pass) {  
        $errors = array();
        
        $result = $this->findUserByEmail($email);
        if ($result != 0)array_push($errors, "Entered email already exist!");
        if(empty($email))array_push($errors, "Email is required");
        if(empty($fname))array_push($errors, "First name is required");
        if(empty($lname))array_push($errors, "Last name is required");
        if(empty($pass))array_push($errors, "Password is required");

        $_SESSION['errors'] = $errors;

        if (count($errors) == 0) {
            $password = password_hash($pass, PASSWORD_BCRYPT);
            $this->db->executeQuery("INSERT INTO users (email, fname, lname, password) VALUES ('$email', '$fname', '$lname', '$password')");
            //create info database associate with user
            $user_id = $result[0];
            $this->db->executeQuery("INSERT INTO info (user_id) VALUES ('$user_id')");
            return true;
        } else return false;


    }
    
    public function login($email, $pass) {  
        $errors = array();
        $result = $this->findUserByEmail($email);
        if (empty($result) || empty($email))array_push($errors, "Wrong email.");
        elseif(!password_verify($pass, $result[4]))array_push($errors, "Wrong password.");

        $_SESSION['errors'] = $errors;
    
        if (count($errors) == 0) {
            //good email + password combination
            //$_SESSION['user'] = $user;
            $_SESSION['login'] = true;
            $_SESSION['id'] = $result[0];
            $_SESSION['email'] = $result[1];
            return true;
        } else {
            return false;
        }
    }
    public function session() {if (isset($_SESSION['login'])) return $_SESSION['login']; }

    public function setInfo($user_id, $q, $type){
        $this->db->executeQuery("UPDATE info SET $type = '$q' WHERE user_id = '$user_id'");
    }
    public function findInfoByUserId($user_id){
        $result = $this->db->executeQuery("SELECT * FROM info WHERE user_id = '$user_id'");
        return $result;
    }
}
?>


