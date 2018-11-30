<h1>ANDERE NICHT SO COOLE BLOGS</h1>

<?php
    include 'models/otherblog.model.php';
    ?>

<?php foreach($stmt as $output):?>
<div class = "form-actions">
<a href="http://<?= htmlspecialchars($output['ip'], ENT_QUOTES, "UTF-8");?><?= htmlspecialchars($output['pfad'], ENT_QUOTES, "UTF-8");?>"><?= htmlspecialchars($output['name'], ENT_QUOTES, "UTF-8"); ?></a>
</div>
<?php endforeach;?>
<div class="form-group">
    <form method="post" action="index.php?page=blog">
        <button class="btn btn-primary" type="sumbit">Blog schreiben</button>
        <a href="index.php" class="btn">Zum Blog</a>
    </form>
</div>
