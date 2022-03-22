<?php
class Dao {
private $host = "us-cdbr-east-05.cleardb.net";
private $db = "heroku_3f46b86673827e3";
private $user = "b1aa32eb4ad845";
private $pass = "3a70776a";




    public function getConnection () {
        return
        new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,
            $this->pass);
    }

    public function saveComment ($comment) {
        $conn = $this->getConnection();
        $saveQuery =
            "INSERT INTO comment
            (comment)
            VALUES
            (:comment)";
        $q = $conn->prepare($saveQuery);
        $q->bindParam(":comment", $comment);
        $q->execute();
    }

    public function getComments () {
        $conn = $this->getConnection();
        return $conn->query("SELECT * FROM comment");
    }

    public function saveUser ($userName, $password, $UserRole) {
        $conn = $this->getConnection();
        $saveQuery = 
            "INSERT INTO user
            (UserName, Password, UserRole) VALUES 
            (:UserName, :Password, :UserRole)";
        $q = $conn->prepare($saveQuery);
        $q->bindParam(":UserName", $userName);
        $q->bindParam(":Password", $password);
        $q->bindParam(":UserRole", $UserRole);
        $q->execute();
    }

    public function getUsers() {
        $conn = $this->getConnection();
        return $conn->query("SELECT * FROM user");
    }

    public function verifyLogin($username, $password) {
        echo "hello";
        $conn = $this->getConnection();
        $getQuery = "SELECT * FROM user WHERE UserName = :UserName AND Password = :Password";
        $q = $conn->prepare($getQuery);
        $q->bindParam(":UserName", $username);
        $q->bindParam(":Password", $password);
        $q->execute();
        $result = $q->fetchAll();
        return reset($result);
    }

}

$db = new Dao();

// $db->saveUser('ckennington@gmail.com', 'lollipop', 'user');

$users = $db->getUsers();

foreach ($users as $user) {
    echo $user['UserName'] . "\n";
}

$user = $db->verifyLogin('test2', 'pass');

if($user)
{
    echo $user['UserID'] . "\n";
}