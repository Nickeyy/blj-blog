
<?php
    include 'models/home.model.php';
?>

<h1 class="form-title">Rick and Morty</h1>
<h2 class="form-title2"> THE Offical BLOG by Nick</h2>
<img class="startGif" src="https://thumbs.gfycat.com/CheerfulDistinctFlycatcher-size_restricted.gif" alt="RickandMortyGif">

<div class="wrapper">
    <form action="index.php?page=blog" method="post">
        <div class="form-actions">
            <input class="btn btn-primary" type="submit" value="Zum Blog schreiben">
            <a href="index.php?page=otherblog" class="btn">Zu denn Mates vom Basislehrjahr</a>
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
        <form method="post" action="index.php?page=home">
            <button class="button" type="submit" name="upcount">
                <img class="button-images" src="https://png.pngtree.com/svg/20161030/upvote_1216981.png" alt="Upvote"> 
            </button>
            <button class="button" type="submit" name="downcount">
                <img class="button-images" src="https://www.logolynx.com/images/logolynx/5a/5ab5811057da28da30d50fce3fa36b97.png" alt="Downvote">
            </button>
            <input class="form-control" type="hidden" id="id" name="id" value="<?=htmlspecialchars($post ['id']);?>">
            <input class="form-control" type="hidden" id="ups" name="ups" value="<?=htmlspecialchars($post ['up_votes']);?>">
            <input class="form-control" type="hidden" id="downs" name="downs" value="<?=htmlspecialchars($post ['down_votes']);?>">
            <div class="rates">
                <p class="anzlike">
                    <?=htmlspecialchars($post ['up_votes']);?>
                </p>
            </div>
            <div class="rates2">
                <p class="dislike">
                    <?=htmlspecialchars($post ['down_votes']);?>    
                </p>
            </div>    
        </form>
    </div>
<?php endforeach; ?>


