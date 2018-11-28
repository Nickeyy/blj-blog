<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Blogs des BLJ</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<h1>ANDERE NICHT SO COOLE BLOGS</h1>

<?php
$user = 'guest';
$pass = 'blj12345';
$dbh = new PDO('mysql:host=10.20.16.101;dbname=blogdb',$user,$pass);

$stmt = $dbh->prepare('SELECT * FROM andereblogs');
$stmt->execute();

foreach($stmt as $output){?>
<div clas = "form-actions">
<a class="form-group" href="http://<?= htmlspecialchars($output['ip'], ENT_QUOTES, "UTF-8");?><?= htmlspecialchars($output['pfad'], ENT_QUOTES, "UTF-8");?>"><?= htmlspecialchars($output['name'], ENT_QUOTES, "UTF-8"); ?></a>
</div>
<?php
}

?>

<div class="form-actions">
    <form method="get" action="blog.php">
        <button class="btn btn-primary" type="sumbit">Blog schreiben</button>
        <a href="index.php" class="btn">Zum Blog</a>
</form>
</div>
</body>
</html>