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
$errors=[];

$user = 'root';
$pass = '';
$dbh = new PDO('mysql:host=localhost;dbname=blogdb', $user, $pass);

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name']) ){
    $created_by    = trim($_POST['name']    ?? '');
    $post_title   = trim($_POST['title']   ?? '');
    $post_text = trim($_POST['text'] ??'');
    $created_at = date("Y-m-d H:i:s");
    $post_link = trim($_POST['link']??'Hallo');

        if($created_by===''){
            $errors[] = "Bitte geben Sie einen Nickname an.";
        }
        if($post_title===''){
            $errors[]="Geben Sie einen Titel ein.";
        }
        if($post_text ===''){
            $errors[]= "Geben Sie ihrem Blog einen Titel";
        }
    if(sizeof ($errors)===0){
    $stmt = $dbh->prepare("INSERT INTO post (created_by, created_at, post_title, post_text, post_link) VALUES(:cr_by, :cr_at, :p_ti, :p_te, :p_li) ");
    $stmt->execute([':cr_by' => $created_by, ':cr_at' => $created_at,':p_ti' => $post_title,':p_te' => $post_text, ':p_li'=> $post_link]);

    header("Location: http://10.20.16.102/blog/index.php");
    }
   else{
        foreach($errors as $error){?>
        <ul>
        <li><?= $error?></li>
        </ul><?php
       }
    }
}

?>

<div class="wrapper">

<h1 class="form-title">Nickeyys Blog</h1>

<form action="blog.php" method="post">

    <fieldset>
        <legend class="form-legend">Machen Sie ein super coolen BLOG genau HIER:</legend>
        <div class="form-group">
            <label class="form-label" for="name">Ihr super cooler NICKNAME!</label>
            <input class="form-control" type="text" id="name" name="name">
        </div>
        <div class="form-group">
            <label class="form-label" for="name">Ihr super cooler Title</label>
            <input class="form-control" type="text" id="title" name="title">
        </div>
        <div class="form-group">
            <label for="note" class="form-label">Ihr super cooler Eintrag</label>
            <textarea name="text" id="text" rows="3" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label class="form-label" for="link">Ihr super cooler Link, für Ihr super cooles Bild</label>
            <input class="form-control" type="text" id="link" name="link">
        </div>
    </fieldset>
    <div class="form-actions">
        <input class="btn btn-primary" type="submit" value="Absenden">
        <a href="index.php" class="btn">Zurück zum Blog</a>
    </div>

</form>
</div>
</body>
</html>