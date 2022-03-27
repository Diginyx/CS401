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

    public function saveComment ($authorID, $content) {
        echo $authorID . "\n" . $content . "\n";
        $conn = $this->getConnection();
        $saveQuery =
            "INSERT INTO blogcomment
            (AuthorID, Content)
            VALUES
            (:AuthorID, :Content)";
        $q = $conn->prepare($saveQuery);
        $q->bindParam(":AuthorID", $authorID);
        $q->bindParam(":Content", $content);
        $q->execute();
    }

    public function getComments () {
        $conn = $this->getConnection();
        return $conn->query("SELECT * FROM blogcomment");
    }

    public function saveForumPost ($forumID, $authorID, $content)
    {
        $conn = $this->getConnection();
        $saveQuery =
            "INSERT INTO forumpost
            (ForumID, AuthorID, Content)
            VALUES
            (:ForumID, :AuthorID, :Content)";
        $q = $conn->prepare($saveQuery);
        $q->bindParam(":ForumID", $forumID);
        $q->bindParam(":AuthorID", $authorID);
        $q->bindParam(":Content", $content);
        $q->execute();
    }

    public function getForumPosts($forumID) {
        $conn = $this->getConnection();
        $getQuery = "SELECT * FROM forumpost WHERE ForumID = :ForumID";
        $q = $conn->prepare($getQuery);
        $q->bindParam(":ForumID", $forumID);
        $q->execute();
        $result = $q->fetchAll();
        return $result;
    }

    public function saveUser ($userName, $password, $UserRole, $ProfilePicture) {
        $conn = $this->getConnection();
        $saveQuery = 
            "INSERT INTO user
            (UserName, Password, UserRole, ProfilePicture) 
            VALUES 
            (:UserName, :Password, :UserRole, :ProfilePicture)";
        $q = $conn->prepare($saveQuery);
        $q->bindParam(":UserName", $userName);
        $q->bindParam(":Password", $password);
        $q->bindParam(":UserRole", $UserRole);
        $q->bindParam(":ProfilePicture", $ProfilePicture);
        $q->execute();
    }

    public function getUsers() {
        $conn = $this->getConnection();
        return $conn->query("SELECT * FROM user");
    }

    public function verifyLogin($username, $password) {
        $conn = $this->getConnection();
        $getQuery = "SELECT * FROM user WHERE UserName = :UserName AND Password = :Password";
        $q = $conn->prepare($getQuery);
        $q->bindParam(":UserName", $username);
        $q->bindParam(":Password", $password);
        $q->execute();
        $result = $q->fetchAll();
        return reset($result);
    }

    public function getUser($username) {
        $conn = $this->getConnection();
        $getQuery = "SELECT * FROM user WHERE UserName = :UserName";
        $q = $conn->prepare($getQuery);
        $q->bindParam(":UserName", $username);
        $q->execute();
        $result = $q->fetchAll();
        return reset($result);
    }

    public function getPfp($ID) {
        $conn = $this->getConnection();
        $getQuery = "SELECT ProfilePicture FROM user WHERE UserID = :UserID";
        $q = $conn->prepare($getQuery);
        $q->bindParam(":UserID", $ID);
        $q->execute();
        $result = $q->fetch();
        return reset($result);
    }

    public function getUsername ($ID) {
        $conn = $this->getConnection();
        $getQuery = "SELECT UserName FROM user WHERE UserID = :UserID";
        $q = $conn->prepare($getQuery);
        $q->bindParam(":UserID", $ID);
        $q->execute();
        $result = $q->fetch();
        return reset($result);
    }

}

// $db = new Dao();

// $posts = $db->getForumPosts(1);
// foreach ($posts as $post)
// {
//     echo $post['Content'];
// }

// $db->saveForumPost(1, 164, 'test');

// echo $db->getPfp(164);


// $comments = $db->getComments();
// foreach ($comments as $comment)
// {
//     echo $comment['Content'] . "\n";
// }

// $db->saveComment(194, 'stuffs');