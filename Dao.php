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

}

$db = new Dao();

$db->saveUser('test2', 'pass', 'user');

$users = $db->getUsers();

foreach ($users as $user) {
    echo $user['UserName'] . "\n";
}
















