<?php

namespace App\Core;

use PDO;
use App\Post\PostsRepository;

class Container
{

    public function getPdo()
    {
        // Create a new PDO connection to the MySQL database
        $pdo = new PDO(
            'mysql:host=php-blog.dvl.to;dbname=php-blog;charset=utf8', // DSN (Data Source Name)
            'php-blog',                // Database username
            'CA97/IdIZRUvH(EM'         // Database password
            );

            // Disable emulation of prepared statements for better security
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            return $pdo;
    }

    public function getPostsRepository()
    {
        return new PostsRepository(
            $this->getPdo()
        );
    }
}

?>