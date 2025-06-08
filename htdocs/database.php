<?php

$pdo = new PDO(
  'mysql:host=php-blog.dvl.to;dbname=php-blog',
  'root',
  ''
);

function fetch_posts()
{
    global $pdo;
    return $pdo->query("SELECT * FROM `posts`");
}

function fetch_post($title)
{
    global $pdo;
    $q = $pdo->query("SELECT * FROM `posts` WHERE title='{$title}'");
    return $q->fetch();
}
?>