<?php include("../database.php"); ?>
<?php include("elements/header.php"); ?>

      <h1>Startseite des Blogs</h1>
      <p class="lead">Das hier ist die Startseite des Blogs.</p>

      <?php
        $res = $pdo->query("SELECT * FROM `posts`");
      ?>

      <!-- <pre>
        <?php
          // var_dump($res);
          // var_dump($res->fetchAll());
          // var_dump($res->fetchAll(PDO::FETCH_ASSOC));
          // var_dump($res->fetchAll(PDO::FETCH_OBJ));
        ?>
      </pre> -->

      <ul>
        <?php foreach ($res AS $row): ?>
          <li>
            <a href="post.php?title=<?php echo $row["title"]; ?>">
            <?php echo $row["title"]; ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>

<?php include("elements/footer.php"); ?>