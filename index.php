<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Nickeyy Blog</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
$user = 'root';
$pass = '';
$dbh = new PDO('mysql:host=localhost;dbname=blogdb', $user, $pass);

$stmt = $dbh->prepare('SELECT * FROM post');
$stmt->execute();

foreach($stmt as $output) {?>
    <div class="form-actions">
    <?= htmlspecialchars($output['created_by'])?>;
    <?= htmlspecialchars($output ['post_title'])?>;
    <?= htmlspecialchars($output ['post_text'])?>;
    <?= htmlspecialchars($output ['created_at']);
}
?>
<div class="wrapper">

<h1 class="form-title">Nickeyys Blog</h1>
<h2> THE PERSONAL BLOG</h2>

<form action="blog.php" method="post">
<div class="form-actions">
        <input class="btn btn-primary" type="submit" value="Zum Blog schreiben">
</div>

</body>
</html>