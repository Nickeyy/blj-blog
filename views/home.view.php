
<?php
    include 'models/home.model.php';
?>

<h1 class="form-title">Nickeyys Blog</h1>
<h2 class="form-title"> THE PERSONAL BLOG</h2>

<div class="wrapper">
    <form action="index.php?page=blog" method="post">
        <div class="form-actions">
            <input class="btn btn-primary" type="submit" value="Zum Blog schreiben">
            <a href="index.php?page=otherblog" class="btn">Zu anderen nicht so coolen Blogs</a>
        </div>
    </form>
</div>

<?php foreach($posts as $post): ?>
    <div class="form-actions">
        <h2>
            <?= htmlspecialchars($post['created_by'], ENT_QUOTES, "UTF-8");?>
        </h2>
        <h3>
            <?= htmlspecialchars($post ['post_title'], ENT_QUOTES, "UTF-8");?>
        </h3>
        <p>
            <?= insertSpace(htmlspecialchars($post['post_text'], ENT_QUOTES, "UTF-8"), 60); ?>
        </p>
        <p>
            <?= htmlspecialchars($post ['created_at']);?>
        </p>
        <?php if(htmlspecialchars($post['post_link'], ENT_QUOTES, "UTF-8") !== ''): ?>
            <img class= "images" src= <?=htmlspecialchars($post['post_link'], ENT_QUOTES, "UTF-8");?> alt="Bild">
        <?php endif; ?>
        <form method="post" action="index.php">
            <button class="button" type="button" value="Submit" name="count">
                <img class="button-images" src="https://png.pngtree.com/svg/20161030/upvote_1216981.png" alt="Upvote"> 
            </button>
            <button class="button" type="button" value="Submit" name="count">
                <img class="button-images" src="https://www.logolynx.com/images/logolynx/5a/5ab5811057da28da30d50fce3fa36b97.png" alt="Downvote">
            </button>
        </form>
    </div>
<?php endforeach; ?>


