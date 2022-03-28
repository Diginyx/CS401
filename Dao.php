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

    public function saveComment ($blogID, $authorID, $content) {
        echo $authorID . "\n" . $content . "\n";
        $conn = $this->getConnection();
        $saveQuery =
            "INSERT INTO blogcomment
            (BlogID, AuthorID, Content)
            VALUES
            (:BlogID, :AuthorID, :Content)";
        $q = $conn->prepare($saveQuery);
        $q->bindParam(":BlogID", $blogID);
        $q->bindParam(":AuthorID", $authorID);
        $q->bindParam(":Content", $content);
        $q->execute();
    }

    public function getComments ($BlogID) {
        $conn = $this->getConnection();
        $getQuery = "SELECT * FROM blogcomment WHERE BlogID= :BlogID";
        $q = $conn->prepare($getQuery);
        $q->bindParam(":BlogID", $BlogID);
        $q->execute();
        $result = $q->fetchAll();
        return $result;
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

    public function saveForum ($title, $authorID, $description)
    {
        $conn = $this->getConnection();
        $saveQuery =
            "INSERT INTO forum
            (Title, AuthorID, Description)
            VALUES
            (:Title, :AuthorID, :Description)";
        $q = $conn->prepare($saveQuery);
        $q->bindParam(":Title", $title);
        $q->bindParam(":AuthorID", $authorID);
        $q->bindParam(":Description", $description);
        $q->execute();
    }

    public function getForum($forumID) {
        $conn = $this->getConnection();
        $getQuery = "SELECT * FROM forum WHERE ForumID = :ForumID";
        $q = $conn->prepare($getQuery);
        $q->bindParam(":ForumID", $forumID);
        $q->execute();
        $result = $q->fetchAll();
        return reset($result);
    }

    public function getForums() {
        $conn = $this->getConnection();
        return $conn->query("SELECT * FROM forum");
    }

    public function saveBlog ($authorID, $coverImage, $title, $description, $content) {
        $conn = $this->getConnection();
        $saveQuery =
            "INSERT INTO blog
            (AuthorID, CoverImage, Title, Description, Content)
            VALUES
            (:AuthorID, :CoverImage, :Title, :Description, :Content)";
        $q = $conn->prepare($saveQuery);
        $q->bindParam(":AuthorID", $authorID);
        $q->bindParam(":CoverImage", $coverImage);
        $q->bindParam(":Title", $title);
        $q->bindParam(":Description", $description);
        $q->bindParam(":Content", $content);
        $q->execute();
    }

    public function getBlogs() {
        $conn = $this->getConnection();
        return $conn->query("SELECT * FROM blog");
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

    public function getUserID($username) {
        $conn = $this->getConnection();
        $getQuery = "SELECT UserID FROM user WHERE Username = :Username";
        $q = $conn->prepare($getQuery);
        $q->bindParam(":Username", $username);
        $q->execute();
        $result = $q->fetch();
        return reset($result);
    }

    public function getUser($ID) {
        $conn = $this->getConnection();
        $getQuery = "SELECT * FROM user WHERE UserId = :UserID";
        $q = $conn->prepare($getQuery);
        $q->bindParam(":UserID", $ID);
        $q->execute();
        $result = $q->fetchAll();
        return reset($result);
    }

    public function getBlog($ID) {
        $conn = $this->getConnection();
        $getQuery = "SELECT * FROM blog WHERE BlogID = :BlogID";
        $q = $conn->prepare($getQuery);
        $q->bindParam(":BlogID", $ID);
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
// $db->saveBlog(164, 'images/BlogBackground.jpeg', 'Blog Title3', 'description3', 'test3');
// echo $db->getBlog(1)['BlogID'];
// $blogs = $db->getBlogs();
// foreach ($blogs as $blog)
// {
//     echo $blog['BlogID'] . "\n";
// }
// $forums = $db->getForums();
// foreach ($forums as $forum)
// {
//     echo $forum['ForumID'] . "\n";
// }
// $userID = $db->getUserID('obiwan');
// $user = $db->getUser($userID);
// echo $user['UserName'];

// $title = $db->getForum(1)['Title'];

// echo $title;

// $posts = $db->getForumPosts(1);
// foreach ($posts as $post)
// {
//     echo $post['Content'] . "\n";
// }

// $db->saveForumPost(1, 164, htmlspecialchars(""));

// echo $db->getPfp(164);


// $comments = $db->getComments(2);
// foreach ($comments as $comment)
// {
//     echo $comment['Content'] . "\n";
// }

// $db->saveComment(194, 'stuffs');