<?php

function autoload($className)
{
  if (file_exists("./src/{$className}.php")) {
    require "./src/{$className}.php";
  }
}
spl_autoload_register("autoload");


$pdo = new PDO('mysql:host=php-blog.dvl.to;dbname=php-blog', 'root', '');

$res = $pdo->query("SELECT * FROM `posts`");
foreach ($res AS $row) {
  var_dump($row);
}

?>