<?php include("../init.php"); ?>
<?php include("elements/header.php"); ?>

<h1>Post.php</h1>

<?php
$postsRepository = new App\Post\PostsRepository();
$id = $_GET['id'];
$post = $postsRepository->fetchPost($id);
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $post["title"]; ?></h3>
    </div>
    <div class="panel-body">
        <!--<?php /* echo str_replace("\n", "<br />", $post["content"]); */?>-->
        <?php echo nl2br($post["content"]); ?>
    </div>
</div>

<?php include("elements/footer.php"); ?>