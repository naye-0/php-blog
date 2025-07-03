<?php

namespace App\Core;

use PDO;
use App\Post\PostsRepository;

class Container
{

    public function getPdo()
    {
        if (!empty($this->pdo)) {
            return $this->pdo;
        }
        // Create a new PDO connection to the MySQL database
        $this->pdo = new PDO(
            'mysql:host=php-blog.dvl.to;dbname=php-blog;charset=utf8', // DSN (Data Source Name)
            'php-blog',                // Database username
            'CA97/IdIZRUvH(EM'         // Database password
            );

            // Disable emulation of prepared statements for better security
            $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            return $this->pdo;
    }

    public function getPostsRepository()
    {
        if (!empty($this->postsRepository)) {
            return $this->postsRepository;
        }
        $this->postsRepository = new PostsRepository(
            $this->getPdo()
        );
        return $this->postsRepository;
    }
}

?>