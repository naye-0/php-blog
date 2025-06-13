<?php
namespace App\Post;

use PDO;

// Repository class for handling blog posts in the database
class PostsRepository
{
    // PDO instance for database connection
    private $pdo;

    // Constructor: receives a PDO object and saves it for later use
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // Fetches all posts from the 'posts' table
    public function fetchPosts()
    {
        $stmt = $this->pdo->query("SELECT * FROM `posts`");
        $posts = $stmt->fetchAll(PDO::FETCH_CLASS, "App\\Post\\PostModel");
        return ($posts);
    }

    // Fetches a single post by its ID
    public function fetchPost($id)
    {
        // Prepare a SQL statement to prevent SQL injection
        $stmt = $this->pdo->prepare("SELECT * FROM `posts` WHERE id = :id");
        // Execute the statement with the provided ID
        $stmt->execute(['id' => $id]);

        $stmt->setFetchMode(PDO::FETCH_CLASS, "App\\Post\\PostModel");
        $post = $stmt->fetch(PDO::FETCH_CLASS);

        return $post;


    /* DO NOT USE THIS WAY!
    // This is vulnerable to SQL injection and should be avoided
    $query = "SELECT * FROM `posts` WHERE title='{$title}'";
    $q = $pdo->query($query);
    return $q->fetch();
    */
}
}

?>