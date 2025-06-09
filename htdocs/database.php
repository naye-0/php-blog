<?php

// Create a new PDO connection to the MySQL database
$pdo = new PDO(
  'mysql:host=php-blog.dvl.to;dbname=php-blog;charset=utf8', // DSN (Data Source Name)
  'php-blog',                // Database username
  'CA97/IdIZRUvH(EM'         // Database password
);

// Disable emulation of prepared statements for better security
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

// Function to fetch all posts from the 'posts' table
function fetch_posts()
{
    global $pdo; // Use the global $pdo connection
    return $pdo->query("SELECT * FROM `posts`"); // Execute query and return result
}

// Function to fetch a single post by its title
function fetch_post($id)
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
?>