<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Nickeyy Blog</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1 class="form-title">Nickeyys Blog</h1>
<h2> THE PERSONAL BLOG</h2>

<?php

function insertSpace($text, $pos) { 
    $new = $text;
    for ($i = 0; $i < strlen($text); $i += $pos) {
        $vor = substr($new, 0, $i);
        $nach = substr($new, $i);
        if (strpos($vor, " ")  == false) {
                $new = $vor . ' ' . $nach; 
        }
    } 
    return $new;
}
$user = 'root';
$pass = '';
$dbh = new PDO('mysql:host=localhost;dbname=blogdb', $user, $pass);

$stmt = $dbh->prepare('SELECT * FROM post');
$stmt->execute();

foreach($stmt as $output) {?>
    <div class="form-actions">
    <h2><?= htmlspecialchars($output['created_by'], ENT_QUOTES, "UTF-8");?></h2>
    <h3><?= htmlspecialchars($output ['post_title'], ENT_QUOTES, "UTF-8");?></h3>
    <p><?= insertSpace(htmlspecialchars($output['post_text'], ENT_QUOTES, "UTF-8"), 60); ?></p>
    <p><?= htmlspecialchars($output ['created_at']);?></p>
    <?php if( htmlspecialchars($output['post_link'], ENT_QUOTES, "UTF-8") !== ''){
        ?><img class= "images" src= <?=htmlspecialchars($output['post_link'], ENT_QUOTES, "UTF-8");?> alt="Bild">
    <form method="post" action="index.php">
    <button class="button" type="button" value="Submit" name="count"><img class="button-images" src="https://png.pngtree.com/svg/20161030/upvote_1216981.png" alt="Upvote"> </button>
    <button class="button" type="button" value="Submit" name="count"><img class="button-images" src="https://www.logolynx.com/images/logolynx/5a/5ab5811057da28da30d50fce3fa36b97.png" alt="Downvote"></button>
    </form>
<?php
    }
}
?>
</div>

<div class="wrapper">

<form action="blog.php" method="post">
<div class="form-actions">
        <input class="btn btn-primary" type="submit" value="Zum Blog schreiben">
        <a href="otherblog.php" class="btn">Zu anderen nicht so coolen Blogs</a>
</div>
</div>
</body>
</html>