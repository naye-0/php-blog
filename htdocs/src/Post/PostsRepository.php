<?php
namespace App\Post;

class PostsRepository
{
// Function to fetch all posts from the 'posts' table
function fetchPosts()
{
    global $pdo; // Use the global $pdo connection
    return $pdo->query("SELECT * FROM `posts`"); // Execute query and return result
}

// Function to fetch a single post by its title
function fetchPost($id)
{
    global $pdo; // Use the global $pdo connection
    // Prepare a SQL statement to prevent SQL injection
    $stmt = $pdo->prepare("SELECT * FROM `posts` WHERE id = :id");
    $stmt->execute(['id' => $id]); // Execute with the provided title
    return $stmt->fetch(); // Return the fetched post

    /* DO NOT USE THIS WAY!
    // This is vulnerable to SQL injection and should be avoided
    $query = "SELECT * FROM `posts` WHERE title='{$title}'";
    $q = $pdo->query($query);
    return $q->fetch();
    */
}
}

?>